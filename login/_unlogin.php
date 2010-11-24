<?php set_charset("utf-8");?>
<div id="email">
	<div id="email_l">用户名</div>
	<div id="email_r">
		<input id="login_name" type="text" value="<?php echo $_COOKIE['member_name'];?>" />
	</div>
</div>
<div id="password">
	<div id="email_l">密&nbsp;&nbsp;&nbsp;&nbsp;码</div>
	<div id="email_r">
		<input type="password" id="login_password" value="<?php echo $_COOKIE['member_password'];?>"/>
	</div>
</div>
<div id="pwd">
	<input type="checkbox" id="login_check" name="checkbox" value="checkbox" checked="checked" />
	<div id="my_check">
		<label for="login_check">记住我的帐号</label>
	</div>
	<div id="pwd_right"><a href="/get_pwd/">忘记密码</a></div>
</div>
<div id="login_user"> 
	<img id="login_l" src="/images/index/btn_login.gif"/>
	<a href="/register/"><img id="login_r" border="0" src="/images/index/btn_zhuce.gif"/></a>
</div>