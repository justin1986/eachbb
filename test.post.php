<?php
	include 'frame.php';
	$db = get_db();
	echo "title=" .$_POST['title'] ."<br/>";
	echo "content=" .$_POST['content'] ."<br/>";
	$db->execute("insert into test(title,content) values ('{$_POST['title']}','{$_POST['content']}')");
	
?>