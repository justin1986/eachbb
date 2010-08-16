<?php 
	include_once('../frame.php');
	$db = get_db();
	$pro =$db->query("SELECT id,name,create_time FROM eachbb.eb_problem order by create_time desc;");
?>
<div id="cr_b">
	<div id="crb_l"></div>
	<div id="crbc_c">
		<div id="crbc_l"><a href="#"><font>最新测评</font></a></div>
	</div>
	<div id="crb_r"></div>
</div>
<div id="cr_c">
	<?php foreach ($pro as $problem){
	$problem=$db->query("SELECT id,name,create_time FROM eb_problem e where end_month<=(select start_month+(select datediff(now(), create_time) from eachbb.eb_problem where id={$problem->id}) from eachbb.eb_problem where id={$problem->id}) and id={$problem->id};");
	if($problem){
		?>
	<div class="problem_bannerr">
		<a href="/test/test.php?id=<?php echo $problem[0]->id; ?>" title="<?php echo $problem[0]->name; ?>"><?php echo $problem[0]->name; ?></a>
		<div><?php echo $problem[0]->create_time; ?></div>
	</div>
	<?php }}?>
</div>