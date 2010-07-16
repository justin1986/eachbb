<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>测试</title>
	<?php 
		include "frame.php";
		js_include_tag("swfobject");
	?>
	<link href="css/test.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="flash">
		this is the flash place;
	</div>
</body>
<script type="text/javascript">
	var flashvar = {
			image:"/upload/c2MQ9hl2Wu.jpg|/upload/krMFmqRWTE.jpg|/upload/Cf2u6oqPYo.jpg|/upload/oA3GYlgpz9.jpg|/upload/6D353KUl2y.jpg",
			url:"||||",
			info:"a|b|c|d|e"
	};
	swfobject.embedSWF('flash/index.swf','flash',"555","440","8.0",false,flashvar);
</script>
</html>