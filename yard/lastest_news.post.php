<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	$id =$_POST["id"];
	if(!$user) die();
	if(!$id){
		$id = $user->id;
		$select =$_POST['select'];
		$type = $_POST['type'];
		if(!in_array($type,array('all','oneword','diary','image','suibian'))){die('no such type!');}
		$result = User::lastest_news($type,$user->id);
	}else{
		$db = get_db();
		if($type == "all"){
			$result = $db->query("select * from `eachbb_member`.lastest_news where u_id=$id order by created_at desc limit 9");
		}else if($type == "suibian"){
			$result = $db->query("select * from `eachbb_member`.lastest_news order by rand(),created_at desc limit 9");
		}else if($type == "oneword"){
			$result = $db->query("select * from `eachbb_member`.lastest_news where u_id=$id and resource_type='oneword' order by created_at desc limit 9");
		}else{
			$result = $db->query("select * from `eachbb_member`.lastest_news where u_id=$id limit 9");
		}
	}
	
	$num = $db->record_count;
    if($result){
    for($i=0;$i<$num;$i++){
    	?>
	<div class="pc_z">
		<div class="pc_pg_img">
			<div class="pc_img"><img src="
			<?php 
		if($result[$i]->u_avatar){
			echo thumb_name($result[$i]->u_avatar,'small');
		}else{
			echo "/images/yard_info_img/1.jpg";
		}
	?>
			"/></div>
		</div>
		<div class="pc_word">
			<div class="title_pc">
				<a href="/yard/home.php?id=<?php echo $result[$i]->u_id;?>">
					<?php echo $result[$i]->u_name;?>
				</a>
				<?php echo $result[$i]->form ;?>
			</div>
			<div class="content_pc" style="<?php if(!($result[$i]->content)){echo "display:none;";}?>">
				<?php echo htmlspecialchars_decode($result[$i]->content);?>
				<a href="/baby/index_daily_show.php?daily_id=<?php echo $result[$i]->id;?>">
				&nbsp;&nbsp;查看全部&gt;&gt;
				</a>
			</div>
			<div class="photo_box" style="<?php if(!($result[$i]->photo)){echo "display:none;";}?>"><a href="<?php echo $result[$i]->photo;?>">
				<img src="<?php echo thumb_name($result[$i]->photo,'small');?>" border=0  onload="this.width=Math.min(this.width,100)"/></a></div>
			<div class="time_pc"><?php echo mb_substr($result[$i]->created_at,0,16);?></div>
		</div>
	</div>
	<?php 
	}}else{
		
		echo "<div style='width:540px; height:100px; line-height:100px; font-size:20px; text-align:center; font-weight:bold;'>对不起！无信息！</div>";
		
	}
	?>
	