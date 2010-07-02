<?php
include_once '../../frame.php';
if(!is_ajax()) die('invalid request!');
$valid_ops = array('delete');
$op = $_POST['op'];
$db = get_db();
if(!in_array($op,$valid_ops)){
	die('invalid operation');
}
switch ($op) {
	case 'delete':
		$question_id = intval($_POST['question_id']);
		$question_item_id = intval($_POST['question_item_id']);
		if(!$question_id || !$question_item_id){
			die('invalid params');
		}
		if(!$db->execute("delete from eb_question_item where question_id={$question_id} and id={$question_item_id}")){
			echo '删除失败!';
		};
	break;
	
	default:
		;
	break;
}