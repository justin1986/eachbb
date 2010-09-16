<?php
if(!defined('FRAME_VERSION')){
	die('not in frame');
}
if(!function_exists('uc_user_synlogin')){
	@include_once dirname(__FILE__). '/../uc_client/client.php';
}

define('UC_APPID', '2');
define('UC_KEY', $app_uc_key);

class RegisterResult {
	var $result = false;
	var $error_code = -1;
	var $error_msg = '';
	var $id = 0;
	var $uid = 0;
}

class User {
	public static $s_table_name = '`eachbb_member`.member';
	public static $s_fields = array('id','name','email','authenticated','authenticate_string','authenticated_at','created_at','last_login','uid','avatar','cache_name','baby_status','baby_birthday','birthday','zip','phone','address','baby_name','baby_gender','gender','ip','fix_phone','id_num','education','industry','income','register_phone','true_name');
	
	/*
	 * staitc functions
	 */
	
	//查找用户，返回User对象或者User对象数组
	public static function find(){
		$sql = "select * from " .self::$s_table_name ;		
		$paramnum = func_num_args();
		if($paramnum >= 1){
			$param = func_get_arg(0);
			if(is_numeric($param)){
				$sql .= " where id=$param";
				$users = self::find_by_sql($sql);
				return $users ? $users[0] : null;
			}elseif(is_array($param)){
				if(isset($param['condition'])){
					$sql .= " where {$param['condition']}";
				}
				
				if(isset($param['order'])){
					$sql .= " order by {$param['order']}";
				}
				
				if(isset($param['limit']) && is_numeric($param['limit'])){
					$sql .= " limit {$param['limit']}";	
				}
			}
		}
		return self::find_by_sql($sql);
	}
	
	public static function find_by_cachename($cache_name){
		$sql = "select * from " .self::$s_table_name ." where cache_name='$cache_name'";
		$users = self::find_by_sql($sql);
		return $users ? $users[0] : null;
	}
	
	private static function &find_by_sql($sql){
		$db = get_db();
		$result = $db->query($sql);
		if(!$result || $db->record_count <= 0) return array();
		for($i=0;$i<$db->record_count; $i++){
			$users[$i] = new self();
			foreach (self::$s_fields as $field){
				$users[$i]->$field = $result[$i]->$field;
			}
		} 
		return $users;
		
	}
	//静态函数，用户登录，如果成功，则返回登录用户的对象实例，失败返回false
	public static function login($name,$password,$expire=0){
		if($expire > 0){
			$expire = time() + $expire * 3600 * 24;
		}
		$name = strtolower($name);
		if(strlen($name) > 50 || strlen($password) > 20) return false;
		//尝试使用ucenter接口登录
		list($uid, $uname, $upassword, $uemail) = uc_user_login($name, $password);
		//ucenter 接口登录成功!
		if($uid > 0){
			echo uc_user_synlogin($uid);
			if(is_null(self::login_by_uid($uid,$password,$expire))){
				//本地用户库中不存在，插入用户数据
				self::register($name,$uemail,$password,$uid);
				return self::login_by_uid($uid,$password,$expire);
			};
		}	
		//ucenter 接口登录失败，尝试从本地用户库登录	
		$old_pwd = $password;
		$password = md5($password);
		$db = get_db();
		$db->query("select id,uid from " .self::$s_table_name ." where (name='$name' or email='$name') and password='$password'");
		if($db->record_count <= 0) return false;
		$user_id = $db->field_by_name('id');
		$uid = $db->field_by_name('uid');
		$cache_name = rand_str(20);
		if(self::_login($user_id,$uid,$name,$cache_name,$expire,$old_pwd)=== false) return false;
		echo uc_user_synlogin($uid);
		return self::find($user_id);
	}
	
	//ucenter 同步登录接口函数
	static function login_by_uid($uid,$password,$expire=0){
		$db = get_db();
		$db->query("select name,id,uid from " .self::$s_table_name ." where uid=$uid");
		if($db->record_count <= 0) return null;
		$user_id = $db->field_by_name('id');
		$uid = $db->field_by_name('uid');
		$name = $db->field_by_name('name');
		$cache_name = rand_str(20);
		if(self::_login($user_id,$uid,$name,$cache_name,$expire,$password)=== false) return false;
		return self::find($user_id);
	}
	
	private static function _login($user_id,$uid,$name,$cache_name,$expire,$password=null){
		$result = true;
		$result &= @setcookie("member_name",$name,$expire,'/');
		$result &= @setcookie("cache_name",$cache_name,0,'/');
		$result &= @setcookie("member_id",$user_id,0,'/');
		$result &= @setcookie("member_uid",$uid,0,'/');
		if($password){
			$result &= @setcookie("member_password",$password,$expire,'/');
		} 
		if($result === false) return false;
		$db = get_db();
		$db->execute("update " .self::$s_table_name ." set cache_name='{$cache_name}',last_login=now() where id={$user_id}");
		return true;
	}
	
	public static function logout(){
		$result &= @setcookie("cache_name",'',0,'/');
		$result &= @setcookie("member_id",'',0,'/');
		$result &= @setcookie("member_uid",'',0,'/');
		echo uc_user_synlogout();
	}
	
	//注册新用户,返回数组
	public static function register($baby_info_name,$name,$email,$password,$uid=0,$baby_status=0,$baby_birthday='',$birthday='',$zip='',$phone='',$address='',$gender=2,$ip=''){	
		$result = new RegisterResult();	
		$name = strtolower($name);
		$email = strtolower($email);
		$db = get_db();
		$db->query("select id from " .self::$s_table_name ." where name='$name'");
		if($db->record_count > 0){
			$result->result = false;
			$result->error_code = 1;
			$result->error_msg = '用户名已被注册';
			return $result;
		}
		$db->query("select id from " .self::$s_table_name ." where email='$email'");
		if($db->record_count > 0){
			$result->result = false;
			$result->error_code = 2;
			$result->error_msg = '邮箱地址已被注册';
			return $result;
		}
		if($uid ==0){
			//注册到ucenter
			$ret = uc_user_register($name,$password,$email);
			switch ($ret) {
				case -1:
				case -2:
					$result->result = false;
					$result->error_code = 3;
					$result->error_msg = '用户名不合法';
					return $result;
				break;
				case -3:
					$result->result = false;
					$result->error_code = 1;
					$result->error_msg = '用户名已被注册';
					return $result;
				break;
				case -4:
					$result->result = false;
					$result->error_code = 4;
					$result->error_msg = '邮件地址格式有误';
					return $result;
				break;
				case -5:
				case -6:
					$result->result = false;
					$result->error_code = 2;
					$result->error_msg = '邮箱地址已被注册';
					return $result;
				break;
				default:
					$result->uid = $ret;
				break;
			}
		}else{
			$result->uid = $uid;
		}
		
		$authentic_str = rand_str(20);
		$password = md5($password);
		$sql = "insert into " .self::$s_table_name ." (baby_name,name,password,email,created_at,uid,authenticate_string,baby_status,baby_birthday,birthday,zip,phone,address,gender,ip) value(";
		$sql .= "'$baby_info_name','$name','$password','$email',now(),{$result->uid},'{$authentic_str}',$baby_status,'$baby_birthday','$birthday','$zip','$phone','$address',$gender,'$ip')";
		$db->execute($sql);
		$result->id = $db->last_insert_id;
		$result->result = true;
		//active the bbs
		$sql = "insert into bbs_members (uid,username,password,gender,regip) values ('" .$result->uid ."','" .$name ."','" .$password ."','0','" .getenv('REMOTE_ADDR') ."')";
		$db->execute($sql);
		return $result;
		
	}
		
	
	//返回当前登录的用户，未登录，则返回null
	public static function current_user(){
		if(!$_COOKIE['cache_name']) return null;
		global $_g_current_user;
		if(is_object($_g_current_user)) return $_g_current_user;
		$_g_current_user = self::find_by_cachename($_COOKIE['cache_name']);
		return $_g_current_user;
	}
	
	/*
	 * public functions
	 */
	
	
	//重置密码，$force=1时强制修改
	public function reset_password($new_password,$old_password,$force=0,$syn_uc=true){
		if(!$this->id) return false;
		$db=get_db();
		$old_password = md5($old_password);
		$password = md5($new_password);
		if(!$force){
			$db->query("select * from " .self::$s_table_name ." where name='{$this->name}' and password='$old_password'");
			if($db->record_count <= 0 ) return false;			
		}
		$db->execute("update " .self::$s_table_name ." set password='$password' where id={$this->id}");
		if($syn_uc){
			uc_user_edit($this->name , '' ,$new_password , $this->email,true);
		}
	}
	
	public function add_friend($friend_id){
		$db = get_db();
		$friend_id = intval($friend_id);
		$db->query("select name,avatar from eachbb_member.member where id={$friend_id}");
		if($db->record_count <= 0) return false;
		$friend_name = $db->field_by_name('name');
		$avatar = $db->field_by_name('avatar');
		
		$db->query("select id from `eachbb_member`.friend where u_id = {$this->id} and f_id ={$friend_id}");
		if($db->record_count > 0){
			return true;	
		}
		$now = now();
		$sql = "insert into `eachbb_member`.friend (u_id,f_id,f_name,f_avatar,created_at) values ({$this->id},$friend_id,'$friend_name','$avatar','$now')";
		return $db->execute($sql);
	}
	
	public function remove_friend($firend_id){
		$friend_id = intval($friend_id);
		$db = get_db();
		return $db->execute("delete from `eachbb_member`.friend where u_id={$this->id} and f_id = {$firend_id}");
	}
	
	public function adjust_score($score,$reason){
		
	}
	public static function lastest_news($type,$user){
		$db = get_db();
		if($type != "all"){
			return $db->query("select * from `eachbb_member`.lastest_news where resource_type = '$type' and u_id = '$user' order by created_at desc limit 9");
		}else if($type == "image"){
			return $db->query("SELECT * FROM `eachbb_member`.lastest_news where resource_type='image' and u_id in (SELECT f_id FROM eachbb_member.friend f where u_id=$user)");
		}else{
			return $db->query("select * from `eachbb_member`.lastest_news where resource_type != '' order by rand(),created_at desc limit 9");}
		}
}