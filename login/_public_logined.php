<?php 
	include_once '../frame.php';
	$db=get_db();
	$user = User::current_user();
	$list=$db->query("SELECT unread_msg_count FROM eachbb_member.member_status where uid=".$user->uid);
?>
<?php if($list[0]->unread_msg_count>0){?>
<div class="xiaoxi" style="margin-top:9px; padding-left:5px; cursor:pointer;  border-left:2px solid #949494; margin-right:5px;">消息<a href="#" style=" color:#FE6E0E;">（<?php echo $list[0]->unread_msg_count;?>）</a></div>
<?php }?>
<div class="exit" style="border-left:2px solid #949494; border-right:0px solid #949494; cursor:pointer;  padding-left:6px; <?php if($list[0]->unread_msg_count<=0){echo 'margin-right:10px;';}else{ echo 'padding-right:6px;';}?> ">退出</div>
<div class="xiaoxi" style="padding-left:5px; padding-right:5px; cursor:pointer;  overflow:hidden; text-align: left;"><a href="/yard/member.php" style="color:#FE6E0E;"><?php echo $_COOKIE['member_name'];?></a></div>
<input type="button" id="me_btn" >
<input type="text" id="me_in" style="height:18px;"/>