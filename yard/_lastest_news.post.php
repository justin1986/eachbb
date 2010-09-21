<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	$id =$_POST["id"];
	if($id){
		$user=$db->query("SELECT * FROM eachbb_member.member m where id=$id");
		$user = $user[0];
	}
	if(!$user) die();
	$result= $db->query("SELECT * FROM eachbb_member.lastest_news where u_id in (SELECT f_id FROM `eachbb_member`.friend where u_id ={$user->id} group by f_id) and resource_type='diary' order by rand(),created_at desc LIMIT 10");
    if($result){
    foreach ($result as $result){?>
	<div class="pc_z">
		<div class="pc_pg_img">
			<div class="pc_img"><img src="
			<?php 
		if($result->u_avatar){
			echo thumb_name($result->u_avatar,'small');
		}else{
			echo "/images/yard_info_img/1.jpg";
		}
	?>
			"/></div>
		</div>
		<div class="pc_word">
			<div class="title_pc">
				<a href="/yard/home.php?id=<?php echo $result->u_id;?>">
					<?php echo $result->u_name;?>
				</a>
			</div>
			<div class="content_pc" style="<?php if(!($result->content)){echo "display:none;";}?>">
				<?php echo htmlspecialchars_decode($result->content);?>
				<a href="/baby/index_daily_show.php?daily_id=<?php echo $result->id;?>">
				&nbsp;&nbsp;查看全部&gt;&gt;
				</a>
			</div>
			<div class="time_pc"><?php echo mb_substr($result->created_at,0,16);?></div>
		</div>
	</div>
	<?php 
	}}else{
		echo "<div style='width:540px; height:100px; line-height:100px; font-size:20px; text-align:center; font-weight:bold;'>对不起！您的好友无日记！</div>";
	}
	?>
	