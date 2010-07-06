<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('../frame.php');
	$id =intval(trim($_REQUEST['id']));
	if(empty($id)){
		#redirect('error.html');
		#die();
	}
	$age=intval($_GET['age']);
	$month=intval($_GET['month']);
	$mon = 0 <= $mon && $mon <= 35 ? $mon=$month+1 : 1;
	$month = $month % 12;
	$valid_age = array(1,2,3);
	$age = in_array($age,$valid_age) ? $age : 1;
	$month = 0 <= $month && $month <= 11 ? $month=$month+1 : 1;
	$db = get_db();
	$column = $db->query("SELECT id,title,click_count,short_title,category_id,description,content,created_at,last_edited_at,video_photo_src,keywords,publisher FROM eb_news e where id=".$id." order by last_edited_at desc");
	?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title><?php echo $column[0]->title;?></title>
<?php
	use_jquery();
	css_include_tag('info');
	js_include_tag('course/info');
?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/top_consult.php'); ?>
	<div id="fbody">
		<div id="c_l">
				<div id="l_pho">
					<div id="lp_t">个人信息管理</div>
					<div id="lp_p">
						<div id="lp_l"><img src="/images/class/l_peo.jpg"></div>
						<div id="lp_word">司法撒旦发射发声法</div>
					</div>
					<div id="l_b_wa"><a href="#">您有<font>0</font>新条评论</a></div>
					<div class="l_b_wb"><a href="#">我的博客</a></div>
					<div class="l_b_wb"><a href="#">宝宝最新测试报告</a></div>
					<div class="l_b_wb"><a href="#">宝宝本期课程</a></div>
					<div class="l_b_wb"><a href="#">宝宝下期课程提示</a></div>
				</div>
				<a href="#">
				<img id="l_look" src="/images/yetrb/asdf.jpg"/>
				</a>
				<div class="hlc_t"></div>
				<div class="hlc_b">
					<div class="hlcb_pg">
						<div class="hlct_t">意见反馈榜</div>
						<img src="/images/helper/lb_hd.jpg"> </div>
					<div class="hlcb_z">
						<a href="#">
							撒旦发射发生是否斯蒂芬阿桑地方撒旦法速度封杀地方撒挡风沙地方打算地方啊
						</a>
					</div>
				</div>
				<div class="hlc_bb"></div>
				<div id="l_f">
					<div id="lf_l">我的<font>好友</font></div>
					<div id="lf_c">（<font>345</font>）</div>
					<div id="lf_r">More &gt;&gt;</div>
				</div>
				<div id="pic_r">
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
				</div>
				<div id="pg_a"></div>
			</div>
			<div id=cr>
				<div id=title>
					<div class="cr_title<?php if($age == 0){ echo " selected" ;}?>" style="margin-left:3px;" id="cr_t_0">首 页</div>
					<div class="cr_title<?php if($age == 1){ echo " selected" ;}?>" id="cr_t_1">0-1岁</div>
					<div class="cr_title<?php if($age == 2){ echo " selected" ;}?>" id="cr_t_2">1-2岁</div>
					<div class="cr_title<?php if($age == 3){ echo " selected" ;}?>" id="cr_t_3">2-3岁</div>
					<input type="hidden" id="age_val" value="<?php echo $age;?>">
				</div>
				<div id=month_l></div>
				<div class=month_c id="month_0" style="<?php if($age == 1){ echo "display:inline;";} ?>">
					<div class="month" style="margin-left:53px; <?php if($mon == 1) echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";?>">1月</div>
					<div class="month" style="<?php if($mon == 2){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">2月</div>
					<div class="month" style="<?php if($mon == 3){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">3月</div>
					<div class="month" style="<?php if($mon == 4){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">4月</div>
					<div class="month" style="<?php if($mon == 5){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">5月</div>
					<div class="month" style="<?php if($mon == 6){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">6月</div>
					<div class="month" style="<?php if($mon == 7){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">7月</div>
					<div class="month" style="<?php if($mon == 8){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">8月</div>
					<div class="month" style="<?php if($mon == 9){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">9月</div>
					<div class="month" style="<?php if($mon == 10){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">10月</div>
					<div class="month" style="<?php if($mon == 11){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">11月</div>
					<div class="month" style="<?php if($mon == 12){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">12月</div>
				</div>
				<div class=month_c id="month_1"  style="<?php if($age == 2){ echo "display:inline;";} ?>">
					<div class="month" style="margin-left:53px; <?php if($mon == 13){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">13月</div>
					<div class="month" style="<?php if($mon == 14){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">14月</div>
					<div class="month" style="<?php if($mon == 15){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">15月</div>
					<div class="month" style="<?php if($mon == 16){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">16月</div>
					<div class="month" style="<?php if($mon == 17){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">17月</div>
					<div class="month" style="<?php if($mon == 18){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">18月</div>
					<div class="month" style="<?php if($mon == 19){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">19月</div>
					<div class="month" style="<?php if($mon == 20){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">20月</div>
					<div class="month" style="<?php if($mon == 21){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">21月</div>
					<div class="month" style="<?php if($mon == 22){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">22月</div>
					<div class="month" style="<?php if($mon == 23){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">23月</div>
					<div class="month" style="<?php if($mon == 24){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">24月</div>
				</div>
				<div class=month_c id="month_2" style="<?php if($age == 3){ echo "display:inline;";} ?>">
					<div class="month" style="margin-left:53px; <?php if($mon == 25){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">25月</div>
					<div class="month" style="<?php if($mon == 26){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">26月</div>
					<div class="month" style="<?php if($mon == 27){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">27月</div>
					<div class="month" style="<?php if($mon == 28){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">28月</div>
					<div class="month" style="<?php if($mon == 29){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">29月</div>
					<div class="month" style="<?php if($mon == 30){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">30月</div>
					<div class="month" style="<?php if($mon == 31){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">31月</div>
					<div class="month" style="<?php if($mon == 32){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">32月</div>
					<div class="month" style="<?php if($mon == 33){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">33月</div>
					<div class="month" style="<?php if($mon == 34){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">34月</div>
					<div class="month" style="<?php if($mon == 35){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">35月</div>
					<div class="month" style="<?php if($mon == 36){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">36月</div>
				</div>
				<div id=month_r></div>
				<?php
					$db=get_db();
					$sql="SELECT id,title,description,img_url,key_teach,big_action,detail_action,knowledge,language,music,social_behavior,book,toy,age FROM eb_teach e where is_adopt=1 and month={$month} and age={$age} order by create_time desc limit 1;";
					$teach=$db->query($sql);
				?>
				<div id=key>
					<div id=key_l></div>
					<div id=key_c>
						<div id=key_c_l>
							成长关键词：<a href="">宝宝秀</a>·<a href="">宝宝秀</a>·<a href="">宝宝秀</a>·<a href="">宝宝秀</a>
						</div>
						<div id=key_c_r><button></button></div>
					</div>
					<div id=key_r></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#B4E888;">
						<div class=context style="color:#72aa1d;">宝宝关键期指导</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->key_teach;?>"><?php echo strip_tags($teach[0]->key_teach);?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#93d7eb;">
						<div class=context style="color:#1aa9d3;">宝宝大运动</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->big_action;?>"><?php echo $teach[0]->big_action;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9daadc;">
						<div class=context style="color:#5066b8;">宝宝精细动作</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->detail_action;?>"><?php echo $teach[0]->detail_action; ?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9bcb78;">
						<div class=context style="color:#438a0f;">宝宝认知</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->knowledge;?>"><?php echo $teach[0]->knowledge; ?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#ff8587;">
						<div class=context style="color:#ce0000;">宝宝语言</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->language; ?>"><?php echo $teach[0]->language; ?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#B4E888;">
						<div class=context style="color:#72aa1d;">宝宝音乐欣赏</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->music;?>"><?php echo $teach[0]->music;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#93d7eb;">
						<div class=context style="color:#1aa9d3;">宝宝社会行为</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->social_behavior;?>"><?php echo $teach[0]->social_behavior;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9daadc;">
						<div class=context style="color:#5066b8;">宝宝图书欣赏和推荐</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->book;?>"><?php echo $teach[0]->book;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9bcb78;">
						<div class=context style="color:#438a0f;">宝宝玩具推荐</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->toy;?>"><?php echo $teach[0]->toy;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#ff8587;">
						<div class=context style="color:#ce0000;">课程订购说明</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
			</div>
			<div id="bg_hr"></div>
			<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
			<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
	
</div>
</body>
</html>