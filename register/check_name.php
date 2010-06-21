<?php 
	include_once('../frame.php'); 
	
	$name = $_POST['name'];
	
	$sql = "select name from fb_member where name='{$name}'";
	$db = get_db();
	$record = $db->query($sql);
	echo $db->record_count;
