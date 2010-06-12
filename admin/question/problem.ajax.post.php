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
		$project_id = intval($_POST['project_id']);
		$result_id = intval($_POST['result_id']);
		if(!$project_id || !$result_id){
			die('invalid params');
		}
		if(!$db->execute("delete from eb_problem_result where problem_id={$project_id} and id={$result_id}")){
			echo '删除失败!';
		};
	break;
	
	default:
		;
	break;
}