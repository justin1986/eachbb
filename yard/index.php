<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard');
		js_include_tag('yard/yard','yard_right');
		$db=get_db();
		$user = User::current_user();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic"></div>
		<div id="menu_b" class="menu_pic"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_e" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
	</div>
	<div id="content">
		<div id="c_l">
			<div id="cll_z">
				<div class="cll_zz" style="background:url(/images/yard/ffffff.gif) no-repeat;">
					<div class="cllz_img" style="background:url(/images/yard/l_a.jpg) no-repeat;"></div>
					<div class="cllz_word">音乐</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_b.jpg) no-repeat;"></div>
					<div class="cllz_word">转帖</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_c.jpg) no-repeat;"></div>
					<div class="cllz_word">投票</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_d.jpg) no-repeat;"></div>
					<div class="cllz_word">说秘密</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_e.jpg) no-repeat;"></div>
					<div class="cllz_word">真心话</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_f.jpg) no-repeat;"></div>
					<div class="cllz_word">天天向上</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_g.jpg) no-repeat;"></div>
					<div class="cllz_word">游戏大厅</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_k.jpg) no-repeat;"></div>
					<div class="cllz_word">宠物村</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_l.jpg) no-repeat;"></div>
					<div class="cllz_word">池塘边</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_m.jpg) no-repeat;"></div>
					<div class="cllz_word">梦幻城</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_p.jpg) no-repeat;"></div>
					<div class="cllz_word">阳光牧场</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_o.jpg) no-repeat;"></div>
					<div class="cllz_word">绿光森林</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_q.jpg) no-repeat;"></div>
					<div class="cllz_word">抢吧</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_r.jpg) no-repeat;"></div>
					<div class="cllz_word">贺卡</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_s.jpg) no-repeat;"></div>
					<div class="cllz_word">新手任务</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_t.jpg) no-repeat;"></div>
					<div class="cllz_word">白小报</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_u.jpg) no-repeat;"></div>
					<div class="cllz_word">添加</div>
				</div>
				<div id="cll_hr"></div>
				<a href="#"><img id="cllz_bs" src="/images/yard/l_l_s.jpg" /></a>
			</div>
		</div>
		<div id="c_ll">
			<div id="cl_t"></div>
			<div id="cl_c"></div>
			<div id="cl_r"></div>
		</div>
		<div id="c_c">
			<div id="cc_t"></div>
			<div id="cc_c">
				<div id="cc_pg">
					<div id="cc_pic"></div>
					<div id="cc_photo">
						<div id="pho_l"></div>
						<form id="xxx" action="daily.post.php" method="post">
							<textarea name="pho_r" id="pho_r">llllllll</textarea>
						</form>
					</div>
					<div id="cc_ps" style="height:400px;">
						<a href=""><img style="float:left;" id="ccps_l" src="/images/yard/c_p.jpg" /></a>
						<div id="ccps_c">
							<div id="ccpsc_l">
								<div id="ccpsc_img"></div>
								<div id="ccpsc_word"><a href="">发分享</a></div>
								</div>
							<div id="ccpsc_la">
								<div id="ccpsc_imga"></div>
								<div id="ccpsc_worda"><a href="">传照片</a></div>
								</div>
							<div id="ccpsc_lb">
								<div id="ccpsc_imgb"></div>
								<div id="ccpsc_wordb"><a href="">发股票</a></div>
								</div>
							<div id="c_moblie">
								<div id="c_moblie_w"><a href="">发布</a></div>
								</div>
						</div>
						<div id="c_ch">
							<div id="m_w"></div>
							<div class="c_ch_w" style=" border-bottom:0px solid #E3F2DF;background:url(/images/yard/m_pg.jpg) no-repeat;">全部</div>
							<div class="c_ch_w">一句话</div>
							<div class="c_ch_w">照片</div>
							<div class="c_ch_w">日志</div>
							<div class="c_ch_w">分享</div>
							<div class="c_ch_w">随便看看</div>
							<div id="m_w" style="width:30px;"></div>
						</div>
						<div class="pc_z">
							<div class="pc_pg_img">
								<div class="pc_img"><img src="/images/yard/pho.jpg"></div>
							</div>
							<?php $sql = $db->query("select * FROM eachbb_member.mood order by created_at desc where u_id='{$user->id}'");?>
							<div class="pc_word">
								<div class="title_pc"><a href=""><?php echo htmlspecialchars($sql[0]->title);?></a><a href="" style="margin-left:10px; font-size:13px;"><?php echo htmlspecialchars($sql[0]->name); ?> 说了一句话</a></div>
								<div class="content_pc"><a href="">“<?php if($user->name != ''){echo htmlspecialchars($sql[0]->content);}else{echo "请先登录！";}?>”</a></div>
								<div class="time_pc"><?php if($user->name != ''){echo $sql[0]->created_at;}else{echo "";}?></div>
							</div>
						</div>
						<!-- 
						<div class="pc_hr"></div>
						 -->
					</div>
				</div>
				<div id="r_pho">
					<?php include_once(dirname(__FILE__).'/../inc/_yard_right.php'); ?>
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
	</div>
</div>
</body>
</html>

