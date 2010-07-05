<?php
	session_start();
	require_once('../../frame.php');
	judge_role();
	$id = $_GET['id'];
	$teach = new table_class('eb_teach');
	$teach->find($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>eachbb</title>
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
		<tr class="tr4">
			<td align="center">适龄月份</td>
			<td align="left">
				<select name="post[month]">
					<option <?php if($teach->month==1)echo 'selected = "selected"';?> value=1>1月</option>
					<option <?php if($teach->month==2)echo 'selected = "selected"';?> value=2>2月</option>
					<option <?php if($teach->month==3)echo 'selected = "selected"';?> value=3>3月</option>
					<option <?php if($teach->month==4)echo 'selected = "selected"';?> value=4>4月</option>
					<option <?php if($teach->month==5)echo 'selected = "selected"';?> value=5>5月</option>
					<option <?php if($teach->month==6)echo 'selected = "selected"';?> value=6>6月</option>
					<option <?php if($teach->month==7)echo 'selected = "selected"';?> value=7>7月</option>
					<option <?php if($teach->month==8)echo 'selected = "selected"';?> value=8>8月</option>
					<option <?php if($teach->month==9)echo 'selected = "selected"';?> value=9>9月</option>
					<option <?php if($teach->month==10)echo 'selected = "selected"';?> value=10>10月</option>
					<option <?php if($teach->month==11)echo 'selected = "selected"';?> value=11>11月</option>
					<option <?php if($teach->month==12)echo 'selected = "selected"';?> value=12>12月</option>
				</select>
			</td>
		</tr>
		<tr class=tr4>
			<td align="center" width="15%">优先级</td>
			<td width="85%" align="left"><input type="text" name="post[priority]" value="<?php if($teach->priority!=100) echo $teach->priority;?>" class="number"></td>
		</tr>
		<tr class=tr4>
			<td align="center" width="15%">成长关键词</td>
			<td width="85%" align="left"><input type="text" name="post[keyword]" value="<?php echo $teach->keyword;?>"></td>
		</tr> 
		<tr class=tr4>
			<td align="center">介绍：</td>
			<td align="left"><?php show_fckeditor('post[description]','Admin',false,"120",$teach->description);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝关键期教育：</td>
			<td align="left"><?php show_fckeditor('post[key_teach]','Admin',false,"120",$teach->key_teach);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝大运动：</td>
			<td align="left"><?php show_fckeditor('post[big_action]','Admin',false,"120",$teach->big_action);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝精细动作：</td>
			<td align="left"><?php show_fckeditor('post[detail_action]','Admin',false,"120",$teach->detail_action);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝认知：</td>
			<td align="left"><?php show_fckeditor('post[knowledge]','Admin',false,"120",$teach->knowledge);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝语言：</td>
			<td align="left"><?php show_fckeditor('post[language]','Admin',false,"120",$teach->language);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝音乐欣赏：</td>
			<td align="left"><?php show_fckeditor('post[music]','Admin',false,"120",$teach->music);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝社会行为：</td>
			<td align="left"><?php show_fckeditor('post[social_behavior]','Admin',false,"120",$teach->social_behavior);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝图书欣赏和推荐：</td>
			<td align="left"><?php show_fckeditor('post[book]','Admin',false,"120",$teach->book);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">宝宝玩具推荐：</td>
			<td align="left"><?php show_fckeditor('post[toy]','Admin',false,"120",$teach->toy);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">妈妈温馨反馈：</td>
			<td align="left"><?php show_fckeditor('post[recommand_comment]','Admin',false,"120",$teach->recommand_comment);?></td>
		</tr>
		<tr class=btools>
			<td colspan="2"><input id="submit" type="submit" value="发布测评"></td>
		</tr>
	</table>
	<input type="hidden" name="id"  value="<?php echo $id;?>">
</div>
</form>
</body>

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
</html>
