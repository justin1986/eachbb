<?php
function front_login($name,$password){
	$password = md5($password);
	$db = get_db();
	$sql = "select * from fb_yh where name = '{$name}' and password = '{$password}' and authenticated=1";
	$record = $db->query($sql);
	if($db->record_count==1)
	{
		$user_id = $db->field_by_name('id');
		$cache_name = sprintf('%06s',$user_id) .rand_str(24);
		$db->execute("update fb_yh set cache_name='{$cache_name}' where id={$user_id}");
		if($_POST['time']!='')
		{
			$limit=time()+$_POST['time']*3600*24;
			if(empty($_POST['time'])){
				$limit = 0;
			}
			setcookie("name",$name,$limit,'/');
			setcookie("cache_name",$cache_name,0,'/');
			setcookie("password",$_POST['password'],$limit,'/');
			
		}else{
			setcookie("name",$name,0,'/');
			setcookie("cache_name",$cache_name,0,'/');
			
		}
		$db->execute("insert into fb_yh_log (yh_id,time) values ({$user_id},now())");
		return $cache_name;
	}else{
		return false;
	}
}