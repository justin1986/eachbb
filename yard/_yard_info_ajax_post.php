<?php 
	include_once('../frame.php');
	$id = intval($_POST['id']);
	$user = User::current_user();
	if(!$user){
		echo "no login";
		exit();
	}
	$db = get_db();
	$db->query("select photo from eachbb_member.member_avatar where u_id={$user->id} and id={$id}");
	if($db->record_count <= 0){
		echo "invalid request";
		exit();
	}
	$photo = $db->field_by_name('photo');
	$db->execute("update eachbb_member.member_avatar set status = 0 where u_id = {$user->id}");
	$db->execute("update eachbb_member.member_avatar set status = 1 where id = {$id}");
	$db->execute("update eachbb_member.member set avatar = '{$photo}' where id={$user->id}");
	$db->execute("update eachbb_member.friend set f_avatar='{$photo}' where  f_id={$user->id}");
	if($db->execute("update eachbb_member.visit_history set f_avatar='{$photo}' where  f_id={$user->id}")){
		echo "修改成功！";
	}
?>