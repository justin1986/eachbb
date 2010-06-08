<?php
	if($id){
		$category_id = $news->category_id;
		$db = get_db();
		$db->query("select english_news_id from eb_news_relationship where chinese_news_id = $id ");
		if ($db->move_first()){
			$english_id = $db->field_by_index(0);		
		}
		$db->query("select publish_date,resource_id from eb_publish_schedule where resource_id = {$id} and resource_type='news'");
		if ($db->move_first()){
			$publish_date = $db->field_by_name('publish_date');
		}
		$db->query("select group_concat(a.industry_id SEPARATOR ',') as ids from eb_news_industry a left join eb_industry b on a.industry_id = b.id where a.news_id={$id}");
		if($db->move_first()){
			$news_industry = $db->field_by_name('ids');
		}
	}else{
		$category_id = -1;
	}
	if (!$news->news_type){
		$news->news_type = 1;
	}
	if($_SESSION["role_name"]=='author'||$_SESSION["role_name"]=='journalist')$href="/admin/column/news_list.php";else $href="news_list.php";
	$related_news = $news->related_news  ? explode(',',$news->related_news) : array();
	$sub_headline = $news->sub_headline  ? explode(',',$news->sub_headline) : array();
?>
<div id=icaption>
    <div id=title>发布新闻</div>
	  <a href="news_list.php" id=btn_back></a>
</div>
<div id=itable>
	<form id="news_edit" enctype="multipart/form-data" action="news.post.php" method="post"> 
	<table cellspacing="1" align="center">
		
		<?php if(has_right('schedule_news')){?>
		<tr class=tr4>
			<td class=td1 width="15%" >定时发布</td>
			<td width="85%"><input type="text" name="publish_schedule_date" id="publish_schedule" class="publish_schedule" <?php if(!$publish_date) echo "disabled=true;";?> value="<?php echo $publish_date;?>"></input><input style="width:20px;" type="checkbox" id="publish_schedule_select" <?php if($publish_date) echo "checked='checked'"?>></input>(格式：2010-03-03 16:00:00)</td>
		</tr>
		<?php }?>
		<?php if(has_right('schedule_news')){?>
		<tr class=tr4>
			<td class=td1 width="15%" >恢复自动抓取止日</td>
			<td width="85%"><input type="text" name="news[block_endtime]" class="publish_schedule"  value="<?php echo $news->block_endtime;?>"></input>(格式：2010-03-03 16:00:00)</td>
		</tr>
		<?php }?>
		<tr class=tr4>
			<td class=td1>标题</td>
			<td><input type="text" name="news[title]" id="news_title" value="<?php echo strip_tags($news->title);?>"></td>
		</tr>

		<tr class=tr4>
			<td class=td1>短标题</td>
			<td><input type="text" name="news[short_title]" id="news_short_title" value="<?php echo strip_tags($news->short_title);?>"></input></td>
		</tr>
		
		<tr class=tr4>
			<td class=td1>wap标题</td>
			<td><input type="text" name="news[wap_title]" id="news_wap_title" value="<?php echo strip_tags($news->wap_title);?>"></input></td>
		</tr>		

		<tr class=tr4>
			<td class=td1>分类</td>
			<td class="category_select"><span id="span_category"></span></td>
		</tr>

		<tr class=tr4 style="display:none">
			<td class=td1>优先级</td>
			<td><input type="text" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>">(0~100)</td>
		</tr>
		
		<tr class="tr4">
			<td  class=td1>简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"100",$news->description);?></td>
		</tr>
		
		<tr class="tr4">
			<td  class=td1>新闻内容</td><td><?php show_fckeditor('news[content]','Admin',false,"215",$news->content);?></td>
		</tr>
		
		<tr class="btools">
			<td colspan="2">
				<input id="submit" type="submit" value="提交">
				<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
				<input type="hidden" name="news[image_flag]" value="<?php echo $news->image_flag;?>" id="hidden_image_flag">
				<input type="hidden" name="id" id="hidden_news_id" value="<?php echo $news->id; ?>">
				<input type="hidden" name="news[related_news]" id="hidden_related_news" value="<?php echo $news->related_news ? $news->related_news : "";?>"></input>
				<input type="hidden" name="news[sub_headline]" id="hidden_sub_headline" value="<?php echo $news->sub_headline ? $news->sub_headline : "";?>"></input>
				<input type="hidden" name="news[is_adopt] value="<?php $news->is_adopt;?>"></input>
				<input type="hidden" id="hidden_related_industry" name="related_industry" value="<?php echo $news_industry;?>"></input>
				<input type="hidden" name="news[keywords]" value="<?php echo $news->keywords?>"/>	
			</td>
		</tr>	
	</table>
	</form>
</div>
<script>
$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
		});
		category.display_select('category_select_copy',$('#span_category_copy'),<?php echo $category_id;?>,'', function(id){			
		});
	});	

</script>