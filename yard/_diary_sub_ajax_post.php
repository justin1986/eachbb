<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	if(!$user)die("请先登录！");
	$title = htmlspecialchars($_POST['title']);
	$content = htmlspecialchars($_POST['content']);
	$created_id = $_POST['created_id'];
	$sql = "insert into eachbb_member.daily(u_id,created_at,last_edit_time,title,content,visit_count,comment_count,category_id)values({$user->id},now(),now(),'$title','$content',0,0,$created_id)";
	if($db->execute($sql))
		echo "发表日志成功！";
	else
		echo "发表日志失败！";
?>