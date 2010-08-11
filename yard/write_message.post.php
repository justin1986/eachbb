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
			redirect('/yard/write_message.php');
			die();
	                   }
	                   
	     $db = get_db();
	     $creat_at=date("Y-m-d H:i:s");
	     $content=$_POST['message_content'];  
	     $md_name= $_POST['md_name'];
	     $status=0;
	     $send_id=$user->id;
	     $avatar=$db->query("select photo from eachbb_member.member_avatar where u_id={$user->id} and status =1".' order by create_at desc limit 1');
	     $receive_id=$db->query("select id from eachbb_member.member where name='{$md_name}' ");	     
	     $message_type=1;
	     $db->execute("insert into `eachbb_member`.message(created_at,content,avatar,send_id,recieve_id) values('{$creat_at}','{$content}','{$avatar[0]->photo}','{$send_id}','{$receive_id[0]->id}') ");
	   
	     
	     //$message = $db->query("SELECT * FROM `eachbb_member`.message WHERE id={$id}");
         //values ($id,$creat_at,$content,$avatar,$status,null,$send_id,$message_type,$receive_id ");
	     //WHERE content={$content}    .' order by create_at desc limit 1'
	     
	     if($content == null){
       	   alert("请输入信息内容");
		   redirect('/yard/write_message.php');
		   die();
	      }
          
?>	      
	   
	    
	      
	        <? 
         $db = get_db();
         $message = $db->query("SELECT content FROM `eachbb_member`.message WHERE content='{$content}'");
          if($message){
        	 alert("信息发送成功");
		     redirect('/yard/write_message.php');
          }else{
             alert("信息发送失败");
		     redirect('/yard/write_message.php');
         }
         ?>
	    






















