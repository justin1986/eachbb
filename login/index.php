<?php
	session_start();
	include_once(dirname(__FILE__) .'/../frame.php');
	if(!isset($_SESSION['login'])){
		$_SESSION['login'] = rand_str();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>用户登录</title>
<?php
	use_jquery();
	css_include_tag('login_c','login_top');
	js_include_tag('login');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once(dirname(__FILE__) .'./../inc/_login_top.php');?>
		<div id="center">
			<div id="cpg_top"></div>
			<div id="cpg_c">
				<div id="cpg_l">
					<div id="cpg_t">
						<div id="cpgt_l"></div>
						<div id="cpgt_c">欢迎您登录网趣宝贝!</div>
						<div id="cpgt_r"></div>
					</div>
					<div id="cpgc_c">
						<form action="comlogin.post.php" method="post">
						<div class="user">
							<div class="u_l">用户名：</div>
							<div class="u_r"><input name='name' id="name" type="text" /></div>
						</div>
						<div class="user">
							<div class="u_l">密&nbsp;&nbsp;码：</div>
							<div class="u_r"><input name='password' id="password" type="password" /></div>
						</div>
						<div class="user">
							<div class="u_l">期&nbsp;&nbsp;限：</div>
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
						<input type="hidden" name="session" value="<?php echo $_SESSION['login'];?>">
						<div class="u_btn"><input id="login_bn" type="button"> </div>
						</form>
						<div class="u_v">
							<div id="v_l"><a href="/register">新用户注册</a></div>
							<div id="v_r"><a href="/get_pwd">忘记密码？</a></div>
						</div>
					</div>
					<div id="cpgc_b"></div>
				</div>
				<div id="cpg_r" class="ad_banner"></div>
			</div>
			<div id="cpg_b"></div>
		</div>
	<?php include_once(dirname(__FILE__).'./../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
