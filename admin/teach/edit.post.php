<?php
	session_start();
	include_once('../../frame.php');
	judge_role();	

	$teach = new table_class('eb_teach');
	if($_POST['id']){
		$teach->find($_POST['id']);
	}else{
		$teach->create_time = now();
	}
	
	if(empty($_FILES)){
		alert("上传的文件太大！");
		redirect('edit.php');
		die();
	}
	
	if($_FILES['image'][name]){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/images/';
		$img = $upload->handle('image','filter_pic');
		if($img === false){
			alert('上传图片失败 !');
			redirect('edit.php');
			die();
		}
		$teach->img_url = "/upload/images/" .$img;
	}
	
	if($_FILES['flash'][name]){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/flash/';
		$flash = $upload->handle('flash');
		if($flash === false){
			alert('上传flash失败 !');				
			redirect('edit.php');
			die();
		}
		$teach->content = "/upload/flash/" .$flash;
	}
	
	$teach->update_attributes($_POST['post'],false);
	
	$teach->save();
	
	redirect('index.php');