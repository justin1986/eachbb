<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	if(!$user) die();
	$select =$_POST['select'];
	$type = $_POST['type'];
	if(!in_array($type,array('all','oneword','diary','image'))){die('no such type!');}
	$result= User::lastest_news($type,$user->id);
	$num = $db->record_count;
    if($result){
    for($i=0;$i<$num;$i++){?>
	<div class="pc_z">
		<div class="pc_pg_img">
			<div class="pc_img"><img src="
			<?php 
		if($result[$i]->u_avatar){
			echo $result[$i]->u_avatar;
		}else{
			echo "/images/yard/noface.jpg";
		}
	?>
			"/></div>
		</div>
		<div class="pc_word">
			<div class="title_pc"><a href="/yard/home.php?id=<?php echo $user->id;?>"><?php echo $result[$i]->u_name;?></a><?php echo $result[$i]->form ;?></div>
			<div class="content_pc" style="<?php if(!($result[$i]->content)){echo "display:none;";}?>"><?php echo htmlspecialchars_decode($result[$i]->content);?><a href="/baby/index_daily_show.php?daily_id=<?php echo $result[$i]->id;?>">&nbsp;&nbsp;查看全部&gt;&gt;</a></div>
			<div class="photo_box" style="<?php if(!($result[$i]->photo)){echo "display:none;";}?>"><a href="<?php echo $result[$i]->photo;?>"><img src="<?php echo $result[$i]->photo;?>" border=0/></a></div>
			<div class="time_pc"><?php echo mb_substr($result[$i]->created_at,0,16);?></div>
		</div>
	</div>
	<?php 
	}}else{
		
		echo "<div style='width:540px; height:100px; line-height:100px; font-size:20px; text-align:center; font-weight:bold;'>对不起！无信息！</div>";
		
	}
	?>
	