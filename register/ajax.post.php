<?php
include_once '../frame.php';
include_once '../inc/user.class.php';
$valid_types = array('login','register');
$type= $_POST['type'];
if($type == 'login'){
	$name = urldecode($_POST['name']);
	$password = urldecode($_POST['password']);
	$user = User::login($name, $password);
	if(!$user){
		echo '用户名密码不对！';
	}
}elseif ($type == 'register'){
	
}