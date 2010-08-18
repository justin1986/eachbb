<?php
	global $page_type;
	$page_type= 'admin';
	include_once '../../frame.php';
	require CURRENT_DIR . $_GET['page'];