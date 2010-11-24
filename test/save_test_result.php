<?php
session_start();
include_once '../frame.php';
include_once '../inc/User.class.php';
$user = User::current_user();
if(! $test_id = intval($_SESSION['doing_test'])) die('invalid request!');
$test_id = 54;
$db = get_db();
alert($_GET['temp']);
if(!$_GET['temp']){
	$temp_flag = rand_str();
	$_SESSION['tmp_flag'] = $temp_flag;
	$problem = new table_class('eb_problem');
	$problem->find($test_id);
	
	if(!$user){
		$test_result = new table_class('eb_test_result');
		$test_result->update_attributes($_POST['post'],false);
		$test_result->test_result = $test_id;
		$test_result->test_type = $problem->problem_type;
		$test_result->temp_flag = $temp_flag;
		$test_result->save();
		redirect('save_result_nologin.php?temp='.$temp_flag);
		die();
	}
	
	$test_result = new table_class('eb_test_result');
	$test_result->update_attributes($_POST['post'],false);
	$test_result->u_name = $user->name;
	$test_result->u_id = $user->id;
	$test_result->test_result = $test_id;
	$test_result->test_type = $problem->problem_type;
	$test_result->temp_flag = $temp_flag;
	$test_result->save();
	die();
}else{
	if($user){
		$db->execute("update eb_test_result set u_name = '{$user->name}',u_id='{$user->id}' where temp_flag = '{$_GET['temp']}'");
	}else{
		redirect('save_result_nologin.php?temp='.$temp_flag);
	}
}

		
		$db->execute("delete from eb_test_record where problem_id={$test_id} and user_id={$user->id}");
		$test_record = new table_class('eb_test_record');
		$test_record->problem_id = $test_id;
		$test_record->user_id = $user->id;
		foreach ($_SESSION['question_queue'] as $item){
			$test_record->id = 0;
			$test_record->question_id = $item['id'];
			$test_record->choice_id = $item['choice'];
			$test_record->score = $item['score'];
			$test_record->question_type = $item['question_type'];
			$test_record->save();
		}

	redirect('/test/test_result.php?test_id='.$test_id);
?>