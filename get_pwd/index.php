<?php
	session_start();
	include_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>密码找回</title>
<?php
	use_jquery();
	css_include_tag('login_pwd','login_top');
	js_include_tag('get_pwd');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
<?php include_once(dirname(__FILE__) .'./../inc/_register_top.php');?>
		<div id="center">
			<div id="cpg_top"></div>
			<div id="cpg_c">
				<div id="cpg_l">
					<div id="cpg_t">
						<div id="cpgt_l"></div>
						<div id="cpgt_c">密码找回</div>
						<div id="cpgt_r"></div>
					</div>
					<div id="cpgc_c">
					<form action="get_pwd.post.php" method="post">
						<div class="user">
							<div class="u_l">用户名：</div>
							<div class="u_r"><input name="name" id="name" type="text" /></div>
						</div>
						<div class="user">
							<div class="u_l">邮&nbsp;&nbsp;箱：</div>
							<div class="u_r"><input name="email" id="email" type="text" /></div>
						</div>
						<div class="user">
							<div class="u_l">验证码：</div>
							<div class="u_c"><input name="verify" id="verify_text" type="text"></div>
							<div class="u_y"><img id="verify_img" src="/inc/verify.php?name=get_pwd"></div>
							<div id="u_r">看不清楚？换张图片</div>
						</div>
					
						<div class="u_btn"><input id="get_pwd" type="button"> </div>
					</form>
					</div>
					<div id="cpgc_b"></div>
				</div>
				<div id="cpg_r">
				</div>
			</div>
			<div id="cpg_b"></div>
		</div>
		<?php include_once(dirname(__FILE__).'./../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
