<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$db = get_db();
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	$news = new table_class('eb_assistant');
	if($news_id){
		$news->find($news_id);
	}
	$news->update_attributes($_POST['news'],false);
	$news->update_file_attributes('news');
	
	if ($news->priority == ""){
		$news->priority = 100;
	}
	
	$news->last_edited_at = date("Y-m-d H:i:s");	
	if(!$news->id){
		//insert news
		$news->created_at = date("Y-m-d H:i:s");
		$news->click_count = 0;					
	}
	$news->save();
	if($_POST['copy_to']){
		$copy_to = explode(',',$_POST['copy_to']);
		foreach($copy_to as $cid){
			
		}
	}
	$href = "index.php";
	#redirect($href.'?category='.$_POST['news']['category_id']);
	redirect($href);
	
?>