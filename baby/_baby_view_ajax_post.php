<?php 
	include_once('../frame.php');
	$db = get_db();
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$array = $db->query("select a.problem_id,b.name,a.created_at from eb_test_record as a  left join eb_problem b on b.id=a.problem_id  group by user_id,problem_id order by a.created_at desc;");
	$count = $db->record_count;
	if(!$array){
		echo "<div style='width:750px; height:400px; line-height:400px; text-align:center; font-size:30px; font-weight:bold; float:left; display:inline;'>测评列表为空！</div>";
	}else{
?>
<div id="cr_b">
	<div id="crb_l"></div>
	<div id="crbc_c">
		<div id="crbc_l"><a href="#"><font>我的测评</font></a></div>
	</div>
	<div id="crb_r"></div>
</div>
<div id="cr_c">
	<?php
	$i=0;
	foreach ($array as $problem){
		?>
	<div class="problem_bannerr" <?php if($i % 2 == 0){echo 'style="background:#D2D8E4;"';}?>>
		<div style="width:170px; margin-left:30px; font-weight:bold; float:left; display: inline;"><a href="/test/test.php?id=<?php echo $problem->problem_id;?>"><?php echo $problem->name; ?></a></div>
		<div style="font-size:12px; font-weight:100px;">测评时间：<?php echo $problem->created_at; ?></div>
		<div style="margin-left:40px; float:left;"><a href="/test/test_result.php?test_id=<?php echo $problem->problem_id;?>" <?php if($i % 2 == 0){echo 'style="color:#333333;"';}?>>测试结果报表</a></div>
		<div style="margin-left:60px; float:left;"><a href=" /test/review.php?id=<?php echo $problem->problem_id;?>" <?php if($i % 2 == 0){echo 'style="color:#333333;"';}?>>测试回顾</a></div>
	</div>
	<?php $i++;}?>
</div>
<?php 	}?>