<?php
	include_once('../frame.php');
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
	}
	$resos_id = $_POST["resos_id"];
	if(!is_numeric($resos_id)) die('invlid request!');
	$db=get_db();
	$db->execute("delete from eachbb_member.comment where resource_id=$resos_id and resource_type='photo'");
	if(!$db->execute("delete from eachbb_member.photo where id=".$resos_id))
		die("删除失败！");
	else{
		echo "删除成功！";
	}
?>