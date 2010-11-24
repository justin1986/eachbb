<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	$id =$_POST["id"];
	$user_id=$user->id;
	if($id){
		$user=$db->query("SELECT * FROM eachbb_member.member m where id=$id");
		$user = $user[0];
	}
	if(!$user) die();
	$sql = "select t1.*,t2.photo from eachbb_member.comment t1 left join eachbb_member.member_avatar t2 on t1.f_id=t2.u_id and t2.status=1 where user_id={$user->id} and t1.resource_id='1099' order by t1.created_at desc limit 10";
	$result= $db->query($sql);
    if($result){
    foreach ($result as $result){
    	if($result->whispered == 0 || $user_id == $result->user_id || $user_id == $result->f_id ){
    	?>
	<div class="pc_z">
		<div class="pc_pg_img">
			<div class="pc_img"><img src="
			<?php 
		if($result->photo){
			echo thumb_name($result->photo,'small');
		}else{
			echo "/images/yard_info_img/1.jpg";
		}
	?>
			"/></div>
		</div>
		<div class="pc_word">
			<div class="title_pc">
				<a href="/yard/home.php?id=<?php echo $result->u_id;?>">
					<?php if($user_id == $result->f_id){ echo '我';}else{ echo $result->nick_name;}?>
				</a>
				发表了留言：
			</div>
			<div class="content_pc" style="<?php if(!($result->comment)){echo "display:none;";}?>">
				<?php echo htmlspecialchars_decode($result->comment); if($result->whispered){echo '[悄悄话]';}?>
			</div>
		</div>
	</div>
	<?php 
	}}}else{
		echo "<div style='width:540px; height:100px; line-height:100px; font-size:20px; text-align:center; font-weight:bold;'>没有留言内容</div>";
	}
	?>
	