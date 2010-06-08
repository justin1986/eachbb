<?php 
		include_once('../../frame.php');
		$id = $_REQUEST['id'];
		if(isset($_REQUEST['id'])){
			$vote = new table_class('fb_vote');
			$vote->find($id);
			$db = get_db();
			$vote_item_record = $db->query("select * from fb_vote_item where vote_id=$id");
			$item_count = $db->record_count;
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php
		css_include_tag('admin');
		use_jquery_ui();
		js_include_tag('admin_pub');
		validate_form("sub_vote_form");
	?>
</head>
	
<body>
<form id="sub_vote_form" method="post" enctype="multipart/form-data" action="ajax.post.php">
<div id=icaption style="width:550px;">
	<div id=title style="width:500px;">添加调查表</div>
</div>
<div id=itable style="width:570px;">
 <table style="width:570px;" border="0" id="sub_table">  
		<tr class=tr4>
			<td width="30%" align="center">标题：</td>
			<td width="70%"><input type="text" name="vote[name]" value="<?php echo $vote->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td align="center">描述：</td>
			<td><input type="text" name="vote[description]" value="<?php echo $vote->description;?>"></td>
		</tr>
		<tr class=tr4>
			<td align="center">添加图片：</td>
			<td><input name="image"  type="file"><?php if(null!=$vote->photo_url){?><a href="<?php echo $vote->photo_url;?>" target="_blank">点击查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td align="center">调查表类型：</td>
			<td align="left">
				<select  id="vote_type" name="vote[vote_type]">
					<option value="word_vote" <?php if("word_vote"==$vote->vote_type){?>selected="selected"<?php }?>>文字调查表</option>
					<option value="image_vote" <?php if("image_vote"==$vote->vote_type){?>selected="selected"<?php }?>>图片调查表</option>
				</select>
			</td>
		</tr>
		<tr class=tr4>
			<td align="center">调查表选项限制：</td>
			<td><input type="hidden" name="vote[max_vote_count]" value="0"><input type="text" class="number"  name="vote[max_item_count]" value="<?php echo $vote->max_item_count;;?>"></td>
		</tr>
		<?php if(null!=$id){?>
			<?php for($k=0;$k<$item_count;$k++){?>
				<tr class=tr4>
					<td align="center">调查表项目：</td>
					<td align="left">
						<input type="text" name="old_item[title][]" style="width:300px;" class="required" value="<?php echo $vote_item_record[$k]->title;?>">
						<?php if("image_vote"==$vote->vote_type&&null!=$vote_item_record[$k]->photo_url){?><a href="<?php echo $vote_item_record[$k]->photo_url;?>" target="_blank">点击查看</a><?php }?>
						<input name="old_item[]"  class="item_image"  type="file" <?php if("image_vote"!=$vote->vote_type){?>style="display:none;"<?php }?>>
						<input type="hidden" name="old_item[id][]" value="<?php echo $vote_item_record[$k]->id;?>">
						<a class='del_old_item' name="<?php echo $vote_item_record[$k]->id;?>" style='cursor:pointer;' title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
					</td>
				</tr>
			<?php }?>
		<?php }?>
		<tr class="tr4 item">
			<td align="center">调查表项目：</td>
			<td id="single">
				<input type="text" name="vote_item[title][]" style="width:300px;" <?php if(empty($id)){?>class="required"<?php }?>>
				<input name="vote_item[]"  class="item_image"  type="file"  <?php if("image_vote"!=$vote->vote_type){?>style="display:none;"<?php }?>>
				<a class="add_item" value="1" style="cursor:pointer;" title="继续添加"><img src="/images/admin/btn_add.png" border="0"></a>
			</td>	
		</tr>
		<tr class=btools>
			<td colspan="2"><input id="submit" type="submit" value="发布调查表"></td>
		</tr>
		<input type="hidden" name="vote[is_sub_vote]" value="1">
		<input type="hidden" name="vote_id" value="<?php echo $id;?>">
 </table>
 </div>
 </form>
 
</body>
</html>
 <script>
 	$(function(){
		if("image_vote"=='<?php echo $vote->vote_type;?>'){
			var displayed = "inline";
			var empty = "item_image required";
		}else{
			var displayed = "none";
			var empty = "item_image";
		}
		
		
		
		$(".add_item").click(function(){
			$(".btools").before("<tr class='tr4 s_item'><td align='center'>调查表项目：</td><td><input type='text' name='vote_item[title][]' class='required'>&nbsp;<input name='vote_item[]' type='file' class='item_image' style='display:"+displayed+";'><a class='del_item' style='cursor:pointer;' title='删除'><img src='/images/admin/btn_delete.png' border='0'></a></td></tr>");
		});
	
		$("#vote_type").change(function(){
			if($("#vote_type").attr('value')=="word_vote"){
				$(".item_image").hide();
				displayed = "none";
			}else{
				displayed = "inline";
				$(".item_image").show();
			}
		});
		
		
		$(".del_item").live('click',function(){
			$(this).parent().parent().remove();
		});
		
		$(".del_old_item").click(function(){
			$.post('del_item.php',{'id':$(this).attr('name')});
			$(this).parent().parent().remove();
		});
		
	});

 
 </script>