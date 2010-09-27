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
	$photo=$_POST['photo'];
	if(!is_numeric($id)) die('invlid request!');
	if(!is_numeric($result)) die('invlid request!');
	$sql="update eachbb_member.photo set album_id=$result where id=$id";
	if($db->execute($sql)){
	if($db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,photo)values('$id','image','{$user->id}',now(),'{$user->name}','{$user->avatar}','移动了图片：','$photo')")){
		echo "修改成功！";}
	}
	else
		echo "修改失败！";
?>