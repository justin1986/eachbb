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
			<?php include(dirname(__FILE__).'/../yard/_yard_left.php');?>
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
						<textarea id="pho_r">
						</textarea>
					</div>
					<div id="cc_ps" style="height:400px;">
						<a href=""><img id="ccps_l" src="/images/yard/c_p.jpg" /></a>
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
							<div class="pc_word">
								<div class="title_pc"><a href="">纳纳</a><a href="" style="margin-left:10px; font-size:13px;">评价了你的秘密</a></div>
								<div class="content_pc"><a href="">纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳纳</a><font>来自:小龙女</font></div>
								<div class="time_pc">2010-2-2 20:12</div>
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
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
