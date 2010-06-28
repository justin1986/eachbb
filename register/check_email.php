<?php 
	include_once('../frame.php'); 
	
	$email = $_POST['email'];
	
	$sql = "select email from eb_member where email='{$email}'";
	$db = get_db();
	$record = $db->query($sql);
	echo $db->record_count;