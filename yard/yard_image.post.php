<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
		<?php 
			include("../frame.php");
			use_jquery(); 
			$db = get_db();
		?>
	</head>
	<body>
		<?php
			$user = User::current_user();
			if(!$user) die('请先登录!');
			$id=$user->id;
			$created_at = date("Y-m-d H:i:s");
			$path_info = pathinfo($_FILES['src'][name]);
			$yuan_pic=$_FILES['src'][tmp_name];
			$extension = strtolower($path_info['extension']);
			$save_name = rand_str() .'.'.$extensio;
			$save = ROOT_DIR_NONE ."/upload/".$save_name;
			$save_e = "/upload/".$save_name;
			if(move_uploaded_file($yuan_pic,$save)){
				$sql="insert into eachbb_member.member_avatar(u_id,photo,create_at,status)values($id,'$save_e','$created_at',0);";
				if($db->execute($sql)){
					create_thumb('big',$save_e,300,300);
					create_thumb('normal',$save_e,165,165);
					create_thumb('small',$save_e,98,98);
					alert("上传成功！");
                    if($_SESSION['page_from']=='baby'){
                    	redirect('/baby/index.php');
                    }else {
                        redirect('/yard/info.php');
                    }
					
					
				}else{
					alert("上传失败！");
				}
			}else{
				debug_info('fail to upload file:' .$yuan_pic,'js');
			}
		?>
	</body>
</html>