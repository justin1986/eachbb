<?php 
	include_once '../frame.php';
	set_charset("utf-8");
	$db=get_db();
	$user = User::current_user();
	$list=$db->query("SELECT unread_msg_count FROM eachbb_member.member_status where uid=".$user->uid);
	$count=$db->query("SELECT count(id)id FROM eachbb_member.message m where status=0 and recieve_id=".$user->id);
?>
<?php if($list[0]->unread_msg_count>0){?>
<div class="xiaoxi" style="margin-top:9px; padding-left:5px; cursor:pointer;  border-left:2px solid #949494; margin-right:5px;">消息<a href="/baby/message_index.php" style=" color:#FE6E0E;">（<?php echo $count[0]->id ? $count[0]->id : 0;?>）</a></div>
<?php }?>
<div class="exit" style="border-left:2px solid #949494; border-right:0px solid #949494; cursor:pointer;  padding-left:6px; <?php if($list[0]->unread_msg_count<=0){echo 'margin-right:10px;';}else{ echo 'padding-right:6px;';}?> ">退出</div>
<div class="xiaoxi" style="padding-left:5px; padding-right:5px; cursor:pointer;  overflow:hidden; text-align: left;"><a href="/yard/member.php" style="color:#FE6E0E;"><?php echo $_COOKIE['member_name'];?></a></div>
<input type="button" id="me_btn" >
<input type="text" id="me_in" style="height:18px;"/>