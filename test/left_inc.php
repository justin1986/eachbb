<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	use_jquery();
	js_include_tag('test_left_inc');
	$user = User::current_user();
	?>
<div id="c_l">
	<div id="l_pho"></div>
	<div id="l_look">
		<a href="/feedback.php">网趣宝贝<font>意见反馈&nbsp;&nbsp;</font></a>
	</div>
	<div class="hlc_t"></div>
	<div class="hlc_b">
		<div class="hlcb_pg">
			<div class="hlct_t">热门课程排行榜</div>
			<img src="/images/helper/lb_hd.jpg"> </div>
		<?php
		$db=get_db();
		$list=$db->query("select id,title,age,click_count from eb_teach where is_adopt=1 and del_flag=0 order by click_count,create_time desc limit 5;");
		$i=1;
		foreach ($list as $result){?>
		<div class="hlcb_z">
			<div class="hlcb_l">
				<div class="r" style="<?php if($i==4){ echo 'background:#ABABAB; border:1px solid #A4A4A4;';}?>"><?php echo $i; ?></div>
			</div>
			<div class="hlcb_r">
				<div class="hlcb_t"><a href="info.php?age=<?php echo $result->id;?>"><?php echo $result->title;?></a></div>
				<div class="hlcb_t">适龄年岁：<?php echo $result->age;?></div>
				<div class="hlcb_t"><font>点击次数：</font><?php echo $result->click_count;?></div>
			</div>
		</div>
		<?php $i++; }?>
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
#l_look{border:0px solid red;}
</style>