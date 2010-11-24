<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php
	include_once '../frame.php';
	include_once '../inc/User.class.php';
	use_jquery_ui();
	css_include_tag('top_inc/test_top','colorbox','login_register');
	js_include_tag('jquery.colorbox-min');
	?>
</head>
<body>
</body>
<script type="text/javascript">
	$(function(){
		$.fn.colorbox({href:'/register/login_register.ajax.php'});
	});
</script>
</html>