<?php
	include_once '../frame.php';
	include_once '../inc/User.class.php';
//	var_dump($_SESSION['news_share']);
//	die();
//	if($_SESSION['news_share'] != $_POST['session']){
//		die('invalid request!');
//	}
	$news_id = intval($_POST['news_id']);
	$news = new table_class('eb_news');
	$news->find($news_id);
	if(!$news->id) die('invalid param');
	$len = count($_POST['mail']);
	set_charset("utf-8");
	$news_share = new table_class('eb_news_share');
	$user = User::current_user();
	if(!$user) die('need login');
	for($i=0;$i<$len;$i++){
		if(empty($_POST['mail'][$i])) continue;
		if(!check_email($_POST['mail'][$i])) die($_POST['mail'][$i] ." 格式不正确");
		$news_share->id = 0;
		$news_share->user = $user->name;
		$news_share->nick_name = htmlspecialchars($_POST['name'][$i]);
		$news_share->email = htmlspecialchars($_POST['mail'][$i]);
		$news_share->created_at = now();
		$news_share->news_id = $news_id;
		$news_share->share_type='news';
		$news_share->save();
		$content = addslashes($_POST['name'][$i]."，你好：<br/><br/>　　您的好友".$user->name."想与您分享网趣宝贝的文章《".$news->title."》，您可以点击以下连接阅读<br/><br/><a href='http://{$_SERVER[HTTP_HOST]}/news/news.php?id=".$news_id."'>http://{$_SERVER[HTTP_HOST]}/news/news.php?id=".$news_id."</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。");
		$title = $news->title;
		send_mail('mail.eachbaby.com','administrator@eachbaby.com','123456','administrator@eachbaby.com',htmlspecialchars($_POST['mail'][$i]),'网趣宝贝(eachbaby.com)文章分享',$content);
		insert_email($news_share->email, $email_from, $title, $content);
	}

	function insert_email($email_to,$email_from,$email_subject,$email_content){
		$db = get_db();
		$db->execute("insert into `eachbb_email`.eb_email (email_to,email_from,email_subject,email_content,created_at) values('$email_to','$email_from','$email_subject','$email_content',now())");
	};
	#send_mail('smtp.qiye.163.com','userservice@forbeschina.com','userservice','userservice@forbeschina.com',$_GET['mail'][$i],$title,$content);
?>
<script>
	alert("已成功分享！");
	window.location.href = "/news/news.php?id=<?php echo $news_id;#echo get_news_url($news,'static');?>";
</script>
