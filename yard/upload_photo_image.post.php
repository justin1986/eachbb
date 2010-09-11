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
			$upload_title = htmlspecialchars($_POST["upload_title"]);
			if($upload_title){
				$path_info = pathinfo($_FILES['src2'][name]);
				$yuan_pic=$_FILES['src2'][tmp_name];
				$value=htmlspecialchars($_POST["upload_description"]);
				$extension = strtolower($path_info['extension']);
				$save_name = rand_str() .'.'.$extension;
				$save = ROOT_DIR_NONE ."/upload/".$save_name;
				$save_e = "/upload/".$save_name;
				if(!$value)die("非法操作！");
				if(!$upload_title)die("非法操作！");
				$sql="insert into eachbb_member.album (u_id,created_at,last_update_time,name,front_cover,description)values($id,now(),now(),'$upload_title','$save_e','$value');";
				$last="insert into eachbb_member.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,photo)values('$upload_select_id','image','$user->id',now(),'$user->name','$u_avatar','添加了新的相册。','$save_e')";
			}else{
				$path_info = pathinfo($_FILES['src'][name]);
				$yuan_pic=$_FILES['src'][tmp_name];
				$upload_select_id = $_POST["upload_select_id"];
				$name_photo = htmlspecialchars($_POST["name_photo"]);
				$text_photo = htmlspecialchars($_POST["text_photo"]);
				if(!$text_photo)die("非法操作！");
				if(!$upload_select_id) die('相册不能为空！');
				if(!$name_photo) die('图像名称不能为空！');
				$img = getimagesize($yuan_pic);
				$extension = strtolower($path_info['extension']);
			$save_name = rand_str() .'.'.$extension;
			$save = ROOT_DIR_NONE ."/upload/".$save_name;
			$save_e = "/upload/".$save_name;
				$sql="insert into eachbb_member.photo (description,u_id,u_name,photo,album_id,created_at,width,height)values('$text_photo',$id,'$name_photo','$save_e',$upload_select_id,now(),$img[0],$img[1]);";
				$last="insert into eachbb_member.lastest_news (resource_id,resource_type,u_id,created_at,u_name,u_avatar,form,photo,content)values('$upload_select_id','image','$user->id',now(),'$user->name','$u_avatar','添加了新的照片。','$save_e','添加了新的照片。')";
				$u_name=$user->name;
				$u_avatar=$user->avatar;
			}
			if(move_uploaded_file($yuan_pic,$save)){
				if($db->execute($sql)&&$db->execute($last)){
					$alpum=$_POST['alpum'];
					echo "<script>alert('添加成功！');</script>";
					if($alpum){
						if(is_numeric($alpum))
						{
							redirect("/yard/photo_show.php?id={$alpum}");
						}else{
							echo "非法操作！";
						}
					}else{
						redirect('/yard/album_list.php');
					}
					
				}else{
					echo "添加失败！";
				}
			}else{
				debug_info('fail to upload file:' .$yuan_pic,'js');
			}
		?>
	</body>
</html>