﻿<?php
	session_start();
  include_once('../../frame.php');
	judge_role();
	$id=$_REQUEST['id'];	
	$menu1 = new table_class($tb_menu);
	if($id)	{
		$menu = $menu1->find($id);
		$is_root = $menu->is_root;
	}else{
		$menu->parent_id = $_REQUEST['parent_id'] ? $_REQUEST['parent_id'] : 0;
		$menu->is_root = 1;
		if($menu->parent_id == 0) $menu->href="#";
	}	
	if($menu->parent_id){
		$parent_menu = $menu1->find($menu->parent_id);
	}
		
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("menu_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="menu.post.php">
		<tr class=tr1>
			<?php 
				if($menu->id){ ?>									
			<td colspan="2">　修改菜单 <?php if($parent_menu){echo '<span style="color:red;font-size:12px;">上级菜单--'. $parent_menu->name .'</span>';}?></td>
			<?php
				}else{ ?>
			<td colspan="2">　添加菜单 <?php if($parent_menu){echo '<span style="color:red;font-size:12px;">上级菜单--'. $parent_menu->name .'</span>';}?></td>		
			<?php
				}
			?>
		</tr>		
		<tr class=tr3>
			<td width=150>名称：</td>
			<td width=645 align="left"><input type="text" name="post[name]" value="<?php echo $menu->name;?>" class="required"></td>
		</tr>
		<?php
		if ($menu->parent_id == 0){ ?>
		<tr class=tr3>
			<td width=150>类型：</td>
			<td width=645 align="left">
				<select id="select_is_root" name="post[is_root]">
					<option value="1">根目录</option>
					<option value="0" <?php if($menu->is_root == 0) echo "selected='selected'"; ?>>菜单项</option>
				</select>				
			</td>
		</tr>	
		<?php	}
		?>				
		<tr class="tr3 menu_item">
			<td>链接：</td>
			<td align="left"><input type="text" name="post[href]" value="<?php echo $menu->href;?>"></td>
		</tr>
		<tr class="tr3 menu_item">
			<td>链接方式:</td>
			<td align="left">
				<select id="sel_target" name="post[target]">
					<option value="admin_iframe" <?php if($menu->target == 'admin_iframe') echo 'selected="selected"'; ?>>右侧窗口</option>
					<option value="_self" <?php if($menu->target == '_self') echo 'selected="selected"'; ?>>当前窗口</option>
					<option value="_blank" <?php if($menu->target == '_blank') echo 'selected="selected"'; ?>>新建窗口</option>
				</select>				
			</td>
		</tr>	
		<?php
		if ($menu->parent_id == 0){ ?>
		<tr class="tr3">
			<td>
				要求权限:
			</td>
			<td align="left">
				<select id="sel_role_level" name="post[role_level]">
					<option value="1" <?php if ($menu->role_level == 1) echo 'selected="selected"' ?>>管理员</option>
					<option value="2" <?php if ($menu->role_level == 2) echo 'selected="selected"' ?>>超级管理员</option>
				</select>				
			</td>
		</tr>
		<?php	}
		?>	
		<tr class=tr3>
			<td>描述：</td>
			<td align="left"><input type="text" name="post[description]" value="<?php echo $menu->description;?>"></td>
		</tr>
		<tr class=tr3>
			<td>优先级：</td>
			<td align="left"><input type="text" name="post[priority]" id="priority" value="<?php echo $menu->priority;?>" class="number"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit" id="btn_submit">提 交</button></td>
		</tr>
		<input type="hidden" name="post[parent_id]" value="<?php echo $menu->parent_id;?>" id="post_parent_id">
		<input type="hidden" name="id" value="<?php echo $menu->id;?>">
		<input type="hidden" id="is_root" value="<?php echo $is_root;?>">
	</form>
	</table>
</body>
</html>
<script>
	$(function(){
		
		if($('#post_parent_id').val() == '0'){
			$('.menu_item').hide();
		}else{
			$('.menu_item').show();
		}
		
		if($('#is_root').val() == '0'){
			$('.menu_item').show();
		}
		
		$('#select_is_root').change(function(){
			if($(this).val() == 0){
				$('.menu_item').show();
			}else{
				$('.menu_item').hide();
			}
		});
	});
</script>
