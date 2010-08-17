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
	$albumd_id=$_POST['album_id'];
	$number=$_POST['number'];
	if(!is_numeric($id)) die('invlid request!');
	if(!is_numeric($number)) die('invlid request!');
	$photo=$db->query("SELECT id,u_id,u_name,photo,width,height,created_at,description,album_id FROM eachbb_member.photo p where album_id=$id  order by created_at desc;");
	if(!$photo){
		$album=$db->query("select id,u_id,name,created_at from eachbb_member.album where id=$id;");
		if($album[0]->u_id === $idd)
			echo "<div style = 'height:400px; width:770px; line-height:400px; text-align:center;'><a href='/yard/album_list.php' style='font-size:22px; font-weight:bold;'>您的相册暂时无图片！点击返回相册列表！</a></div>";
		else 
			echo "<div style = 'height:400px; width:770px; line-height:400px; text-align:center;'><a href='/yard/album_list.php' style='font-size:22px; font-weight:bold;'>您好友的相册暂时无图片！点击返回相册列表！</a></div>";
	}else{
	$nb=$db->record_count;
	$album=$db->query("select id,u_id,name,created_at from eachbb_member.album where id=$id;");
	$result=$photo[$number]->id;
	$photo_id=$photo[0]->u_id;
	?>
<div id="title_container">
	<input type="hidden" id="resos_id" value="<?php echo $photo[$number]->id;?>"/>
	<table width="770" height="12" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="93" align="center">第<?php echo $number+1;?>/<?php echo $nb;?>张</td>
			<td width="92" align="center" style="border-left:1px dashed #000000;"><a href="/yard/album_list.php<?php if($albumd_id !== $user->id){ echo "?id=".$albumd_id;}?>">返回相册列表</a></td>
			<td width="100" align="center" ><?php if($albumd_id === $user->id){?><a href="#" id="e_delete">删除该图片</a><?php }?></td>
			<td width="100" align="center" ><a href="" id="update_img" <?php if($albumd_id === $user->id){ echo 'style="display:inline;"';}else{ echo 'style="display:none;"';}?>>编辑图片</a></td>
			<td width="272" align="center"><div id="select_id" style="display:none;">
				移动到相册：<select>
					<?php
						$album_id=$photo[0]->album_id;
						$alb=$album_id;
						$alpum =$db->query("SELECT id,name FROM eachbb_member.album a where u_id={$user->id} order by last_update_time,visit_count,comment_count desc;");
						foreach ($alpum as $al){
						?>
						<option value="<?php echo $al->id;?>" <?php if($alb == $al->id){ echo 'selected="selected"';}else{}?>><?php echo $al->name;?></option>
					<?php  }?>
				</select>
			<a href="" id="btn_update">确定</a></div><a href="" id="yidong" <?php if($albumd_id === $user->id){ echo 'style="display:inline;"';}else{ echo 'style="display:none;"';}?>>移动图片</a></td>
			<td width="51" align="right"><a id="prev" href="#">上一张</a></td>
			<td width="62" align="center"><a id="next"  href="#">下一张</a></td>
		</tr>
	</table>
</div>
<div id="img_show">
	<?php if($photo[$number]->photo){?>
	<img src="<?php echo $photo[$number]->photo;?>"/>
	<?php }else{ echo "<a href='/yard/album_list.php' style='font-size:16px; font-weight:bold;'>图片路径有误！点击返回相册列表！</a>";}?>
</div>
<input type="hidden" value="<?php echo $number?>" id="number"/>
<input type="hidden" value="<?php echo $nb?>" id="nb"/>
<div id="img_bottom"><span>图片名称：</span><?php echo $photo[$number]->u_name;?>&nbsp;<span>相册名称:</span><a href="#">
	<?php echo $album[0]->name;?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;共(<span><?php echo $nb;?></span>)张
<font><?php echo $photo[$number]->created_at;?></font>
</div>
<div style="width:750px; height:16px; font-size:12px; font-weight:bold; text-align:left; float:left; display:inline; ">
	图片描述：
</div>
<div style=" width:750px;  margin-toP:10px; line-height:20px; text-indent:20px; font-size:12px; text-align:left; margin-top:0px; word-wrap: break-word; word-break: normal; float:left; display:inline; ">
<?php echo $photo[$number]->description;?>
</div>
<?php 
	$ry_id=trim($_POST["ry_id"]);
	$db=get_db();
	$sql="SELECT id,user_id,created_at,comment,resource_id FROM eachbb_member.comment c where resource_type='photo' and resource_id=$result order by created_at desc limit 8";
	$list=$db->query($sql);
	if($list){
		$i=0;
		foreach ($list as $comment){
			$info=$db->query("SELECT id,true_name,avatar FROM eachbb_member.member m where id={$comment->user_id};");
		?>
		<div class="show_banner" id="<?php echo $comment->id;?>">
		<div class="show_img_banner">
			<a href="/yard/home.php?id=<?php echo $info[0]->id;?>">
			<img src="<?php echo $info[0]->avatar;?>"/></a>
		</div>
		<div class="show_result_banner">
			<div class="show_result_top">
				<a href="/yard/home.php?id=<?php echo $info[0]->id;?>"><?php echo $info[0]->true_name;?></a>
				<span><?php echo $comment->created_at;?></span>
				<?php if(!$ry_id){?>
					<a href="#">
					<input type="hidden" class="comment_id" id="comment_<?php echo $i;?>" value="<?php echo $comment->id;?>" />
					<?php if($idd == $comment->user_id){?>
					<img src="/images/yetrb/x.jpg"/>
					<?php }?>
					</a>
				<?php }?>
			</div>
			<div class="show_result"><?php echo htmlspecialchars_decode($comment->comment);?></div>
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
