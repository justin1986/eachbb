<?php

	include_once('../frame.php');
	$type = $_POST["type"];
	$id = $_POST["id"];
	$db=get_db();
	$num = $_POST["num"];
	if(!is_ajax()) die('invlid request!');
	if(is_numeric($id)&&is_numeric($num)&&!empty($num)){
		$num=$num==0?1:0;
		if(is_numeric($id)&&is_numeric($num)){
		if($type=="up"){
		$sql="insert into eb_comment_dig (comment_id,up) values ('{$id}',{$num})ON DUPLICATE KEY update up = up +1";
		}elseif($type=="down"){
		$sql="insert into eb_comment_dig (comment_id,up) values ('{$id}',{$num})ON DUPLICATE KEY update down = down +1";
		}
		$db->execute($sql);
		$comment=$db->query("select comment_id,up,down from eb_comment_dig where comment_id={$id}");
		echo $type=="up"?$comment[0]->up:$comment[0]->down;
		}
	}else{
		echo $num;
	}
?>
