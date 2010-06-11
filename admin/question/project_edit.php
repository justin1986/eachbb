<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$id = $_REQUEST['id'];
	$project = new table_class('eb_problem');
	$project->find($id);
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
</head>
<body>
<div id=icaption>
	<div id=title>添加评测表</div>
	  <a href="project_list.php" id=btn_back></a>
</div>
<form id="project_edit" action="project.post.php" enctype="multipart/form-data" method="post">
<div id=itable>
 	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td align="center" width="15%">标题：</td>
			<td width="85%" align="left"><input type="text" name="post[name]" value="<?php echo $project->name;?>" class="required"></td>
		</tr> 
		<tr class="tr4">
			<td align="center" width="100">封面图片</td>
			<td align="left"><input name="image" id="image" type="file"><?php if($project->photo_url){?><a href="<?php echo $project->photo_url;?>" target="_blank">点击查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td align="center">介绍：</td>
			<td align="left"><?php show_fckeditor('post[description]','Admin',false,"120",$project->description);?></td>
		</tr>
		<!--  
		<tr class=tr3>
			<td>所属类别：</td>
			<td align="left" >
				<select  name="post[category_id]">
					<?php for($i=0;$i<$count;$i++){?>
					<option value="<?php echo $category_menu[$i]->id;?>" <?php if($category_menu[$i]->id==$record[0]->category_id){?>selected="selected"<?php }?> ><?php echo $category_menu[$i]->name;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr class="tr3">
			<td>开始时间</td>
			<td align="left" ><input type="text" name="post[start_time]" id="start"  class="date_jquery" value="<?php if(substr($record[0]->start_time,0,10)!='0000-00-00'){echo substr($record[0]->start_time,0,10);}?>" >若不填则发布就可参加
			</td>
		</tr>	
		<tr class="tr3">
			<td>结束时间</td>
			<td align="left" ><input type="text" name="post[end_time]" id="end"  class="date_jquery" value="<?php if(substr($record[0]->end_time,0,10)!='0000-00-00'){echo substr($record[0]->end_time,0,10);}?>">若不填则长期有效
			</td>
		</tr>	
		<tr class="tr3">
			<td>答题时限</td>
			<td align="left" ><input type="text" name="post[limit_time]" class="number" value="<?php echo $record[0]->limit_time;?>">若无时限则不需要输入/单位秒</td>
		</tr>		
		<tr class="tr3">
			<td>单题分值</td>
			<td align="left" ><input type="text" name="post[point]" class="number" value="<?php echo $record[0]->point;?>">若不输入则每题10分</td>
		</tr>	
		<tr class="tr3">
			<td>题目类型</td>
			<td align="left" >
				<select id="problemtype" name="post[type]">
					<option value="check" <?php if('check'==$record[0]->type){?>selected="selected"<?php }?> >选择题</option> 
					<option value="judge" <?php if('judge'==$record[0]->type){?>selected="selected"<?php }?> >是非题</option>
				</select>
			</td>
		</tr>		
		-->
		<tr class=btools>
			<td colspan="2"><input id="submit" type="submit" value="发布测评"></td>
		</tr>
	</table>
	<input type="hidden" name="id"  value="<?php echo $id;?>">
</div>
</form>
</body>
</html>

<script>
/* 
	$(".date_jquery").datepicker(
		{
			monthNames:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
			dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dayNamesMin:["日","一","二","三","四","五","六"],
			dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dateFormat: 'yy-mm-dd'
		}
	);
	*/
	//日历框函数
</script>