<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('../frame.php');
	$id =intval(trim($_REQUEST['id']));
	if(empty($id)){
		#redirect('error.html');
		#die();
	}
	$db = get_db();
	$column = $db->query("SELECT id,title,click_count,short_title,category_id,description,content,created_at,last_edited_at,age FROM eb_assistant e where id=".$id." order by last_edited_at desc");
	?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>妈妈助手-<?php echo $column[0]->title;?></title>
<?php
	use_jquery();
	css_include_tag('top_inc/assistant_top','article');
	js_include_tag('jquery.cookie', 'assistant/news');
?>
</head>
<body>
<div id="ibody">
		<?php include_once("../inc/_assistant_top.php"); ?>
		<div id="fbody">
		<div id="log_top">
			<div id="log_t">
				<a href="/" target="_blank"><div id="log"></div></a>
				<div id="log_address">
					<a href="/">首页</a>
					<?php 
						$category = new category_class('assistant');
						$cate_tree = $category->tree_map_item($column[0]->category_id);
						$cate_tree = array_reverse($cate_tree);
						foreach ($cate_tree as $cate){
							$list_url = get_assistant_list_url($cate_tree[0]->id);
							echo " &gt;&gt; <a href='{$list_url}'>{$cate->name}</a>";
						}
					?>
					<span> &gt;&gt; <?php echo $column[0]->title;?></span>
				</div>
			</div>
			<div id="hr"></div>
		</div>
		<div id="b_l">
			<div id="title"  title="<?php echo $column[0]->title;?>">
				<?php echo $column[0]->title;?>
			</div>
			<div id="title_b">
				<div id="problem" title="<?php echo $column[0]->created_at;?>">发布于：<?php echo $column[0]->created_at;?></div>
			</div>
			<div id="text">
				<div id="text_tpg"></div>
				<div id="text_cpg">
					<div id="text_content">
						<font>本文摘要：</font>
						<?php echo strip_tags($column[0]->description);?>
					</div>
					<div id="text_menu">
						<div class="tm_a"><a id="a_print" href="#">打印</a></div>
						<div id="tm_b"><a id="a_collect" href="#">收藏</a></div>
						<div class="tm_a"><a href="/news/share.php?news_id=<?php echo $column[0]->id?>">分享</a></div>
					</div>
				</div>
				<div id="text_bpg"></div>
			</div>
			<div id="content">
				<?php
				 	echo get_fck_content($column[0]->content,'page');
				?>
			</div>
			<div id="pagination">
				<?php  paginate_news($column[0]);?>
			</div>
			<input type="hidden" value="<?php echo $id;?>" id="newsid">
			<div id="res"></div>
			<div id="write_comment">
				<div id="div_btn_comment"></div>
				<div id="div_write_comment">
					<textarea id="text_comment" style="width: 630px;"></textarea>
					<button id="submit_comment">提交</button>
				</div>
			</div>
		</div>
		<div id="b_r">
			<div id="br_img" style="padding-bottom:20px;"></div>
			<?php include_once('../news/_news_logo_public.php'); ?>
			<div id="tag">
				<div id="tag_l"></div>
				<div id="tag_c">
					<div id="tagc_t"><font>热门</font>关键字</div>
					<div class="tag_menu">
						<?php 
						$list = $db->query("SELECT * FROM eb_news_keywords LIMIT 10");
						foreach ($list as $list){
						$lines = explode("||",$list->name);
							foreach ($lines as $lines){
								if($lines){
								?>
									<div class="cla_m_v" style="text-align: center;"><a href="/news/news.php?id=<?php echo $list->id;?>"><?php echo $lines;?></a></div>
									<div class="cla_r"></div>
								<?php }
							}
						}?>
					</div>
				</div>
				<div id="tag_b"></div>
			</div>
			<div class="bd">
				<div class="bd_t"></div>
				<div class="bd_c">
					<div class="bdt_t">
						<div class="bdt_tl">相关文章列表</div>
						<div class="bdt_more"></div>
					</div>
					<div class="bdt_hr">
						<div class="bdt_hr2"></div>
					</div>
					<div class="bdt_v">
						<?php
							$list = $db->query("SELECT id,title FROM eb_assistant e where is_adopt=1 order by created_at desc LIMIT 10");
							foreach ($list as $li){ ?>
						<div>
							<div class="bdt_l"></div>
							<div class="book_title">
								<a href="/assistant/assistant.php?id=<?php echo $li->id;?>"><?php echo $li->title;?></a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="bd_b"></div>
			</div>
			
			<!--<div id="comment">
				<div id="comm_l"></div>
				<div id="comm_c">
					<div id="comm_t">
						<div id="com_title">相关评论</div>
						<div id="com_x">
						</div>
					</div>
					<?php 
					$list = $db->query("SELECT resource_id,comment FROM eb_comment e where resource_type='assistant' order by created_at desc limit 10");
					for($i=0;$i<10;$i++){ ?>
					<div id="comm_con">
						<a href="/assistant/assistant.php?id=<?php echo $list[$i]->resource_id;?>"><?php echo $list[$i]->comment;?></a>
					</div>
					<?php } ?>
				</div>
				<div id="comm_r"></div>
			</div>
		--></div>
		</div>
		<?php include_once('../inc/bottom.php'); ?>
</div>
</body>
<script type="text/javascript">
$('.ttc_a a').click(function(e){
	e.preventDefault();
		window.location.href = "/assistant/index.php?age=" + $(this).attr('id');
});
</script>
</html>