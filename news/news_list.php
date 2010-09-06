<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>consult</title>
<?php
	include_once('../frame.php');
	$db=get_db();
	$id=intval(trim($_REQUEST['category_id']));
	if(empty($id))
	{
		die('invliad params!');
	}
	$title_id = $db->query("select name from eb_category where id=$id");
	css_include_tag('news_list');
	//获得顶级category id；
	$category = new category_class("news");
	$item = $category->find($id);
	if($item->level >= 2)
	{
		$item_ids=$category->tree_map($id);
		$category_id = end($item_ids);
	}else{
		$category_id = $id;
	}
	if(!$category_id){
		die('invalid param');
	}
	$sub_category_items = $category->find_sub_category($category_id);
	$all_category_ids = $category->children_map($category_id);
	$exists_news_ids = array();
?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/_consult_top.php'); ?>
		<div id="log_top">
			<div id="log_t">
				<div id="log"></div>
				<div id="log_address"><a href="/" style="font-size:12px; color:blue;">首页</a> &nbsp;&gt;&gt; &nbsp;<a href="/news" style="font-size:12px; color:blue;">资讯</a>&nbsp;&gt;&gt;&nbsp;<?php echo $title_id[0]->name;?></div>
			</div>
			<div id="hr"></div>
		</div>
		<div id="result_container">
			<div id="recommend_container">
				<div id="recommend_top_pg"></div>
				<div id="recommend_content_pg">
					<div id="recommend_img"></div>
					<div id="recommend_c_hr"></div>
					<!-- 编辑推荐 开始 -->
					<div id="res_container">
						<!-- 编辑推荐 顶部  大层-->
						<div id="res_top">
							<!--显示文字的层  -->
							<div id="res_l">编辑推荐</div>
							<!-- 显示 顶部背景 红色原点 -->
							<div id="res_pg"></div>
						</div>
						<ul>
							<?php for($i=0;$i<5;$i++){ ?>
							<li><a href="#">编辑推荐编辑辑辑辑辑辑辑辑辑辑辑辑辑辑辑辑辑推荐</a></li>
							<?php } ?>
						</ul>
					</div>
					<!-- 编辑推荐 结束-->
				</div>
				<div id="recommend_bottom_pg"></div>
			</div>
			<!-- 新闻 列表  大面板 -->
			<?php
				$i=0;
				foreach ($sub_category_items as $sub_category)
				{
			?>
			<!-- 列表开始 -->
			<div class="result_list" style="<?php if($i%2==1){ echo "margin-left:20px;";} ?>">
				<div class="result_top_pg"><font><?php echo $sub_category->name?></font></div>
				<div class="result_pg">
					<!-- 左边图片的显示 和 标题-->
					<?php
						$list_news=$db->query("select created_at,id,title,video_photo_src from eb_news where category_id =".$sub_category->id." and is_adopt=1 and set_up=1 order by created_at desc limit 1");
						if($list_news[0]) $exists_news_ids[] = $list_news->id;
					?>
					<div class="result_left">
						<a href="<?php get_news_url($list_news[0]); ?>" title="<?php $list_news[0]->video_photo_src;?>"><img src="<?php echo $list_news[0]->video_photo_src;?>" /></a>
						<a href="<?php get_news_url($list_news[0]); ?>" title="<?php echo $list_news[0]->title; ?>"><?php echo $list_news[0]->title; ?></a>
					</div>
					<!-- 右边 列表的显示 -->
					<div class="result_right">
						<ul>
							<?php
							$list_news=$db->query("select created_at,id,title,video_photo_src from eb_news where category_id =".$sub_category->id." and is_adopt=1 order by created_at desc  limit 7");
							 foreach ($list_news as $news){ ?>
							<li><div></div><a href="<?php get_news_url($news); ?>" title="<?php echo $news->title; ?>"><?php echo $news->title; ?></a></li>
							<?php 
								if($news) $exists_news_ids[] = $news->id;
							} ?>
						</ul>
					</div>
				</div>
				<div class="result_bottom_pg"></div>
			</div>
			<?PHP
					$i++;
				}
			?>
			<!-- 中间虚线 显示内容开始 -->
			<div id="list">
				<div id="list_top"></div>
				<div id="list_news_container">
					<!--底部 标题列表 左边的虚线 -->
					<div class="list_container_l"></div>
					<div id="list_container_title">
						<div id="list_container_top">
								<?php
								$all_category_ids = implode(',', $all_category_ids); 
								$exists_news_ids = implode(',', $exists_news_ids);
								$sql="SELECT created_at,id,title FROM eb_news e where is_adopt=1 and category_id in ({$all_category_ids})";
								if($exists_news_ids){
									$sql .= " and id not in ({$exists_news_ids})";
								}
								$sql .= " order by created_at desc";								
								$list_news=$db->paginate($sql,26);
								foreach ($list_news as $news){ ?>
								<div class="list_title">
									<div></div>
									<a href="<?php get_news_url($news); ?>" title="<?php echo  $news->title; ?>"><?php echo $news->title; ?></a>
								</div>
								<?php } ?>
						</div>
						<div id="list_container_fun"><?php paginate(); ?></div>
					</div>
					<!-- 底部 标题列表 右边的虚线 -->
					<div class="list_container_l" style="float:right;"></div>
				</div>
				<div id="list_bottom"></div>
			</div>
		</div>
		<div id="list_container">
			<div class="br_img"><img src="/images/article/r1.jpg"/></div>
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
							<div class="ci_title"><a href="<?php get_news_url($list[$i]); ?>" title="<?php echo $list[$i]->title;?>"><?php echo $list[$i]->title;?></a></div>
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
			<div id="comment">
				<div id="comm_l"></div>
				<div id="comm_c">
					<div id="comm_t">
						<div id="com_title">业界快讯排行</div>
						<div id="com_x">
						</div>
						<a href="#"><img/></a>
					</div>
					<!-- 右边 业界快讯 一条列表的内容  开始 -->
					<?php for($i=0;$i<10;$i++){ ?>
					<div id="comm_con">
						<div class="number" style="<?php if($i==0){ echo "background:url(/images/new_list/number.jpg) no-repeat;";} ?>"><?php echo $i+1; ?></div>
						<a href="#">选购得宝也也也也也也也也也也也能当，宝宝食</a>
					</div>
					<!-- 右边 业界快讯 一条列表的内容  结束 -->
					<?php } ?>
				</div>
				<div id="comm_r"></div>
			</div>
			<div class="br_img" style="margin-top:20px;"><img src="/images/article/r1.jpg"/></div>
		</div>
		<?php include_once('../inc/bottom.php');?>
</div>
</body>
</html>