<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once(dirname(__FILE__).'/../frame.php');
	$id =intval(trim($_REQUEST['id']));
	if(empty($id)){
		#redirect('error.html');
		#die();
	}
	$db = get_db();
	$column = $db->query("SELECT id,title,click_count,short_title,category_id,description,content,created_at,last_edited_at,video_photo_src,keywords,publisher FROM eb_news e where id=".$id." order by last_edited_at desc");
	?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<meta name="Keywords" content="<?php
$lines=explode("||",$column[0]->keywords);
foreach ($lines as $li){ 
	echo $li;
} ?>"/>
<meta name="Description" content="<?php echo  preg_replace('/\r|\n/', '',str_replace(" ","",strip_tags($column[0]->description)));?>"/>
<title><?php echo $column[0]->title;?></title>
<?php
	use_jquery();
	css_include_tag('article','news_list');
	js_include_tag('jquery.cookie', 'news/news');
?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_consult_top.php'); ?>
		<div id="fbody">
		<div id="log_top">
			<div id="log_t">
				<div id="log"></div>
				<div id="log_address">
					<a href="/">首页</a>
					<?php 
						$category = new category_class('news');
						$cate_tree = $category->tree_map_item($column[0]->category_id);
						$cate_tree = array_reverse($cate_tree);
						foreach ($cate_tree as $cate){
							$list_url = get_news_list_url($cate_tree[0]->id);
							echo " &gt;&gt; <a href='{$list_url}'>{$cate->name}</a>";
						}
					?>
					<span> &gt;&gt; <?php echo $column[0]->title;?></span>
				</div>
			</div>
			<div id="hr"></div>
		</div>
		<div id="b_l">
			<div id="title"><a href="#" title="<?php echo $column[0]->title;?>"><?php echo mb_strlen($column[0]->title,"utf-8")>15 ? mb_substr($column[0]->title,0,15,"utf-8")."...":$column[0]->title;?></a></div>
			<div id="title_b">
				<div id="problem" title="<?php echo $column[0]->created_at;?>">发布与：<?php echo $column[0]->created_at;?></div>
			</div>
			<div id="text">
				<div id="text_tpg"></div>
				<div id="text_cpg">
					<div id="text_word">
						<ul>
							<li><font>本文关键字：</font></li>
							<?php
							$lines=explode("||",$column[0]->keywords);
							foreach ($lines as $li){ ?>
							<li class="keyword_container"><a href="<?php echo get_search_keyword_url($li);?>" title="<?php  echo $li; ?>"><?php  echo $li; ?></a></li>
							<?php  } ?>
						</ul>
					</div>
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
		<?php include_once('_news_right.php');?>
		</div>
		<?php include_once('../inc/bottom.php');?>
</div>
</body>
</html>