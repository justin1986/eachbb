<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$id = intval($_GET['id']);
	$project = new table_class('eb_problem');
	$type=$_GET['type'] ? $_GET['type'] : 'dadongzuo';
	if($id){
		$project->find($id);
		$result = new table_class('eb_problem_result');
		$result = $result->find('all',array('conditions' => "problem_id={$project->id} and result_type='{$type}'"));
		$results = $result ? $result : array();	
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
	<?php
		css_include_tag('admin','jquery_ui');
		use_jquery_ui();
		js_include_tag('../ckeditor/ckeditor.js','admin/question/problem_result');
		validate_form("project_edit");
	?>
	<style type="text/css">
		#tabs {font-size:20px;}
		#tabs span{float:left;margin-left:10px;}
		ul{list-style-type: none;}
		ul li{margin-left:10px;}
		.delete_recommand,.edit_recommand{color:blue; cursor: pointer;}
	</style>	
</head>
<body>
<div id=icaption>
	<div id=title>评测报表管理</div>
	  <a href="project_edit.php?id=<?php echo $id;?>" id="btn_back"></a>
	  <a href="#" id="btn_add"></a>
</div>
<div id="tabs">
	<span><a href="problem_result.php?type=dadongzuo&id=<?php echo $project->id?>" id="dadongzuo" class="a_tab">大动作</a></span>
	<span><a href="problem_result.php?type=jingxidongzuo&id=<?php echo $project->id?>" id="jingxidongzuo" class="a_tab">精细动作</a></span>
	<span><a href="problem_result.php?type=yuyan&id=<?php echo $project->id?>" id="yuyan" class="a_tab">语言</a></span>
	<span><a href="problem_result.php?type=renshi&id=<?php echo $project->id?>" id="renshi" class="a_tab">认识</a></span>
	<span><a href="problem_result.php?type=shehuihuodong&id=<?php echo $project->id?>" id="shehuihuodong" class="a_tab">社会活动和行为规范</a></span>
</div>
<form id="project_edit" action="project.post.php" enctype="multipart/form-data" method="post">
<div id=itable>
 	<table cellspacing="1" align="center">
		<?php 
			!$results && $results = array();
			foreach ($results as $result){
				include '_problem_result.php';
			}
		?>
		<tr class=btools>
			<td colspan="2"><input id="submit" type="submit" value="提　　交"></td>
		</tr>
	</table>
	<input type="hidden" name="id" id="project_id"  value="<?php echo $id;?>">
	<input type="hidden" name="type" id="hidden_type" value="<?php echo $type;?>" />
</div>
</form>
</body>
</html>
