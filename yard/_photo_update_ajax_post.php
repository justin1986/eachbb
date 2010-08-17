<?php
	include_once('../frame.php');
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$db = get_db();
	$id=$_POST['id'];
	$title=htmlspecialchars($_POST['title']);
	$content=htmlspecialchars($_POST['content']);
	if(!is_numeric($id)) die('invlid request!');
	if($db->execute("update eachbb_member.photo set u_name='$title',description='$content' where id=$id;"))
	 	echo "修改成功！";
	 else 
	 	echo "修改失败！";
?>