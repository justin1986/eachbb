<?php
	include_once('../../frame.php');
	$category = new category_class('news');
	$key = urldecode($_REQUEST['key']);
	$order = "";
	$filter_adopt = isset($_REQUEST['filter_adopt']) ? $_REQUEST['filter_adopt'] : -1;
	$filter_selected = isset($_REQUEST['filter_selected']) ? $_REQUEST['filter_selected'] : -1;
	if($filter_selected == 0){
		$ids = $_REQUEST['selected_news'] ? $_REQUEST['selected_news'] : 0;
		$conditions[] = "id not in($ids)";
	}elseif($filter_selected == 1){
		$ids = $_REQUEST['selected_news'] ? $_REQUEST['selected_news'] : 0;
		$conditions[] = "id in($ids)";
		$order = " find_in_set(id,'{$ids}')";
	}
	if($filter_adopt != -1){
		$conditions[] = 'is_adopt= ' .$filter_adopt;
	}
	$filter_category = $_REQUEST['filter_category'] ? $_REQUEST['filter_category'] : -1;
	if($filter_category != -1){
		$cate_ids = implode(',',$category->children_map($filter_category));
		$conditions[] = 'category_id in (' .$cate_ids .")";		
	}
	
	if($conditions){
		$conditions = implode(' and ', $conditions);	
	}
	$category->echo_jsdata();
	$db = get_db();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布新闻</title>
	<?php 
		css_include_tag('admin');
	?>
</head>
<body>
<div id=ibody style="width:970px; overflow:hidden; float:left;">
	<div id=isearch style="width:960px;">
			<input id="search_text" type="text" value="<? echo $key;?>">
			<span id="span_category_select"></span><select id="filter_adopt">
				<option value="-1">发布状态</option>
				<option value="0" <?php if($filter_adopt == 0) echo ' selected="selected"' ?>>未发布</option>
				<option value="1" <?php if($filter_adopt == 1) echo ' selected="selected"' ?>>已发布</option>
			</select><select id="filter_selected">
				<option value="-1">选择状态</option>
				<option value="0" <?php if($filter_selected == 0) echo ' selected="selected"' ?>>未选择</option>
				<option value="1" <?php if($filter_selected == 1) echo ' selected="selected"' ?>>已选择</option>
			</select>
			<input type="button" value="搜索" id="search_button" >	
	</div>

	<div id=itable style="width:960px;">
	<table cellspacing=1 border="0" style="width:950px;">
		<tr class="itable_title">
			<td width="10%">选择</td><td width="50%">短标题</td><td width="20%">发表时间</td><td width="20%">所属类别</td>
		</tr>
		<?php
			$subject = new table_class("eb_news");

			$items = search_content($_REQUEST['key'],'eb_news',$conditions,25,$order);
			$count_record = count($items);			
			//--------------------		
			for($i=0;$i<$count_record;$i++)	{
				
		?>
		<tr class=tr3>
					<td><input type="checkbox" id="<?php echo $items[$i]->id;?>" value="<?php echo $items[$i]->id;?>" name="subject" style="width:12px;"></td>
					<td style="text-indent:24px; text-align:left;"><?php echo strip_tags($items[$i]->title);?></td>
					<td><?php echo strip_tags($items[$i]->created_at);?></td>					
					<td><?php echo $category->find($items[$i]->category_id)->name; ?></td>
		</tr>
		<?php
			}
			//--------------------
		?>
		<tr class=btools>
				<td colspan="4"><?php paginate('_news_filter.php?','result_box');?></td>
		</tr>
		<tr class=btools>
				<td colspan="4">
					<button id="button_ok" >确　　定</button>
					<button id="button_cancel">取　　消</button>
					<button id="cancel_all">取消所有关联</button>
					<button href="#" id="news_sort">排　　序</button>
				</td>
		</tr>		
	</table>
	</div>
</div>
</body>
<script>
		$(function(){
			//initilize checkbox_status
			$('.tr3 input:checkbox').click(function(){
			if($(this).attr('checked')){
				if($.inArray($(this).attr('id'),selected_news) == -1){
					selected_news.push($(this).attr('id'));
				}
			}else{
				array_remove(selected_news,$(this).attr('id'));
			}
		});
		
		$('#cancel_all').click(function(){
			$('.tr3 input:checkbox').each(function(){
				$(this).attr('checked',false);
			});
			selected_news.length = 0;
		});
		
		$('#button_ok').click(function(){
			var func = call_back + "('" + selected_news.join(',') + "');";
			alert(func);
			eval(func);
			$.fn.colorbox.close();
		});	
		
		$('#button_cancel').click(function(){
			$.fn.colorbox.close();
		});	
		$('#subject_search,#search_button').click(function(){
			send_search();
		});
		
		$('#filter_dept,#filter_adopt').change(function(){
			send_search();
		});
		
		$('#search_text').keypress(function(e){
			if(e.keyCode == 13){
				send_search();
			}
		});
		$('#filter_selected').change(function(){
			send_search();
		});
		
		$('#news_sort').click(function(e){
			e.preventDefault();
			$('#result_box').load('_news_filter_sort.php',{'selected_news':selected_news.join(',')});
		});
		
		$('.tr3 input:checkbox').each(function(){
				if($.inArray($(this).attr('id'),selected_news) != -1){
					$(this).attr('checked',true);
				}
			});
		});
		
		function send_search(){
			var filter_category = $('.news_category:last').attr('value');
			var category_count = $('.news_category').length;
			if(filter_category == -1){
				if(category_count < 2){
					
				}else{
					filter_category = $('.news_category:eq('+ (category_count - 2) + ')').val();
				}
			}
			var filter_adopt = $('#filter_adopt').attr('value');
			var filter_selected = $('#filter_selected').attr('value');
			url = '_news_filter.php?filter_category=' + filter_category;
			url += '&filter_adopt=' + filter_adopt;
			url += '&filter_selected=' + filter_selected;
			url += '&key=' + encodeURI($('#search_text').val());
			$('#result_box').load(url,{'selected_news':selected_news.join(',')});			
			//$('#result_box').load('filte_news.php',{'show_div':'0','key':$('#search_text').attr('value'),'filter_dept':$('#filter_dept').attr('value'),'filter_category':$('.news_category:last').attr('value'),'filter_adopt':$('#filter_adopt').attr('value')});			
		}
		category.display_select('news_category',$('#span_category_select'),<?php echo $filter_category;?>,'',function(){send_search();});

</script>