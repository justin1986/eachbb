<?php
	include_once('../frame.php');
	$valid_types = array('up','down','collect','comment');
	$type = strtolower($_POST["type"]);
	if(!in_array($type, $valid_types)) die('invalid request!');
	if($type == 'up' || $type == 'down'){
		$id = intval($_POST["id"]);
		if(!is_ajax()) die('invlid request!');
		$db=get_db();
		if(!$id) die('invalid params');
		if($type == "up"){
			$sql = "insert into eb_comment_dig (comment_id,up) values ('{$id}',1)ON DUPLICATE KEY update up = up +1";
		}elseif($type == "down"){
			$sql="insert into eb_comment_dig (comment_id,down) values ('{$id}',1)ON DUPLICATE KEY update down = down +1";
		}
		$db->execute($sql);
		$comment =$db->query("select comment_id,up,down from eb_comment_dig where comment_id={$id}");
		echo $type == "up" ? $comment[0]->up : $comment[0]->down;
	}elseif ($type=='comment'){
		include_once '../inc/user.class.php';
		$user = User::current_user();
		if(!$user){
			echo '请先登录';
			die();
		}
		$comment = new table_class('eb_comment');
		$comment->resource_type= 'feedback';
		$comment->nick_name = $user->name;
		$comment->user_id = $user->id;
		$comment->ip = client_ip();
		$comment->created_at = now();
		$comment->comment = htmlspecialchars(urldecode($_POST['comment']));
		$comment->save();
	}
?>