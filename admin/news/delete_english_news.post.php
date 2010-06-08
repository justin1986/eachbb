<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$db = get_db();
	$db->execute("delete from eb_news_relationship where chinese_news_id={$_POST['ch_id']}");
	$db->execute("delete from eb_news where id={$_POST['del_id']}");
	//redirect('/admin/news/news_edit.php?id='.$_POST['ch_id'],'header');
?>