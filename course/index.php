<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>课程</title>
<link href="./css/class_s.css" rel="stylesheet" type="text/css" />
<?php 
	include_once(dirname(__FILE__).'/../frame.php');
	use_jquery();
	css_include_tag('class_s');
	js_include_tag('class/class_s');
	init_page_items('course_index');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once(dirname(__FILE__).'/../inc/top_class.php'); ?>
		<div id="content">
			<div id="c_l">
				<div id="l_pho">
					<div id="lp_t">个人信息管理</div>
					<div id="lp_p">
						<div id="lp_l"><img src="/images/class/l_peo.jpg"></div>
						<div id="lp_word">司法撒旦发射发声法</div>
					</div>
					<div id="l_b_wa">您有<font>0</font>条评论</div>
					<div id="l_b_wb">我的博客</div>
				</div>
				<div id="l_test"></div>
				<div id="l_look"></div>
				<div class="hlc_t"></div>
				<div class="hlc_b">
					<div class="hlcb_pg">
						<div class="hlct_t">热门课程排行榜</div>
						<img src="/images/helper/lb_hd.jpg"> </div>
					<?php for($i=0;$i<5;$i++){?>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r" style="<?php if($i==4||$i==3){ echo 'background:#ABABAB; border:1px solid #A4A4A4;';}?>"><?php echo $i+1 ?></div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="hlc_bb"></div>
				<div id="l_f">
					<div id="lf_l">我的<font>好友</font></div>
					<div id="lf_c">（<font>345</font>）</div>
					<div id="lf_r">More &gt;&gt;</div>
				</div>
				<div id="pic_r">
					<?php for($i=0;$i<6;$i++){ ?>
					<div class="ppg">
						<div class="pic_pg">
							<div class="pic_img"><img src="/images/yard/pho.jpg"></div>
						</div>
						<div class="ppg_w">safsadfas</div>
					</div>
					<?php }?>
				</div>
				<div id="pg_a"></div>
			</div>
			<div id="c_r">
				<div id="cr_top">
					<div id="cr_flash">flash</div>
					<div id="img_flash"<?php $pos="top_image"; show_page_pos($pos,'link_i')?>><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/class/c_pg_a.jpg';?>" border="0"/></a></div>				
				</div>
				<div id="crcb_t">
					<div class="cr_a" ><a href="#"  style="color:#ffffff;">我的宝宝</a></div>
					<div class="cr_a" ><a href="#" >我的宝宝</a></div>
					<div class="cr_a" ><a href="#" >我的宝宝</a></div>
					<div class="cr_a" ><a href="#" >我的宝宝</a></div>
					<div class="cr_a" ><a href="#" >我的宝宝</a></div>
				</div>
				<div class="cr_cb">
					<div class="crc_pg">
						<div class="crb_img">
							<?php for($i = 0; $i < 4; $i++){ ?>
							<div class="banner"<?php $pos="middle_image_$i";show_page_pos($pos,'link_i');?> id="banner_<?php echo $i;?>" style="<?php if($i == 0){echo 'display:inline;';}else{ echo 'display:none;'; } ?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/l_pg_c.jpg';?>" /></div>
							<?php } ?>
							<div id="num_banner">
								<div class="num">4</div>
								<div class="num">3</div>
								<div class="num">2</div>
								<div class="num" style="background:#CE0609;">1</div>
							</div>
						</div>
						<div class="crr_z">
							<a href="#"><img class="class_img" src="/images/class/class.png"/></a>
							<div class="crb_title">
								推荐<font>课程</font>
							</div>
							<div class="class_val">
								<div class="crr_t"<?php $pos="middle_headline";show_page_pos($pos,'link_d_i');?>>
									<div class="crrt_l"><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/cr_l.jpg';?>" border="0"></a></div>
									<div class="crrt_c"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									<div class="crrt_b"><?php echo $pos_items[$pos]->description;?></div>
								</div>
								<div class="crr_c"></div>
								<div class="crrab_z">
									<?php for($i=0;$i<6;$i++){?>
									<div class="crr_b"<?php $pos="middle_list_$i";show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href)?></div>
									<?php }?>
								</div>
							</div>
					</div>
					</div>
				</div>
				<div id="cr_ci">
					<div id="cri_t"></div>
					<div id="cri_c">
						<div id="cric_pg">
							<div id="pric_l"></div>
							<div id="cric_title"><font>精编课程展示</font> 资源分享 分我所有</div>
							<div id="cric_c">
								<?php for($i=0;$i<6;$i++){?>
								<div class="cricc_a">
									<div><a href="#"><img src="/images/class/c_pg_a.jpg"></a></div>
								</div>
								<?php }?>
							</div>
							<div id="pric_rl"></div>
						</div>
					</div>
					<div id="cri_b"></div>
				</div>
				<div id="bg_pg"> flash </div>
			</div>
		</div>
		<div id="bg_hr"></div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.fb.com All Rights Reserved.</div>
	</div>
</div>
</body>
</html>
