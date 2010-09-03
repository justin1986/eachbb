<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Language" content="zh-cn">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>我的宝宝</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('baby','test_report','yard','baby_info','yard_reset_password','message');
		js_include_tag('yard/yard_info');
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
//		$avatars =$db->query("SELECT id,photo,status FROM eachbb_member.member_avatar where u_id=".$user->id.' order by create_at desc limit 3');
//		$avatar_count = $db->record_count;
//		$name =$user->name;
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_baby_top.php'); ?>
	<?php include_once(dirname(__FILE__).'/../baby/_inc_index_left.php'); ?>
	<div id="haha">
		<div id="right">
	     		<div ><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>留言</b></font><font size="2" color="red"><b>信息</b></font></div>
	     		<div class="line1" ><hr color="#A3C1CD" width=100%; size="2" /></div>
	    </div>
		<div id="message_container">
			<?php 
				$list=$db->query("SELECT * FROM eachbb_member.message m where recieve_id={$user->id} and status=0 LIMIT 20");
			?>
		</div>
	</div>
        <?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
</div>
</body>
</html>