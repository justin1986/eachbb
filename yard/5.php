<?php

/*
 * @author jt003725
 * @copyright 2010
 */

session_start();
	include_once('../frame.php');
	include_once('../inc/User.class.php');
    
    	$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
		die();
	}



if(!is_post()){
		redirect('/yard/reset_password');
		die();
        }
        
        $old_password = $_POST[old_password];
    $new_password = $_POST[new_password];
    $re_new_password = $_POST[re_new_password];
    $database_password = mysql_query("SELECT password FROM eachbb_member.member WHERE id=$user->id");
    $md5_old_password = md5($old_password);
    
    
    if($database_password != $md5_old_password){
        	alert("旧密码输入错误");
		redirect('/yard/reset_password');
		die();}
        
        
    
?>