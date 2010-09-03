<?php 
	include_once('../frame.php');
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$db = get_db();
	$problem_id=intval($_GET['id']);
	if(!$problem_id)die('操作有误!');
	if($db->execute("update eachbb_member.message set status=2 where id=$problem_id")){
		alert("删除成功！");
		redirect("message_index.php");
	}
	else{
		alert("删除失败！");
		redirect("message_index.php");
	}
?>
