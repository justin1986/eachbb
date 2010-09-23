<?php
	session_start();
	include("../frame.php");
	set_charset("utf-8");
	if(!is_post()){
		redirect('/error/'); 
		die();
	}
	
	if($_SESSION['login']!=$_POST['session']||empty($_SESSION['login'])){
		redirect('/error/'); 
		die();
	}else{
		unset($_SESSION['login']);
	}
	if(strlen($_POST['name']) > 20){
		alert('用户名过长！请重新输入！');
		die('3');
		redirect('/login/');
		die();
	}
	if(strlen($_POST['name']) < 4){
		alert('用户名过短！请重新输入！');
		redirect('/login/');
		die();
	}
	
	if(preg_match("/^\w+$/", $_POST['name'])==0){
		alert('用户名包含特殊字符！请重新输入！');
		redirect('/login/');
		die();
	}
	if(strlen($_POST['password']) > 20){
		alert('密码过长！请重新输入！');
		redirect('/login/');
		die();
	}
	
	if(strlen($_POST['password']) < 4){
		alert('密码过短！请重新输入！');
		redirect('/login/');
		die();
	}
	
	if(preg_match("/^[\w.!@#$%^&*]+$/", $_POST['password'])==0){
		
		alert('密码包含特殊字符！请重新输入！');
		redirect('/login/');
		die();
	}
	
	$name=$_POST['name'];
	$password=$_POST['password'];
	if($_POST['last_url']){
		$last_url = $_POST['last_url'];
	}
	if(!$last_url && $_SERVER['HTTP_REFERER'] && strpos($_SERVER['HTTP_REFERER'], '/login/')=== false){
		$last_url = $_SERVER['HTTP_REFERER'];
	}
	!$last_url && $last_url = '/yard/';
	$suess_url =  $last_url;
	$fail_url = "/login/index.php?last_url=" .$last_url;
	if(strlen($name)>20 || strlen($password)>20){
		$err = "用户名或密码错误";
		$last_url = $fail_url;
	}
	if(User::login($name,$password)){
		$last_url = $suess_url;
	}else{
		$err = "用户名或密码不正确";
		$last_url = $fail_url;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-cn>
	</head>
	<body>
	<?
	if($err){
		 	alert($err);
	 }
	 redirect($last_url);
	?>
	</body>
</html>
