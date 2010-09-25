<?php 
	session_start();
	include_once( dirname(__FILE__) .'/../frame.php');
	set_charset("utf-8");
	$db = get_db();
	$_SESSION['news_share'] = rand_str();
	$news_id = intval($_GET['news_id']);
	$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>分享_网趣宝贝</title>
	<?php
		use_jquery();
		css_include_tag('article','share');
		js_include_tag('pubfun', 'news/share');
	?>
</head>
<body>
<div id="ibody">
		<?php include_once('../inc/_consult_top.php'); ?>
		<div id="bread"><img src="/images/article/log.jpg" /> 分享</div>
		<div id="mail_box">
			<div class="share_line">分享给好友，您可以输入好友昵称和邮件地址，将网趣宝贝精华文章和您的好友分享</div>
			<form action="/news/share.post.php" method="post" id="share_form">
				<div class="share_line">
					<div class="share_mail"><span>好友邮件：</span><input name="mail[]" type="text" style="width:260px;"></div>
					<div class="share_name"><span>好友昵称：</span><input name="name[]" type="text"></div>
				</div>
				<div class="share_line" style="text-align:center; padding-left:150px;"><button type="button" id="add">继续添加</button> <button id="share_submit" type="button">提交</button></div>
				<input type="hidden" name="session" value="<?php echo $_SESSION['news_share'];?>">
				<input type="hidden" name="news_id" value="<?php echo $news_id;?>">
				<input type="hidden" name="type" value="<?php echo $type;?>">
			</form>
		</div>
</div>
</body>
</html>