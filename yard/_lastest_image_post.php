<?php
	include_once('../frame.php');
	$user = User::current_user();
	if(!$user) die();
	$db=get_db();
	$id =$_POST["id"];
	if($id){
		$result = $db->query("SELECT * FROM `eachbb_member`.lastest_news where resource_type='image' and u_id=$id order by created_at desc");
	}else{
		$result = $db->query("SELECT * FROM `eachbb_member`.lastest_news where resource_type='image' and u_id in (SELECT f_id FROM `eachbb_member`.friend where u_id ={$user->id} group by f_id) order by created_at desc");
	}
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
					<?php echo $result->u_name.$result->form;?>
				</a>
			</div>
			<?php if($result->photo){?>
			<img src="<?php echo thumb_name($result->photo,'small');?>"   onload="if(this.width>50)this.width=50"></img>
			<?php }?>
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
		echo "<div style='width:540px; height:100px; line-height:100px; font-size:20px; text-align:center; font-weight:bold;'>对不起！暂无相片信息！</div>";
	}
	?>
	