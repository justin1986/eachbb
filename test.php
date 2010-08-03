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
<<<<<<< HEAD:test.php
		<?php 
			var_dump($_FILES[tmp_name]);
		?>
		<form action="test.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file" />
			<input type="submit" value="ok" />
		</form>
=======
		<form action="test.post.php" method="post">
			<p>
			title:<input type="text" name="title" value="<?php echo $_POST['post']; ?>"; />
			</p>
			<p>
			content:<textarea rows="" cols="20" name="content"></textarea>
			</p>
			<input type="submit" value="ok" />
		</form>
		<div>
			<?php
				$db = get_db();
				$result = $db->query("select * from test");
				if($result === false) die("query fail");
				
				
			?>
			title:<?php echo $result[0]->title ?>
		</div>
>>>>>>> 97ddd1853ec547296390bcc94d98ecde1659494c:test.php
	</body>
</html>
