<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>网趣宝贝</title>
	<?php
		include_once dirname(__FILE__) ."/../../frame.php";
		include_once dirname(__FILE__) ."/../../lib/page_pos.class.php";
		use_jquery_ui();
		js_include_tag('jquery.colorbox-min','admin/page_pos/edit');
		css_include_tag('jquery_ui','admin');
		$pos = new table_class('eb_page_pos');
		$pos->find('first',array('conditions'=>"page='{$_GET['page']}' and name='{$_GET['pos_name']}'"));
		$fields['default']=array("标题","描述","链接","静态链接","图片一","图片二","备用字段","备用字段2");
		$fields['link_d_i']=array("标题","描述","链接","","图片","","","");
		$names = array_key_exists($_GET['name'],$fields) ?  $fields[$_GET['name']] : $fields['default'];
	?>
</head>
<body>
<div id=pos_caption>
  <div id=title>位置管理</div>
</div>
<div id=pos_table>
	<form method="post"  enctype="multipart/form-data" action="edit.post.php">
	<table cellspacing="1" align="center">
		<tr class=tr4 <?php if(!$names[0]) echo 'style="display:none;"';?>>
			<td class=td1 width="15%"><?php echo $names[0]?></td>
			<td width="85%"><input type="text" name="pos[title]" value="<?php echo $pos->title; ?>"></td>
		</tr>
		<tr class="tr4" <?php if(!$names[1]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[1]?></td>
			<td><textarea name="pos[description]"><?php echo $pos->description;?></textarea></td>
		</tr>
		<tr class=tr4 <?php if(!$names[2]) echo 'style="di	splay:none;"';?>>
			<td class=td1><?php echo $names[2]?></td>
			<td><input type="text" name="pos[href]" value="<?php echo $pos->href;?>"></input></td>
		</tr>
		<tr class=tr4 <?php if(!$names[3]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[3]?></td>
			<td><input type="text" name="pos[static_href]" value="<?php echo $pos->static_href;?>"></input></td>
		</tr>
		<tr class=tr4 <?php if(!$names[4]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[4]?></td>
			<td><input type="file" name="pos[image1]"></input> <?php if($pos->image1) echo "<a href='{$pos->image1}'>查看</a>"?></td>
		</tr>
		<tr class=tr4 <?php if(!$names[5]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[5]?></td>
			<td><input type="file" name="pos[image2]"></input> <?php if($pos->image2) echo "<a href='{$pos->image2}'>查看</a>"?></td>
		</tr>
		<tr class=tr4 <?php if(!$names[6]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[6]?></td>
			<td><input name="pos[reserve1]" value="<?php echo $pos->reserve1;?>"></input></td>
		</tr>		
		<tr class=tr4 <?php if(!$names[7]) echo 'style="display:none;"';?>>
			<td class=td1><?php echo $names[7]?></td>
			<td><textarea name="pos[reserve2]"><?php echo $pos->reserve2;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10" align="center">
				<input type="submit" value="保存"></input>
				<input type="button" id="btn_cancel" value="取消" />
				<input type="hidden" name="pos[name]" value="<?php echo $_GET['pos_name'];?>" />
				<input type="hidden" name="pos[page]" value="<?php echo $_GET['page'];?>" />
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>