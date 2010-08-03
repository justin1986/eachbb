<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title></title>
		<?php
			include 'frame.php';
			use_jquery();
		?>
	</head>
	<body>
		<?php 
			var_dump($_FILES[tmp_name]);
		?>
		<form action="test.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file" />
			<input type="submit" value="ok" />
		</form>
	</body>
</html>
