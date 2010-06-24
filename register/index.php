<?php
	session_start();
	include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>用户注册</title>
<?php
	use_jquery_ui();
	css_include_tag('logon','login_top');
	js_include_tag('register');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once('../inc/top_login.php');?>
		<div id="center">
			<div id="cpg_top"></div>
			<div id="cpg_c">
				<div id="cpgc_c">
				<form action="register.post.php" method="post">
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">用户名</div>
						<div class="ca_c"><input name="name" id="name" type="text"/> </div>
						<div class="ca_d" id="name_info">4-20位，包含英文大小字母和数字组成</div>
					</div>
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">邮箱</div>
						<div class="ca_c"><input name="email" type="text" id="email"/> </div>
						<div class="ca_d" id="email_info">邮箱作为您找回密码的唯一凭证，请填写真实有效邮箱地址并妥善保管！</div>
					</div>
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">登录密码</div>
						<div class="ca_c"><input name="password" id="password" type="password"/> </div>
						<div class="ca_d" id="password_info">请设置4-20个字符，包含英文大小写字母、数字和部分标点符号组合</div>
					</div>
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">确认密码</div>
						<div class="ca_c"><input id="re_password" type="password"/> </div>
						<div class="ca_d" id="re_password_info"></div>
					</div>
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">性别</div>
						<div class="ca_s"><input name="gender" value="0" type="radio"/>男<input type="radio" name="gender" checked="checked" value="1" style="margin-left:40px;"/>女</div>
						<div class="ca_d"></div>
					</div>
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">是否生育</div>
						<div class="ca_c">
							<select name="baby_status" id="baby_status">
								<option value=0>请选择</option>
								<option value=1>已生育</option>
								<option value=2>未生育</option>
								<option value=3>怀孕中</option>
							</select>
						</div>
						<div class="ca_d" id="status_info"></div>
					</div>
					<div class="c_a" style="display:none;">
						<div class="ca_a"></div>
						<div class="ca_b" id="baby_birthday">宝宝生日</div>
						<div class="ca_c">
							<input type="text" id="baby_birthday2" name=baby_birthday>
						</div>
						<div class="ca_d" id="baby_birthday_info"></div>
					</div>
					<div class="c_a">
						<div class="ca_a"></div>
						<div class="ca_b">联系电话</div>
						<div class="ca_c">
							<input type="text" id="phone" name=phone>
						</div>
						<div class="ca_d" id="phone_info"></div>
					</div>
					<div class="c_a">
						<div class="ca_a"></div>
						<div class="ca_b">联系地址</div>
						<div class="ca_c">
							<input type="text" id="address" name=address>
						</div>
						<div class="ca_d" id="address_info"></div>
					</div>
					<div class="c_a">
						<div class="ca_a"></div>
						<div class="ca_b">邮编</div>
						<div class="ca_c">
							<input type="text" id="zip" name=zip>
						</div>
						<div class="ca_d" id="zip_info"></div>
					</div>
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">出生年月日</div>
						<div class="ca_c"><input type="text" id="birthday" name=birthday> </div>
						<div class="ca_d" id="birthday_info"></div>
					</div>
					<div class="c_a">
						<div class="ca_a">*</div>
						<div class="ca_b">验证码</div>
						<div class="ca_c"><input type="text" id="verify" name=verify> </div>
						<div class="ca_d"><div id="validate"><img src="/inc/verify.php?name=register"></div><div id="cad_v">看不清楚？换张图片</div></div>
					</div>
					<div id="hr"></div>
					<textarea id="text"></textarea>
					<div id="check"><input id="accept" type="checkbox"/> 我接受用户注册和使用协议</div>
					<div id="confirm"><input type="button" id="register" disabled="disabled" value="确认并注册"></div>
					</form>
				</div>
			</div>
			<div id="cpg_b"></div>
		</div>
		<div id="bg_hr"></div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
</div>
</body>
</html>
