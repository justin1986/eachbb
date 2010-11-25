<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$key = $_REQUEST['key'];
	$test_type = $_REQUEST['test'];
	$is_adopt = $_REQUEST['adopt'];
	$type = intval($_GET['type']) ? intval($_GET['type']) : 1;
	$db = get_db();
	$pro_type = $db->query("select id,name from  eb_problem");
	if($start==""){$start=date('Y-m-d');}else{$start=$_REQUEST['start'];}
	if($end==""){$end=date('Y-m-d');}else{$end=$_REQUEST['end'];}
	$sql = "select b.*,a.problem_type,a.name from eb_test_result1 b left join eb_problem a on a.id = b.test_type where 1=1";
	if($key != undefined &&$key != ''){
		$sql .= " and created_at between $key";
	}
	if($is_adopt!=''){
		$sql .= " and b.pro_type =$is_adopt";
	}
	if($test_type!=''){
		$sql .= " and b.test_type =$test_type";
	}
	$sql .= " order by created_at desc";
	$record = $db->paginate($sql,30);
	$count_record = $db->record_count;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>eachbb</title>
	<?php 
		css_include_tag('admin');
		use_jquery_ui();
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>测评结果查询</div>
</div>
<div id=isearch>
		<font style="display:block; float:left;">时间:&nbsp;&nbsp;</font><input class="birthday" id="start" type="text" value="<?php echo $start;?>"><font style="display:block; float:left;">&nbsp;&nbsp;到&nbsp;&nbsp;</font><input id="end" class="birthday" type="text" value="<?php echo $end;?>">
		<select id=adopt style="width:100px">
					<option value="">测试类型</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>父母</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>宝宝</option>
		</select>
		<select id=test_type style="width:100px">
					<option value="">测试名称</option>
					<?php for ($j = 0; $j < count($pro_type); $j++) { ?>
						<option value="<?php echo $pro_type[$j]->id;?>" <? if($_REQUEST['test']== $pro_type[$j]->id){?>selected="selected"<? }?>><?php echo $pro_type[$j]->name;?></option>
					<?php }?>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable> 
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="50%">参与人员</td><td width="20%">测试名称</td><td width="30%">测试时间</td>
		</tr>
		<? for($i=0;$i<$count_record;$i++){?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><?php echo $record[$i]->u_name;?></td>
			<td><? echo $record[$i]->name;?></td>
			<td><?php echo $record[$i]->created_at;?></td>
		</tr>
		<?  }?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority>清空优先级</button>
				<button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="db_table" value="eb_problem">
			</td>
		</tr>
	</table>
</div>
</body>
</html>

<script>
	$("#search_button").click(function(){
		search();
	});
	$("#adopt").change(function(){
		search();
	});
	$("#test_type").change(function(){
		search();
	});
	$(".birthday").datepicker(
			{
				changeMonth: true,
				changeYear: true,
				monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
				dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dayNamesMin:["日","一","二","三","四","五","六"],
				dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
				dateFormat: 'yy-mm-dd'
			});
	function search(){
		if($('#start').val()){
			if(!$('#end').val()){
				$('#end').val(date('Y-m-d')+' 23:59:59');
			}
			var key = "'"+$('#start').val()+" 00:00:00'"+" and "+"'"+$('#end').val()+" 23:59:59'";
		}else{
			var key = "0000-00-00 00:00:00 and "+date('Y-m-d')+" 23:59:59";
		}
		window.location.href = "?key="+key+"&adopt="+$("#adopt").val()+"&test="+$("#test_type").val();
	}
	
</script>