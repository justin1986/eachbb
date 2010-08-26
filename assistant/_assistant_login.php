<?php
	session_start();
	include_once dirname(__FILE__).'/../frame.php';
	if(!isset($_SESSION['login'])){
		$_SESSION['login'] = rand_str();
	}
	js_include_tag('assistant_login');
	$user = User::current_user();
		function gender($value){
			if($value){
				return $value == 1 ? '男' : '女';
			}else{
				return "未知";
			}
		}
		function son($time){
			return now()-substr($time,0,4);
		}
		function birhday($time){
			$time=(substr(now(),0,4)-substr($time,0,4))*12+son($time);
			if( $time > 70)
			{
				$time=0;
			}
			return $time;
		}
if($user){
?>
<div id="indiv_top"></div>
	<div id="indiv_container">
		<div id="indiv">
			<div id="img_pg">
				<img src="<?php echo $user->avatar ? $user->avatar : '/images/assistant_list/pho.jpg';?>"/>
			</div>
			<div id="indiv_menu">
				<div id="indiv_name"><a target="_blank" href="/yard/home.php?id=<?php echo $user->id;?>"><?php echo $user->true_name;?></a></div>
				<div class="indiv_value" style="margin-top:25px;"><font>来自：</font><?php echo $user->address;?></div>
				<div class="indiv_value"><font>性别：</font><?php echo gender($user->gender);?></div>
				<div class="indiv_value"><font>年龄：</font><?php echo son($user->birthday)?son($user->birthday) : 0;?>岁</div>
				</div>
		</div>
		<div class="indiv_value" style="width:160px; margin-top:0px; margin-left:10px; color:#37B0AD; float:left; display:inline;"><font>宝宝：</font><?php echo $user->baby_name;?></div>
		<div class="indiv_value" style="width:160px; margin-left:10px; color:#37B0AD; float:left; display:inline;"><font>年龄：</font><?php echo birhday($user->baby_birthday) ? birhday($user->baby_birthday) : 0;?>个月</div>
	</div>
<?php }else{ ?>
<style>
	.user_name input{width:100px;}
</style>
	<form action="comlogin.post.php" method="post">
<div id="indiv_top"></div>
	<div id="indiv_container">
		<div class="user_name" style="width:170px; margin-top:10px; margin-left:10px; color:#37B0AD; float:left; display:inline;"><font>用户名：</font><input type="text" name="name" id='name'/></div>
		<div class="user_name" style="width:170px; margin-left:10px; margin-top:10px; color:#37B0AD; float:left; display:inline;"><font>密&nbsp;&nbsp;&nbsp;码：</font><input type="password" id='password' name="password" /></div>
		<div style="width:170px; height:20px; margin-left:10px; margin-top:10px; color:#37B0AD; float:left; display: inline;">
			<div style=" float:left; display: inline;">期&nbsp;&nbsp;&nbsp;限：</div>
			<div class="u_r">
				<select name="time">
					<option value="0">不保存</option>
			  		 <option value="1">一天</option>
			  		 <option value="7">一周</option>
			  		 <option value="30" selected="selected">一月</option>
			  		 <option value="365">一年</option>
   				</select>
   				 <?php if($_REQUEST['last_url']){?>
		  		 <input type="hidden" name="last_url" value="<?php echo $_REQUEST['last_url'];?>"></input>
		  		 <?php }?>
			</div>
		</div>
		<div style="width:170px; margin-left:10px; margin-top:10px; color:#37B0AD; text-align:center; float:left; display:inline;"><input type="button" id="login_bn"  value="确定" /><input id="assisnt_exit" style="margin-top:10px;" type="button"  value="取消" /></div>
	</div>
	<input type="hidden" name="session" value="<?php echo $_SESSION['login'];?>">
	
   </form>
<?php }?>