<?php
include_once '../../frame.php';
#if(!is_ajax())die();
$allow_ops = array('publish','unpublish','delete');
$op = strtolower($_GET['operation']);
if(!in_array($op,$allow_ops)) die();
$id = intval($_GET['news_id']);
$news = new table_class('eb_news');
switch ($op) {
	case 'publish':
		$news->find($id);
		$news->is_adopt = 1;
		$news->save();
	break;
	case 'unpublish':
		$news->find($id);
		$news->is_adopt = 0;
		$news->save();
	break;
	default:
		;
	break;
}