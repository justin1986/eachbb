<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$id = intval($_GET['id']);
	$date = $_GET['date'];
	if($date==''){
		$date = date("Y-m-d");
	}
	$type = $_GET['type'];
	$sql = "SELECT t1.date_time,t1.source_id,t1.ad_name,t1.count,t2.count as click_count FROM forbes_ad.fb_ad_result t1 left join forbes_ad.fb_ad_result t2 on t1.source_id=t2.source_id and t2.type='banner_click' and t1.date_time=t2.date_time where t1.type='banner' and t1.source_id=$id";
	if($type==''){
		$sql .= " and week(t1.date_time)=week('$date')";
	}elseif($type=='month'){
		$sql .= " and month(t1.date_time)=month('$date')";
	}elseif($type=='year'){
		$sql .= " and year(t1.date_time)=year('$date')";
	}elseif($type=='all'){
	}
	$db = get_db();
	$record = $db->paginate($sql,20);
	$count = $db->record_count;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery_ui();
	?>
</head>
<body>
<div id=icaption>
    <div id=title><?php echo $record[0]->ad_name;?>--详细统计</div>
	 <a href="result2.php" id=btn_back></a>
</div>
<div id=isearch>
		<input type="text" class="date_jquery" value="<?php echo $date;?>">
		<select id="date_type">
			<option value=''>日期当周</option>
			<option <?php if($type=='month')echo 'selected="selected"';?> value='month'>日期当月</option>
			<option <?php if($type=='year')echo 'selected="selected"';?> value='year'>日期当年</option>
			<option <?php if($type=='all')echo 'selected="selected"';?> value='all'>全部</option>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="25%">广告位名</td><td width="25%">展示次数</td><td width="25%">有效次数</td><td width="25%">有效率</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
				$click_count = ($record[$i]->click_count=='')?0:$record[$i]->click_count;
		?>
		<tr class=tr3 id="<?php echo $ad[$i]->id;?>">
			<td><?php echo $record[$i]->date_time;?></td>
			<td><?php echo $record[$i]->count?></td>
			<td><?php echo ($record[$i]->click_count=='')?0:$record[$i]->click_count;?></td>
			<td><?php echo round($click_count/$record[$i]->count,3)*100;?>%</td>
		</tr>
		<?php }?>
		<tr class="btools">
			<td colspan=10><?php paginate("",null,"page",true);?></td>
		</tr>
	</table>
</body>
</html>

<script>
	$("#search_button").click(function(){
		search();
	});
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	function search(){
		window.location.href = "more_result4.php?id=<?php echo $id;?>&date="+$(".date_jquery").val()+"&type="+$("#date_type").val();
	}
	
	$(".date_jquery").datepicker(
	{
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	});
</script>
