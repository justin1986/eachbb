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
		
		$question_item = new table_class('eb_question_item');
		$question_item->question_id = $question->id;
		
		!$_POST['old_item'] && $_POST['old_item'] = array();
		foreach($_POST['old_item'] as $i => $item){
			$question_item->find($_POST['item_id'][$i]);
			$question_item->name = $item;
			$question_item->attribute = $_POST['old_value'][$i];
			$question_item->save();
		}
		
		!$_POST['item'] && $_POST['item'] = array();
		foreach($_POST['item'] as $i => $item){
			if($item){
				$question_item->id = 0;
				$question_item->name = $item;
				$question_item->attribute = $_POST['value'][$i];
				$question_item->save();
			}
		}
		
		if($_POST['url']==''){
			redirect('question_list.php?id='.$question->problem_id);
		}else{
			redirect($_POST['url']);
		}
		
	}
?>