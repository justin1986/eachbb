<?php
	include_once('../frame.php');
	$resource_id=trim($_POST["resource_id"]);
	$show_result=htmlspecialchars($_POST["show_result"]);
	$photo = $_POST['photo'];
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
	}
	if(!is_numeric($resource_id)) die('invlid request!');
	$db=get_db();
	if($db->execute("insert into eachbb_member.comment(resource_id,comment,user_id,resource_type,created_at)values($resource_id,'$show_result',{$user->id},'photo',now())")){
	if($db->execute("insert into `eachbb_member`.lastest_news(resource_id,u_id,resource_type,created_at,u_name,u_avatar,form,content)values('$resource_id','{$user->id}','p_comment',now(),'{$user->name}','{$user->avatar}','发表了一个评论：','$show_result')"))
		echo "发布评论成功！";}
	else
		echo "发布评论失败！";
?>