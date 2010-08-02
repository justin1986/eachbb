<?php
include_once '../frame.php';
include_once '../inc/user.class.php';
//if(!is_ajax())die('invalid request!');
$allow_ops = array('logout','load_login_status_box');
$op = strtolower($_GET['op']);
if(!in_array($op,$allow_ops)) die('invalid operation');
switch ($op) {
	case 'logout':
		User::logout();
		include '_public_logined.php';
		break;
	case 'load_login_status_box':
		$user = User::current_user();
		if(!$user){
			include "_publicunlogin.php";
		}else{
			include '_public_logined.php';
		}
		break;
	default:
		;
	break;
}
