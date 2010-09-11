<?php
include '../../frame.php';
$db = get_db();
$items = $db->query('select id,created_at from eb_assistant');
$begin = strtotime("-60 days");
foreach ($items as $item){
	$d = rand(0, 60);
	$time = date('Y-m-d',strtotime("+$d days",$begin)) .substr($item->created_at, -9);
	$db->execute("update eb_assistant set created_at='$time' where id={$item->id}");
}