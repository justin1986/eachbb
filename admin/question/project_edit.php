<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$id = intval($_GET['id']);
	$project = new table_class('eb_problem');
	if($id){
		$project->find($id);
		$result = new table_class('eb_problem_result');
		$result = $result->find_by_problem_id($project->id);
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
		js_include_tag('../ckeditor/ckeditor.js');
		validate_form("project_edit");
	?>
	<style type="text/css">
		#tabs {font-size:20px;}
		#tabs span{float:left;margin-left:10px;}
	</style>	
</head>
<body>
<div id=icaption>
	<div id=title>编辑评测</div>
	  <a href="project_list.php" id=btn_back></a>
</div>
<form id="project_edit" action="project.post.php" enctype="multipart/form-data" method="post">
<div id=itable>
 	<table cellspacing="1" align="center">
		<tr class="tr4">
			<td align="center" width="15%">标题：</td>
			<td width="85%" align="left"><input type="text" name="post[name]" value="<?php echo $project->name;?>" class="required"></td>
		</tr> 
		<tr class="tr4">
			<td align="center" width="100">封面图片</td>
			<td align="left">
				<input name="image" id="image" type="file"><?php if($project->photo_url){?><a href="<?php echo $project->photo_url;?>" target="_blank">点击查看</a><?php }?>
			</td>
		</tr>
		<tr class="tr4">
			<td align="center" width="100">适用月龄</td>
			<td align="left">
				<input type="text" name="post[start_month]" value="<?php echo $project->start_month;?>" style="float:none; width:50px;" />-<input type="text" name="post[end_month]" value="<?php echo $project->end_month;?>"  style="float:none; width:50px;"/> 月 (<span style="color:blue">如果为某特定月，请填写相同月份，如1-1</span>) 
			</td>
		</tr>
		<?php if ($project->id){?>
		<tr class="tr4" id="result_tool">
			<td align="center" width="100">结果报表</td>
			<td align="left"><a href="/admin/question/problem_result.php?id=<?php echo $id;?>"><img id="img_edit_result" src="/images/admin/btn_edit.png" border=0 title="编辑" style="cursor:pointer;" /></a></td>
		</tr>
		<?php }?>
		<tr class=tr4>
			<td align="center">介绍：</td>
			<td align="left"><?php show_fckeditor('post[description]','Admin',false,"120",$project->description);?></td>
		</tr>
		<tr class=btools>
			<td colspan="2"><input id="submit" type="submit" value="发布测评"></td>
		</tr>
	</table>
	<input type="hidden" name="id" id="project_id"  value="<?php echo $id;?>">
</div>
</form>
</body>
</html>
