<?php
	session_start();
	include_once('../../frame.php');
	$role = judge_role();
	$id = $_REQUEST['id'];
	if($id!=''){
		$ad = new table_class('forbes_ad.fb_ad');
		$ad->find($id);
	}
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
			<td class=td1>广告代码</td><td align="left"><input type="text" name="ad[code]" class="required" value="<?php echo $ad->code;?>" ></td>
		</tr>	
		<tr class=tr4 id=target_url>
			<td class=td1>跳转链接</td><td align="left"><input type="text" size="50" name="ad[target_url]" value="<?php echo $ad->target_url;?>"></td>
		</tr>
		<tr class=tr4 id=target_url>
			<td class=td1>广告类型</td>
			<td align="left">
				<select name="ad[ad_type]" id="select_upload"><option value=''></option><option value='video'>视频</option><option value='flash'>flash</option><option value='image'>图片</option></select>
			</td>
		</tr>
		<?php if($id){?>
		<script>
			$(function(){
				$("#select_upload").val("<?php echo $ad->ad_type;?>")
				$("#ad_<?php echo $ad->ad_type;?>").show();
				$("#start_hour").val("<?php echo $ad->start_hour;?>");
				$("#end_hour").val("<?php echo $ad->end_hour;?>");
			});	
		</script>
		<?php }?>
		<tr class="tr4 ad_upload" id="ad_image" style="display:none;">
			<td class=td1>上传图片</td>
			<td align="left">
				<input type="file" name="image" style="width:250px;"><?php if($ad->image!=''){?><a class="color" title="图片展示" href="<?php echo $ad->image;?>">点击查看</a><?php }?>
			</td>
		</tr>
		<tr class="tr4 ad_upload" id="ad_video" style="display:none;">
			<td class=td1>上传视频</td>
			<td align="left">
				<input type="file" name="video" style="width:250px;"><?php if($ad->video!=''){?><a class="color" title="视频展示" href="/admin/show/show_video.php?id=<?php echo $id;?>&table=forbes_ad.fb_ad">点击查看</a><?php }?>
			</td>
		</tr>
		<tr class="tr4 ad_upload" id="ad_flash" style="display:none;">
			<td class=td1>上传FLASH</td>
			<td align="left">
				<input type="file" name="flash" style="width:250px;"><?php if($ad->flash!=''){?><a class="color" title="flash展示" href="/admin/show/show_flash.php?id=<?php echo $id;?>&table=forbes_ad.fb_ad">点击查看</a><?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>定期播放</td><td><input type="text" size="20" class="date_jquery" value="<?php echo $ad->start_date;?>" name=ad[start_date]><div>－</div><input type="text" class="date_jquery" size="20" value="<?php echo $ad->end_date;?>" name=ad[end_date]></td>

		</tr>
		<tr class=tr4>
			<td class=td1>定时播放</td><td><select name=ad[start_hour] id="start_hour" value="<?php echo $ad->start_hour;?>"><option value='0'></option><?php for($i=0;$i<25;$i++){?><option value='<?php echo $i;?>'><?php echo $i;?>时</option><?php }?></select><div>－</div><select name=ad[end_hour] id="end_hour"><option value='24'></option><?php for($i=0;$i<25;$i++){?><option value='<?php echo $i;?>'><?php echo $i;?>时</option><?php }?></select></td>
		</tr>
		<tr class=tr4>
			<td class=td1>千次展示</td><td><input type="text" size="50" name=ad[show_price] value="<?php echo $ad->show_price;?>">(元)</td>
		</tr>	
		
		<tr class=tr4>
			<td class=td1>千次点击</td><td><input type="text" size="50" name=ad[click_price] value="<?php echo $ad->click_price;?>">(元)</td>
		</tr>	
				
		<tr class=tr4>
			<td class=td1>千次弹框</td><td><input type="text" size="50" name=ad[pop_price] value="<?php echo $ad->pop_price;?>">(元)</td>
		</tr>			
		<tr class="tr4">
			<td class=td1>简短描述</td>
			<td>
				<textarea name="ad[description]"><?php echo $ad->description;?></textarea>
			</td>
		</tr>				
		<tr class="btools">
			<td colspan="10" align="center"><input id="submit" type="submit" value="发布广告"></td>
			<input type="hidden" name="id"  value="<?php echo $id;?>">
			<input type="hidden" name="ad[channel_id]"  value="<?php echo $_GET['cid'];?>">
			<input type="hidden" name="ad[banner_id]"  value="<?php echo $_GET['bid'];?>">
			<input type="hidden" name="url"  value="<?php echo $_GET['url'];?>">
		</tr>			
	</table>
	</div>
	</form>
</body>
</html>