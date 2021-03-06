<?php
	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>发布新闻</title>
	<?php 
		css_include_tag('admin2','colorbox','jquery_ui');
		use_jquery_ui();
		validate_form("news_edit");
		js_include_tag('category_class.js','admin/news/news_pub','jquery.colorbox-min.js','../ckeditor/ckeditor.js','pubfun','assistant/edit');
	?>
</head>
<?php 
//initialize the categroy;
	$category = new category_class('assistant');
	$category->echo_jsdata();
?>
<body>
	<?php 
		$id = intval($_GET['id']);
		$news = new table_class('eb_assistant');	
		if($id){
			$news->find($id);
			$category_id = $news->category_id;
		}
		if(empty($category_id)) $category_id = -1;
	?>
	<div id="icaption">
	    <div id="title">发布助手</div>
		  <a href="index.php" id="btn_back"></a>
	</div>
	<div id="itable">
		<form id="news_edit" enctype="multipart/form-data" action="edit.post.php" method="post"> 
		<table cellspacing="1" align="center">
			
			<tr class="tr4">
				<td class=td1>标题</td>
				<td><input type="text" name="news[title]" id="news_title" value="<?php echo strip_tags($news->title);?>"></td>
			</tr>
	
			<tr class="tr4">
				<td class="td1">短标题</td>
				<td><input type="text" name="news[short_title]" id="news_short_title" value="<?php echo strip_tags($news->short_title);?>"></input></td>
			</tr>
			
			<tr class="tr4" id="tr_category">
				<td class="td1">分类</td>
				<td><span id="span_category"></span> <a href="#" id="a_copy" style="color:blue">复制</a></td>
			</tr>
						
			<tr class="tr4">
				<td class="td1">年龄段</td>
				<td>
					<select name="news[age]" id="news_age">
						<option value="-2">准备怀孕</option>
						<option value="-1">怀孕中</option>
						<option value="1">0~1岁</option>
						<option value="2">1～2岁</option>
						<option value="3">2～3岁</option>
						<option value="4">3～6岁</option>
					</select>
					<script type="text/javascript">$('#news_age').val(<?php echo "'$news->age'"?>);</script>
				</td>
			</tr>
			
			<tr class="tr4">
				<td class="td1">关键词</td>
				<td>
					<select multiple="multiple" id="sel_keywords">
						<?php $keywords = explode('||',$news->keywords);
							if(!empty($keywords)){
								foreach($keywords as $key){ 
									if(empty($key)) continue;
									?>
								<option value="<?php echo $key?>"><?php echo $key?></option>			
							<?php }
							}
						?>
					</select>
					<img src="/images/admin/btn_delete.png" style="cursor:pointer; float:left;" id="delete_keyword" />
					<input type="text" id="auto_keywords" />
					<input type="hidden" name="news[keywords]" id="news_keywords"/>
					<img id="add_keyword" style="cursor:pointer; float:left;" src="/images/admin/btn_add.png" />
				</td>
			</tr>	
			<tr class="tr4">
				<td class="td1">优先级</td>
				<td><input type="text" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>">(0~100)</td>
			</tr>
			
			<tr class="tr4">
				<td class="td1">图片</td>
				<td><input type="file" name=news[image]><?php if($news->image!=''){?><a target="_blank" href='<?php echo $news->image;?>'>点击查看</a><?php }?></td>
			</tr>

			<tr class="tr4 normal">
				<td  class="td1">简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"100",$news->description);?></td>
			</tr>
			
			<tr class="tr4 normal">
				<td  class="td1">助手内容</td><td><?php show_fckeditor('news[content]','Admin',false,"215",$news->content);?></td>
			</tr>
			
			<tr class="btools">
				<td colspan="2">
					<input id="submit" type="submit" value="提交">
					<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
					<input type="hidden" name="news[is_adopt]" value="<?php echo $news->is_adopt;?>">
					<input type="hidden" name="id" value="<?php echo $news->id;?>">
					<input type="hidden" name="copy_to" value="" id="copy_to" />
				</td>
			</tr>	
		</table>
		</form>
	</div>
	<script>
	$(function(){
		
			category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
			});

			$('#news_edit').submit(function(){	
				return valid_input();
			});	
		});

	function valid_input(){
		var title = $('#news_title').val();
		if(title==""){
			alert("请输入标题！");
			return false;
		}	
		
		var short_title = $('#news_short_title').val();
		if(short_title==""){
			alert("请输入短标题！");
			return false;
		}
		
		var category_count = $('.category_select').length;
		category_id = $('.category_select:last').attr('value');
		if(category_id == -1){
			if(category_count < 2){
				alert('请选择分类!');
				return false;	
			}else{
				category_id = $('.category_select:eq('+ (category_count - 2) + ')').val();
				if(category_id == -1){
					alert('请选择分类!');
					return false;	
				}
			}
		}
		$('#category_id').val(category_id);
		//handle the copy method
		var copy_category = new Array();
		$('.copy_tr').each(function(){
			var category = 0;
			category = $(this).find('.category_copy:last').val();
			if(category <= 0){
				alert('请选择复制的分类');
				return false;
			}
			copy_category.push(category);
		});
		if(copy_category){
			$('#copy_to').val(copy_category.join(','));
		}else{
			$('#copy_to').val('');
		}
		var editor = CKEDITOR.instances['news[content]'] ;
		var content = editor.getData();
		if(content==""){
			alert("请输入新闻内容！");
			return false;
		}
		var keywords = new Array();
		$('#sel_keywords option').each(function(){
			keywords.push($(this).val());
		});
		$('#news_keywords').val(keywords.join('||'));
		return true;
	}
	
	</script>
</body>
</html>
