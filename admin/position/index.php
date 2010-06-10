<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
	
	$category = new category_class('news');
	$title = $_REQUEST['title'];
	$category_id = $_REQUEST['category'] ? $_REQUEST['category'] : -1;
	$is_adopt = $_REQUEST['adopt'];
	
	$db = get_db();
	$ids = $db->query("select source_id,id from eb_position where pos_name='hart_news'");
	!$ids && $ids = array();
	$ids_arr = array();
	foreach($ids as $id){
		$ids_arr[$id->source_id] = $id->id;
	}
	
	$sql = "select * from eb_news where 1=1";

	
	
	if($title!= ''){
		$sql .= " and (title like '%".trim($title)."%' or keywords like '%".trim($title)."%' or description like '%".trim($title)."%' or author like '%{$title}%')";
	}
	if($category_id > 0){
		$cate_ids = implode(',',$category->children_map($category_id));
		$sql .= " and and category_id in($cate_ids)";
	}
	if($is_adopt!=''){
		$sql .= " and is_adopt=$is_adopt";
	}
	$sql .= " order by priority asc,created_at desc";
	
	$record = $db->query($sql,30);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布新闻</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','category_class','admin/pub/search','admin/news/news_list');
		$category->echo_jsdata();		
	?>
</head>
<body>
<div id=icaption>
    <div id=title>今日热点管理</div>
	  <a href="news_edit.php" id=btn_add></a>
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
			<td width="40%">标题</td><td width="15%">作者</td><td width="15%">所属类别</td><td width="15%">发布时间</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------$ids_arr
			!$record && $record = array();
			foreach($record as $news){
		?>
		<tr class=tr3>
			<td style="text-align:left; text-indent:12px;"><?php echo strip_tags($news->title);?></td>
			<td><?php echo $news->author;?></td>
			<td><a href="?category=<?php echo $news->category_id;?>" style="color:#0000FF"><?php echo $category->find($news->category_id)->name;?></a></td>
			<td><?php echo $news->created_at;?></td>
			<td>
				<?php
					if(key_exists($news->id,$ids_arr)){ 
				?>
				<a name="<?php echo $ids_arr[$news->id];?>"  style="cursor:pointer" class="del" title="删除"><img src="/images/admin/btn_delete.png" border="0"></a>
				<input type="text" name="priority" name="<?php echo $ids_arr[$news->id];?>" style="width:50px;">
				<?php }else{?>
				<a href="<?php echo $news->id;?>" class="add" title="加入"><img src="/images/admin/btn_add.png" border="0"></a>
				<?php }?>
			</td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<button id=clear_priority>清空优先级</button>
				<button id=edit_priority>编辑优先级</button>
				<input type="hidden" id="relation" value="news">
				<input type="hidden" id="db_table" value="eb_position">
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

		$(".add").click(function(e){
			e.preventDefault();
			$.post('post.php',{'type':'add','id':$(this).attr('href')},function(data){
				location.reload();
			});
		});
	});
</script>