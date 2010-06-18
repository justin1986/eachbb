<?php
include "../frame.php";
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	die('invalid request!');
}
$test_id = intval($_POST['id']);
$step = intval($_POST['step']);
$test = new table_class('eb_problem');
$test->find($test_id);
if(!$test->id){
	die_not_found();
}
$question_queue = explode(',',$_POST['question_queue']);
$_SESSION["problem_{$test->id}"][$_POST['question_id']]= $_POST['choice'];		
var_dump($_SESSION["problem_{$test->id}"]);