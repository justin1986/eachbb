<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	
	$key = $_REQUEST['key'];
	$is_adopt = $_REQUEST['adopt'];
	$age = intval($_GET['age']);
	$db = get_db();
	$sql = "select * from eb_teach where del_flag=0";
	if($key!=''){
		$sql .= " and title like '%$key%'";
	}
	if($is_adopt!=''){
		$sql .= " and is_adopt=$is_adopt";
	}
	if($age){
		$sql .= " and age=$age";
	}
	$sql .= " order by priority asc,create_time desc";
	$record = $db->paginate($sql,30);
	
	function each_age($age){
		switch ($age){
			case 1:echo "0~1岁";break;
			case 2:echo "1~2岁";break;
			case 3:echo "2~3岁";break;
			default: echo "未知";
		}
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>早教课程管理</div>
	<a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key?>">
		<select id=adopt style="width:100px">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
		</select>
		<select id=age style="width:100px">
					<option value="">年龄段</option>
					<option value="1" <? if($_REQUEST['age']=="1"){?>selected="selected"<? }?>>0～1岁</option>
					<option value="2" <? if($_REQUEST['age']=="2"){?>selected="selected"<? }?>>1～2岁</option>
					<option value="3" <? if($_REQUEST['age']=="3"){?>selected="selected"<? }?>>2～3岁</option>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="30%">课程名称</td><td width="20%">年龄段</td><td width="20%">创建时间</td><td width="30%">操作</td>
		</tr>
		<?php 
			!$record && $record = array();
			foreach($record as $teach){?>
		<tr class="tr3">
			<td><?php echo $teach->title;?></td>
			<td><? echo each_age($teach->age);?></td>
			<td><? echo substr($teach->create_time, 0, 10);?></td>
			<td>
				<?php if($teach->is_adopt=="1"){?><span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $teach->id;?>" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span><? }?>
				<?php if($teach->is_adopt=="0"){?><span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $teach->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span><? }?>
				<a href="edit.php?id=<?php echo $teach->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
				<a class="del_new" name="<?php echo $teach->id;?>" style="color:#ff0000; cursor:pointer;" title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
				<input type="text" class="priority"  name="<?php echo $teach->id;?>"  value="<?php if('100'!=$teach->priority){echo $teach->priority;};?>" style="width:20px;">
			</td>
		</tr>
		<?  }?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority>清空优先级</button>
				<button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="db_table" value="eb_teach">
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
	$("#adopt,#age").change(function(){
		search();
	});
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	function search(){
		window.location.href = "?key="+encodeURI($("#key").val())+"&adopt="+$("#adopt").val()+"&age="+$("#age").val();
	}
	
</script>