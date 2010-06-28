<?php 
	include_once('../frame.php');
	if(!is_ajax()) die('invlid request!');
	$id = $_GET["id"];
	if(!is_numeric($id)) die('invlid request!');
	$db=get_db();
	$sql = "SELECT n.id,n.resource_id,n.title,n.comment,n.created_at,e.comment_id,e.up,e.down FROM eb_comment n left join eb_comment_dig e on n.id=e.comment_id where resource_type='news' and resource_id ={$id} order by created_at desc";
	$list_news = $db->paginate($sql,7,'comment_page');
?>
<div id="critique">
	<div id="c_l">读者评论<a href="#">(共<?php echo $comment_page_record_count; ?>条)</a></div>
	<div id="c_r"><a href="#">查看所有评论</a></div>
	</div>
	<div class="cri_content">
	<?php 
	foreach ($list_news as $news){ ?>
	<div class="cri_tz">
		<div class="crit_l"><?php echo $news->title; ?>&nbsp;&nbsp;&nbsp;<font><?php echo date('Y-m-d',$news-> created_at);?></font></div>
		<div class="crit_r"><div name="<?php echo $news->id;?>" class="up">支持(<font><?php if($news->up>0){echo $news->up;}else{ echo 0;} ?></font>)</div> <div name="<?php echo $news->id;?>" class="down">反对(<font><?php if($news->down>0){echo $news->down;}else{echo 0;}?></font>)</div></div>
		<div class="cri_c"><?php echo $news->comment;?></div>
		<div class="c_hr"></div>
	</div>
	<?php } ?>
	<div class="fun"><?php paginate("/news/get_comments.ajax.php",'res','comment_page'); ?></div>
</div>