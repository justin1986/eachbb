<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Language" content="zh-cn">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>我的宝宝</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('teach');
		js_include_tag('yard/yard_info','baby/report');
		$user = User::current_user();
		$teach_id =3; # $_GET["problem_id"];
		if(!is_numeric($teach_id))die("非法操作");
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_baby_top.php'); ?>
	<?php include_once(dirname(__FILE__).'/../baby/_inc_index_left.php'); ?>
	<div id="haha">
		<div id="cr_b">
			<div id="crb_l"></div>
			<div id="crbc_c">
				<div id="crbc_l"><a href="#"><font>课程查询</font></a></div>
			</div>
			<div id="crb_r"></div>
		</div>
		<div id="cr_c">
			<?php
			$teach =$db->query("SELECT id,title,img_url,description,content,age,create_time FROM eachbb.eb_teach e where id=$teach_id and is_adopt=1 and del_flag=0;");
			$avatar_count=$db->record_count;
			var_dump($teach);
			for($i = 0 ; $i < $avatar_count ; $i++){
				?>
			<div class="problem_bannerr">
				<div class="teach_title_banner">
					<div style="float:left; display:inline;">课程标题：<?php echo $avatars[0]->title; ?></div>
					<div>发布时间：<?php echo $avatars[$i]->create_time; ?></div>
				</div>
			</div>
			<?php }?>
		</div>
</div>
        <?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
</div>
</body>
</html>