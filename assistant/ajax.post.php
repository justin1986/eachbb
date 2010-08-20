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
	}else if($type == 'collect'){
		include_once '../inc/user.class.php';
		$user = User::current_user();
		if(!$user) die('请先登录!');
		$news_id = intval($_POST['news_id']);
		$news = new table_class('eb_category');
		$news->find($news_id);
		if(!$news->id){
			die('invalid param');
		}
		$db = get_db();
		$db->query("select id from eb_collection where resource_type='assistant' and resource_id={$news->id} and user_id={$user->id}");
		if($db->record_count > 0 ){
			die('您已收藏过改文章，请不要重复收藏！');
		}
		$collect = new table_class('eb_collection');
		$collect->created_at = now();
		$collect->resource_type = 'assistant';
		$collect->resource_id = $news->id;
		$collect->user_id = $user->id;
		$collect->save();
		echo "恭喜您，文章收藏成功！";
	}elseif ($type=='comment'){
		include_once '../inc/User.class.php';
		$user = User::current_user();
		if(!$user){
			echo '请先登录';
			die();
		}
		$news_id = intval($_POST['news_id']);
		$comment = new table_class('eb_comment');
		$comment->resource_id = $news_id;
		$comment->resource_type= 'assistant';
		$comment->nick_name = $user->name;
		$comment->user_id = $user->id;
		$comment->ip = client_ip();
		$comment->created_at = now();
		$comment->comment = htmlspecialchars(urldecode($_POST['comment']));
		$comment->save();
		echo "发表评论成功！";
	}
?>
