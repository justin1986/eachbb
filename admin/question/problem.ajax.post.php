<?php
include_once '../../frame.php';
if(!is_ajax()) die('invalid request!');
$valid_ops = array('delete','edit_question','edit_result','delete_recommand');
$op = $_POST['op'];
$db = get_db();
if(!in_array($op,$valid_ops)){
	die('invalid operation');
}
switch ($op) {
	case 'delete':
		$project_id = intval($_POST['project_id']);
		$result_id = intval($_POST['result_id']);
		if(!$project_id || !$result_id){
			die('invalid params');
		}
		if(!$db->execute("delete from eb_problem_result where problem_id={$project_id} and id={$result_id}")){
			echo '删除失败!';
		};
	break;
	case 'edit_question':
		$question = new table_class('eb_question');
		if($_GET['item']['id']){
			$question->find($_GET['item']['id']);
		}else{
			$question->create_time = now();
		}
			
		$question->update_attributes($_GET['item']);
		
		if($_GET['question_item']['id']){
			//处理问题选项
			$len = count($_GET['question_item']['id']);
			$result = new table_class('eb_question_item');
			$result->question_id= $question->id;
			for($i=0;$i<$len;$i++){
				
				if($_GET['question_item']['changed'][$i]){
					$result->id= $_GET['question_item']['id'][$i] ? $_GET['question_item']['id'][$i]: 0;
					$result->name= $_GET['question_item']['name'][$i];
					$result->display= $_GET['question_item']['display'][$i];
					$result->attribute= $_GET['question_item']['attribute'][$i];
					$result->question_id = $question->id;	
					$result->save();				
				}
			}
		}
		break;
	case 'edit_result':
		if($_GET['result']['id']){
			//处理结果报表
			$len = count($_GET['result']['id']);
			$result = new table_class('eb_problem_result');
			$result->problem_id= $_GET['id'];
			$recommand = new table_class('eb_recommand');
			for($i=0;$i<$len;$i++){
				if($_GET['result']['changed'][$i]){
					$result->id= $_GET['result']['id'][$i] ? $_GET['result']['id'][$i]: 0;
					$result->min_score= $_GET['result']['min'][$i];
					$result->max_score= $_GET['result']['max'][$i];
					$result->description= $_GET['result']['description'][$i];
					$result->result_type= $_GET['type'];						
					$result->save();
					$var = $_GET['result']['rand_name'][$i];
					$recommand_len = count($$var['title']);
					for($j=0;$j<$recommand_len;$j++){
						$recommand->id = $$var['id'][$j];
						$recommand->title = $$var['title'][$j];
						$recommand->result_id = $result->id;
						$recommand->href = $$var['href'][$j];
						$recommand->recommand_type = $$var['recommand_type'][$j];
						$recommand->save();
					}	
				}
			}
		}
		break;
	case 'delete_recommand':
		$id = intval($_GET['recommand_id']);
		if(!$id){
			die('invalid params');
		}
		$db->query("select image from eb_recommand where id={$id}");
		if($db->record_count <=0 )die('invalid params');
		if($image = $db->field_by_name('image')){
			unlink(ROOT_DIR .$image);
		}
		$db->execute("delete from eb_recommand where id={$id}");
		break;
	default:
		;
	break;
}