<?php
include_once '../frame.php';
include_once '../inc/User.class.php';
set_charset("utf-8");
//if(!is_ajax())die('invalid request!');
$allow_ops = array('login','logout','load_login_status_box');
$op = strtolower($_GET['op']);
if(!in_array($op,$allow_ops)) die('invalid operation');
switch ($op) {
	case 'login':
		$user = User::login($_GET['name'],$_GET['password'],intval($_GET['expire']));
		if(!$user){
			echo '用户名或密码错误';
		}
	break;
	case 'logout':
		User::logout();
	case 'load_login_status_box':
		$user = User::current_user();
		$login = $_GET['login'];
		if(!$user){
			if(!$login){
			include "_unlogin.php";
			}
		}else{
			if($login){
				include '_login.php';
			}else{
				include '_logined.php';
			}
		}
		break;
	default:
		;
	break;
}
