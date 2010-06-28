<?php 
	include_once('../frame.php');
	$id = $_REQUEST["id"];
	$db=get_db();
	$sql = "SELECT id,resource_id,title,nick_name,comment,created_at FROM eb_comment e where resource_type='news' and resource_id ={$id} order by created_at desc";
	$list_news = $db->paginate($sql,7);
?>
<div id="critique">
	<div id="c_l">读者评论<a href="#">(共<?php echo $page_record_count; ?>条)</a></div>
	<div id="c_r"><a href="#">查看所有评论</a></div>
	</div>
	<div class="cri_content">
	<?php 
	foreach ($list_news as $news){ ?>
	<div class="cri_tz">
		<div class="crit_l"><a href="<?php get_news_url($news) ?>" title="<?php echo $news->title; ?>"><?php echo $news->title; ?></a>&nbsp;&nbsp;&nbsp;<?php echo $news-> created_at;?></div>
		<div class="crit_r"><a href="#">支持(0)</a><a href="#">反对(0)</a></div>
		<div class="cri_c"><a href="<?php get_news_url($news) ?>" title="<?php echo $news->comment;?>"><?php echo $news->comment;?></a></div>
		<div class="c_hr"></div>
	</div>
	<?php } ?>
	<div class="fun"><?php paginate(); ?></div>
</div>
 