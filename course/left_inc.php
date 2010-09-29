<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	use_jquery();
	js_include_tag('left_inc');
	$user = User::current_user();
	?>
<div id="c_l">
	<div id="l_pho"></div>
	<a href="/test">
	<div id="l_test"></div>
	</a>
	<?php if($user){?>
	<div class="l_look">
		<a href="/feedback.php?type=course">网趣宝贝<font>意见反馈&nbsp;&nbsp;</font></a>
	</div>
	<?php }?>
	<div id="l_look"></div>
	<div class="hlc_t"></div>
	<div class="hlc_b">
		<div class="hlcb_pg">
			<div class="hlct_t">论坛热帖排行</div>
			<img src="/images/helper/lb_hd.jpg"></div>
		<?php
		$db=get_db();
		$list = $db->query("SELECT tid,subject FROM bbs_threads b order by views desc limit 10");
		for($i = 1 ; $i <= 10; $i++){?>
		<div class="hlcb_z" style="height:20px;">
			<div class="hlcb_l" style="height:20px;">
				<div class="r" style="background:#F36E0C;"><?php echo $i; ?></div>
			</div>
			<div class="hlcb_r" style="height:20px;">
				<div class="hlcb_t"><a href="/bbs/viewthread.php?tid=<?php echo $list[$i-1]->tid;?>"  target="_blank"><?php echo $list[$i-1]->subject;?></a></div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="hlc_bb"></div>
	<?php if($user){?>
	<div id="l_f">
		<div id="lf_l">我的<font>好友</font></div>
	</div>
	<div id="pic_r">
		<?php
		$list=$db->query("SELECT id,f_id,f_name,f_avatar FROM eachbb_member.friend f where u_id={$user->id} LIMIT 6");
		foreach($list as $friend){ ?>
		<div class="ppg">
			<div class="pic_pg">
				<div class="pic_img"><a href="/yard/index.php?id=<?php echo $friend->id;?>"><img src="<?php echo $friend->f_avatar; ?>"></a></div>
			</div>
			<div class="ppg_w"><a href="/yard/index.php?id=<?php echo $friend->id;?>"><?php echo $friend->f_name; ?></a></div>
		</div>
		<?php }
		if(!$list){
			echo '<div style="width:210px; height:20px; padding-bottom:20px; margin-top:20px; line-height:20px; text-align:center; font-size:14px; font-weight:bold;">您的好友为空！</div>';
		}
		?>
	</div>
	<?php }?>
	<div id="pg_a"></div>
</div>
<style>
#l_test{border:0px solid red;}
.pic_img a img{border:0px solid red;}
.ppg_w a{color:#000; font-size:12px; text-decoration: none;}
#l_look{border:0px solid red;}
</style>