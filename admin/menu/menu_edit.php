<?php
	session_start();
  include_once('../../frame.php');
	judge_role();
	$id=intval($_REQUEST['id']);
	$menu1 = new table_class($tb_menu);
	if($id)	{
		$menu = $menu1->find($id);
		$is_root = $menu->is_root;
	}else{
		$menu->parent_id = $_REQUEST['parent_id'] ? $_REQUEST['parent_id'] : 0;
		$menu->role_level = 1;
		if($menu->parent_id == 0) $menu->href="#";
	}
	if($menu->parent_id){
		$parent_menu = $menu1->find($menu->parent_id);
		if(empty($id)){
			$menu->role_level = $parent_menu->role_level;
		}
	}
	$db = get_db();
	$roles = $db->query('select * from eb_role');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("menu_form");
	if($menu->id){ 
		$title = "修改";
	}else{
		$title = "添加";
	}
?>
<body>
<div id=icaption>
	    <div id=title><?php echo $title;?>菜单</div>
		  <a href="menu_list.php" id=btn_back></a>
</div>
<div id=itable>
		<form id="menu_form" method="post" action="menu.post.php">
			<table cellspacing="1"  align="center">		
				<tr class=tr4>
					<td class=td1 width=15%>名称</td>
					<td width=85%><input type="text" name="post[name]" value="<?php echo $menu->name;?>" class="required"></td>
				</tr>
				<tr class="tr4 menu_item">
					<td class=td1>链接</td>
					<td><input type="text" name="post[href]" value="<?php echo $menu->href;?>"></td>
				</tr>
				<tr class="tr4 menu_item">
					<td class=td1>链接方式</td>
					<td>
						<select id="sel_target" name="post[target]" style="width:155px;">
							<option value="admin_iframe" <?php if($menu->target == 'admin_iframe') echo 'selected="selected"'; ?>>下侧窗口</option>
							<option value="_self" <?php if($menu->target == '_self') echo 'selected="selected"'; ?>>当前窗口</option>
							<option value="_blank" <?php if($menu->target == '_blank') echo 'selected="selected"'; ?>>新建窗口</option>
						</select>				
					</td>
				</tr>	
				<tr class=tr4>
					<td class=td1>描述</td>
					<td><input type="text" name="post[description]" value="<?php echo $menu->description;?>"></td>
				</tr>
				<tr class=tr4>
					<td class=td1>优先级</td>
					<td><input type="text" name="post[priority]" id="priority" value="<?php echo $menu->priority;?>" class="number"></td>
				</tr>
				<tr class=btools>
					<td colspan="10">
						<input type="submit" id="btn_submit" value="提交">
						<input type="hidden" name="post[parent_id]" value="<?php echo $menu->parent_id;?>" id="post_parent_id">
						<input type="hidden" name="id" value="<?php echo $menu->id;?>">
						<input type="hidden" id="is_root" value="<?php echo $menu->is_root;?>">
						<input type="hidden" name="post[is_root]" value="<?php echo $menu->is_root;?>">	
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
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

</html>
