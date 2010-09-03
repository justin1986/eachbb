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
	$problem_id=intval($_POST['id']);
	if(!$problem_id)die('操作有误!');
	if($db->execute("update eachbb_member.message set status=2,last_edit_at=now() where id=$problem_id")){
		echo "删除成功！";
	}
	else{
		echo "删除失败！";
	}
?>
