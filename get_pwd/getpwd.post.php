<?php
session_start();

include_once('../frame.php');
	
if(!is_post()){
	redirect('/error/'); 
	die();
}

if($_POST['session']!=$_SESSION['getpwd']||empty($_SESSION['getpwd'])){
	redirect('/error/'); 
	die();
}else{
	unset($_SESSION['getpwd']);
}
if(strlen($_POST['password']) > 20){
	alert('密码过长！请重新输入！');
	redirect($_SERVER['HTTP_REFERER']);
	die();
}
if(strlen($_POST['password']) < 4){
	alert('密码过长！请重新输入！');
	redirect($_SERVER['HTTP_REFERER']);
	die();
}
if(preg_match("/^[\w.!@#$%^&*]+$/", $_POST['password'])==0){
	alert('用户名包含特殊字符！请重新输入！');
	redirect($_SERVER['HTTP_REFERER']);
	die();
}

$uid = intval($_POST['uid']);

$user = new User();
$user->id = $uid;
$user->reset_password($_POST['password'],'',1);

$db = get_db();
$db->execute("update eb_get_pwd set end_time=now() where user_id=$uid");
alert('修改成功!');
redirect('/login');



