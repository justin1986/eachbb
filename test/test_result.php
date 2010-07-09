<?php
include "../frame.php";
include_once '../inc/user.class.php';

class Report {
	var $id;
	var $description;
	var $result_type;
	var $recommands = array();
}

$test_id = intval($_GET['test_id']);
$user = User::current_user();
$sql = "select sum(score) as score, question_type from eb_test_record  where problem_id={$test_id} and user_id={$user->id} group by question_type";
$db = get_db();
$results = $db->query($sql);
!$results && $results = array();
foreach ($results as $result){
	$sql = "select * from eb_problem_result where problem_id={$test_id} and min_score <={$result->score} and max_score >= {$result->score} limit 1";
	$db->query($sql);
	if($db->record_count == 1){
		$result_type = $db->field_by_name('result_type');
		$item = new Report();
		$item->id = $db->field_by_name('id');
		$item->description = $db->field_by_name('description');
		$item->result_type = $db->field_by_name('result_type');
		$item->recommands = $db->query("select * from eb_recommand where result_id={$item->id}");
		$reports[$result_type] = $item; 
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
	<title>测评报告</title>
	<?php 
		css_include_tag('test_result','top_inc/test_blue.top','top_inc/test_left');
	?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once('./_test_top.php'); ?>
		<!-- 外部容器 -->
		<div id="container">
			<?php include_once('../inc/left_inc.php'); ?>
			<div id="result_container">
				<div id="result_top"></div>
				<div id="result_middle">
					<div id="result">
						<?php 
							if(array_key_exists('dadongzuo', $reports)){
						?>
						<div class="result_box">
							<div class="title">大动作</div>
							<div class="content">
								<font>点评：</font>
								<?php echo $reports['dadongzuo']->description;?>
							</div>
						</div>
						<?php }
							if(array_key_exists('jingxidongzuo', $reports)){
						?>
						<div class="result_box" style="margin-top:20px;">
							<div class="title">精细动作</div>
							<div class="content">
								<font>点评：</font>
								<?php echo $reports['jingxidongzuo']->description;?>
							</div>
						</div>
						<?php }
							if(array_key_exists('yuyan', $reports)){
						?>
						<div class="result_box" style="margin-top:20px;">
							<div class="title">语言</div>
							<div class="content">
								<font>点评：</font>
								<?php echo $reports['yuyan']->description;?>
							</div>
						</div>
						<?php }
							if(array_key_exists('renshi', $reports)){
						?>
						<div class="result_box" style="margin-top:20px;">
							<div class="title">认识</div>
							<div class="content">
								<font>点评：</font>
								<?php echo $reports['renshi']->description;?>
							</div>
						</div>
						<?php }
							if(array_key_exists('shehuihuodong', $reports)){
						?>
						<div class="result_box" style="margin-top:20px;">
							<div class="title">社会形为和生活习惯</div>
							<div class="content">
								<font>点评：</font>
								<?php echo $reports['shehuihuodong']->description;?>
							</div>
						</div>
						<?php }?>
						<div id="btn_recommand"><a href="/test/review.php?id=<?php echo $test_id;?>">回顾题目</a></div>
					</div>
				  	<div id="c_hr"></div>
					<div id="recommand_container">
						<?php 
							$recommd_types = array("dadongzuo" => "大动作","jingxidongzuo"=>"精细动作","yuyan"=>"语言","renshi" => "认识","shehuihuodong" => "社会形为和生活习惯");
							foreach ($recommd_types as $key => $val){
								if($reports[$key]->recommands){
						?>
						<div class="recommand">
							<div class="recommand_pg_top"><?php echo $val?></div>
							<div class="recommand_pg_middle">
								<div class="recommand_pg_son">
									<?php
									//handle the image recommand
									foreach ($reports[$key]->recommands as $recommand){
										if($recommand->image){
									?>
									<div class="recommand_image">
										<img src="<?php echo $recommand->image;?>"/>
										<a href="<?php echo $recommand->href;?>"><?php echo $recommand->title;?></a>
									</div>
									<div class="recommand_hr"></div>
									<?php 
										}
									}
									?>
									<?php foreach ($reports[$key]->recommands as $recommand){
									 	if(!$recommand->image && $recommand->recommand_type=='assister'){?>
									<div class="recommand_assistant">
										<a href="<?php echo $recommand->href;?>"><?php echo $recommand->title;?></a>
									</div>
									<div class="menu_hr"></div>
									<?php 
									 	} 
									 	if(!$recommand->image && $recommand->recommand_type=='course'){?>
									<div class="recommand_course">
										<a href="<?php echo $recommand->href;?>"><?php echo $recommand->title;?></a>
									</div>
									<div class="menu_hr"></div>
									<?php 
										}
									}
									?>
								</div>	
							</div>
							<div class="recommand_pg_bottom"></div>
						</div>
						<?php 
								}
							}?>
					</div>
					
				</div>
				<div id="result_bottom"></div>
			</div>
					
				<!-- 右侧放置内容结束 -->
			<div id="bottom_banner"><img src="/images/test/pp.jpg"/></div>
		</div>
		<div id="bg_hr"></div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
</div>
</body>
</html>
