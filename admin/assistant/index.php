<?php
	session_start();
	include_once('../../frame.php');
	$db = get_db();
	judge_role();
	$category = new category_class('assistant');
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	$c = array();
	if($title!= ''){
		array_push($c, "title like '%".trim($title)."%'  or description like '%".trim($title)."%'");
	}
	if($category_id > 0){
		$cate_ids = implode(',',$category->children_map($category_id));
		array_push($c, "category_id in($cate_ids)");
	}
	if($is_adopt!=''){
		array_push($c, "is_adopt=$is_adopt");
	}
	$news = new table_class('eb_assistant');
	$record = $news->paginate('all',array('conditions' => implode(' and ', $c),'order' => 'created_at desc,category_id'),30);
	
	function get_age($str){
		switch($str){
			case -2:echo '准备怀孕';break;
			case -1:echo '怀孕中';break;
			case 1:echo '0~1岁';break;
			case 2:echo '1~2岁';break;
			case 3:echo '2~3岁';break;
			default:echo '未知';
		}
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>妈妈助手管理</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','category_class','admin/pub/search','admin/news/news_list');
		$category->echo_jsdata();		
	?>
</head>
<body>
<div id=icaption>
    <div id=title>妈妈助手管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input class="sau_search" name="title" type="text" value="<? echo $_REQUEST['title']?>">
		<span id="span_category"></span>
		<select id=adopt name="adopt" style="width:90px" class="sau_search">
				<option value="">发布状况</option>
				<option value="1" <? if($_REQUEST['adopt']=="1"){?>selected="selected"<? }?>>已发布</option>
				<option value="0" <? if($_REQUEST['adopt']=="0"){?>selected="selected"<? }?>>未发布</option>
		</select>
		<input class="sau_search" id="search_category" name ="category" type="hidden"></input>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="40%">标题</td><td width="15%">年龄段</td><td width="15%">所属类别</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
		<tr class=tr3 id=<?php echo $record[$i]->id;?> >
			<td style="text-align:left; text-indent:12px;"><a href="<?php echo "/assistant/assistant.php?id={$record[$i]->id}";?>" target="_blank"><?php echo strip_tags($record[$i]->title);?></a></td>
			<td><?php get_age($record[$i]->age);?></td>
			<td><a href="?category=<?php echo $record[$i]->category_id;?>" style="color:#0000FF"><?php echo $category->find($record[$i]->category_id)->name;?></a></td>
			<td><?php echo $record[$i]->created_at;?></td>
			<td>
					<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/admin/btn_edit.png" border="0"></a>
					<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/admin/btn_delete.png" border="0"></span>
					<?php if($record[$i]->is_adopt=="1"){?>
					<span style="cursor:pointer" class="revocation" name="<?php echo $record[$i]->id;?>" title="撤销"><img src="/images/admin/btn_apply.png" border="0"></span>
					<?php	}else{?>
					<span style="cursor:pointer" class="publish" name="<?php echo $record[$i]->id;?>" title="发布"><img src="/images/admin/btn_unapply.png" border="0"></span>
					<?php }?>
					<input type="hidden" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
				</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>				<?php paginate("",null,"page",true);?>

				<button id=clear_priority style="display:none">清空优先级</button>
				<button id=edit_priority  style="display:none">编辑优先级</button>
				<input type="hidden" id="relation" value="news">
				<input type="hidden" id="db_table" value="eb_assistant">
			</td>
		</tr>
  </table>
</div>	
</body>
</html>

<script>
	$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){
			$('#category').val(id);
			var category_id = $('.category_select:last').val();
			if(category_id <= 0){
				var count = $('.category_select').length;
				for(var i=count-1;i>=0;i--){
					if($('.category_select:eq(' + i +')').val() > 0 ){
						category_id = $('.category_select:eq(' + i +')').val();
						break;
					}
				}
			}
			$('#search_category').val(category_id);
			search_news();
		});
	});
</script>