<?php
session_start();

$verify = $_POST['verify'];
if($verify==$_SESSION['register']){
	echo "ok";
}else{
	echo 'wrong';
}