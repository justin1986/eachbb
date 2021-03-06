<?php
	session_start();
	include_once('../frame.php');
	include_once('../inc/User.class.php');
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
		if(strlen($post)>100){
			alert("信息输入太长！");
			redirect('/register');
			die();
		}
	}
	
	
	#var_dump($_POST);
	$name = $_POST['name'];
	if(strlen($name)>20){
		alert("用户名太长！");
		redirect('/register');
		die();
	}
	$baby_info_name = $_POST['baby_info_name'];
//	if(!$baby_info_name){
//		$baby_info_name = $_POST['baby_status'];
//	}
	if(!$baby_info_name){
		if(strlen($baby_info_name)>20){
			alert("宝宝姓名太长！");
			redirect('/register');
			die();
		}
	}
	$password = $_POST['password'];
	if(strlen($password)>20){
		alert("密码太长！");
		redirect('/register');
		die();
	}
	$email = $_POST['email'];
	if(strlen($password)>50){
		alert("电子邮箱太长！");
		redirect('/register');
		die();
	}
	$gender = $_POST['gender'];
	if(strlen($gender)>1){
		alert("性别太长！");
		redirect('/register');
		die();
	}
	$baby_name = $_POST['baby_name'];
	if($baby_name){
		if(strlen($baby_name)< 1){
			alert("请输入宝宝姓名！");
			redirect('/register');
			die();
		}
	}
	$baby_birthday = $_POST['baby_birthday'];
	if(strlen($baby_birthday)>20){
		alert("生日太长！");
		redirect('/register');
		die();
	}
	$phone = $_POST['phone'];
	if(strlen($phone)>90){
		alert("电话太长！");
		redirect('/register');
		die();
	}
	$address = $_POST['address'];
	if(strlen($address)>90){
		alert("地址太长！");
		redirect('/register');
		die();
	}
	$zip = $_POST['zip'];
	if(strlen($zip)>90){
		alert("邮编太长！");
		redirect('/register');
		die();
	}
	$birthday = $_POST['birthday'];
	if(strlen($birthday)>20){
		alert("生日太长！");
		redirect('/register');
		die();
	}
	$bady_status = $_POST["baby_status"];
	$ip = $_SERVER["REMOTE_ADDR"];
	$result = User::register($baby_info_name,$name,$email,$password,0,$bady_status,$baby_birthday,$birthday,$zip,$phone,$address,$gender,$ip);
	if($result->result){
		$user = User::current_user();
		if($user){
			User::logout();
		}
		User::login($name,$password);
		success_register();
	}else{
		false_register($result);
	}
	
	function success_register(){
		alert("注册成功！");//logout()
		alert("登录成功！");
		redirect('/yard');
	}
	
	function false_register($result){
		alert($result->error_msg);
		redirect('/register');
	}
