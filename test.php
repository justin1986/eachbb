<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title></title>
		<?php
			include 'frame.php';
		?>
	</head>
	<body>
		<form action="test.php" method="post">
			<input type="text" value="<?php echo $_POST['post']; ?>"; />
			<input type="submit" name="post" value="ok" />
		</form>
		<?php
			var_dump(User::current_user());
		?>
	</body>
</html>

