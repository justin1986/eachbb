<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	$select =$_POST['select'];
	alert($select);
	$sql = $db->query("select * FROM eachbb_member.lastest_news where u_id='{$user->id}'$select order by created_at desc");
	$num = $db->record_count;
	?>