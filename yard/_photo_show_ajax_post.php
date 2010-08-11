<?php
	include_once('../frame.php');
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");
		redirect('/login/');
		exit();
	}
	$idd=$user->id;
	$db = get_db();
	$id=$_POST['id'];
	$number=$_POST['number'];
	if(!is_numeric($id)) die('invlid request!');
	if(!is_numeric($number)) die('invlid request!');
	$photo=$db->query("SELECT id,u_id,u_name,photo,width,height,created_at,description FROM eachbb_member.photo p where album_id=$id;");
	if(!$photo){
		echo "<a href='/yard/album_list.php' style='font-size:16px; font-weight:bold;'>您的相册暂时无图片！点击返回相册列表！</a>"; 
		
	}else{
	$nb=$db->record_count;
	$album=$db->query("select id,name,created_at from eachbb_member.album where id=$id;");
	$result=$photo[$number]->id;
	$photo_id=$photo[0]->u_id;
?>
<div id="title_container">
	<input type="hidden" id="resos_id" value="<?php echo $photo[$number]->id;?>"/>
	<table width="770" height="12" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="93" align="center">第<?php echo $number+1;?>/<?php echo $nb;?>张</td>
			<td width="92" align="center" style="border-left:1px dashed #000000;"><a href="/yard/album_list.php">返回该专辑</a></td>
			<td width="442" align="center">&nbsp;</td>
			<td width="81" align="right"><a id="prev" href="#">上一张</a></td>
			<td width="62" align="center"><a id="next"  href="#">下一张</a></td>
		</tr>
	</table>
</div>
<div id="img_show">
	<img src="<?php echo $photo[$number]->photo;?>"/>
</div>
<input type="hidden" value="<?php echo $number?>" id="number"/>
<input type="hidden" value="<?php echo $nb?>" id="nb"/>
<div id="img_bottom"><span><?php echo $photo[$number]->u_name;?></span>&nbsp;相册:<a href="#">
	<?php echo $album[0]->name;?></a>(<?php echo $nb;?>)
<font><?php echo $photo[$number]->created_at;?></font>
</div>
<?php 
	$ry_id=trim($_POST["ry_id"]);
	$db=get_db();
	$sql="SELECT id,user_id,created_at,comment,resource_id FROM eachbb_member.comment c where resource_type='photo' and resource_id=$result";
	$list=$db->query($sql);
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
					<input type="hidden" class="comment_id" id="comment_<?php echo $i;?>" value="<?php echo $comment->id;?>" />
					<?php echo $photo_id."sdf".$idd;?>
					<?php if($idd == $photo_id){?>
					<img src="/images/yetrb/x.jpg"/>
					<?php }?>
					</a>
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
	<div class="show_banner">
	<div class="show_result_banner" style="margin-left:30px; float:left;">
		<textarea id="show_result"></textarea>
		</div>
		<input type="button" id="subb" style="margin-left:30px;" value="发布评论"/>
		<input type="reset" id="no_subb" value="取消发布" />
	</div>
<?php }?>
