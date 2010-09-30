<?php
include "../frame.php";
include_once '../inc/User.class.php';

class Report {
	var $id;
	var $description;
	var $result_type;
	var $recommands = array();
}

$test_id = intval($_GET['test_id']);
if(!$test_id)die('invalid param');
$problem = new table_class('eb_problem');
$problem->find($test_id);
$user = User::current_user();
$sql = "select sum(score) as score, question_type from eb_test_record  where problem_id={$test_id} and user_id={$user->id} group by question_type";
$db = get_db();
$results = $db->query($sql);
!$results && $results = array();
$reports = array();
foreach ($results as $result){
	$sql = "select * from eb_problem_result where problem_id={$test_id} and result_type='{$result->question_type}' and min_score <={$result->score} and max_score >= {$result->score} limit 1";
	$db->query($sql);
	if($db->record_count == 1){
		$result_type = $db->field_by_name('result_type');
		$item = new Report();
		$item->id = $db->field_by_name('id');
		$item->description = $db->field_by_name('description');
		$item->result_type = $db->field_by_name('result_type');
		if($problem->problem_type == 1){
			$item->recommands = $db->query("select * from eb_recommand where result_id={$item->id}");
		}else{
			$item->recommands = $db->query("select description from eb_question where id in (select question_id from eb_test_record where problem_id={$test_id} and user_id={$user->id} and score<1)");
		}
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
		use_jquery();
		css_include_tag('top_inc/test_top','test_result','top_inc/test_left','test_left_inc');
	?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once('../inc/_test_top.php'); ?>
		<!-- 外部容器 -->
		<div id="container">
			<?php include_once(dirname(__FILE__).'/../test/left_inc.php');  ?>
			<div id="result_container">
				<div id="result_top"></div>
				<div id="result_middle">
					<?php 
						if($problem->problem_type == 1){
							include '_baby_test_result.php';				
						}else{
							include '_mother_test_result.php';
						}
					?>
					
				</div>
				<div id="result_bottom"></div>
			</div>
					
				<!-- 右侧放置内容结束 -->
			<div id="bottom_banner"><img src="/images/test/pp.jpg"/></div>
		</div>
		<?php include_once('../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
