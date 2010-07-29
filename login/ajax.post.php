<?php
include_once '../frame.php';
include_once '../inc/user.class.php';
//if(!is_ajax())die('invalid request!');
$allow_ops = array('login','logout','load_login_status_box');
$op = strtolower($_GET['op']);
if(!in_array($op,$allow_ops)) die('invalid operation');
switch ($op) {
	case 'login':
		$user = User::login($_GET['name'],$_GET['password'],intval($_GET['expire']));
		echo $user->id;
	break;
	case 'logout':
		User::logout();
	case 'load_login_status_box':
		$user = User::current_user();
		if(!$user){
			include "_unlogin.php";
		}else{
			include '_logined.php';
		}
		break;
	default:
		;
	break;
}
