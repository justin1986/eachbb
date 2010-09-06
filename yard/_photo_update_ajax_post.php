<?php
	include_once('../frame.php');
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$db = get_db();
	$album_id =$_POST['album_id'];
	$id=$_POST['id'];
	$photo = $_POST['photo'];
	$title=htmlspecialchars($_POST['title']);
	$content=htmlspecialchars($_POST['content']);
	if(!is_numeric($id)) die('invlid request!');
	
	if($db->execute("update eachbb_member.photo set u_name='$title',description='$content' where id=$id;")){
	if($db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,photo)values('$album_id','image','{$user->id}',now(),'{$user->name}','{$user->avatar}','修改了一张照片：','$photo')"))
	   echo "修改成功";}
	else 
	 	echo "修改失败！";
?>