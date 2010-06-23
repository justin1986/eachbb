<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$db = get_db();
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	$news = new table_class($tb_news);
	if($news_id){
		$news->find($news_id);
	}
	
	$news->update_attributes($_POST['news'],false);
	if(!$news->publisher){
		$news->publisher = $_SESSION['admin_user_id'];
	}
	
	if ($news->priority == ""){
		$news->priority = 100;
	}
	
	if($_FILES['news_pic']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		$news->video_photo_src = '/upload/news/' .$upload->handle('news_pic','filter_pic');
	}
	$table_change = array('<p>'=>'');
	$table_change += array('</p>'=>'');
	$news->title = strtr($news->title,$table_change);
	$news->short_title = strtr($news->short_title,$table_change);
	$news->last_edited_at = date("Y-m-d H:i:s");	
	if(!$news->id){
		//insert news
		$news->created_at = date("Y-m-d H:i:s");
		$news->click_count = 0;					
	}
	$news->save();
	
	/*
	 * news saved
	 */
	
	//handle the keywords
	$keywords = explode('||', $news->keywords);
	if($keywords){
		foreach($keywords as $val){
			if(empty($val)) continue;
			$db->execute("insert into eb_news_keywords (name) values('{$val}') on duplicate key update name='{$val}'");
		}
	}
	
	//handle the publish schedule
	if(isset($_POST['publish_schedule_date'])){
		$schedule = new table_class('eb_publish_schedule');
		if($id){
			$schedule->find_by_resource_id($id);
		}
		if($_POST['publish_schedule_date']){
			$schedule->publish_date = $_POST['publish_schedule_date'];
			$schedule->resource_id = $news->id;
			$schedule->resource_type= 'news';
			$schedule->save();
		}else{
			if($schedule->id){
				$schedule->delete();
			}
		}
	}

	if($_POST['copy_news']){
		$news->copy_from = $news->id;
		$news->id = 0;
		$news->category_id = intval($_POST['copy_news']);
		$news->save();
	}
	$href = "news_list.php";
	redirect($href.'?category='.$_POST['news']['category_id']);
	#var_dump($news);
	
?>