<?php 
	include_once('../frame.php');
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$db = get_db();
	$id=$_POST['resos_id'];
	$result=$_POST['result'];
	if(!is_numeric($id)) die('invlid request!');
	if(!is_numeric($result)) die('invlid request!');
	$sql="update eachbb_member.photo set album_id=$result where id=$id";
	if($db->execute($sql))
		echo "修改成功！";
	else
		echo "修改失败！";
?>