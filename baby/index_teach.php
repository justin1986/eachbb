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
		$problem_id = $_GET["problem_id"];
		if(!is_numeric( $problem_id))die("非法操作");
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
		$avatars =$db->query("SELECT id,photo,status FROM eachbb_member.member_avatar where u_id=".$user->id.' order by create_at desc limit 3');
		$avatar_count = $db->record_count;
		$name =$user->name;
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_baby_top.php'); ?>
	<?php include_once(dirname(__FILE__).'/../baby/_inc_index_left.php'); ?>
	<div id="haha">
	<?php 
	$array = $db->query("SELECT e.id,e.problem_id,e.score,e.created_at,s.name FROM eachbb.eb_test_record e left join eachbb.eb_problem as s on e.problem_id=s.id where e.problem_id=$problem_id order by created_at desc;");
	if(!$array){
		echo "<div style='width:750px; height:400px; line-height:400px; text-align:center; font-size:30px; font-weight:bold; float:left; display:inline;'><a href='/baby'>您的测评列表为空！</a></div>";
	}else{
?>
<div id="cr_b">
	<div id="crb_l"></div>
	<div id="crbc_c">
		<div id="crbc_l"><a href="#"><font>测评查询</font></a></div>
	</div>
	<div id="crb_r"></div>
</div>
<div id="cr_c">
	<?php foreach ($array as $problem){
	if($problem){
		?>
	<div class="problem_bannerr">
		<div style="width:400px; height:20px; line-height:20px; overflow:hidden; float:left; display: inline;"><a href="/baby/_baby_post.php?id=<?php echo $problem->problem_id; ?>" title="<?php echo $problem->name; ?>"><?php echo $problem->name; ?></a></div>
		<div style="float:left; display:inline;">测评分数：<?php echo $problem->score; ?></div>
		<div>测评时间：<?php echo $problem->created_at; ?></div>
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

