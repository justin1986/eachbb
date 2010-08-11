<?php
	include_once('../frame.php');
	$db=get_db();
	$user = User::current_user();
	$select =$_POST['select'];
	$sql = $db->query("select * FROM eachbb_member.lastest_news where u_id='{$user->id}'$select order by created_at desc limit 9");
	$num = $db->record_count;
	for($i=0;$i<$num;$i++){?>
						<div class="pc_z">
							<div class="pc_pg_img">
								<div class="pc_img"><img src="
								<?php 
							if($sql->u_avatar == null){
								echo "/images/yard/noface.jpg";
							}else{
								echo $sql[$i]->u_avatar;
							}
						?>
								"></div>
							</div>
							<div class="pc_word">
								<div class="title_pc"><a href="#"><?php echo $sql[$i]->u_name;?></a><?php echo $sql[$i]->form;?></div>
								<div class="content_pc" style="<?php if($sql[$i]->content == ''){echo "display:none;";}?>"><?php echo $sql[$i]->content;?></div>
								<div class="photo_box" style="<?php if($sql[$i]->photo == ''){echo "display:none;";}?>"><a href="#"><img src="<?php ?>" border=0/></a><a href="#" ><img src="<?php ?>" border=0/></a><a href="#"><img src="<?php ?>" border=0/></a></div>
								<div class="time_pc"><?php echo mb_substr($sql[$i]->created_at,0,16);?></div>
							</div>
						</div>
						<?php }?>
	