<?php 
	include_once '../frame.php';
	set_charset("utf-8");
	$db=get_db();
	$user = User::current_user();
//	$list=$db->query("SELECT unread_msg_count FROM eachbb_member.member_status where uid=".$user->uid);
	$count=$db->query("SELECT count(id)num FROM eachbb_member.message m where status=0 and recieve_id=".$user->id);
?>
<div id="login_pg">
	<div id="login_img_pg">
		<img src="<?php echo $user->avatar;?>"/>
		<div id="login_img_result">
			<div id="login_img_name"><?php echo $user->name;?></div>
			<div class="login_img_name">真实姓名：<font><?php echo $user->true_name;?></font></div>
			<div class="login_img_name"><a href="/baby/message_index.php">你有<font style="color:red;"><?php echo $count[0]->num ? $count[0]->num : 0;?></font>新消息</a></div>
			<div class="login_pg_btn">
				<a href="/yard"><img style="width:68px; height:22px; margin:0px; border:0px solid red;" src="/images/index/yard.jpg"/></a>
				<a href="/baby"><img style="width:77px; height:22px; margin:0px; margin-left:10px; border:0px solid red;" src="/images/index/baby.jpg"/></a>
			</div>
		</div>
	</div>
	<div id="login_hhr"></div>
	<div class="login_result_pg">
		<div class="login_reusult_title">近期<font style="color:#FF6F0F; font-size:16px; font-weight: bold;">测评</font></div>
		<?php
		$list = $db->query("select a.problem_id,b.name,a.created_at from eb_test_record as a  left join eb_problem b on b.id=a.problem_id where a.user_id={$user->id} group by user_id,problem_id limit 2;");
		for($i = 0 ; $i <2 ; $i++){?>
		<div class="login_result_value"><a href="/test/test_result.php?test_id=<?php echo $list[$i]->problem_id;?>"><?php echo $list[$i]->name;?></a></div>
		<?php }?>
	</div>
	<div class="login_result_pg">
		<div class="login_reusult_title">课程<font style="color:#FF6F0F; font-size:16px; font-weight: bold;">订购</font></div>
		<?php
		$list =$db->query("SELECT * FROM eb_teach e LIMIT 2");
		for($i = 0 ; $i <2 ; $i++){?>
		<div class="login_result_value"><?php echo $list[$i]->title;?></div>
		<?php }?>
	</div>
	<div class="login_result_btn">
		<a href="/yard/album_list.php"><div style="background:url(/images/index/login_1.jpg) no-repeat; text-align: center; width:122px; height:42px; color:#FF6F0F; line-height:42px; font-size:14px; font-weight:bold;" >去相册看看</div></a>
		<a href="/baby"><div style="padding-right:10px; margin-left:10px; background:url(/images/index/login_2.jpg) no-repeat; text-align: center; width:102px; height:42px; color:#FF6F0F; line-height:42px; font-size:14px; font-weight:bold;" >购买课程</div></a>
	</div>
</div>
<style>
#login_pg{width:289px; height:387px; background:url(/images/index/login_pg.jpg) no-repeat; float:right; display:inline;}
#login_img_pg{width:270px; height:100px; margin-top:50px; float:right; display:inline;}
#login_img_pg img{width:80px; height:80px; margin-left:10px; margin-top:10px; float:left; display:inline;}
#login_img_result{width:170px; height:100px; float:right; display:inline;}
#login_img_name{width:170px; height:20px; font-size:18px; font-weight:bold; color:#FF6F0F; display:inline;}
.login_img_name{width:170px; height:20px; margin-top:5px; font-size:12px; color:#333333; display:inline;}
.login_img_name font{color:#666666; font-size:12px;}
.login_pg_btn{width:170px; height:22px; display: inline;}
.login_img_name a{font-size:12px; color:#333333; text-decoration: none;}
#login_hhr{width:260px; height:1px; margin-left:15px;margin-top:10px; font-size:0px; background:url(/images/index/login_hr.jpg) repeat-x; float:left; display:inline;}
.login_result_pg{width:260px; height:70px; margin-left:15px;  margin-top:10px; float:left; display:inline;}
.login_reusult_title{width:240px; height:20px; padding-left:20px; font-weight:bold; font-size:16px; color:#333333; background:url(/images/index/login_3.jpg) no-repeat 0 4px; float:left; display:inline;}
.login_result_value{width:240px; height:20px; padding-left:20px; margin-top:5px; overflow:hidden; background:url(/images/index/login_4.jpg) no-repeat 5px 6px; float:left; display:inline;}
.login_result_value a{font-size:12px; color:#333333; text-decoration: none;}
.login_result_btn{widtH:260px; height:42px; float:right; display:inline;}
.login_result_btn a{text-decoration: none;}
.login_result_btn img{border:0px solid red;}
</style>