<?php
	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	$id = $_REQUEST['id'];
	$ad = new table_class($g_ad_database_name.'.ad');
	if($id!=''){
		$ad->find($id);
	}
	$db = get_ad_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>广告编辑</title>
	<?php
		css_include_tag('admin','colorbox');
		use_jquery_ui();
		js_include_tag('jquery.colorbox-min','admin/ad/ad_edit');
		validate_form("ad");
	?>
</head>
<body>
	<div id=icaption>
	    <div id=title><?php if($id){echo "修改广告";}else{echo "添加广告";}?></div>
		 <a href="channel.php" id=btn_back></a>
	</div>
	<form id="ad" action="ad_edit.post.php" enctype="multipart/form-data" method="post"> 
	<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width="15%">广告名</td><td width="85%"><input type="text" name="ad[name]" class="required" value="<?php echo $ad->name;?>" ></td>
		</tr>
		<tr class=tr4>
			<td class=td1>宽度</td>
			<td align="left">
				<input type="text" name="ad[width]" class="required" value="<?php echo intval($ad->width);?>" >
			</td>
		</tr>	
		<tr class=tr4>
			<td class=td1>高度</td>
			<td align="left">
				<input type="text" name="ad[height]" class="required" value="<?php echo intval($ad->height);?>" >
			</td>
		</tr>	
		
		<tr class=tr4 id=target_url>
			<td class=td1>跳转链接</td><td align="left"><input type="text" size="50" name="ad[target_url]" value="<?php echo $ad->target_url;?>"></td>
		</tr>
		<tr class=tr4 id=target_url>
			<td class=td1>广告类型</td>
			<td align="left">
				<select name="ad[ad_type]" id="select_type">
					<option value='image'>图片</option>
					<option value='video'>视频</option>
					<option value='flash'>flash</option>
				</select>
				<script>
					$(function(){
						$("#select_type").val("<?php echo $ad->ad_type;?>")
					});	
				</script>
			</td>
		</tr>
		<tr class=tr4 id="">
			<td class=td1>广告资源</td>
			<td align="left">
				<input type="file" type="text" size="50" name="ad[resource]">
				<?php 
					if($ad->resource){
						echo "<a href='show_resource.php?ad_id={$ad->id}' target='_blank'>查看</a>";
					}
				?>
			</td>
		</tr>
		
		<tr class="tr4 ad_upload" id="ad_image" style="display:none;">
			<td class=td1>上传图片</td>
			<td align="left">
				<input type="file" name="image" style="width:250px;"><?php if($ad->image!=''){?><a class="color" title="图片展示" href="<?php echo $ad->image;?>">点击查看</a><?php }?>
			</td>
		</tr>
		<tr class="tr4 ad_upload" id="ad_video" style="display:none;">
			<td class=td1>上传视频</td>
			<td align="left">
				<input type="file" name="video" style="width:250px;"><?php if($ad->video!=''){?><a class="color" title="视频展示" href="/admin/show/show_video.php?id=<?php echo $id;?>&table=eachbb_ad.eb_ad">点击查看</a><?php }?>
			</td>
		</tr>
		<tr class="tr4 ad_upload" id="ad_flash" style="display:none;">
			<td class=td1>上传FLASH</td>
			<td align="left">
				<input type="file" name="flash" style="width:250px;"><?php if($ad->flash!=''){?><a class="color" title="flash展示" href="/admin/show/show_flash.php?id=<?php echo $id;?>&table=eachbb_ad.eb_ad">点击查看</a><?php }?>
			</td>
		</tr>
		<tr class="tr4">
			<td class=td1>简短描述</td>
			<td>
				<textarea name="ad[description]"><?php echo $ad->description;?></textarea>
			</td>
		</tr>				
		<tr class="btools">
			<td colspan="10" align="center"><input id="submit" type="submit" value="发布广告"></td>
		</tr>			
	</table>
	</div>
	</form>
</body>
</html>