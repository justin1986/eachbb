<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	if(!$user) die();
	$select =$_POST['select'];
   $sql = $db->query("select * FROM eachbb_member.lastest_news where u_id in (select f_id from eachbb_member.friend where u_id={$user->id}) order by created_at desc limit 9");
   $num = $db->record_count;
   if($sql){
   for($i=0;$i<$num;$i++){?>
	<div class="pc_z">
		<div class="pc_pg_img">
			<div class="pc_img"><img src="
			<?php 
		if($sql[$i]->u_avatar){
			echo $sql[$i]->u_avatar;
		}else{
			echo "/images/yard/noface.jpg";
		}
	?>
			"/></div>
		</div>
		<div class="pc_word">
			<div class="title_pc"><a href="/yard/home.php?id=<?php echo $user->id;?>"><?php echo $sql[$i]->u_name;?></a><?php echo $sql[$i]->form ;?></div>
			<div class="content_pc" style="<?php if(!($sql[$i]->content)){echo "display:none;";}?>"><?php echo $sql[$i]->content;?><a href="/baby/index_daily_show.php?daily_id=<?php echo $sql[$i]->id;?>">查看全部&gt;&gt;</a></div>
			<div class="photo_box" style="<?php if(!($sql[$i]->photo)){echo "display:none;";}?>"><a href="#"><img src="<?php echo $sql[$i]->photo;?>" border=0/></a></div>
			<div class="time_pc"><?php echo mb_substr($sql[$i]->created_at,0,16);?></div>
		</div>
	</div>
	<?php }}else{
		
		echo "<div style='width:540px; height:100px; line-height:100px; font-size:20px; text-align:center; font-weight:bold;'>对不起！无信息！</div>";
	}?>
	