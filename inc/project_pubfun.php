<?php

function get_teach_url($teach){
	echo '/teach/teach.php?id='.$teach->id;
}

function get_news_url($news){
	echo '/news/news.php?id='.$news->id;
}
