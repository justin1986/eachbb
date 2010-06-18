<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$key = $_REQUEST['key'];
	$project_id=$_REQUEST['id'];
	$valid_types = array('dadongzuo','jingxidongzuo','yuyan','renshi','shehuihuodong');
	$question_type = in_array($_GET['question_type'],$valid_types) ? $_GET['question_type'] : $valid_types[0];
	
	$sql = "select * from eb_question where problem_id=$project_id and question_type='{$question_type}'";
	if($key){
		$sql .= " and title like '%$key%'";
	}
	$db = get_db();
	$record = $db->paginate($sql,30);
	$count = $db->record_count;
	
	$project = new table_class('eb_problem');
	$project->find($project_id);
	$project_name = $project->name;
	
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
		js_include_tag('admin/question/question_list');
	?>
</head>
<style type="text/css">
	#tabs {font-size:20px;}
	#tabs span{float:left;margin-left:10px;}
</style>
<body>
<div id=icaption>
    <div id=title>测评题目管理：<?php echo $project_name?></div>
	<a href="question_edit.php?pid=<?php echo $project_id;?>" id=btn_add></a>
	<a href="project_list.php" id=btn_back></a>
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
<div id="tabs">
	<span><a href="question_list.php?question_type=dadongzuo&id=<?php echo $project_id?>" id="dadongzuo" class="a_tab">大动作</a></span>
	<span><a href="question_list.php?question_type=jingxidongzuo&id=<?php echo $project_id?>" id="jingxidongzuo" class="a_tab">精细动作</a></span>
	<span><a href="question_list.php?question_type=yuyan&id=<?php echo $project_id?>" id="yuyan" class="a_tab">语言</a></span>
	<span><a href="question_list.php?question_type=renshi&id=<?php echo $project_id?>" id="renshi" class="a_tab">认识</a></span>
	<span><a href="question_list.php?question_type=shehuihuodong&id=<?php echo $project_id?>" id="shehuihuodong" class="a_tab">社会活动和行为规范</a></span>
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="50%">问题名称</td><td width="20%">创建时间</td><td width="30%">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><a href="<?php echo "/admin/question/_question_edit.php?problem_id={$record[$i]->problem_id}&question_id={$record[$i]->id}";?>" class="a_edit_question"><?php echo $record[$i]->title;?></a></td>
			<td><?php echo substr($record[$i]->create_time,0,10);?></td>
			<td>
				<a href="<?php echo "/admin/question/_question_edit.php?problem_id={$record[$i]->problem_id}&question_id={$record[$i]->id}";?>" title="编辑" class="a_edit_question"><img src="/images/admin/btn_edit.png" border="0"></a>
				<a class="del" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer;" title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
			</td>
		</tr>
		<?  }?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<input type="hidden" id="hidden_question_type" value="<?php echo $question_type;?>" />
				<input type="hidden" id="hidden_project_id" value="<?php echo $project_id;?>" />
			</td>
		</tr>
	</table>
</div>
<script>
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
			{
				return false;
			}
			else
			{
				$.post("question.post.php",{'del_id':$(this).attr('name'),'post_type':'del'},function(data){
				});
				$(this).parent().parent().remove();
			}
	});
	
	$("#search_button").click(function(){
		search();
	});
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	function search(){
		window.location.href = "?key="+encodeURI($("#key").val());
	}
</script>
</body>
</html>
