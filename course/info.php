<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('../frame.php');
	$id =intval(trim($_REQUEST['id']));
	if(empty($id)){
		#redirect('error.html');
		#die();
	}
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
	js_include_tag('jquery.cookie', 'news/news');
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
						<img src="/images/helper/lb_hd.jpg"> </div>
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
					<div class="cr_title">首 页</div>
					<div class="cr_title selected">0-1岁</div>
					<div class="cr_title">1-2岁</div>
					<div class="cr_title">2-3岁</div>
				</div>
				<div id=month_l></div>
				<div id=month_c>
					<div class=month style="margin-left:53px;">1月</div>
					<div class=month>2月</div>
					<div class=month>3月</div>
					<div class=month>4月</div>
					<div class=month>5月</div>
					<div class=month>6月</div>
					<div class=month>7月</div>
					<div class=month>8月</div>
					<div class=month>9月</div>
					<div class=month>10月</div>
					<div class=month>11月</div>
					<div class=month>12月</div>
				</div>
				<div id=month_r></div>
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
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#93d7eb;">
						<div class=context style="color:#1aa9d3;">宝宝大运动</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9daadc;">
						<div class=context style="color:#5066b8;">宝宝精细动作</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9bcb78;">
						<div class=context style="color:#438a0f;">宝宝认知</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#ff8587;">
						<div class=context style="color:#ce0000;">宝宝语言</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#B4E888;">
						<div class=context style="color:#72aa1d;">宝宝音乐欣赏</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#93d7eb;">
						<div class=context style="color:#1aa9d3;">宝宝社会行为</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9daadc;">
						<div class=context style="color:#5066b8;">宝宝图书欣赏和推荐</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9bcb78;">
						<div class=context style="color:#438a0f;">宝宝玩具推荐</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#ff8587;">
						<div class=context style="color:#ce0000;">课程订购说明</div>	
					</div>
					<div class=pic><a href=""><img src=""></a></div>
					<div class=piccontent><a href="">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
			</div>
			<div id="bg_hr"></div>
			<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
			<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
	
</div>
</body>
</html>