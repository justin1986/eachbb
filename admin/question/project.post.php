<?php
	session_start();
	require_once "../../frame.php";
	judge_role();
	if($_POST['post_type']=='del'){
		$db = get_db();
		$sql = 'delete from eb_problem where id='.$_POST['del_id'];
		$db -> execute($sql);
		$sql = 'delete from eb_question_item where question_id in(select id from eb_question where problem_id='.$_POST['del_id'].')';
		$db -> execute($sql);
		$sql = 'delete from eb_question where problem_id='.$_POST['del_id'];
		$db -> execute($sql);
		$sql = 'delete from eb_question_record where problem_id='.$_POST['del_id'];
		$db -> execute($sql);
		$sql = 'delete from eb_question_result where problem_id='.$_POST['del_id'];
		$db -> execute($sql);
		close_db();
	}else{
		$project = new table_class('eb_problem');
		if($_POST['id']){
			$project->find($_POST['id']);
		}else{
			$project->create_time = now();
			$project->is_adopt= '0';
			$project->priority = '0';
		}
		
		if($_FILES['image'][name]!=null){
			$upload = new upload_file_class();
			$upload->save_dir = '/upload/images/';
			$img = $upload->handle('image','filter_pic');
			if($img === false){
				alert('上传文件失败 !');				
				redirect('project_edit.php');
			}
			$project->photo_url = "/upload/images/" .$img;
		}
		$project->update_attributes($_POST['post']);
		/*
		if($_POST['start_time']==""){
			$project->start_time = "00-00-00";
		}else{
			$project->start_time = $_POST['start_time'];
		}
		if($_POST['end_time']==""){
			$project->end_time="00-00-00";
		}else{
			$project->end_time = $_POST['end_time'];
		}
		*/
		if($_POST['result']['id']){
			//处理结果报表
			$len = count($_POST['result']['id']);
			$result = new table_class('eb_problem_result');
			$result->problem_id= $project->id;
			for($i=0;$i<$len;$i++){
				
				if($_POST['result']['changed'][$i]){
					$result->id= $_POST['result']['id'][$i] ? $_POST['result']['id'][$i]: 0;
					$result->min_score= $_POST['result']['min'][$i];
					$result->max_score= $_POST['result']['max'][$i];
					$result->description= $_POST['result']['description'][$i];
						
					$result->save();				
				}
			}
		}
		redirect('project_list.php?type=' . $project->problem_type);
	}
?>