<div id="list_container">
	<?php include_once('_news_logo_public.php'); ?>
	<div id="comment">
		<div id="comm_l"></div>
		<div id="comm_c">
			<div id="comm_t">
				<div id="com_title">咨询排行榜</div>
				<div id="com_x">
				</div>
			</div>
			<!-- 右边 业界快讯 一条列表的内容  开始 -->
			<?php
			$list = $db->query("SELECT id,title FROM eb_news  where  is_adopt=1 and category_id in(".substr($news_id,0,-1).") order by last_edited_at,created_at,click_count desc LIMIT 10");
			for($i=0;$i<10;$i++){ ?>
			<div id="comm_con">
				<div class="number" style="<?php if($i==0){ echo "background:url(/images/new_list/number.jpg) no-repeat;";} ?>"><?php echo $i+1; ?></div>
				<a href="/news/news.php?id=<?php echo $list[$i]->id;?>" target='_blank'><?php echo $list[$i]->title;?></a>
			</div>
			<!-- 右边 业界快讯 一条列表的内容  结束 -->
			<?php } ?>
		</div>
		<div id="comm_r"></div>
	</div>
	<div class="br_img" style="margin-top:20px;"><img src="/images/article/r1.jpg"/></div>
</div>