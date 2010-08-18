<?php 
	include_once('../frame.php');
	$db = get_db();
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$array = $db->query("SELECT problem_id FROM eachbb.eb_test_record e where user_id={$user->id};");
	$count = $db->record_count;
	for ($i = 0 ; $i < $count ; $i++){
		$result .= $array[$i]->problem_id.",";
	}
	$result = substr($result,0,-1);
	if(!$result){
		echo "<div style='width:750px; height:400px; line-height:400px; text-align:center; font-size:30px; font-weight:bold; float:left; display:inline;'>您的测评列表为空！</div>";
	}else{
	$pro = $db->query("select id,name,create_time from eachbb.eb_problem where id in ($result)");
?>
<div id="cr_b">
	<div id="crb_l"></div>
	<div id="crbc_c">
		<div id="crbc_l"><a href="#"><font>我的测评</font></a></div>
	</div>
	<div id="crb_r"></div>
</div>
<div id="cr_c">
	<?php foreach ($pro as $problem){
	$problem=$db->query("SELECT id,name,create_time FROM eb_problem e where end_month<=(select start_month+(select datediff(now(), create_time) from eachbb.eb_problem where id={$problem->id}) from eachbb.eb_problem where id={$problem->id}) and id={$problem->id};");
	if($problem){
		?>
	<div class="problem_bannerr">
		<a href="/baby/_baby_post.php?id=<?php echo $problem[0]->id; ?>" title="<?php echo $problem[0]->name; ?>"><?php echo $problem[0]->name; ?></a>
		<div><?php echo $problem[0]->create_time; ?></div>
	</div>
	<?php }}?>
</div>
<?php 		
	}?>