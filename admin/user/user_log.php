<?php
	session_start();
  	include_once('../../frame.php');
	judge_role();
	
	$db = get_db();
	$start = $_GET['start'];
	$end = $_GET['end'];
	$key  = $_GET['key'];
	$sql = "select t2.*,t1.name,t1.nick_name from eb_user_log t2 join eb_user t1 on t1.id=t2.user_id where 1=1";
	if($key!=''){
		$sql .= " and (t1.name like '%$key%' or t1.nick_name like '%$key%')";
	}
	if($start!=''&&$start!='开始时间'){
		$sql .= " and datetime>'{$start} 00:00:00'";
	}
	if($end!=''&&$end!='结束时间'){
		$sql .= " and datetime<'{$end} 23:59:59'";
	}
	$sql .= " order by datetime desc";
	$records = $db->paginate($sql,30);
	$count = count($records);
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
    <div id=title>用户登录日志</div>
	</div>
	<div id=isearch>
		<input id="key" type="text" value="<?php echo $key?>">
		<input type="text" id="start" class="date_jquery" value="<?php if($start)echo $start;else echo '开始时间';?>">
		<input type="text" id="end" class="date_jquery" value="<?php if($end)echo $end;else echo '结束时间';?>">
		<input type="button" value="搜索" id="search_button">
	</div>
	<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class="itable_title">
			<td width="35%">用户名</td><td width="35%">用户昵称</td><td width="30%">登录时间</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $records[$i]->name;?></td>
			<td><?php echo $records[$i]->nick_name;?></td>
			<td><?php echo $records[$i]->datetime;?></td>
		</tr>
		<? }?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
			</td>
		</tr>
	</table>
</div>
</body>
</html>

<script>
$(function(){
	$('#search_button').click(function(){
		search();
	});
	$('#key').keypress(function(e){
		if(e.keyCode == 13){
			search();
		}
	});
});


function search(){
	window.location.href = "?key="+encodeURI($("#key").val())+"&start="+$("#start").val()+"&end="+$("#end").val();
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