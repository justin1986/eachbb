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
<title><?php echo $column[0]->title;?></title>
<?php
	use_jquery();
	css_include_tag('article');
	js_include_tag('jquery.cookie', 'assistant/news');
?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/top_consult.php'); ?>
		<div id="fbody">
		<div id="log_top">
			<div id="log_t">
				<div id="log"></div>
				<div id="log_address">
					<a href="/">首页</a>
					<?php 
						$category = new category_class('assistant');
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
			<div id="title"><a href="#" title="<?php echo $column[0]->title;?>"><?php echo $column[0]->title;?></a></div>
			<div id="title_b">
				<div id="ret">记者：<a href="#" title="<?php echo $column[0]->publisher;?>"><?php echo $column[0]->publisher;?></a></div>
				<div id="problem" title="<?php echo $column[0]->created_at;?>">发布与：<?php echo $column[0]->created_at;?></div>
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
			<div id="br_img"></div>
			<div id="class">
				<div class="cla_t"></div>
				<div class="cla_c">
					<div class="cla_title">早教课程</div>
					<div class="cla_img">
						<?php
						$list=$db->query("SELECT id,title,img_url,description,content FROM eb_teach e where is_adopt=1 order by create_time desc,click_count desc limit 15;");
						for($i=0;$i<3;$i++){ ?>
						<div class="ci_z">
							<div class="ci_pg"><a href="<?php get_news_url($list[$i]); ?>"><img src="<?php echo $list[$i]->img_url;?>"></a></div>
							<div class="ci_title"><a href="<?php get_news_url($list[$i]); ?>"  title="<?php echo $list[$i]->title;?>"><?php echo $list[$i]->title;?></a></div>
						</div>
						<?php } ?>
					</div>
					<div class="cla_hr"></div>
					<div class="cla_menu">
						<?php for($i=3; $i<15; $i++){ ?>
						<div class="cla_m_v"><a href="<?php get_news_url($list[$i]); ?>" title="<?php echo $list[$i]->title; ?>"><?php echo $list[$i]->title; ?></a></div>
						<div class="cla_r"></div>
						<?php } ?>
					</div>
				</div>
				<div class="cla_b"></div>
			</div>
			<div id="tag">
				<div id="tag_l"></div>
				<div id="tag_c">
					<div id="tagc_t"><font>热门</font>关键字</div>
					<div class="tag_menu">
						<?php for($i=0; $i<9; $i++){ ?>
						<div class="cla_m_v"><a href="">早教课程</a></div>
						<div class="cla_r"></div>
						<?php } ?>
					</div>
				</div>
				<div id="tag_b"></div>
			</div>
			<div class="bd">
				<div class="bd_t"></div>
				<div class="bd_c">
					<div class="bdt_t">
						<div class="bdt_tl">相关文章列表</div>
						<div class="bdt_more"><a href="#"><font>+</font>更多</a></div>
					</div>
					<div class="bdt_hr">
						<div class="bdt_hr2"></div>
					</div>
					<div class="bdt_v">
						<?php for($i=0;$i<9;$i++){ ?>
						<div>
							<div class="bdt_l"></div>
							<div class="book_title">
								<a href="#">撒旦法十分</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="bd_b"></div>
			</div>
			
			<div id="comment">
				<div id="comm_l"></div>
				<div id="comm_c">
					<div id="comm_t">
						<div id="com_title">相关评论</div>
						<div id="com_x">
						</div>
						<a href="#"><img/></a>
					</div>
					<?php for($i=0;$i<10;$i++){ ?>
					<div id="comm_con">
						<a href="#">选购得宝也能当，宝宝食</a>
					</div>
					<?php } ?>
				</div>
				<div id="comm_r"></div>
			</div>
		</div>
		</div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
</div>
</body>
</html>