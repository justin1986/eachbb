<?php
	include_once('../frame.php');
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
	}
	$comment_id=trim($_POST["resoured"]);
	if(!is_numeric($comment_id)) die('invlid request!');
	$db=get_db();
	if(!$db->execute("delete from eachbb_member.comment where id=".$comment_id)){
		if($db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form)values('$comment_id','d_comment','{$user->id}',now(),'{$user->name}','{$user->avatar}','删除了评论。')"))
		die("删除失败！");}
	else{
		echo "删除成功！";
	}
?>