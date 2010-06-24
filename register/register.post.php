<?php
	session_start();
	include_once('../frame.php');
	include_once('../inc/user.class.php');
	
	if(!is_post()){
		redirect('/register/');
		die();
	}
	
	if($_POST['verify']!=$_SESSION['register']||empty($_SESSION['register'])){
		alert('验证码错误!');
		redirect('/register/');
		die();
	}
	
	
	foreach($_POST as $post){
		var_dump($post);
		if(strlen($post)>100){
			alert("信息输入太长！");
			redirect('/register');
			die();
		}
	}
	
	
	#var_dump($_POST);
	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	echo $email;
	$user = new User();
	$result = $user->register($name,$password,$email);
	var_dump($result);
	