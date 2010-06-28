<?php

function get_teach_url($teach){
	echo '/teach/teach.php?id='.$teach->id;
}

function get_news_url($news,$type=null,$index=0){
	global $page_type;
	if(!$type) $type = $page_type;
	$type = strtolower($type);
	if($type == 'static'){
		if(is_numeric($news)){
			$table = new table_class('eb_news');
			$news = $table->find($news);
		}
		if(!$news) return false;
		$ret = "/review/".date('Ym',strtotime($news->created_at))."/".str_pad($news->id,7,'0',STR_PAD_LEFT);
		if($index>1) $ret .= "_{$index}";
		$ret .= ".shtml";
		
		return $ret;
			
	}else{
		if(is_numeric($news)){
			$ret = '/news/news.php?id='.$news;
		}else{
			$ret = '/news/news.php?id='.$news->id;
		}
		if($index){
			$ret .= "&page={$index}";
		}
		return $ret;
	}
}

function get_test_url($test){
	echo '/test/test.php?id='.$test->id;
}

function get_news_list_url($category,$include_children= true){
	echo '/news/news_list.php?category_id=' .$category->id;
}

function get_search_keyword_url($keyword){
	echo '';
}

function publish_news($news){
	if(is_numeric($news)){
		$table = new table_class('eb_news');
		$news = $table->find($news);
	}
	if(!is_object($news)) return false;
	global $static_dir;
	global $static_url;
	$url = "{$static_url}/news/news.php?id={$news->id}&page_type=static";
	$content = file_get_contents($url);
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "{$static_dir}/review/{$date}";
	if(!is_dir($dir)){
		mkdir($dir);
	}
	$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
	$file = $dir ."/{$news_id}.shtml";
	if(!write_to_file($file,$content,'w')){
		return false;
	}
	$page_count = get_fck_page_count($news->content);
	if ($page_count > 1){
		for($i=2;$i<= $page_count;$i++){
			$url = "{$static_url}/news/news.php?id={$news->id}&page={$i}&page_type=static";
			$content = file_get_contents($url);
			$file = "$dir/{$news_id}_{$i}.shtml";
			if(!write_to_file($file,$content,'w')){
				return false;
			}
		}
	}
	$news->is_adopt = 1;
	return $news->save();
}

function unpublish_news($news){
	if(is_numeric($news)){
		$table = new table_class('eb_news');
		$news = $table->find($news);
	}
	if(!is_object($news)) return false;
	$file = ROOT_DIR . get_news_url($news,'static');
	@unlink($file);
	$news->is_adopt = 0;
	return $news->save(); 
};

function paginate_news($news){
	if(is_numeric($news)){
		$table = new table_class('eb_news');
		$news = $table->find($news);
	}
	global $page_page_count;
	global $page_type;
	$_REQUEST['page_type'] && $page_type=$_REQUEST['page_type'];
	$page_page_count = get_fck_page_count($news->content);
	if($page_type == 'static'){
		return paginate(get_news_url($news,'static'),null,'page',false,'static',2);
	}else{
		return paginate(null,null,'page',false,'normal',2);
	}
}