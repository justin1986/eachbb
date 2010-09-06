<?php 
	include_once('../frame.php');
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$db = get_db();
	$id=intval($_POST['id']);
	$result=$_POST['result'];
	if(!id)die('操作有误!');
	$member=$db->query("SELECT name,avatar FROM eachbb_member.member where id=$id");
	if($member){
		if($db->execute("insert into eachbb_member.message(created_at,content,avatar,status,last_edit_at,send_id,message_type,recieve_id)values(now(),'$result','{$user->avatar}',0,now(),{$user->id},1,$id);")){
			echo "发布成功！";
		}
		else{
			echo "发布失败！";
		}
	}else{
		echo "非法操作！";
	}
?>
