<?php 
	include_once('../frame.php');
	use_jquery();
	$db=get_db();
	$user = User::current_user();
	$sql="select m.*,s.* from eachbb_member.member m inner join eachbb_member.member_status s on m.id=s.uid where m.id=".$user->id;
	$news=$db->query($sql);
	$sex='未知';
	if($user->gender == 1){
		$sex='男';
	}elseif($user->gender == 2){
		$sex='女';
	}
	?>
<div id="r_img">
	<div id="r_pto"><img src="<?php echo $user->avatar;?>"></div>
	<div id="r_bb"><?php echo $user->baby_name;?></div>
	<div id="r_num">被访问过<?php if($news[0]->visit_count){echo $news[0]->visit_count;}else{echo 0;};?>次</div>
</div>
<div id="r_geng"> 
	<div id="r_ge_a">
		<div id="r_gi_a"></div>
		<div id="r_gw_a"><a href="/yard/info.php">更换头像</a></div>
	</div>
	<div id="r_ge_b">
		<div id="r_gi_b"></div>
		<div id="r_gw_b"><a href="/yard/member.php">修改档案</a></div>
	</div>
</div>
<div id="r_ge_ge">
	<div id="r_ge_hr"></div>
	<div id="r_ge_table">
		<div class="r_ge_ct">
			<div class="r_ge_cta"><img src="/images/yard/r_a.jpg"></div>
			<div class="r_ge_ctb">性别：</div>
			<div class="r_ge_ctc"><?php echo $sex;?></div>
		</div>
		<div class="r_ge_ct">
			<div class="r_ge_cta"><img src="/images/yard/r_b.jpg"></div>
			<div class="r_ge_ctb">生日：</div>
			<div class="r_ge_ctc"><?php if( substr($user->baby_birthday,0,10) != "0000-00-00"){echo substr($user->baby_birthday,0,10); }else{ echo "未知";}?></div>
		</div>
		<div class="r_ge_ct">
			<div class="r_ge_cta"><img src="/images/yard/r_c.jpg"></div>
			<div class="r_ge_ctb">地址：</div>
			<div class="r_ge_ctc" style="width:115px;"><?php if(htmlspecialchars($user->address)!=""){ echo htmlspecialchars($user->address);}else{echo '不详';}?></div>
		</div>
		<div class="r_ge_ct">
			<div class="r_ge_cta"><img src="/images/yard/r_d.jpg"></div>
			<div class="r_ge_ctb">金币：</div>
			<div class="r_ge_ctc"><?php if($news[0]->score > 0){echo $news[0]->score; }else{ echo '0';}?></div>
		</div>
		<div class="r_ge_ct">
			<div class="r_ge_cta"><img src="/images/yard/r_e.jpg"></div>
			<div class="r_ge_ctb">等级：</div>
			<div class="r_ge_ctc"><?php if($news[0]->level > 0){echo $news[0]->level; }else{ echo '0';};?>级</div>
		</div>
		<!-- 
		<div class="r_ge_ct">
			<div class="r_ge_cta"><img src="/images/yard/r_f.jpg"></div>
			<div class="r_ge_ctb">最后天数：</div>
			<div class="r_ge_ctc" style="width:80px;">天</div>
		</div>
		 -->
		<div class="r_ge_ct">
			<div class="r_ge_cta"><img src="/images/yard/r_g.jpg"></div>
			<div class="r_ge_ctb">最后登录：</div>
			<div class="r_ge_ctc" style="width:90px;"><?php if($user->last_login!=""){echo substr($user->last_login,0,10);}else{echo "未知";}?></div>
		</div>
	</div>
	<div id="friendbox">
		<div class="friend">
			<div id="friend_l0">
				<img src="/images/yard/friend_l0.jpg" />
			</div>
			<div id="friend_word0">好友</div>
			<div id="friend_r0">
				<img src="/images/yard/friend_r0.jpg" />
			</div>
		</div>
		<div class="friend">
			<div id="friend_l1">
				<img src="/images/yard/friend_l1.jpg" />
			</div>
			<div id="friend_word1">最近访客</div>
			<div id="friend_r1">
				<img src="/images/yard/friend_r1.jpg" />
			</div>
		</div>
		<div id="query_friend">查询好友</div>
	</div>
<div id="pic_r">
	<div id="pic_0">
		<?php
		$visit = $db->query("select id,f_avatar,f_id,f_name from eachbb_member.visit_history where u_id='{$user->id}' order by create_at desc limit 9;");
		$m_visit = $db->record_count;
		$friend = $db->query("select id,f_name,f_id,f_avatar from eachbb_member.friend where u_id='{$user->id}' order by created_at desc limit 9;");
		$m_friend = $db->record_count;
		for($i=0;$i<$m_friend;$i++){?>
		<div class="pic_box">
			<div class="pic_pg" id="pic_pg_0">
				<a href="/yard/home.php?id=<?php echo $friend[$i]->f_id;?>">
				<IMG  class="pic_img" src="<?php if ($friend[$i]->f_avatar != null){echo $visit[$i]->f_avatar;}else{echo '/images/yard_info_img/1.jpg';}?>"/>
				</a>
			</div>
			<div class="name_pic"><a title="<?php echo $friend[$i]->f_name;?>" href="<?php echo $friend[$i]->f_id;?>"><?php echo $friend[$i]->f_name;?></a></div>
		</div>
		<?php }?>
	</div>
	<div id="pic_1">
		<?php for($i=0;$i<$m_visit;$i++){?>
		<div class="pic_box">
			<div class="pic_pg">
				<a href="/yard/home.php?id=<?php echo $visit[$i]->f_id;?>">
				<IMG  class="pic_img" src="<?php if ($visit[$i]->f_avatar != null){echo $visit[$i]->f_avatar;}else{echo '/images/yard_info_img/1.jpg';}?>"/>
				</a>
			</div>
			<div class="name_pic"><a title="<?php echo $visit[$i]->f_name;?>" href="/yard/home.php?id=<?php echo $visit[$i]->f_id;?>"><?php echo $visit[$i]->f_name;?></a></div>
		</div>
		<?php } ?>
	</div>
</div>
</div>