<?php
	if($id){
		$news->find($id);
		$category_id = $news->category_id;
	}
	if(empty($category_id)) $category_id = -1;
	if (!$news->news_type){
		$news->news_type = 1;
	}
	$href="news_list.php";
	$related_news = $news->related_news  ? explode(',',$news->related_news) : array();
	$sub_headline = $news->sub_headline  ? explode(',',$news->sub_headline) : array();
?>
<div id="icaption">
    <div id="title">发布新闻</div>
	  <a href="news_list.php" id="btn_back"></a>
</div>
<div id="itable">
	<form id="news_edit" enctype="multipart/form-data" action="news.post.php" method="post"> 
	<table cellspacing="1" align="center">
		
		<?php if(has_right('schedule_news')){?>
		<tr class="tr4">
			<td class="td1" width="15%" >定时发布</td>
			<td width="85%"><input type="text" name="publish_schedule_date" id="publish_schedule" class="publish_schedule" <?php if(!$publish_date) echo "disabled=true;";?> value="<?php echo $publish_date;?>"></input><input style="width:20px;" type="checkbox" id="publish_schedule_select" <?php if($publish_date) echo "checked='checked'"?>></input>(格式：2010-03-03 16:00:00)</td>
		</tr>
		<?php }?>
		<tr class="tr4">
			<td class=td1>标题</td>
			<td><input type="text" name="news[title]" id="news_title" value="<?php echo strip_tags($news->title);?>"></td>
		</tr>

		<tr class="tr4">
			<td class="td1">短标题</td>
			<td><input type="text" name="news[short_title]" id="news_short_title" value="<?php echo strip_tags($news->short_title);?>"></input></td>
		</tr>
		
		<tr class="tr4">
			<td class="td1">作者名</td>
			<td><input type="text" name="news[author]" id="news_short_title" value="<?php echo strip_tags($news->author ? $news->author : $_SESSION['admin_nick_name']);?>"></input></td>
		</tr>
		
		<tr class="tr4">
			<td class="td1">分类</td>
			<td><span id="span_category"></span><a href="#" id="copy_news" style="color:blue">复制到其他分类</a></td>
		</tr>
		
		<tr class="tr4" style="display:none;" id="tr_copy_news">
			<td class="td1">复制到分类</td>
			<td><span id="span_category_copy"></span><a href="#" id="delete_copy_news" style="color:blue">删除</a><input type="hidden" name="copy_news" id="hidden_copy_news" value="0"></input></td>
		</tr>	
			
		<tr class="tr4">
			<td class="td1">优先级</td>
			<td><input type="text" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>">(0~100)</td>
		</tr>
		
		<tr class="tr4">
			<td class="td1">新闻类表</td>
			<td>
				<select name="news[news_type]" id="sel_news_type">
					<option value="normal">普通新闻</option>
					<option value="file">文件下载</option>
					<option value="href">外部链接</option>
				</select>
				<script type="text/javascript">$('#sel_news_type').val(<?php echo "'$news->news_type'"?>);</script>
			</td>
		</tr>
		
		<!-- 文件新闻 -->
		<tr class="tr4 file news_content">
			<td class="td1">上传文件</td>
			<td>
				<input type="file" id="file_file" name="news[file_name]" />
				<?php if($news->file_name){?>
				<a href="<?php echo $news->file_name;?>" target="_blank">下载</a>
				<?php }?>
			</td>
		</tr>
		
		<!-- 外部新闻 -->
		<tr class="tr4 href news_content">
			<td class="td1">新闻链接</td>
			<td><input type="text" name=news[target_url] id="input_href" value="<?php echo $news->target_url;?>"></td>
		</tr>
					
		<tr class="tr4 normal news_content">
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

		<tr class="tr4 normal news_content">
			<td class="td1">相关新闻关联</td>
			<td id="td_related_news">已关联　<span id="span_related_news"></span>　条新闻 <a href="#" id="a_related_news" style="color:blue">编辑</a></td>
		</tr>
		
		<tr class="tr4 normal news_content">
			<td class="td1">上传封面图片</td>
			<td>
				<input type="file" name="news_pic">
				<?php if($news->video_photo_src){?>
				<a href="<?php echo $news->video_photo_src?>" target="_blank">查看</a> <a href="#" id="a_delete_pic">删除</a>
				<?php }?>
				<span style="color:blue;">支持格式：jpg,png,gif，小于100K</span>
			</td>
		</tr>		

		<!-- 		
		<tr class="tr4">
			<td  class=td1>放置广告</td>
			<td><input style="width:20px;"  type="checkbox" id="news_ad_id" <?php if($news->ad_id == 1) echo "checked='checked'";?>><label for="news_ad_id">放置广告</label><input type="hidden" id="input_news_ad_id" name="news[ad_id]" value="<?php echo $news->ad_id;?>"></input></td>
		</tr>
		 -->

		<tr class="tr4 normal news_content">
			<td class="td1">禁止复制</td>
			<td><input style="width:20px;"  type="checkbox" id="news_forbbide_copy" <?php if($news->forbbide_copy == 1) echo "checked='checked'";?>></input><label for="news_forbbide_copy">禁止复制</label><input type="hidden" id="input_news_forbbide_copy"  name="news[forbbide_copy]" value="<?php echo $news->forbbide_copy;?>"></input></td>
		</tr>
		
		<tr class="tr4 normal news_content">
			<td  class="td1">简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"100",$news->description);?></td>
		</tr>
		
		<tr class="tr4 normal news_content">
			<td  class="td1">新闻内容</td><td><?php show_fckeditor('news[content]','Admin',false,"215",$news->content);?></td>
		</tr>
		
		<tr class="btools">
			<td colspan="2">
				<input id="submit" type="submit" value="提交">
				<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
				<input type="hidden" name="id" id="hidden_news_id" value="<?php echo $news->id; ?>">
				<input type="hidden" name="news[related_news]" id="hidden_related_news" value="<?php echo $news->related_news ? $news->related_news : "";?>"></input>
				<input type="hidden" name="news[is_adopt] value="<?php $news->is_adopt;?>"></input>	
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