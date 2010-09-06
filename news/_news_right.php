<?php

?>
<div id="list_container">
	<div class="br_img"><img src="/images/article/r1.jpg"/></div>
	<div id="class">
		<div class="cla_t"></div>
		<div class="cla_c">
			<div class="cla_title">早教课程</div>
			<div class="cla_img">
				<?php
				$list=$db->query("SELECT id FROM eb_category where category_type = 'news'");
				$count = $db->query("SELECT count(id)id FROM eb_category where category_type = 'news'");
				$news_id;
				for($i = 0 ; $i < $count[0]->id ;  $i++)
				{
					//echo $result_id->id;
						$news_id .= $list[$i]->id.",";
				}
				$list=$db->query("SELECT id,name,url FROM eb_images  where category_id in (".$news_id.") and is_adopt=1 order by create_time desc,click_count desc limit 3;");
				for($i=0;$i<3;$i++){ ?>
				<div class="ci_z">
					<div class="ci_pg"><img src="<?php echo $list[$i]->url;?>"></div>
					<div class="ci_title"><?php echo $list[$i]->name;?></div>
				</div>
				<?php } ?>
			</div>
			<div class="cla_hr"></div>
			<img src="/images/index/img_r_a.jpg" style="width:289px; margin-top:10px; border:0px solid red;"/>
		</div>
	</div>
	<div id="comment">
		<div id="comm_l"></div>
		<div id="comm_c">
			<div id="comm_t">
				<div id="com_title">业界快讯排行</div>
				<div id="com_x">
				</div>
			</div>
			<!-- 右边 业界快讯 一条列表的内容  开始 -->
			<?php
			$list = $db->query("SELECT id,title FROM eb_news  where  is_adopt=1 and category_id in(".substr($news_id,0,-1).") order by last_edited_at,created_at,click_count desc LIMIT 10");
			for($i=0;$i<10;$i++){ ?>
			<div id="comm_con">
				<div class="number" style="<?php if($i==0){ echo "background:url(/images/new_list/number.jpg) no-repeat;";} ?>"><?php echo $i+1; ?></div>
				<a href="/news/news.php?id=<?php echo $list[$i]->id;?>"><?php echo $list[$i]->title;?></a>
			</div>
			<!-- 右边 业界快讯 一条列表的内容  结束 -->
			<?php } ?>
		</div>
		<div id="comm_r"></div>
	</div>
	<div class="br_img" style="margin-top:20px;"><img src="/images/article/r1.jpg"/></div>
</div>