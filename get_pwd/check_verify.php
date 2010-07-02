<?php
session_start();

$verify = $_POST['verify'];
if($verify==$_SESSION['get_pwd']){
	echo "ok";
}else{
	echo 'wrong';
}