<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('../frame.php');
	$db=get_db();
	$id=intval(trim($_REQUEST['id']));
	if(empty($id))
	{
		#redirect('error.html');
		#die();
	}
	?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>consult</title>
<?php
		css_include_tag('news_list','news_list');
?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/top_consult.php'); ?>
		<div id="log_top">
			<div id="log_t">
				<div id="log"></div>
				<div id="log_address">创业 &gt; 创业投资 &gt; 美国创业基金的中国风格</div>
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
			<!-- 左边 营养篇  和 其他三个 列表  大面板 -->
			<?php
				$category=new category_class("news");
				$id=129;
				$item=$category->find($id);
				$not_id;
				if(($item->level)==2)
				{
					$item_id=$category->tree_map($id);
					$id=$item_id[1];
				}
				$item=$category->children_map($id);
				$i=0;
				foreach ($item as $c)
				{
					if($i!=0)
					{
						$category_new=$db->query("SELECT id,name FROM eb_category e where id=$c");
						?>
						
			<!-- 心里篇  开始 -->
			<div class="result_list" style="<?php if($i%2==0){ echo "margin-left:20px;";} ?>">
				<div class="result_top_pg"><font><?php echo $category_new[0]->name?></font></div>
				<div class="result_pg">
					<!-- 左边图片的显示 和 标题-->
					<?php
						$list_category=$db->query("select id,title,video_photo_src from eb_news where category_id =".$category_new[0]->id." and is_adopt=1 order by created_at desc  limit 8");
						for($k=0;$k<count($list_category);$k++)
						{
							$not_id=$not_id.$list_category[$k]->id.",";
						}
					?>
					<div class="result_left">
						<a href="" title="<?php $list_category[0]->video_photo_src;?>"><img src="<?php echo $list_category[0]->video_photo_src;?>" /></a>
						<a href="#" title="<?php echo $list_category[0]->title; ?>"><?php echo $list_category[0]->title; ?></a>
					</div>
					<!-- 右边 列表的显示 -->
					<div class="result_right">
						<ul>
							<?php for($j=1;$j<=7; $j++){ ?>
							<li><div></div><a href="#"><?php echo $list_category[$j]->title; ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="result_bottom_pg"></div>
			</div>
			<?PHP
					}
					$i++;	
					
				}
			?>
			<!-- 心里篇 结束 -->
			<!-- 中间虚线 显示内容开始 -->
			<div id="list">
				<div id="list_top"></div>
				<div id="list_news_container">
					<!--底部 标题列表 左边的虚线 -->
					<div class="list_container_l"></div>
					<div id="list_container_title">
						<div id="list_container_top">
								<?php 
								$str="";
								foreach ($item as $idd)
								{
									$str=$str.$idd.",";
								}
								$sql="SELECT * FROM eb_news e where  is_adopt=1 and category_id in (".substr($str,0,-1) .") and id not in (".substr($not_id,0,-1).")  order by created_at desc limit 1,26;";
								$title_list=$db->query($sql);
								for($i=0;$i<26;$i++){ ?>
								<div class="list_title">
									<div></div>
									<a href="<?php get_news_url($title_list[$i]); ?>" title="<?php echo  $title_list[$i]->title; ?>"><?php echo $title_list[$i]->title; ?></a>
								</div>
								<?php } ?>
						</div>
						<div id="list_container_fun"><a href="#">1</a> <a href="#">2</a> <a href="#">3</a> </div>
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
							<div class="ci_pg"><a href="#"><img src="<?php echo $list[$i]->img_url;?>"></a></div>
							<div class="ci_title"><a href="#"><?php echo $list[$i]->title;?></a></div>
						</div>
						<?php } ?>
					</div>
					<div class="cla_hr"></div>
					<div class="cla_menu">
						<?php for($i=3; $i<15; $i++){ ?>
						<div class="cla_m_v"><a href="" title="<?php echo $list[$i]->title; ?>"><?php echo $list[$i]->title; ?></a></div>
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
		<!-- 下边 标题 列表 -->
		<div id="title_container">
				<div>
				<?php for($i=0;$i<50;$i++){ ?>
					<a href="#">阿斯顿法</a>
				<?php } ?>
				</div>
		</div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
</div>
</body>
</html>