<?php
include_once('../frame.php');
$user = User::current_user();
if(!$user){
	die("请您先登录！");
	}
$db = get_db();
$id = $_POST['id'];
$array = $db->query("select id from eachbb_member.photo where album_id=$id");
$count = $db->record_count;
for ($i = 0 ; $i < $count ; $i++){
	$result .= $array[$i]->id.",";
}
$result = substr($result,0,-1);
$db->execute("delete from eachbb_member.comment where resource_id in ($result) and resource_type='photo'");
$db->execute("delete from eachbb_member.photo where album_id=$id");
if($db->execute("delete from eachbb_member.album where id=$id")){
	echo '删除成功！';
}else{
	echo '删除失败！';
}
?>