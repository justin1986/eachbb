<?php
    include_once('../../frame.php');
	if($_POST['post_type']=="del"){
		$post = new table_class("eb_comment");
		$post -> delete($_POST['del_id']);
	}
?>
