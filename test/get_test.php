<?php
include "../frame.php";
if(is_ajax()){
	/*
	 * ajax from the index
	 */
	$birth = $_GET['birth'];
	$birth = strtotime($birth);
	if($birth === FALSE){
		echo "alert('请输入有效的时间');";
		die();
	}
	$month = month_between(now(),$birth);
	if($month < 0){
		echo "alert('请输入有效的时间');";
		die();
	}
	$db = get_db();
	$db->query("select id from eb_problem where is_adopt=1 and start_month<='$month' and end_month >='$month' limit 1" );
	if($db->record_count <= 0){
		echo "alert('对不起，暂时未找到该年龄段的测评！');";
		die();	
	}
	echo "window.location.href = '/test/test.php?id=" .$db->field_by_name('id') . "';";
	exit;	
}

/*
 * from the test index page
 */
set_charset();
$year = $_GET['year'];
$month = $_GET['month'];
$day = $_GET['day'];
$birth  = "$year-$month-$day";
$birth = strtotime($birth);
if($birth === FALSE){
	alert('请输入有效的时间');
	redirect('/test');
	exit();
}
$month = month_between(now(),$birth);
if($month < 0){
	alert('请输入有效的时间');
	redirect('/test','header');
	exit();
}
$type = intval($_GET['type'] == 2) ? 2 : 1;
$db = get_db();
$db->query("select id from eb_problem where is_adopt=1 and start_month<='$month' and end_month >='$month' and problem_type = $type limit 1" );
if($db->record_count <= 0){
	alert('对不起，暂时未找到该年龄段的测评！');
	redirect('/test');
	exit;	
}
redirect('/test/test.php?id=' .$db->field_by_name('id'),'header');
	