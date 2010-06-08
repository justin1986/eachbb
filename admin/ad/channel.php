<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/menu_list');
	?>
</head>
<body>
<div id=icaption>
    <div id=title>广告频道管理</div>
</div>
<!--
<div id=isearch>
		<input id="key" type="text" value="<? echo $_REQUEST['title']?>"><span id="span_category"></span>
		<input type="button" value="搜索" id="search_button">
</div>
-->
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="30%">名称</td><td width="25%">频道目录</td><td width="25%">广告尺寸</td><td width="20%">操作</td>
		</tr>
		<?php
			$db = get_db();
			$channel = $db->query("select * from forbes_ad.fb_channel");
			$count = $db->record_count;
			$banner = $db->query("select t1.channel_id,t2.name,t2.ad_size,t2.id from forbes_ad.fb_channel_banner t1 join forbes_ad.fb_banner t2 on t1.banner_id=t2.id");
			$b_count = $db->record_count;
			for($i=0;$i<$count;$i++){
		?>
		<tr class=tr3 id="<?php echo $channel[$i]->id;?>">
			<td><img class="img_plus" style="cursor:pointer" name="<?php echo $channel[$i]->name;?>" src="/images/admin/plus.gif"><?php echo $channel[$i]->name;?></td>
			<td><?php echo $channel[$i]->parttern?></td>
			<td></td>
			<td></td>
		</tr>
		<?php
		for($j=0;$j<$b_count;$j++){
			if($banner[$j]->channel_id==$channel[$i]->id){
		?>
		<tr class="tr3" style="display:none;"  name="<?php echo $channel[$i]->name;?>">
			<td class="sub_menu"><li style="color:#0000ff;"><?php echo $banner[$j]->name;?></li></td>
			<td><?php echo $channel[$i]->parttern?></td>
			<td><?php echo $banner[$j]->ad_size;?></td>
			<td>
				<a href="ad_edit.php?cid=<?php echo $channel[$i]->id;?>&bid=<?php echo $banner[$j]->id;?>" title="添加广告"><img src="/images/admin/btn_add.png" border="0"></a>
				<a href="ad_list.php?cid=<?php echo $channel[$i]->id;?>&bid=<?php echo $banner[$j]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="广告列表"><img src="/images/admin/btn_edit.png" border="0"></a>
			</td>
		</tr>
		<?php }}}?>
		<input type="hidden" id="db_table" value="forbes_ad.fb_channel">	
	</table>
</body>
</html>
