<?php

function get_course_url($course){
	echo "";
}

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
	$category_id = is_object($category) ? $category->id : $category;
	return '/news/news_list.php?category_id=' .$category_id;
}

function get_assistant_list_url($category){
	return '/assistant/index.php?category_id=' . $category;
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

function get_page_type(){
	global $page_type;
	return $_REQUEST['page_type'] ? $_REQUEST['page_type'] : ($page_type ? $page_type : 'dynamic');  
}

function init_page_items($page){
	global $pos_items;
	global $pos_page;
	$pos_page = $page;
	if($pos_items) return;
	$pos_items = PagePos::load($page);
	$page_type = get_page_type();
	if($page_type == 'admin'){
		js_include_tag('jquery.colorbox-min');
		css_include_tag('colorbox');
		js_include_tag('admin/page_admin');	
	}
}

function show_page_pos($pos,$name='default'){
	global $page_type;
	global $pos_page;
	$type = $_REQUEST['page_type'] ? $_REQUEST['page_type']: $page_type ;
	if($type == 'admin'){
		echo " page=\"{$pos_page}\" pos=\"{$pos}\" pos_tag='{$name}'";
	}	
}

function get_gender($gender){
	if($gender == 1){
		return "男";
	}elseif ($gender == 2){
		return "女";
	}else {
		return "未知";
	}
}

function insert_ad_record($ad,$type='show'){
	if(is_int($ad)){
		$table = new table_class('eachbb_ad.eb_ad');
		$table->find($ad);
		$ad = $table;
	}
	$list = new table_class("eachbb_ad.eb_ad_{$type}_list");
	$list->ad_id = $ad->id;
	$list->ad_name = $ad->name;
	$list->channel_id = $ad->channel_id;
	$list->banner_id = $ad->banner_id;
	$list->create_at = now();
	$list->show_page = $_POST['url'] ? $_POST['url'] : $_SERVER['HTTP_REFERER'];
	$list->remote_ip = $_SERVER['REMOTE_ADDR'];
	$list->save();
}

function add_latest($type,$r_id,$content){
	$user = User::current_user();
	$db = get_db();
	$sql = "insert into eachbb_member (resource_type,resource_id,content,created_at,u_id,u_name,u_avatar) values('$type',$r_id,'$content',now(),{$user->id},'{$user->name}','{$user->avatar}')";
	return $db->execute($sql);
}

function refresh_course_xml(){
	$db = get_db();
	$db->query("select id from eb_category where category_type='image' and name='课程flash'");
	if($db->record_count < 0 ){
		return false;
	}
	$cate_id = $db->field_by_name('id');
	
	$items = $db->query("select * from eb_images where category_id = {$cate_id} and is_adopt=1 order by priority,created_at asc limit 4");
	$out = '﻿<?xml version="1.0" encoding="UTF-8"?>';
	$out .='<settings';
	$out .=' autoRotate="1"';
	$out .=' autoRotateSpeed="2"';
	$out .=' useSubtitle="0"';
	$out .=' useTooltip="1"';
	$out .=' useSecondCaption="1"';
	$out .=' spanX="170"' ;
	$out .=' spanY="20"';
	$out .=' centerX="260"'; 
	$out .=' centerY="280"';
	$out .=' distanceValue="0"'; 
	$out .=' perspectiveRatio="0.85"';
	$out .=' minimumscale="0.99"' ;
	$out .=' turningspeed="4"' ;
	$out .=' rotationKind="1"' ;
	$out .='/>';
	$out .='<photos>';
	for($i=0;$i<4; $i++){
		$out .= '<photo imageURL="'.$items[$i]->src.'" linkData="'.$items[$i]->url.'" linkType="URL" linkTarget="_blank" captionText="" captionText2="" enableButtonWhenInFront="1"/>';
	}	
	$out .= "</photos>";
	return write_to_file(dirname(__FILE__).'/../course/data.xml', $out,'w');
}

