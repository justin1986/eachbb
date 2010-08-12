<?php
include_once('../frame.php');
$user = User::current_user();
if(!$user){
	die("请您先登录！");
	}
$db = get_db();
$id = $_POST['id'];
$photo_id = $db->query("select id from eachbb_member.photo where u_id=3");
//$db->execute("delete from eachbb_member.comment where resource_id in $photo_id and resource_type=photo");
//$db->execute("delete from eachbb_member.comment where resource_id=$photo_id and resource_type=photo");
$a = implode(",",$photo_id);
//if($db->execute("delete from eachbb_member.album where id=$id")){
//	echo '删除成功！';
//}else{
//	echo '删除失败！';
//}
?>

