<?php
    include_once('../../frame.php');
	if($_POST['post_type']=="del"){
		$post = new table_class("fb_comment");
		$post -> delete($_POST['comment_id']);
		echo $_POST['comment_id'];
	}elseif($_POST['post_type'] == 'unapprove'){
		$id = intval($_POST['id']);
		$db = get_db();
		$db->execute("update fb_comment set is_approve = 0 where id={$id}");
	}elseif($_POST['post_type'] == 'approve'){
		$id = intval($_POST['id']);
		$db = get_db();
		$db->execute("update fb_comment set is_approve = 1 where id={$id}");
		$db->query("select user_id from fb_comment where id = {$id}");
		$user_id = intval($db->field_by_name('user_id'));
		if($user_id){
			adjust_user_score($user_id,30,'评论通过审批');
		}
		
	}
	
?>