<?php
	include_once('../frame.php');
	$resource_id=trim($_POST["resource_id"]);
	$show_result=htmlspecialchars($_POST["show_result"]);
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
	}
	if(!is_numeric($resource_id)) die('invlid request!');
	$db=get_db();
	$sql="insert into eachbb_member.comment(resource_id,comment,user_id,resource_type,created_at)values($resource_id,'$show_result',{$user->id},'daily',now());";
	if($db->execute($sql))
		echo "发布评论成功！";
	else
		echo "发布评论失败！";
?>