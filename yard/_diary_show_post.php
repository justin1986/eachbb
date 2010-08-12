<?php 
	include_once('../frame.php');
	$edit_id=trim($_POST["edit_id"]);
	$ry_id=trim($_POST["ry_id"]);
	$user = User::current_user();
	set_charset("utf-8");
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
	}
	if(!is_numeric($edit_id)) die('invlid request!');
	$db=get_db();
	$list=$db->query("SELECT id,user_id,created_at,comment,resource_id FROM eachbb_member.comment c where resource_type='daily' and resource_id=$edit_id order by created_at desc limit 8");
	if($list){
		$i=0;
		foreach ($list as $comment){
			$info=$db->query("SELECT id,true_name,avatar FROM eachbb_member.member m where id={$comment->user_id};");
		?>
		<div class="show_banner" id="<?php echo $comment->id;?>">
		<div class="show_img_banner">
			<a href="/yard/home.php?id=<?php echo $info[0]->id;?>"><img src="<?php echo $info[0]->avatar;?>"/></a>
		</div>
		<div class="show_result_banner">
			<div class="show_result_top">
				<a href="/yard/home.php?id=<?php echo $info[0]->id;?>"><?php echo $info[0]->true_name;?></a>
				<span><?php echo $comment->created_at;?></span>
				<?php if(!$ry_id){?>
					<a href="#">
					<input type="hidden" class="comment_id" id="comment_<?php echo $i;?>" value="<?php echo $comment->id;?>" /><img src="/images/yetrb/x.jpg"/></a>
				<?php }?>
			</div>
			<div class="show_result"><?php echo $comment->comment;?></div>
		</div>
		</div>
	<?php 	$i++;}
	}else{
	?>
	<div class="show_banner" style="height:50px; text-align:center; line-height:50px; font-size:26px; color:#005EAC;">暂无评论！赶紧发布吧！</div>
	<?php }?>
	<input type="hidden" id="resource_id" value="<?php echo $edit_id;?>"/>
	<div class="show_banner">
<!--		<div class="show_img_banner">-->
<!--			<img src="<?php echo $user->avatar;?>"/>-->
<!--		</div>-->
		<div class="show_result_banner" style="margin-left:30px; float:left;">
			<textarea id="show_result"></textarea>
		</div>
		<input type="button" id="subb" style="margin-left:30px;" value="发布评论"/>
		<input type="reset" id="no_subb" value="取消发布" />
	</div>
	