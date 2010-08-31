<?php
session_start();
include_once(dirname(__FILE__).'/../frame.php');
$user = User::current_user();
$db=get_db();
if(!isset($_SESSION['login'])){
	$_SESSION['login'] = rand_str();
}
if($user){
	$count_comment=mysql_query('SELECT id FROM eachbb_member.`comment` c where user_id=3');
	$num_rows = mysql_num_rows($count_comment); 
?>
<div id="lp_t">个人信息管理</div>
<div id="lp_p">
	<div id="lp_l"><img src="<?php echo $user->avatar ? $user->avatar : '/images/class/l_peo.jpg';?>"></div>
	<div id="lp_word"><?php echo $user->name;?></div>
</div>
<div id="l_b_wa">您有<font><?php echo $num_rows; ?></font>条评论</div>
<div id="l_b_wb"><a href="yard">我家小院子</a></div>
<?php }else{?>
<div id="lp_t">个人信息管理</div>
<form action="comlogin.post.php" method="post">
<div id="lp_ppp">
		<div class="lp_p_input"><div id="user">用户名:</div><div class="lpp_i"><input name='name' id="name" type="text" /></div></div>
		<div class="lp_p_input" ><div id="user_pwd">密&nbsp;&nbsp;码:</div><div class="lpp_i"><input name='password' id="password" type="password" /></div></div>
	<div id="userr">
	<div id="u_l">期&nbsp;&nbsp;限：</div>
	<div id="u_r">
		<select name="time">
			<option value="0">不保存</option>
	  		 <option value="1">一天</option>
	  		 <option value="7">一周</option>
	  		 <option value="30" selected="selected">一月</option>
	  		 <option value="365">一年</option>
   		</select>
   		 <?php if($_REQUEST['last_url']){?>
  		 <input type="hidden" name="last_url" value="<?php echo $_REQUEST['last_url'];?>"></input>
		<input type="hidden" name="session" value="<?php echo $_SESSION['login'];?>">
  		 <?php }?>
	</div>
	 <div id="urr_btn" style="width:170px; height:30px; text-align: center; float: left; display: inline;"><input id="login_bn" type="button" style="height:25px; line-height: 25px;" value="登录"/></div>
</div>
</div>
</form>
<?php }?>
<style>
#userr{}
#u_l{width:55px; height:25px; overflow:hidden; font-size:13px;  line-height:25px; float:left; display:inline;}
#u_r{width:130px; height:25px; float:left; dispaly:inline;}
#u_r select{width:80px; height:25px; }

.lp_p_input{width:190px; height:30px;  margin-top:2px; overflow:hidden; font-size:13px; float:left; display: inline;}
.lpp_i{width:130px; height:25px; float:left; dispaly:inline;}
#lp_ppp input{width:120px; height:20px; }
#lp_ppp{width:190px; height:120px; margin-top:2px; margin-left:8px; background:#ffffff; float:left; display:inline;}
#user{width:55px; height:25px; line-height:25px;  overflow:hidden; float:left; display:inline;}
#user_pwd{width:55px; height:25px; overflow:hidden;  line-height:25px; float:left; display:inline;}
</style>