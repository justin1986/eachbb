<?php 
	include_once('../frame.php');
	$db = get_db();
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$array = $db->query("select a.problem_id,b.name,a.created_at from eb_test_record as a  left join eb_problem b on b.id=a.problem_id where a.user_id={$user->id} group by user_id,problem_id;");
	$count = $db->record_count;
	if(!$array){
		echo "<div style='width:750px; height:400px; line-height:400px; text-align:center; font-size:30px; font-weight:bold; float:left; display:inline;'>您的测评列表为空！</div>";
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
	<?php foreach ($array as $problem){
		?>
	<div class="problem_bannerr">
		<div><?php echo $problem>name; ?></div>
		<div style="font-size:12px; font-weight:100px;">测评时间：<?php echo $problem->created_at; ?></div>
		<div style="margin-left:120px; float:left;"><a href="/test/test_result.php?test_id=<?php echo $problem->problem_id;?>">测评结果</a></div>
		<div style="margin-left:120px; float:left;"><a href=" /test/review.php?id=<?php echo $problem->problem_id;?>">题目回顾</a></div>
	</div>
	<?php }?>
</div>
<?php 		
	}?>