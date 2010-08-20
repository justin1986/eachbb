<?php 
	include_once('../frame.php');
	$db = get_db();
	$user = User::current_user();
	$type = $_POST["type"];
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	if($type)$type=" limit 15";
	$array = $db->query("select id,title,description,age,month,create_time from eb_teach where is_adopt=1 and del_flag=0 order by priority,click_count,create_time desc $type");
	if(!$array){
		echo "<div style='width:750px; height:400px; line-height:400px; text-align:center; font-size:30px; font-weight:bold; float:left; display:inline;'>课程列表为空！</div>";
	}else{
?>
<div id="cr_b">
	<div id="crb_l"></div>
	<div id="crbc_c">
		<div id="crbc_l"><a href="#"><font><?php if($type){?>最新课程<?php }else{?>课程历史查询<?php }?></font></a></div>
	</div>
	<div id="crb_r"></div>
</div>
<div id="cr_c">
	<?php foreach ($array as $array){?>
	<div class="problem_bannerr">
		<div  style="width:710px; height:26px; padding-left:10px; font-size:13px; background:#E0E0E0;"><div style="width:380px; height:26px; line-height:26px; overflow:hidden; float:left;">课程名称：<?php echo $array->title; ?></div>
			<div style="width:320px; height:26px; line-height:26px; float:right;">适龄年龄段：<?php echo $array->age.'岁'.$array->month.'个月      发布时间'. $array->create_time; ?></div>
		</div>
		<div style="width:695px; padding-left:10px;  font-size:12px; text-indent:20px; "><?php echo $array->description; ?>
		</div>
	</div>
	<div>
	</div>
	<?php }?>
</div>
<?php }?>

