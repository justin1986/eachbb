<?php 
		include_once('../frame.php');
		use_jquery();
		$db=get_db();
		$user = User::current_user();
		$sql="select m.id,m.visit_count,m.unread_msg_count,m.friend_count,m.level,m.score,m.last_login,m.created_at,m.uid,mm.avatar,mm.baby_gender,mm.address,mm.baby_name from eachbb_member.member_status m left join eachbb_member.member mm on m.uid=mm.uid where m.uid=".$user->uid;
		$news=$db->query($sql);
		$sex='未知';
		if($news[0]->baby_gender == 1){
			$sex='男';
		}elseif($news[0]->baby_gender == 2){
			$sex='女';
		}
	?>
<div id="r_img">
		<div id="r_pto"><img src="<?php echo $news[0]->avatar;?>"></div>
		<div id="r_bb"><?php echo $news[0]->baby_name;?></div>
		<div id="r_num">被访问过<?php echo $news[0]->visit_count;?>次</div>
	</div>
	<div id="r_geng"> 
		<div id="r_ge_a">
			<div id="r_gi_a"></div>
			<div id="r_gw_a"><a href="#">更换头像</a></div>
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
				<div class="r_ge_ctc">1988-12-12</div>
			</div>
			<div class="r_ge_ct">
				<div class="r_ge_cta"><img src="/images/yard/r_c.jpg"></div>
				<div class="r_ge_ctb">地址：</div>
				<div class="r_ge_ctc" style="width:115px;"><?php if($news[0]->address!=""){ echo $news[0]->address;}else{echo '不详';}?></div>
			</div>
			<div class="r_ge_ct">
				<div class="r_ge_cta"><img src="/images/yard/r_d.jpg"></div>
				<div class="r_ge_ctb">金币：</div>
				<div class="r_ge_ctc"><?php if($news[0]->score>0){echo $news[0]->score;}else{echo '0';}?></div>
			</div>
			<div class="r_ge_ct">
				<div class="r_ge_cta"><img src="/images/yard/r_e.jpg"></div>
				<div class="r_ge_ctb">等级：</div>
				<div class="r_ge_ctc"><?php if($news[0]->level>0){echo $news[0]->level;}else{echo '0';};?>级</div>
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
				<div class="r_ge_ctc" style="width:80px;"><?php if($news[0]->last_login!=""){echo substr($news[0]->last_login,0,10);}else{echo "未知";}?></div>
			</div>
		</div>
		<div id="friend">
			<div id="friend_a"></div>
			<div id="friend_b"></div>
		</div>
		<div id="pic_r">
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
			<div class="pic_pg">
				<a href="#">
				<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
				</a>
			</div>
		</div>
	</div>