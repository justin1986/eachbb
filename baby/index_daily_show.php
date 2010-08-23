<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Language" content="zh-cn">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>我的宝宝</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('baby','test_report','yard','baby_info','yard_reset_password');
		js_include_tag('yard/yard_info','baby/report');
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
		$id=$_GET['daily_id'];
		if(!is_numeric( $id))die("非法操作");
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_baby_top.php'); ?>
	<?php include_once(dirname(__FILE__).'/../baby/_inc_index_left.php'); ?>
	<div id="haha">
			<?php 
			$array = $db->query("select * FROM eachbb_member.lastest_news where id='{$id}' order by created_at desc limit 9");
		   $num = $db->record_count;
			if(!$array){
				echo "<div style='width:750px; height:400px; line-height:400px; text-align:center; font-size:30px; font-weight:bold; float:left; display:inline;'><a href='/baby'>您的测评列表为空！</a></div>";
			}else{
			?>
		<div id="cr_b">
			<div id="crb_l"></div>
			<div id="crbc_c">
				<div id="crbc_l"><a href="#"><font>用户最新动态</font></a></div>
			</div>
			<div id="crb_r"></div>
		</div>
		<div id="cr_c">
			<?php foreach ($array as $problem){
			if($problem){
				?>
			<div class="problem_bannerr">
				<div style="width:400px; height:20px; line-height:20px; overflow:hidden; float:left; display: inline;"><a href="/yard/home.php?id=<?php echo $problem->u_id;?>"><?php echo $problem->u_name.$problem->form; ?></a></div>
					<div style="float:left; display:inline;"></div>
				<div>时间：<?php echo $problem->created_at; ?></div>
				<div style="width:700px; line-height:20px; float:left; display: inline;">
					<div class="pc_img" style=" float:left; display:inline;"><a href="/yard/home.php?id=<?php echo $problem->u_id;?>"><img style="border:0px solid red;" src="
									<?php 
								if($problem->u_avatar){
									echo $problem->u_avatar;
								}else{
									echo "/images/yard/noface.jpg";
								}
							?>"/></a>
					</div>
					<?php echo $problem->content;?>
				</div>
					
			</div>
			<?php }}?>
		</div>
		<?php 		
			}?>
	</div>
        <?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
</div>
</body>
</html>

