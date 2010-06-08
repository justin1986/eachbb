<?php
	include_once('../../frame.php');
	
	$id = intval($_GET['id']);
	$vote = new table_class('fb_vote');
	$vote->find($id);
	$db = get_db();
	$item = $db->query("select * from fb_vote_item where vote_id=$id");
	$item_count = $db->record_count;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
<?php 
	css_include_tag('admin2','thickbox','jquery_ui');
	use_jquery_ui();
	js_include_tag('admin/vote/vote','thickbox','../ckeditor/ckeditor.js');
	validate_form("vote_form");
?>
</head>

<body>
<div id=icaption>
	<div id=title>添加调查表</div>
	  <a href="index.php" id=btn_back></a>
</div>
<form id="vote_form" method="post" enctype="multipart/form-data" action="vote.post.php">
	<div id=itable>
 	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td align="center" width="15%">标题：</td>
			<td width="85%" align="left"><input type="text" class="required" name="vote[name]" value="<?php echo $vote->name;?>"></td>
		</tr>
		<tr class=tr4>
			<td align="center">描述：</td>
			<td align="left"><?php show_fckeditor('vote[description]','Admin',false,"120",$vote->description);?></td>
		</tr>
		<tr class=tr4>
			<td align="center">添加图片：</td>
			<td align="left">
				<input name="image" type="file">
				<?php if(null!=$vote->photo_url){?><a href="<?php echo $vote->photo_url;?>" target="_blank">点击查看</a><?php }?>
			</td>
		</tr>
		<!--
		<tr class=tr4>
			<td>所属类别：</td>
			<td align="left">
				<select  name="vote[category_id]">
					<?php for($i=0;$i<$count;$i++){?>
					<option value="<?php echo $category_menu[$i]->id;?>"><?php echo $category_menu[$i]->name;?></option>
					<?php }?>
				</select>
			</td>
		</tr>-->
		<tr class=tr4>
			<td align="center">调查表类型：</td>
			<td align="left">
				<select id=select_vote_type name="vote[vote_type]">
					<option <?php if("word_vote"==$vote->vote_type){?>selected="selected"<?php }?> value="word_vote">文字调查表</option>
					<option <?php if("image_vote"==$vote->vote_type){?>selected="selected"<?php }?> value="image_vote">图片调查表</option>
					<option <?php if("more_vote"==$vote->vote_type){?>selected="selected"<?php }?> value="more_vote">复合调查表</option>
				</select>切换调查表类型会使已添加的选项或者调查表消失
			</td>
		</tr>
		<tr class=tr4>
			<td align="center">是否需要登录：</td>
			<td align="left">
				<select id=select_limit_type name="vote[limit_type]">
					<option <?php if("no_limit"==$vote->limit_type){?>selected="selected"<?php }?> value="no_limit">不需要登录</option>
					<option <?php if("user_id"==$vote->limit_type){?>selected="selected"<?php }?> value="user_id">需要登录</option>
				</select>
			</td>
		</tr>
		<tr class=tr4>
			<td align="center">调查表次数限制：</td>
			<td align="left"><input type="text" name="vote[max_vote_count]" class="number" value="<?php if($vote->max_vote_count!=0)echo $vote->max_vote_count?>">如果不填则无限制</td>
		</tr>
		<tr class=tr4>
			<td align="center">调查表选项限制：</td>
			<td align="left"><input type="text" name="vote[max_item_count]" class="number" value="<?php if($vote->max_item_count!=0)echo $vote->max_item_count?>">如果不填则无限制,如果前台页面想采用单选框请在此处填1</td>
		</tr>
		<tr class=tr4>
			<td align="center">开始日期：</td>
			<td align="left"><input type="text" class="date_jquery" name="started_at" value="<?php echo $vote->started_at?>"></td>
		</tr>
		<tr class=tr4>
			<td align="center">截止日期：</td>
			<td align="left"><input type="text"  class="date_jquery" name="ended_at" value="<?php echo $vote->ended_at?>"></td>
		</tr>
		<?php if($vote->vote_type!="more_vote"){?>
			<?php for($k=0;$k<$item_count;$k++){?>
				<tr class=tr4>
					<td align="center">调查表项目：</td>
					<td align="left">
						<input type="text" name="old_item[title][]" style="width:300px;" class="required" value="<?php echo $item[$k]->title;?>">
						<?php if("image_vote"==$vote->vote_type&&null!=$item[$k]->photo_url){?><a href="<?php echo $item[$k]->photo_url;?>" target="_blank">点击查看</a><?php }?>
						<input name="old_item[]"  class="item_image"  type="file" <?php if("image_vote"!=$vote->vote_type){?>style="display:none;"<?php }?>>
						<input type="hidden" name="old_item[id][]" value="<?php echo $item[$k]->id;?>">
						<a class='del_old_item' name="<?php echo $item[$k]->id;?>" style='cursor:pointer;' title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
					</td>
				</tr>
			<?php }?>
		<?php }?>
		<tr class=tr4 id="item">
			<td align="center">调查表项目：</td>
			<td align="left" id="single" <?php if($vote->vote_type=="more_vote"){?>style="display:none;"<?php }?>>
				<input type="text" name="vote_item[title][]" style="width:300px">
				<input type="file" name="vote_item[]" class="item_image" style="display:none;">
				<a id="add_item" style="cursor:pointer;" title="继续添加"><img src="/images/admin/btn_add.png" border="0"></a>
			</td>
			<td align="left" <?php if($vote->vote_type!="more_vote"){?>style="display:none;"<?php }?> id="many">
					<a  href="vote_add.ajax.php?KeepThis=true&TB_iframe=true&height=600&width=560" class="thickbox" id="add_sub_vote" title="添加子调查表"><img src="/images/admin/btn_add.png" border="0"></a>
			</td>
		</tr>
		<?php if($vote->vote_type=="more_vote"){?>
			<?php for($k=0;$k<$item_count;$k++){?>
			<tr class=tr4>
				<td align="center">调查表项目：</td>
				<td align="left">
					<div style="width:300px;" name="<?php echo $item[$k]->sub_vote_id;?>"><?php echo $item[$k]->title;?></div>　　<input type="hidden" name="old_vote_vote[title][]" value="<?php echo $item[$k]->title;?>"><input type="hidden" name="old_vote_vote[id][]" value="<?php echo $item[$k]->id;?>"><a class="thickbox" href="vote_add.ajax.php?id=<?php echo $item[$k]->sub_vote_id;?>&KeepThis=true&TB_iframe=true&height=600&width=560" title="点击查看"><img src="/images/admin/btn_edit.png" border="0"></a><a class="del_old_vote" name="<?php echo $item[$k]->sub_vote_id;?>" style="cursor:pointer;margin-left:50px" title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
				</td>
			</tr>
			<?php }?>
		<?php }?>
		<tr class="tr4" id="file">
			<td align="center">资料上传：</td>
			<td align="left">
			<input type="file" name="vote_fils[]">
			<a id="add_file" style="cursor:pointer;" title="继续添加"><img src="/images/admin/btn_add.png" border="0"></a>
			</td>
		</tr>
		<?php
			if($vote->file_url){
				$files = explode(',',$vote->file_url);
			foreach($files as $k){
		?>
		<tr class="tr4">
			<td align="center">资料上传：</td>
			<td align="left">
			<input type="file" name="old_fils[]">
			<a class='del_file' style='cursor:pointer;' title='删除'><img src='/images/admin/btn_delete.png' border='0'></a>
			<a href="<?php echo $k;?>" target="_blank">点击下载</a>
			<input type="hidden" name="old_fils_info[]" value="<?php echo $k;?>">
			</td>
		</tr>
		<?php 
			}}
		?>
		<tr class=btools>
			<td colspan="10" align="center">
				<input id="save" type="button" value="发布调查表">
				<input type="hidden" name="vote[is_sub_vote]" value="0">
				<input type="hidden" name="vote_id" value="<?php echo $id;?>">
			</td>
		</tr>
 	</table>
	</div>
 </form>
</body>
</html>