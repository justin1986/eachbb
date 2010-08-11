<?php
include_once('../frame.php');
$user = User::current_user();
if(!$user){
	die("请您先登录！");
	}
$db = get_db();
$id = $_POST['id'];
if($db->execute("delete from eachbb_member.album where id=$id")){
	echo '删除成功！';
}else{
	echo '删除失败！';
}
?>
