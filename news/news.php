<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('../frame.php');
	$id =intval(trim($_REQUEST['id']));
	if(empty($id)){
		#redirect('error.html');
		#die();
	}
	$db = get_db();
	$column = $db->query("SELECT id,title,click_count,short_title,description,content,created_at,last_edited_at,video_photo_src,keywords,publisher FROM eb_news e where id=".$id." order by last_edited_at desc");
	?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>consult</title>
<?php
		css_include_tag('article');
		use_jquery();
?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/top_consult.php'); ?>
		<div id="fbody">
		<div id="log_top">
			<div id="log_t">
				<div id="log"></div>
				<div id="log_address">创业 &gt; 创业投资 &gt; 美国创业基金的中国风格</div>
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
						<a href="<?php get_news_url($column[0]); ?>" title="<?php echo strip_tags($column[0]->description);?>"><?php echo strip_tags($column[0]->description);?></a>
					</div>
					<div id="text_menu">
						<div class="tm_a"><a href="#">打印</a></div>
						<div id="tm_b"><a href="#">收藏</a></div>
						<div class="tm_a"><a href="#">分享</a></div>
						<div id="tm_ticket"><a href="#">支持&nbsp;<?php echo $column[0]->click_count; ?></a></div>
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
			<?php 
				$sql="SELECT id,resource_id,title,nick_name,comment,created_at FROM eb_comment e where resource_type='news' and resource_id ={$id} order by created_at desc";
				$list_news=$db->paginate($sql,7);
			?>
			<script type="text/javascript">
				
			</script>
			<div id="critique">
				<div id="c_l">读者评论<a href="#">(共<?php echo $page_record_count; ?>条)</a></div>
				<div id="c_r"><a href="#">查看所有评论</a></div>
			</div>
			<div class="cri_content">
				<?php foreach ($list_news as $news){ ?>
				<div class="cri_tz">
					<div class="crit_l"><a href="<?php get_news_url($news) ?>" title="<?php echo $news->title; ?>"><?php echo $news->title; ?></a>&nbsp;&nbsp;&nbsp;<?php echo $news-> created_at;?></div>
					<div class="crit_r"><a href="#">支持(0)</a><a href="#">反对(0)</a></div>
					<div class="cri_c"><a href="<?php get_news_url($news) ?>" title="<?php echo $news->comment;?>"><?php echo $news->comment;?></a></div>
					<div class="c_hr"></div>
				</div>
				<?php } ?>
				<div class="fun"><?php paginate(); ?></div>
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
						<div class="bdt_tl">文章列表</div>
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