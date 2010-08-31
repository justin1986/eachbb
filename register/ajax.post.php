<?php
session_start();
include_once '../frame.php';
$valid_types = array('login','register');
$type= $_POST['type'];
if($type == 'login'){
	$name = $_POST['name'];
	$password = $_POST['password'];
	$user = User::login($name, $password);
	if(!$user){
		echo '用户名密码不对！';
	}
}elseif ($type == 'register'){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['re_password'];
	$gender = $_POST['gender'];
	$baby_status = $_POST['baby_status'];
	$baby_birth = $_POST['baby_birth'];
	$birthday = $_POST['birthday'];
	$verify = $_POST['verify'];
	
	if(strlen($name)>20){
		die('用户名太长');
	}
	if(strlen($name)<4){
		die('用户名太短');
	}
	if(!preg_match("/^[0-9a-zA-Z]+$/",$name)){
		die('用户名不能含有特殊字符');
	}
	if(empty($email)){
		die('请输入电子邮箱');
	}
	if(strlen($email)>40){
		die('电子邮箱太长');
	}
	if(!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/",$email)){
		die('邮箱格式有误');
	}
	if(strlen($password)>20){
		die('密码太长');
	}
	if(strlen($password)<4){
		die('密码太短');
	}
	if(!preg_match("/^[\w.!@#$%^&*]+$/",$email)){
		die('密码格式有误');
	}
	if($password!=$repassword){
		die('请2次输入相同密码');
	}
	if($gender!=1&&$gender!=2){
		die('请选择性别');
	}
	if($baby_status!=1&&$baby_status!=2&&$baby_status!=3){
		die('请选择是否生育');
	}
	if(($baby_status==1||$baby_status==3)&&empty($baby_birth)){
		die('请输入宝宝生日或者宝宝预产期');
	}
	if(!empty($baby_birth)&&!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$baby_birth)){
		die('生日格式输入有误');
	}
	if(empty($birthday)){
		die('请输入生日');
	}
	if(!empty($birthday)&&!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$birthday)){
		die('生日格式输入有误');
	}
	if($verify!=$_SESSION['register']||empty($verify)){
		die('验证码输入错误');
	}
	$db = get_db();
	$sql = "select name from eachbb_member.member where name='{$name}'";
	$record = $db->query($sql);
	if($record){
		die('用户名已经被注册');
	}
	$sql = "select name from eachbb_member.member where email='{$email}'";
	$record = $db->query($sql);
	if($record){
		die('邮箱已经被注册');
	}
	$ip = $_SERVER["REMOTE_ADDR"];
	$result = User::register($name,$email,$password,0,$baby_status,$baby_birth,$birthday,'','','',$gender,$ip);
	if(!$result->result){
		die($result->error_msg);
	}
	User::login($name, $password);
}