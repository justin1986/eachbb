<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	
	$type = $_POST['type'];
	$id = $_POST['id'];
	
	$position = new table_class('eb_position'); 
	if($type=='add'){
		$position->source_id = $id;
		$position->pos_name = 'hart_news';
		$position->save();
	}else if($type=='del'){
		$position->delete($id);
	}