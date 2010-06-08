<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>福布斯中文网</title>
		<?php 
			include("../../frame.php"); 
		?>
	</head>
	<body>
		<?php		
			$user = new table_class($tb_user);
			if($_POST['id']!='0'){
				$user -> find($_POST['id']);
				if($user->name!=$_POST['post']['name']){
					$db = get_db();
					$record = $db->query("select * from ".$tb_user." where name='".$_POST['post']['name']."'");
					if(count($record)==0){
						if($user->update_attributes($_POST['post'])){
							redirect('user_list.php');
						}else{
							display_error('修改用户失败');
							echo '<a href="user_list.php">返回</a>';
						}
					}else{
						alert("您注册的用户名已经存在，请重新注册！");
						redirect($_SERVER['HTTP_REFERER']);
					}
				}else{
					if($_FILES['image_src']['name'] != ''){
							$upload = new upload_file_class();
							$upload->save_dir = '/upload/news/';
							$user->image_src = '/upload/news/' .$upload->handle('image_src','filter_pic');
							$changed = true;
					}
					if($_FILES['image_src2']['name'] != ''){
							$upload = new upload_file_class();
							$upload->save_dir = '/upload/news/';
							$user->image_src2 = '/upload/news/' .$upload->handle('image_src2','filter_pic');
							$changed = true;
					}
					if($_FILES['image_src3']['name'] != ''){
							$upload = new upload_file_class();
							$upload->save_dir = '/upload/news/';
							$user->image_src3 = '/upload/news/' .$upload->handle('image_src3','filter_pic');
							$changed = true;
					}
					if($user->update_attributes($_POST['post'])){
						redirect('user_list.php');
					}else{
						display_error('修改用户失败');
						echo '<a href="user_list.php">返回</a>';
					}
				}
			}else{
				$db = get_db();
				$record = $db->query("select * from ".$tb_user." where name='".$_POST['post']['name']."'");
				if(count($record)==0){
					if($_FILES['image_src']['name'] != ''){
							$upload = new upload_file_class();
							$upload->save_dir = '/upload/news/';
							$user->image_src = '/upload/news/' .$upload->handle('image_src','filter_pic');
							$changed = true;
					}
					if($_FILES['image_src2']['name'] != ''){
							$upload = new upload_file_class();
							$upload->save_dir = '/upload/news/';
							$user->image_src2 = '/upload/news/' .$upload->handle('image_src2','filter_pic');
							$changed = true;
					}
					if($_FILES['image_src3']['name'] != ''){
							$upload = new upload_file_class();
							$upload->save_dir = '/upload/news/';
							$user->image_src3 = '/upload/news/' .$upload->handle('image_src3','filter_pic');
							$changed = true;
					}
					if($user->update_attributes($_POST['post'])){
						redirect('user_list.php');
					}else{
						display_error('修改用户失败');
						echo '<a href="user_list.php">返回</a>';
					}
				}else{
					alert("您注册的用户名已经存在，请重新注册！");
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
			
		?>
	</body>
</html>