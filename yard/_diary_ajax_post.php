<?php 
	include_once('../frame.php');
	$name = $_POST["type"];
	$db=get_db();
	$user = User::current_user();
	if(!$user)die("请先登录！");
	$sql="insert into eachbb_member.daily_category(name,u_id,created_at)values('$name',{$user->id},now());";
	if($db->execute($sql)){
		echo "添加分类成功！";
	}else{
		echo "添加分类失败！";
	}
	
	
?>