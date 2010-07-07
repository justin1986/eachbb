<style>
	#login_left_container div{margin-top:2px;}
	#div_person_center a{color:#D8732C; font-size:12px; text-decoration: none;}
	#div_login_bottom a{color: gray; font-size: 12px; text-decoration: none;}
</style>
<div id="login_left_container" style="with:150px; float:left; ">
	<div><?php echo $user->name;?></div>
	<div style="color:#68983C;"><b>您好，欢迎回来！</b></div>
	<div id="div_person_center"><a href="#">个人中心</a> | <a href="#">消息(0)</a></div>
</div>
<div style="float:left;margin-left:5px;">
	<img alt="头像" src="<?php echo $user->avatar ? $user->avatar : '/images/login/avatar.jpg'?>" width="80" height="80">
</div>
<div id="div_login_bottom" style="float:left; margin-top:10px; margin-left:45px; width:130px;display:inline;"><a href="#" id="a_ajax_logout">退出</a> <a href="#" id="a_change_user">更改用户</a></div>