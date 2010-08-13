<?php
	include_once('../frame.php');
	$photo = $_POST["photo"];
	$db=get_db();
	set_charset("UTF-8");
	$user = User::current_user();
	if(!$user)die("请先登录！");
	if(!$photo)die("非法操作！");
	$sql="insert into eachbb_member.album(u_id,name,created_at,last_update_time,visit_count,comment_count)values({$user->id},'$photo',now(),now(),0,0);";
	if($db->execute($sql)){
		echo "添加相册成功！";
	}else{ 
		echo "添加相册失败！";
	}
?>