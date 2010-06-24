<?php
	session_start();
	include_once('../frame.php');
	include_once('../inc/user.class.php');
	
	
	#var_dump($_POST);
	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	echo $email;
	$user = new User();
	$result = $user->register($name,$password,$email);
	var_dump($result);
	