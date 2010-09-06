<?php
	include_once('../frame.php');
	$photo = $_POST["photo"];
	$db=get_db();
	set_charset("UTF-8");
	$user = User::current_user();
	if(!$user)die("请先登录！");
	if(!$photo)die("非法操作！");
	$sql="insert into eachbb_member.album(u_id,name,created_at,last_update_time,visit_count,comment_count)values('{$user->id}','$photo',now(),now(),0,0);";
	$resource_id ="select id from eachbb_member.album where u_id = '{$user->id}' order by created_at desc limit 1";
	$resource_id =$resource_id[0]->id;
	echo $resource_id;
	if($db->execute($sql)){
		if($db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,photo)values('$resource_id','image','{$user->id}',now(),'{$user->name}','{$user->avatar}','添加了新相册：','$photo')")){
		echo "添加相册成功！";}
	}else{ 
		echo "添加相册失败！";
	}
?>