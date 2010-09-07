<?php
	include_once('../frame.php');
	$db=get_db();
	set_charset("utf-8");
	$user = User::current_user();
	if(!$user)die("请先登录！");
	$title = htmlspecialchars($_POST['title']);
	$content = htmlspecialchars($_POST['content']);
	$created_id = intval($_POST['created_id']);
	$edit_id=intval($_POST["edit_id"]);
	if($edit_id){
		$sql = "update eachbb_member.daily set last_edit_time=now(),title='$title',content='$content',category_id=$created_id where id=$edit_id";
		if($db->execute($sql)){
		$db->execute("insert into eachbb_member.lastest_news(resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,content)values('$edit_id','diary','{$user->id}',now(),'{$user->name}','{$user->avatar}','更新了日志：','$content')");
		echo "更新日志成功！";}
		else
			echo "更新日志失败！";
	}else{
		$sql = "insert into eachbb_member.daily(u_id,created_at,last_edit_time,title,content,visit_count,comment_count,category_id)values({$user->id},now(),now(),'$title','$content',0,0,$created_id)";
		$result =$db->execute("select id from eachbb_member.daily where u_id = '{$user->id}' order by 'created_at' limit 1;");
		$resource_id = $result[0]->id;
		if($db->execute($sql)){
		$db->execute("insert into eachbb_member.lastest_news(resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,content)values('$resource_id','diary','{$user->id}',now(),'{$user->name}','{$user->avatar}','发表了日志：','$content')"); 	
		echo "发表日志成功！";
		}
		else
			echo "发表日志失败！";
	}
?>