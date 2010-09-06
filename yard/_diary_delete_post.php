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
		if($db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form)values('$edit_id','diary','{$user->id}',now(),'{$user->name}','{$user->avatar}','删除了日志。')")){
		alert("删除成功！");
		?>
		<script>window.location.href="/yard/diary_list.php";</script>
		<?php }
	}
?>