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
	$resutl=$db->query("SELECT photo,album_id FROM  eachbb_member.photo p where id=$resos_id;");
	$result=$resutl[0]->photo;
	$resource_id = $resutl[0]->album_id;
	#echo $result;
	#var_dump("../"substr($result,1));
	
	if(!$db->execute("delete from eachbb_member.photo where id=".$resos_id))
		die("删除失败！");
	else{
		$db->execute("insert into `eachbb_member`.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form)values('$resource_id','image','{$user->id}',now(),'{$user->name}','{$user->avatar}','删除了一张照片：')");
		echo "删除成功！";
	}
	if(is_file("..".$result)){
		@unlink("..".$result);
	}else{
		echo "文件不存在！";
		die();
	}
?>