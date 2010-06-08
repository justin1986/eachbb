<?php
	session_start();
	include_once( dirname(__FILE__) .'/../frame.php');
	if(!isset($_SESSION['login'])){
		$_SESSION['login'] = rand_str();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
		<title>登陆_福布斯中文网</title>
		<?php
			use_jquery();
			js_include_tag('public');
			css_include_tag('comlogin','public');
			validate_form('form_login');
		?>
</head>
<body>
<div id=ibody>		
	 <?php include_top();?>
	 <div id=bread>用户登录</div>
	 <div id=bread_line></div>
	 <div id="left">
	    <form name="login" id="form_login" action="comlogin.post.php" method="post">
	  	<div id="left_top">
	  		<div id="left_title">欢迎您登录福布斯中文网！</div>
		</div>
		<div id="left_bottom">
	  		<div class="line_div">
	  		 <div>用户名：</div>
	  		 <input type="text" class="required"  name="name" value="<?php echo $_COOKIE['name'];?>"></input>
	  		</div>
	  		<div class="line_div">
	  		 <div>密　码：</div>
	  		 <input type="password" class="required" name="password" value="<?php echo $_COOKIE['password'];?>"></input>
	  		</div>
	  		<div class="line_div">
	  		 <div>期　限：</div>
	  		 <select type="text" name="time">
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
	  		<div class="line_div"><input type="submit" id="login" value="登录"></button></div>
	  		<div class="line_div">
	  		  <div id=left_bottom1><a href="/register/">新用户注册</a></div>
	  		  <div id=left_bottom2><a href="/getpwd/">忘记密码？</a></div>
	  		</div>
	  	</div>
		<input type="hidden" name="session" value="<?php echo $_SESSION['login'];?>">
	    </form>
	</div>
	<div id="right">
	    <div id="login_banner" class="ad_banner"></div>
	    <div id="right_bottom">
			 <div id="right_title">欢迎您登陆福布斯中文网！</div>
			 <div id="right_word">《福布斯》杂志的前瞻性报道为企业高层决策者引导投资方向，提供商业机会，被誉为“美国经济的晴雨表”。</div>
	    </div>
	</div>
	<?php 
		include_bottom();
	?>
	 
</div>
</body>
</html>
