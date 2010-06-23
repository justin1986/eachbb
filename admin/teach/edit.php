<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$id = $_GET['id'];
	$teach = new table_class('eb_teach');
	$teach->find($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>smg</title>
	<?php
		css_include_tag('admin','colorbox');
		use_jquery();
		js_include_tag('../ckeditor/ckeditor','jquery.colorbox-min');
		validate_form("teach");
	?>
</head>
<body>
<div id=icaption>
	<div id=title>早教课程编辑</div>
	  <a href="index.php" id=btn_back></a>
</div>
<form id="teach" action="edit.post.php" enctype="multipart/form-data" method="post">
<div id=itable>
 	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td align="center" width="15%">标题</td>
			<td width="85%" align="left"><input type="text" name="post[title]" value="<?php echo $teach->title;?>" class="required"></td>
		</tr> 
		<tr class="tr4">
			<td align="center">封面图片</td>
			<td align="left"><input name="image" type="file"><?php if($teach->img_url){?><a href="<?php echo $teach->img_url;?>" target="_blank">点击查看</a><?php }?></td>
		</tr>
		<tr class="tr4">
			<td align="center">flash</td>
			<td align="left"><input name="flash" type="file"><?php if($teach->content){?><a id="flash" href="/admin/show/show_flash.php?flash=<?php echo $teach->content;?>" target="_blank">点击查看</a><?php }?></td>
		</tr>
		<tr class="tr4">
			<td align="center">年龄段</td>
			<td align="left">
				<select name="post[age]">
					<option <?php if($teach->age==1)echo 'selected = "selected"';?> value=1>0～1岁</option>
					<option <?php if($teach->age==2)echo 'selected = "selected"';?> value=2>1～2岁</option>
					<option <?php if($teach->age==3)echo 'selected = "selected"';?> value=3>2～3岁</option>
				</select>
			</td>
		</tr>
		<tr class=tr4>
			<td align="center" width="15%">优先级</td>
			<td width="85%" align="left"><input type="text" name="post[priority]" value="<?php if($teach->priority!=100) echo $teach->priority;?>" class="number"></td>
		</tr>
		<tr class=tr4>
			<td align="center">介绍：</td>
			<td align="left"><?php show_fckeditor('post[description]','Admin',false,"120",$teach->description);?></td>
		</tr>
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
$(function(){
	$("#flash").click(function(e){
		e.preventDefault();
		parent.$.fn.colorbox({
			href: $(this).attr('href')
		});
	});
});
</script>
