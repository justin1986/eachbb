<?php
include '../../frame.php';
if($_POST['result']['id']){
	//处理结果报表
	$len = count($_POST['result']['id']);
	$result = new table_class('eb_problem_result');
	$result->problem_id= $_POST['id'];
	for($i=0;$i<$len;$i++){
		if($_POST['result']['changed'][$i]){
			$result->id= $_POST['result']['id'][$i] ? $_POST['result']['id'][$i]: 0;
			$result->min_score= $_POST['result']['min'][$i];
			$result->max_score= $_POST['result']['max'][$i];
			$result->description= $_POST['result']['description'][$i];
			$result->result_type= $_POST['type'];						
			$result->save();				
		}
	}
}