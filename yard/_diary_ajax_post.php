<?php 
	include_once('../frame.php');
	$pho = $_GET["photo"];
	$db=get_db();
	$user = User::current_user();
	if(!$user)die("请先登录！");

?>