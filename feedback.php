<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('./frame.php');
?>
<html>
<head>
<title>问题反馈</title>
<?php
	use_jquery();
	css_include_tag('feedback');
	js_include_tag('jquery.cookie', 'feedback/feedback');
?>
</head>
<body>
<div id="ibody">
	<div id="top_login">
		<div id="login">
			<div id="login_login">
				<div id="login_img"></div>
				<div id="login_word">登录</div>
			</div>
			<div id="register">
				<div id="register_img"></div>
				<div id="register_word">注册</div>
			</div>
			<div id="comeback">
				<div id="comeback_img"></div>
				<div id="comeback_word">返回首页</div>
			</div>
			<div id="member">
				<div id="member_img"></div>
				<div id="member_word">用户中心</div>
			</div>
		</div>
	</div>
	<div id="top_menu">
			<div id="menu_left"></div>
			<div id="menu_center"></div>
			<div id="menu_right"></div>
	</div>
	<div id="fbody">
		<div id="content">
			<div id="c_l">
				<div id="l_pho">
					<div id="lp_t">个人信息管理</div>
					<div id="lp_p">
						<div id="lp_l"><img src="images/class/l_peo.jpg"></div>
						<div id="lp_word">司法撒旦发射发声法</div>
					</div>
					<a href="#">
					<div id="l_b_wa">您有<font>0</font>新条评论</div>
					</a> <a href="#">
					<div class="l_b_wb">我的博客</div>
					</a> <a href="#">
					<div class="l_b_wb">宝宝最新测试报告</div>
					</a> <a href="#">
					<div class="l_b_wb">宝宝本期课程</div>
					</a> <a href="#">
					<div class="l_b_wb">宝宝下期课程提示</div>
					</a> </div>
				<a href="#">
				<div id="l_look"></div>
				</a>
				<div class="hlc_t"></div>
				<div class="hlc_b">
					<div class="hlcb_pg">
						<div class="hlct_t">热门课程排行榜</div>
						<img src="images/helper/lb_hd.jpg"> </div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">1</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">2</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">3</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
				</div>
				<div class="hlc_bb"></div>
				<div id="l_f">
					<div id="lf_l">我的<font>好友</font></div>
					<div id="lf_c">（<font>345</font>）</div>
					<div id="lf_r">More >></div>
				</div>
				<div id="pic_r">
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
				</div>
				<div id="pg_a"></div>
			</div>
			<div id="c_r">
				<div id="address">当前位置：首页 > 育儿百科 > 帮助中心 > <font>意见反馈</font></div>
				<div id="c_hr"></div>
				<div id="h_title">感谢使用我们的教程，希望我们的共同努力能使您的孩子从哇哇落地就得到装专业的教育和早教指导</div>
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
							<div class="ctb_b"><a href="#">
								<div class="ctbb"></div>
								</a></div>
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
									<div class="cm_z">
										<div class="cmz_l"></div>
										<div class="cmz_r"><a href="#">哈哈按时打发哈哈按时打发</a></div>
									</div>
									<div class="cm_z">
										<div class="cmz_l"></div>
										<div class="cmz_r"><a href="#">哈哈按时打发哈哈按时打发</a></div>
									</div>
									<div class="cm_z">
										<div class="cmz_l"></div>
										<div class="cmz_r"><a href="#">哈哈按时打发哈哈按时打发</a></div>
									</div>
									<div class="cm_z">
										<div class="cmz_l"></div>
										<div class="cmz_r"><a href="#">哈哈按时打发哈哈按时打发</a></div>
									</div>
								</div>
							</div>
							<div class="ctb_b"><a href="#">
								<div class="ctbb"></div>
								</a></div>
							<div id="c_pic"> <a href="#">
								<div class="c_p_b" param="1" id="c_p_a">图书玩具</div>
								</a> <a href="#">
								<div class="c_p_b" param="2">我家院子</div>
								</a> <a href="#">
								<div class="c_p_b" param="3">论坛精华</div>
								</a> <a href="#">
								<div class="c_p_b" param="4">其他照片</div>
								</a> </div>
							<div id="ctc_bz">
								<div id="ctb_t"></div>
								<div id="ctb_c">
									<div id="ctbc_c">
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
										<div class="ctb_img"><img src="images/yetrb/dd.jpg"></div>
									</div>
								</div>
								<div id="ctb_b"><a href="#">
									<div class="ctbb"></div>
									</a></div>
							</div>
						</div>
					</div>
					<div id="ct_b"></div>
				</div>
			</div>
		</div>
		<div id="bg_hr"></div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
</div>
</body>
</html>
