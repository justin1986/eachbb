<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
		<?php 
			include("../../frame.php"); 
		?>
	</head>
	<body>
		<?php		
			$cate = new table_class($tb_category);
			if($_REQUEST['id']){
				$cate->find($_REQUEST['id']);
			}
			$cate->update_attributes($_POST['post'],false);
			if($_REQUEST['post']['parent_id']!='0'){
				$category = new category_class('news');
				$parent_ids = $category->tree_map($_REQUEST['post']['parent_id']);
				if(count($parent_ids)>1){
					$cate->sort_id = $parent_ids[count($parent_ids)-1];
				}else{
					$cate->sort_id = $_REQUEST['post']['parent_id'];
				}
			}else{
				$cate->sort_id = 0;
			}
			#$cate->update_file_attributes();
			if($_FILES['show_image']['name'] != ''){
				$upload = new upload_file_class();
				$upload->save_dir = '/upload/category/';
				$cate->show_image = '/upload/category/' .$upload->handle('show_image','filter_pic');
			}
			//$cate->echo_sql = true;
			$cate->save();
			redirect('category_list.php?type='.$_POST['post']['category_type'].'');
				
			
			
			
		?>
	</body>
</html>