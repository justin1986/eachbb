<?php
include "../frame.php";
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
	echo "alert('请确认您的宝宝在0～3岁之间');";
	die();	
}
echo "window.location.href = '/test/test.php?id=" .$db->field_by_name('id') . "';";