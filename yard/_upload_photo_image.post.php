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
			$upload_title = htmlspecialchars($_POST["album_value"]);
			$album_id= $_POST["album_id"];
			$upload_name = htmlspecialchars($_POST["upload_title"]);
			if(strlen($upload_name) >= 30){
				alert('输入的图片名称必须小于30字');
				redirect('/yard/album_list_update.php?album_id='.$album_id); 
			}else if(strlen($upload_title) >=500){
				alert('输入的图片描述必须小于500字');
				redirect('/yard/album_list_update.php?album_id='.$album_id); 
			}
			$path_info = pathinfo($_FILES['src2'][name]);
			$album_value = $_POST["album_value"];
			$upload_description = htmlspecialchars($_POST["upload_description"]);
			$yuan_pic=$_FILES['src2'][tmp_name];
			if($yuan_pic){
				$value=htmlspecialchars($_POST["upload_description"]);
				$extension = strtolower($path_info['extension']);
				$save_name = rand_str() .'.'.$extension;
				$save = ROOT_DIR_NONE ."/upload/".$save_name;
				$save_e = "/upload/".$save_name;
				$sql="update eachbb_member.album  set last_update_time=now(),name='$upload_name',front_cover='$save_e',description='$upload_description' where id=$album_id;";
				echo $sql;
				if(move_uploaded_file($yuan_pic,$save)){
					if($db->execute($sql)){
							$alpum=$_POST['alpum'];
							alert("修改成功！");
							redirect("/yard/album_list.php");
					}else{
						echo "修改失败！"; 
						redirect('/yard/album_list.php');
					}
				}else{
					debug_info('fail to upload file:' .$yuan_pic,'js');
				}
			}else{
				$sql="update eachbb_member.album  set last_update_time=now(),name='$upload_name',front_cover='$album_value',description='$upload_description' where id=$album_id;";
				if($db->execute($sql)){
						$alpum=$_POST['alpum'];
						alert("修改成功！");
						redirect("/yard/album_list.php");
				}else{
					echo "修改失败！"; 
					redirect('/yard/album_list.php');
				}
			}
		?>
	</body>
</html>