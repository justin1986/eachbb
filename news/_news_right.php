<?php
	include_once dirname(__FILE__).'/../frame.php';
	use_jquery_ui();
	css_include_tag('article','news_list');
	init_page_items('_news_right');
	$category_id = $_GET["category_id"];
	$id = $_GET["id"];
	$db=get_db();
?>
<div id="list_container">
		<?php include_once('_news_logo_public.php');?>
		<div id="comment">
		<div id="comm_l"></div>
		<div id="comm_c">
			<div id="comm_t">
				<div id="com_title">咨询排行榜</div>
				<div id="com_x">
				</div>
			</div>
			<!-- 右边 业界快讯 一条列表的内容  开始in(".substr($news_id,0,-1).") -->
			<?php
			if($category_id){
				$list = $db->query("SELECT id,title FROM eb_news  where  is_adopt=1 and category_id = $category_id  order by click_count desc LIMIT 10");
			}else{
				$list = $db->query("SELECT id,title FROM eb_news  where  is_adopt=1 and category_id = (select category_id from eb_news where id=$id)  order by click_count desc LIMIT 10");
			}
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
	<div class="br_img"  <?php $pos="assistant_right_ig";show_page_pos($pos,'link_i');?> style="margin-top:20px;">
		<a href="<?php echo $pos_items[$pos]->url;?>"><img style="border:0px solid red;" src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/article/r1.jpg' ;?>"/></a>
	</div>
</div>