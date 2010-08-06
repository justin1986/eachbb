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
	if(!$db->execute("delete from eachbb_member.comment where id=".$comment_id))
		die("删除失败！");
	else{
		echo "删除成功！";
	}
?>