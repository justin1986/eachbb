<?php
	include_once('../frame.php');
	css_include_tag('login_register');
?>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<div id="banner">
	<div id="banner_top"></div>
	<div id="banner_content">
		<div id="banner_son">
			<div id="login" style="margin-top:50px;">
				<div class="title">用户登录</div>
				<div class="user_banner"><font>用户名：</font><input type="text"></div>
				<div class="user_banner"><font>密&nbsp;&nbsp;码：</font><input type="password"></div>
				<input type="button" id="btn" value="提 交"/>
			</div>
			<div id="c_hr"></div>
			<div id="logon">
				<div class="title" style="width:470px; text-align:center;">用户注册</div>
				<div class="logon_left">
					<div class="menu">用户名：</div>
					<div class="menu">密码：</div>
					<div class="menu">确认密码：</div>
					<div class="menu">性别：</div>
					<div class="menu">是否生育：</div>
					<div class="menu">出生日期：</div>
					<div class="menu">验证码：</div>
				</div>
				<div id="midden">
					<div class="menu"><input type="text"/></div>
					<div class="menu"><input type="password"></div>
					<div class="menu"><input type="password"></div>
					<div class="menu" style="margin-top:22px; line-height:20px;"><input type="radio" style="width:13px; height:13px; margin:0px; border:0px solid red;" id="man" name="gender" value="男"/>男<input type="radio" id="nv" name="gender" style="width:13px; height:13px; margin:0px; margin-left:20px; border:0px solid red;" value="女"/><font>女</font></div>
					<div class="menu" style="margin-top:18px;" >
						<select>
						<option>请选择</option>
						<option>已生育</option>
						<option>未生育</option>
						<option>怀孕中</option>
						</select>
					</div>
					<div class="menu"><input type="text"/></div>
					<div class="menu"><input type="text"/></div>
				</div>
				<div id="right">
					<div class="menu">4-20位，包含英文大小字母和数字组成</div>
					<div class="menu">含英文大小写字母、数字和部分标点符号</div>
					<div class="menu">两次密码必须输入一致</div>
					<div class="menu" style="height:25px; margin-top:135px;"><div id="validate"></div><font style="margin-left:10px; color:#999999;">看不清楚？换张图片</font></div>
				</div>
				<input type="button" id="logon_btn" value="注  册"/>
			</div>
		</div>
	</div>
	<div id="banner_bottom"></div>
</div>