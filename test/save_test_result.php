<?php
include_once '../frame.php';
include_once '../inc/user.class.php';
$user = User::current_user();
if(!$user){
	redirect('save_result_nologin.php');
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
redirect('/test/test_result.php?id=' .$test_id);
