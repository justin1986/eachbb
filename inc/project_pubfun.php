<?php

function get_teach_url($teach){
	echo '/teach/teach.php?id='.$teach->id;
}

function get_news_url($news){
	echo '/news/news.php?id='.$news->id;
}

function get_test_url($test){
	echo '/test/test.php?id='.$test->id;
}

function get_news_list_url($category,$include_children= true){
	echo '/news/news_list.php?category_id=' .$category->id;
}
