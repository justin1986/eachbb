<?php 
	include_once('../frame.php');
	$db = get_db();
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$array = $db->query("SELECT e.id,e.problem_id,e.score,e.created_at,s.name FROM eachbb.eb_test_record e left join eachbb.eb_problem as s on e.problem_id=s.id where e.user_id={$user->id} order by created_at desc;");
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
	<?php $i=0; foreach ($array as $problem){
	if($problem){
		?>
	<div class="problem_bannerr" <?php if($i % 2 == 0){echo 'style="background:#D2D8E4;"';}?>>
		<div style="width:400px; height:20px; line-height:20px; overflow:hidden; float:left; display: inline;"><a href="/baby/_baby_post.php?id=<?php echo $problem->problem_id; ?>" title="<?php echo $problem->name; ?>" <?php if($i % 2 == 0){echo 'style="color:#333333;"';}?>><?php echo $problem->name; ?></a></div>
		<div style="float:left; display:inline;">测评分数：<?php echo $problem->score; ?></div>
		<div>测评时间：<?php echo $problem->created_at; ?></div>
	</div>
	<?php  $i++; }}?>
</div>
<?php 		
	}?>