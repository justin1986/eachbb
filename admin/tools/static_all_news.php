<?php
session_start();
include_once('../../frame.php');
judge_role();

$start = $_POST['start'];
$end = $_POST['end'];
$sql = "select id from eb_news where is_adopt=1 and language_tag = 0";
if($start!=''){
	$sql .= " and created_at>='{$start} 00:00:00'";
}
if($end!=''){
	$sql .= " and created_at<='{$end} 23:59:59'";
}
$db = get_db();
$news_id = $db->query($sql);
echo '静态条数：'.$db->record_count;
if($db->record_count > 0 ){
	$len = $db->record_count;
	$news = new table_class('eb_news');
	for($i=0;$i< $len; $i++){
		$news->find($news_id[$i]->id);
		static_news($news,'page');
	}
}
echo '静态条数：'.$len;