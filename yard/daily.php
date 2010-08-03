<html>
<head>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard');
		js_include_tag('yard/yard');
		$db=get_db();
		$user = User::current_user();
	?>
<title>First program</title>
</head>
<body>
<form action="daily.post.php" method="post">
<div><textarea name="test" >ok</textarea ></div>
<input type="text" name="test2">
<input type="reset" value="提交">
<BUTTON type="submit">AB</BUTTON>
</form>
</body>
</html> 