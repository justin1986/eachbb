<?php
session_start();
include_once('../frame.php');

if(!is_post()){
	redirect('/get_pwd/'); 
	die();
}

if($_POST['verify']!=$_SESSION['get_pwd']||empty($_SESSION['get_pwd'])){
	alert('验证码不正确！');
	redirect('/get_pwd/'); 
	die();
}
if(strlen($_POST['name']) > 20){
	alert('用户名过长！请重新输入！');
	redirect('/get_pwd/');
	die();
}
if(strlen($_POST['name']) < 4){
	alert('用户名过短！请重新输入！');
	redirect('/get_pwd/');
	die();
}
if(strlen($_POST['email']) > 40){
	alert('邮箱过长！请重新输入！');
	redirect('/get_pwd/');
	die();
}
$name = $_POST['name'];
$mail =  $_POST['email'];
$db = get_db();

$user = $db->query("select id from eachbb_member.member where name='$name' and email='$mail'");
if($db->record_count==1){
	$verify = rand_str();
	$gp = new table_class('eb_get_pwd');
	$gp->user_id = $user[0]->id;
	$gp->verify = $verify;
	$gp->end_time = dt_increase(2,'h');
	$gp->save();
	$content = "{$name},你好：<br/><br/>　　欢迎进网趣宝贝密码重置过程，请在2小时内点击下面的链接：<br/>　　<a href='http://www.eachbaby.com/get_pwd/get_pwd.php?verify=$verify'>http://www.forbeschina.com/getpwd/get_pwd.php?verify=$verify</a><br><br>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。如果您意外地收到此邮件，很可能是其他用户在尝试重设密码时，误输入了您的电子邮件地址。如果您没有提出此请求，则无需做进一步的操作，可以放心地忽略此电子邮件。";
	send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com',$mail,'网趣宝贝(eachbaby.com)密码找回',$content);
	alert("请在2小时内登录到".$mail."完成剩余操作！");
	redirect('/');
}else{
	alert('用户名和注册邮箱不匹配');
	redirect('/get_pwd/');
	die();
}