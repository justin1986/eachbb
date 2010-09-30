<?php
session_start();
include_once(dirname(__FILE__).'/../frame.php');
$user = User::current_user();
$db=get_db();
init_page_items('assistant_index');
if(!isset($_SESSION['login'])){
	$_SESSION['login'] = rand_str();
}
$count=$db->query("SELECT count(id)id FROM eachbb_member.message m where status=0 and recieve_id=".$user->id);
if($user){
	$count_comment=mysql_query('SELECT id FROM eachbb_member.`comment` c where user_id=3');
	$num_rows = mysql_num_rows($count_comment); 

?>
<div id="lp_t">用户登录</div>
<div id="lp_p">
	<div id="lp_l"><img src="<?php echo $user->avatar ? $user->avatar : '/images/class/l_peo.jpg';?>"></div>
	<div id="lp_word"><?php echo $user->name;?></div>
</div>
<div id="l_b_wa"><a href="/baby/message_index.php" target="_blank">您有<font><?php echo $count[0]->id; ?></font>条消息</a></div>
<div id="l_b_wb"><a href="/yard/" target="_blank">我家小院子</a></div>
<div class="assistant_top_pg_a" >
	<a href="/course" target="_blank"><img src="/images/consult/course_pg.jpg"/></a>
</div>
<div class="assistant_top_pg_b" >
	<a href="/test" target="_blank"><img src="/images/test/test_pg.jpg"/></a>
</div>
<?php }else{?>
<div id="lp_t">用户登录</div>
<form action="comlogin.post.php" method="post">
<div id="lp_ppp">
		<div class="lp_p_input"><div id="user">用户名:</div><div class="lpp_i"><input name='name' id="name" type="text" /></div></div>
		<div class="lp_p_input" style="height:34px;">
			<div id="user_pwd" style="height:34px;">密&nbsp;&nbsp;码:</div>
			<div class="lpp_i" style="height:34px;"><input name='password' id="password" type="password" /></div>
		</div>
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
	 <div id="urr_btn" style="width:180px; height:30px;  margin-top:5px; text-align: center; float: left; display: inline;">
		 <img id="login_bn" src="/images/index/btn_login.gif" style="float:left; margin-left:20px;" />
		 <a href="/register/" target="_blank"><img id="login_r" border="0" style="margin-top:0px;" src="/images/index/btn_zhuce.gif"/></a>
	 </div>
	 <div class="assistant_top_pg_a" style="margin-left:0px;">
		<a href="/course" target="_blank"><img src="/images/consult/course_pg.jpg"/></a>
	</div>
	<div class="assistant_top_pg_b" style="margin-left:0px;">
		<a href="/test" target="_blank"><img src="/images/test/test_pg.jpg"/></a>
	</div>
</div>
</div>
</form>
<?php }?>
<style>
#u_l{width:55px; height:25px; overflow:hidden; font-size:13px;  line-height:25px; float:left; display:inline;}
#u_r{width:130px; height:25px; float:left; dispaly:inline;}
#u_r select{width:80px; height:25px; }
#urr_btn img{width:60px; height:22px;}
.lp_p_input{width:185px; height:30px;  margin-top:2px; overflow:hidden; font-size:13px; float:left; display: inline;}
.lpp_i{width:130px; height:25px; float:left; dispaly:inline;}
#lp_ppp input{width:120px; height:20px; }
#lp_ppp{width:185px; height:120px; margin-top:2px; margin-left:8px; background:#ffffff; float:left; display:inline;}
#user{width:55px; height:25px; line-height:25px;  overflow:hidden; float:left; display:inline;}
#user_pwd{width:55px; height:25px; overflow:hidden;  line-height:25px; float:left; display:inline;}
</style>