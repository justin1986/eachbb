<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	$key = $_REQUEST['key'];
	$is_adopt = $_REQUEST['adopt'];
	$db = get_db();
	$sql = "select * from eb_problem where 1=1";
	if($key!=''){
		$sql .= " and name like '%$key%'";
	}
	if($is_adopt!=''){
		$sql .= " and is_adopt=$is_adopt";
	}
	$sql .= " order by priority asc,create_time desc";
	$record = $db->paginate($sql,30);
	$count_record = $db->record_count;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>SMG</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>评测管理</div>
	<a href="project_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key?>">
		<select id=adopt style="width:100px">
					<option value="">发布状况</option>
					<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
					<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable> 
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="50%">测评名称</td><td width="20%">创建时间</td><td width="30%">操作</td>
		</tr>
		<? for($i=0;$i<$count_record;$i++){?>
		<tr class="tr3" id="<?php echo $record[$i]->id;?>">
			<td><a href="/test/test.php?id=<?php echo $record[$i]->id;?>" target="_blank"><?php echo $record[$i]->name;?></a></td>
			<td><? echo substr($record[$i]->create_time, 0, 10);?></td>
			<td>
				<a href="question_edit.php?pid=<?php echo $record[$i]->id;?>" title="添加题目"><img src="/images/admin/btn_add.png" border="0"></a>
				<a href="question_list.php?id=<?php echo $record[$i]->id;?>" title="查看题目"><img src="/images/admin/btn_item.png" border="0"></a>
				<?php if($record[$i]->is_adopt=="1"){?><span style="color:#FF0000;cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span><? }?>
				<?php if($record[$i]->is_adopt=="0"){?><span style="color:#0000FF;cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span><? }?>
				<a href="project_edit.php?id=<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
				<a class="del_project" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer;" title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
				<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:20px;">
			</td>
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
	$(".del_project").click(function(){
		if(!window.confirm("确定要删除吗"))
			{
				return false;
			}
			else
			{
				$.post("project.post.php",{'del_id':$(this).attr('name'),'post_type':'del'},function(data){
				});
				$(this).parent().parent().remove();
			}
	});
	
	$("#search_button").click(function(){
		search();
	});
	$("#adopt").change(function(){
		search();
	});
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	function search(){
		window.location.href = "?key="+encodeURI($("#key").val())+"&adopt="+$("#adopt").val();
	}
	
</script>