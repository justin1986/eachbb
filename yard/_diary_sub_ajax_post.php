<?php
	include_once('../frame.php');
	$db=get_db();
	set_charset("utf-8");
	$user = User::current_user();
	if(!$user)die("请先登录！");
	$title = htmlspecialchars($_POST['title']);
	$content = htmlspecialchars($_POST['content']);
	$created_id = intval($_POST['created_id']);
	$edit_id=intval($_POST["edit_id"]);
	if($edit_id){
		$sql = "update eachbb_member.daily set last_edit_time=now(),title='$title',content='$content',category_id=$created_id where id=$edit_id";
		if($db->execute($sql))
			echo "更新日志成功！";
		else
			echo "更新日志失败！";
	}else{
		$sql = "insert into eachbb_member.daily(u_id,created_at,last_edit_time,title,content,visit_count,comment_count,category_id)values({$user->id},now(),now(),'$title','$content',0,0,$created_id)";
		if($db->execute($sql))
			echo "发表日志成功！";
		else
			echo "发表日志失败！";
	}
?>