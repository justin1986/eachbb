<?php
include_once('../frame.php');
$user = User::current_user();
if(!$user){
	die("请您先登录！");
	}
$db = get_db();
$id = $_POST['id'];
$array = $db->query("select id,photo from eachbb_member.photo where album_id=$id");
$count = $db->record_count;
for ($i = 0 ; $i < $count ; $i++){
	$result .= $array[$i]->id.",";
	if(is_file("..".$array[$i]->photo)){
		@unlink("..".$array[$i]->photo);
	}else{
		echo "文件不存在！";
	}
}
$result = substr($result,0,-1);
if($result){
	$db->execute("delete from eachbb_member.comment where resource_id in ($result) and resource_type='photo'");
}
$db->execute("delete from eachbb_member.photo where album_id=$id");
$result=$db->query("SELECT front_cover FROM eachbb_member.album a where id=$id;");
if(is_file("..".$result[0]->front_cover)){
		@unlink("..".$result[0]->front_cover);
	}else{
		echo "文件不存在！";
		die();
	}
if($db->execute("delete from eachbb_member.album where id=$id")){
	echo '删除成功！';
}else{
	echo '删除失败！';
}
?>