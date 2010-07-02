<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<?php
	include_once('../frame.php');
 ?>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>课程</title>
<?php
	use_jquery();
?>
</head>
<body>
<a href='1'>1</a>
</body>
</html>
<script>
$(function(){
	
	alert($('a').attr('href'));

	$('a').click(function(e){
		e.preventDefault();
		alert($('a').attr('href'));
	});
});
</script>
