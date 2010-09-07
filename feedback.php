<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('./frame.php');
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>意见反馈</title>
<?php
	use_jquery();
	css_include_tag('feedback','index','top_inc/test_left','test_left_inc');
	js_include_tag('jquery.cookie','feedback/feedback','swfobject');
?>
</head>
<body>
<div id="ibody">
	<div id="top_menu">
			<div id="menu_left"></div>
			<div id="menu_center">
				<div id="menu_flash" style="margin-top:-5px;">
				</div>
				<script type="text/javascript">
					var flashvar = {defaultIndex:''};
					var flashparam = {wmode:'Transparent'};
					swfobject.embedSWF("flash/menu.swf","menu_flash","702","103","8",false,flashvar,flashparam);
				</script>
			</div>
			<div id="menu_right"></div>
	</div>
	<div id="fbody"  style="width:972px;">
		<div id="content">
			<?php include_once(dirname(__FILE__).'/test/left_inc.php'); ?>
			<div id="c_r">
				<div id="address">当前位置：<a href="/">首页</a> &gt; <font style="font-size:12px;">意见反馈</font></div>
				<div id="c_hr"></div>
				<div id="h_title">感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到最专业的教育和早教指导</div>
				<div id="c_title">您的意见是我们最珍贵的礼物</div>
				<div id="cc_hr"></div>
				<div id="cc_c"> 现有1000感谢使用我们的教程现有1000感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的现有1000感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装</div>
				<div id="c_view">
					<div id="cv_title">发表意见</div>
					<textarea name="textarea" id="cv_text"></textarea>
					<input type="button" id="but" value="提交">
					<div id="cv_bz">与主题无关的评论，一律予以删除！(最多2000字)</div>
				</div>
				<div id="res"></div>
				<div id="class_type">
					<div id="ct_t"></div>
					<div id="ct_c">
						<div id="ctc_tz">
							<div class="ctct_t">下期<font>课程</font>展示</div>
							<a target="_blank" href="#"><div id="buy">购  买</div></a>
						</div>
						<div class="ctc_bz">
							<div class="ctb_t"></div>
							<div class="ctb_c">
								<div id="ctb_l"> <img src="images/yetrb/la.jpg" id="ctl_a"> <img src="images/yetrb/lb.jpg" id="ctl_b"> </div>
								<div id="ctb_r">
									<div id="ctb_rt"><a href="#">撒旦发射的发生的发声法额外发往俄方</a></div>
									<div id="ctb_rc">撒旦发射的发生的发声法额外发往俄方撒旦发射的发生的发声法额外发往俄方撒旦发射的发生的发声法额外发往俄方撒旦发射的发生的发声法额外发往俄方撒旦发射的发生的发声法额外发往俄方撒旦发射的发生的发声法额外发往俄方撒旦发射的发生的发声法额外发往俄方撒旦发射的发生的发声法额外发往俄方</div>
								</div>
							</div>
							<div class="ctb_b">
								<a href="#">
								<img class="ctbb" src="/images/yetrb/gd.gif"/>
								</a>
							</div>
						</div>
						<div id="ctb_m">妈妈<font>助手</font>管理</div>
						<div class="ctc_bz">
							<div class="ctb_t"></div>
							<div class="ctb_c" style="height:100px;">
								<div id="cm_l"><img src="images/yetrb/m_pg.jpg"></div>
								<div id="cm_c">
									<div id="cmc_t"><a href="#">哈哈按时打发</a></div>
									<div id="cmc_c">哈哈哈按时打发哈哈按时打发哈哈哈按时打发哈哈按时打发哈按时打发哈哈按时哈哈哈按时打发哈哈按时打发哈哈哈按时打发哈哈按时打发哈按时打发哈哈按时打发哈按时打哈哈哈按时打发哈哈按时打发哈哈哈按时打发哈哈按时打发哈按时打发哈哈按时哈哈哈按时打发哈哈按时打发哈哈哈按时打发哈哈按时打发哈按时打发哈哈按时打发哈按时打发哈哈按时打发打发哈按时打发哈哈按时打发发哈哈按时打发打发哈按时打发哈哈按时打发</div>
								</div>
								<div id="cm_b">
									<?php for($i = 1 ; $i <= 4 ; $i++){?>
									<div class="cm_z">
										<div class="cmz_l"></div>
										<div class="cmz_r"><a href="#">哈哈按时打发哈哈按时打发</a></div>
									</div>
									<?php }?>
								</div>
							</div>
							<div class="ctb_b">
								<a href="#">
								<img class="ctbb" src="/images/yetrb/gd.gif"/>
								</a>
							</div>
							<div id="c_pic"> 
								<div class="c_p_b selected" param="1" style="margin-left:10px;">图书玩具</div>
								<div class="c_p_b" param="2">我家小院子</div>
								<div class="c_p_b" param="3">论坛精华</div>
								<div class="c_p_b" param="4">其他照片</div>
							</div>
							<div id="ctc_bz">
								<div id="ctb_t"></div>
								<div id="ctb_c">
									<div id="ctbc_c">
										<?php for($i = 1 ; $i <= 8 ; $i++){?>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<?php }?>
									</div>
								</div>
								<div id="ctb_b">
									<a href="#">
									<img class="ctbb" src="/images/yetrb/gd.gif"/>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div id="ct_b"></div>
				</div>
			</div>
		</div>
		<?php include_once('./inc/bottom.php');?>
	</div>
</div>
</body>
</html>
