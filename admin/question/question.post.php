<?php
    require_once "../../frame.php";
	
	if($_POST['post_type']=='del'){
		$db = get_db();
		$sql = 'delete from eb_question where id='.$_POST['del_id'];
		$db -> execute($sql);
		$sql = 'delete from eb_question_item where question_id='.$_POST['del_id'];
		$db -> execute($sql);
		close_db();
		echo $_POST['del_id'];
	}elseif($_POST['post_type']=='del_item'){
		$question_item = new table_class('eb_question_item');
		$question_item->delete($_POST['del_id']);
	}else{
		#var_dump($_POST);
		
		$question = new table_class('eb_question');
		if($_POST['id']){
			$question->find($_POST['id']);
		}else{
			$question->problem_id = $_POST['pid'];
			$question->create_time = now();
		}
			
		$question->update_attributes($_POST['question']);
		
		if($_POST['question_item']['id']){
			//处理结果报表
			$len = count($_POST['question_item']['id']);
			$result = new table_class('eb_question_item');
			$result->question_id= $question->id;
			for($i=0;$i<$len;$i++){
				
				if($_POST['question_item']['changed'][$i]){
					$result->id= $_POST['question_item']['id'][$i] ? $_POST['question_item']['id'][$i]: 0;
					$result->name= $_POST['question_item']['name'][$i];
					$result->display= $_POST['question_item']['display'][$i];
					$result->attribute= $_POST['question_item']['attribute'][$i];
						
					$result->save();				
				}
			}
		}
		
		if($_POST['url']==''){
			redirect('question_list.php?id='.$question->problem_id);
		}else{
			redirect($_POST['url']);
		}
		
	}
?>