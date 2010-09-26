<?php 
	include_once('../frame.php');
	$id = intval($_POST['id']);
	$type = $_POST['type'];
	$user = User::current_user();
	if(!$user){
		echo "no login";
		exit();
	}
	if($type=='change'){
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
		$db->execute("update eachbb_member.lastest_news set u_avatar='{$photo}' where  u_id={$user->id}");
		if($db->execute("update eachbb_member.visit_history set f_avatar='{$photo}' where f_id={$user->id}")){
			echo "修改成功！";
		}
	}elseif($type=='del'){
		$db = get_db();
		$db->query("select status from eachbb_member.member_avatar where u_id={$user->id} and id={$id}");
		if($db->record_count <= 0){
			echo "invalid request";
			exit();
		}
		$status = $db->field_by_name('status');
		if($status==1){
			echo "used";
		}else{
			$db->execute("delete from eachbb_member.member_avatar where id={$id}");
			echo "done";
		}
	}
?>