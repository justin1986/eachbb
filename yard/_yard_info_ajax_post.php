<?php 
	include_once('../frame.php');
	$pho = $_GET["photo"];
	$db=get_db();
	$user = User::current_user();
	if(!$user)die("请先登录！");
	if($db->query("select * from eachbb_member.visit_history where  u_id={$user->uid}") != null)
	{
		$sql = "update eachbb_member.visit_history set f_avatar='$pho' where  u_id={$user->uid}";
		$db->execute($sql);
		$sql = "update eachbb_member.friend set f_avatar='$pho' where  u_id={$user->uid}";
		$db->execute($sql);
	}
	$sql = "update eachbb_member.member_avatar set status='0' where  u_id={$user->uid} and photo<>'$pho'";
	$db->execute($sql);
	$sql = "update eachbb_member.member_avatar set status='1' where  u_id={$user->uid} and photo='$pho'";
	if($db->execute($sql)){
		echo $pho;
	};
?>