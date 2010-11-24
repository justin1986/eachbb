<?php
session_start();
include_once '../frame.php';
include_once '../inc/User.class.php';
$user = User::current_user();

if(!$_SESSION['tmp_flag']){

	$temp_flag = rand_str();
	$_SESSION['tmp_flag'] = $temp_flag;
	
	if(!$user){
		$test_result = new table_class('eb_test_result');
		$test_result->update_attributes($_POST['post'],false);
		$test_result->temp_flag = $temp_flag;
		$test_result->save();
		redirect('save_result_nologin.php?temp='.$temp_flag);
		die();
	}
	
	$test_result = new table_class('eb_test_result');
	$test_result->update_attributes($_POST['post'],false);
	$test_result->u_name = $user->name;
	$test_result->u_id = $user->id;
	$test_result->test_type = 'baby';
	$test_result->temp_flag = $temp_flag;
}else{
	if($user){
		$db->execute("update eb_test_result set u_name = {$user->name},u_id={$user->id} where temp_flag = {$_SESSION['tmp_flag']}");
	}else{
		redirect('save_result_nologin.php?temp='.$_SESSION['tmp_flag']);
	}
}
	
	


if(! $test_id = intval($_SESSION['doing_test'])) die('invalid request!');
$db = get_db();
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

if($test_result->save()){
	$_SESSION['tmp_flag']='';
	redirect('/test/test_result.php?test_id=' .$test_id);
}else{
	var_dump($test_result);
}
