<?php 
	include_once('../frame.php'); 
	
	$name = $_POST['name'];
	
	$sql = "select name from eachbb_member.member where name='{$name}'";
	$db = get_db();
	$record = $db->query($sql);
	echo $db->record_count;
