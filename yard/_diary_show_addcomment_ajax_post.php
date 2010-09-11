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
	$result = $db->execute("select id from eachbb_member.comment where id={$user->id} order by created_at desc limit 1");
	$resource_id =$result[0]->id;
	if($db->execute($sql)){
		if($db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,content)values('$id','d_comment','{$user->id}',now(),'{$user->name}','{$user->avatar}','发表了评论：','$show_result')"))
		echo "发布评论成功！";}
	else
		echo "发布评论失败！";
?>