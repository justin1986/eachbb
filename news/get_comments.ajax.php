<?php 
	include_once('../frame.php');
	if(!is_ajax()) die('invlid request!');
	$id = $_GET["id"];
	if(!is_numeric($id)) die('invlid request!');
	$db=get_db();
	$sql = "SELECT n.id,n.resource_id,n.title,n.comment,n.created_at,e.comment_id,e.up,e.down FROM eb_comment n left join eb_comment_dig e on n.id=e.comment_id where resource_type='news' and resource_id ={$id} order by created_at desc";
	$comments = $db->paginate($sql,7,'comment_page');
?>
<div id="critique">
	<div id="c_l">读者评论<a href="#">(共<?php echo $comment_page_record_count; ?>条)</a></div>
	<div id="c_r"><a href="#">查看所有评论</a></div>
	</div>
	<div class="cri_content">
	<?php 
	foreach ($comments as $comment){ ?>
	<div class="cri_tz">
		<div class="crit_l"><?php echo $comment->title; ?>&nbsp;&nbsp;&nbsp;<font><?php echo date('Y-m-d',$comment-> created_at);?></font></div>
		<div class="crit_r"><a href="<?php echo $comment->id?>" class="a_comment_up">支持(<span class="span_up_num"><?php echo intval($comment->up);?></span>)</a> <a href="<?php echo $comment->id?>" class="a_comment_down">反对(<span  class="span_down_num"><?php echo intval($comment->down);?></span>)</a></div>
		<div class="cri_c"><?php echo $comment->comment;?></div>
		<div class="c_hr"></div>
	</div>
	<?php } ?>
	<div class="fun"><?php paginate("/news/get_comments.ajax.php",'res','comment_page'); ?></div>
</div>
