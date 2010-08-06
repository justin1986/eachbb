<?php
	include_once('../frame.php');
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
	}
	$edit_id=trim($_GET["edit"]);
	if(!is_numeric($edit_id)) die('invlid request!');
	$db=get_db();
	$db->execute("delete from eachbb_member.comment where resource_id=".$edit_id);
	if(!$db->execute("delete from eachbb_member.daily where id=".$edit_id))
		die("删除失败！");
	else{
		alert("删除成功！");
		?>
		<script>window.location.href="/yard/diary_list.php";</script>
		<?php 
	}
?>