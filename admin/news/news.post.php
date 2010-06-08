<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$db = get_db();
	$news_id = $_POST['id'] ? $_POST['id'] : 0;
	$news = new table_class($tb_news);
	if($news_id!=0){
		$news->find($news_id);
		$old_author = $news->author;
	}
	$old_pdf_src = $news->pdf_src;
	$old_video_photo_src = $news->video_photo_src;
	$news->update_attributes($_POST['news'],false);
	if($news->id){
		$author = $_POST['news']['author'];
		if($old_author != $author){
			$db->query("select id from eb_user where (name='{$author}' or nick_name='{$author}') and role_name like 'column_%'");
			if($db->record_count > 0 ){
				$news->publisher = $db->field_by_name('id');
			}
		}
	}else{
		$author = $_POST['news']['author'];
		if(empty($author)){
			$author = $_SESSION['admin_nick_name'];
		}
		$news->author = $author;
		if($_SESSION['admin_nick_name'] != $author){
			$db->query("select id from eb_user where (name='{$author}' or nick_name='{$author}') and role_name like 'column_%'");
			if($db->record_count > 0 ){
				$news->publisher = $db->field_by_name('id');
			}else{
				$news->publisher = $_SESSION['admin_user_id'];
			}
		}else{
			$news->publisher = $_SESSION['admin_user_id'];
		}
	}
	$pos = strpos(strtolower($news->content), '<img ');
	if($pos !== false){
		$pos_end = strpos(strtolower($news->content), '>',$pos);
		$imgstr = substr($news->content, $pos,$pos_end -$pos +1);
		#alert($pos_end .';'.$imgstr);
		$imgstr = str_replace('\"', '"', $imgstr);
		$pos = strpos($imgstr, 'src="');
		$pos_end = strpos($imgstr, '"',$pos + 5);
		$src = substr($imgstr, $pos+5,$pos_end - $pos - 5);
		$news->photo_src = $src;
		$news->is_photo_news = 1;
	}else{
		$news->is_photo_news = 0;
		$news->photo_src = "";
	}
	if ($news->priority == ""){
		$news->priority = 100;
	}
	
	if(!empty($_POST['news']['block_endtime'])){
		if(strtotime($_POST['news']['block_endtime'])){
			$news->block_endtime = $_POST['news']['block_endtime'];
		}else{
			$news->block_endtime = null;
		}
	}else{
		$news->block_endtime = null;
	}	
	
	if($_FILES['pdf_src']['name'] != ''){
		$upload = new upload_file_class();
		$upload->save_dir = '/upload/news/';
		if(!$upload_name = $upload->handle('pdf_src','filter_pdf')){
			alert('上传PDF失败！');
			redirect($_SERVER['HTTP_REFERER']);
			die();
		};		
		$news->pdf_src = '/upload/news/' .$upload_name;		
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
	$news->news_type= 1;
	if(!$news->id){
		//insert news
		$news->created_at = date("Y-m-d H:i:s");
		$news->last_edited_at = date("Y-m-d H:i:s");

		$news->click_count = 0;					
		$news->save();
	}else{
		//update news
		$news->last_edited_at = date("Y-m-d H:i:s");
		$news->save();
		if($old_pdf_src && $old_pdf_src != $news->pdf_src){
			unlink(ROOT_DIR .$old_pdf_src);
		}
		
		if($old_video_photo_src && $old_video_photo_src != $news->video_photo_src){
			unlink(ROOT_DIR .$old_video_photo_src);
		}
		//if it has english new, should update the english news's category_id, news_type and so on.
		
		$db->query("select english_news_id from eb_news_relationship where chinese_news_id={$news->id}");
		
		if($db->move_first()){
			$e_id = $db->field_by_index(0);
			$english_news = new table_class($tb_news);
			$english_news->find($e_id);
			$english_news->category_id = $news->category_id;
			$english_news->news_type = $news->news_type;
			$english_news->save();
		}
	}
	
	//news saved
	
	if($news->is_adopt){
		static_news($news,'page');
	}
	//handle the keywords
	$keywords = explode(' ', $news->keywords);
	if($keywords){
		foreach($keywords as $val){
			$db->execute("insert into eb_news_keywords (name) values('{$val}') on duplicate key update name='{$val}'");
		}
	}
	
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
	$db->query("select group_concat(a.industry_id SEPARATOR ',') as ids from eb_news_industry a left join eb_industry b on a.industry_id = b.id where a.news_id={$news->id}");
	if($db->move_first()){
		$news_industry = $db->field_by_name('ids');
	}
	$news_industry = explode(',',$news_industry);
	$selected_industry = explode(',',$_POST['related_industry']);
	$new_in = array_diff($selected_industry,$news_industry);
	if(!empty($new_in)){
		foreach ($new_in as $in) {
			if(!empty($in)){
				$db->execute("insert into eb_news_industry (news_id,industry_id) values({$news->id},{$in})");				
			}
		}
	}
	$delete_in = array_diff($news_industry,$selected_industry);
	if(!empty($delete_in)){
		$delete_ids = implode(',',$delete_in);
		if(!empty($delete_ids)){
			$db->execute("delete from eb_news_industry where industry_id in ({$delete_ids}) and news_id={$news_id}");
		}
	}
		
	if($_POST['copy_news']){
		$news->copy_from = $news->id;
		$news->id = 0;
		$news->category_id = intval($_POST['copy_news']);
		$news->save();
	}
	if($_SESSION["role_name"]=='author'||$_SESSION["role_name"]=='journalist')$href="/admin/column/news_list.php";else $href="news_list.php";
	if($_SESSION['admin_user_name'] == 'editor1' || $_SESSION['admin_user_name'] == 'editor2' || $_SESSION['admin_user_name'] == 'editor3'){
		$href = "news_list.php";
	}
	redirect($href.'?category='.$_POST['news']['category_id']);
	#var_dump($news);
	
?>