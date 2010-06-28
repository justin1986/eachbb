<?php
include_once '../../frame.php';
#if(!is_ajax())die();
$allow_ops = array('publish','unpublish','delete');
$op = strtolower($_GET['operation']);
if(!in_array($op,$allow_ops)) die();
$id = intval($_GET['news_id']);
switch ($op) {
	case 'publish':
		publish_news($id);
	break;
	case 'unpublish':
		unpublish_news($id);
	break;
	default:
		;
	break;
}