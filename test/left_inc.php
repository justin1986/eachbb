<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	use_jquery();
	js_include_tag('test_left_inc');
	$user = User::current_user();
	?>
<div id="c_l">
	<div id="l_pho"></div>
	<?php if($user){?>
	<div class="l_look">
		<a href="/feedback.php?type=test">网趣宝贝<font>意见反馈&nbsp;&nbsp;</font></a>
	</div>
	<div class="l_look">
		<a href="/baby/index.php?type=test">网趣宝贝<font>我的测评&nbsp;&nbsp;</font></a>
	</div>
	<?php }?>
	<div class="hlc_t"></div>
	<div class="hlc_b">
		<div class="hlcb_pg">
			<div class="hlct_t">论坛热帖排行</div>
			<img src="/images/helper/lb_hd.jpg"> </div>
		<?php
		$db=get_db();
		for($i = 1 ; $i <= 10; $i++){?>
		<div class="hlcb_z"<?php $pos="test_left_"+$i;show_page_pos($pos,'link_day');?>  style="height:20px;">
			<div class="hlcb_l" style="height:20px;">
				<div class="r" style="background:#F36E0C;"><?php echo $i; ?></div>
			</div>
			<div class="hlcb_r" style="height:20px;">
				<div class="hlcb_t"><a href="<?php echo $pos_items[$pos]->href;?>"><?php echo $pos_items[$pos]->title;?></a></div>
			</div>
		</div>
		<?php ; }?>
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
				<div class="pic_img"><a href="/yard/home.php?id=<?php echo $friend->f_id;?>"><img  style="border:0px solid red;" src="<?php echo $friend->f_avatar; ?>"></a></div>
			</div>
			<div class="ppg_w"><a href="/yard/home.php?id=<?php echo $friend->f_id;?>" style="font-size:12px; color:#000000; text-decoration: none;"><?php echo $friend->f_name; ?></a></div>
		</div>
		<?php }
		if(!$list){
			echo '<div style="width:210px; height:20px; padding-bottom:20px; margin-top:20px; line-height:20px; text-align:center; font-size:14px; font-weight:bold;">您暂时还没有好友！</div>';
		}
		?>
	</div>
	<?php }?>
	<div id="pg_a"></div>
</div>
<style>
#l_test{border:0px solid red;}
.l_look{border:0px solid red;}
</style>