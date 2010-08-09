<?php

        
	
    session_start();
	include_once('../frame.php');
	include_once('../inc/user.class.php');
    
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



    $id=$user->id;
	$old_password = $_POST[old_password];
    $new_password = $_POST[new_password];
    $re_new_password = $_POST[re_new_password];
    $md5_old_password = md5($old_password);
    $md5_new_password = md5($new_password);
    $db = get_db();
    $database_password = $db->query("SELECT password FROM `eachbb_member`.member WHERE id={$id}");
    
    //echo $database_password[0]->password ."测试" . $md5_old_password;
    if($old_password == null){
       	alert("请输入当前密码");
		redirect('/yard/reset_password');
		die();
	}
    
       if($new_password == null){
       	alert("请输入新密码");
		redirect('/yard/reset_password');
		die();
	}
    
     if($re_new_password == null){
       	alert("请输入确认密码");
		redirect('/yard/reset_password');
		die();
	}
    
     
     if($database_password[0]->password != $md5_old_password){
        	alert("当前密码输入错误");
		redirect('/yard/reset_password');
		die();
        }
    if(strlen($new_password)<4){
        alert("新密码太短");
        redirect('/yard/reset_password');
        die();
    }
    if(strlen($new_password)>20){
        alert("新密码太长");
        redirect('/yard/reset_password');
        die();
    }
    
  if($new_password != $re_new_password){
       	alert("新密码确认不一致");
		redirect('/yard/reset_password');
		die();
	}
    
     
    

    
    $result = $user->reset_password($new_password,$old_password);
    
    
 ?>
 
 <?
  $db = get_db();
    $database_password = $db->query("SELECT password FROM `eachbb_member`.member WHERE id={$id}");
  if($database_password[0]->password == $md5_new_password){
        	 alert("成功");
		redirect('/yard/member');
        }else{
            alert("失败");
		redirect('/yard/reset_password');
        }
        ?>
  
  
  
  
  
  
  
  
  
  