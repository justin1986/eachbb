<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<?php
	include_once('../frame.php');
 ?>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>课程</title>
<?php
	use_jquery();
	css_include_tag('test','top_inc/test_blue.top','top_inc/test_left');
	js_include_tag('test/test');
	init_page_items('test_index');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once('../inc/top_blue.inc.php'); ?>
		<div id="content">
			<?php include_once('../inc/left_inc.php'); ?>
			<div id="c_r">
				<div id="cr_flash">
					<div id="cr_banner">
					<a href="#"><img src="/images/test/m_pg_p.png"/></a>
						<div id="crf_l">flash</div>
					<div id="crf_r">
						<div id="crf_t">特色评价<font>特色介绍</font></div>
						<?php for($i =0 ; $i < 4; $i++){
							$pos = "top_intr_$i";
						?>
						<div class="crf_c" id="cr_<?php echo $i;?>"<?php show_page_pos($pos,'link_d_i')?> style="<?php if($i==0){ echo "display:inline;"; }?>">
							<div class="crf_ti"><img src="<?php echo $pos_items[$pos]->image1?>"></div>
							<div class="crg_tt"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href)?></div>
							<?php echo_href($pos_items[$pos]->description, $pos_items[$pos]->href)?>
						</div>
						<?php }?>
						<div id="crf_d">
							<div class="cr_num" style="background:url(/images/test/r_na.jpg) no-repeat; color:#0086F8;">1</div>
							<div class="cr_num">2</div>
							<div class="cr_num">3</div>
							<div class="cr_num">4</div>
						</div>
					</div>
					</div>
				</div>
				<div id="cr_b">
					<div id="crb_t"> 
						<div class="crb_value">
							<div class="crb_tt"></div>
							<div class="crb_cc" style="border-bottom:1px solid #ffffff; color:#43A0D6;">大动作</div>
						</div>
						<div class="crb_hh"></div>
						<div class="crb_value">
							<div class="crb_tt"></div>
							<div class="crb_cc">精细动作</div>
						</div>
						<div class="crb_hh"></div>
						<div class="crb_value">
							<div class="crb_tt"  ></div>
							<div class="crb_cc">语言</div>
						</div>
						<div class="crb_hh" ></div>
						<div class="crb_value">
							<div class="crb_tt"></div>
							<div class="crb_cc">认识</div>
						</div>
						<div class="crb_hh"></div>
						<div class="crb_vv">
							<div class="crb_ttt"></div>
							<div class="crb_cc" style="width:149px;" id="crb_5">社会活动和行为规范</div>
						</div>
						<div id="cr_hr"></div>
					</div>
					<?php for($i = 0; $i < 5; $i++){
						$pos = "middle_intr_$i";
					?>
					<div class="crb_c"<?php show_page_pos($pos,'link_d_i')?> id="crbc_<?php echo $i; ?>" style="<?php if($i == 0){ echo 'display:inline;';}else{ echo 'display:none;';} ?>">
							<div class="crbc_a">
								<a href="#">
									<img src="/images/test/tr_a.jpg">
								</a>
							</div>
							<div class="crbci_t">
								<a href="#"><?php echo $i; ?>前前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前前前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前前前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密秘密秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密秘密秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密前秘密秘密</a>
							</div>
					</div>
					<?php } ?>
					</div>
			<div id="crc"></div>
			<div id="crd">
				<div class="crd_z" id="crd_z"><img src="/images/test/43.jpg"><div class="crd_f"><a href="#">宝宝测评案例</a></div></div>
				<div class="crd_z"><img src="/images/test/43.jpg"><div class="crd_f"><a href="#">宝宝测评案例</a></div></div>
				<div class="crd_z"><img src="/images/test/43.jpg"><div class="crd_f"><a href="#">宝宝测评案例</a></div></div>
			</div>
			<div id="cre">
					<img src="/images/test/tc_b.jpg">
			</div>
			<div id="crf">
				<div class="cf_z">
					<div class="cfz_t">
						<font>父母养育测试</font>
					</div>
					<div class="cfz_cz">
						<ul>
							<?php
							 for($i=0;$i<7;$i++){
							 	$pos = "left_list_$i"; 
							 ?>
							<li>
								<div class="frzcd"></div>
								<div class="frzc_c"><a href="#"><font>[知识榜单]</font> 好啊好哦啊粉色的发生</a></div>
							</li>
							<?php
							}?>
						</ul>
					</div>		
				</div>
				<div class="cf_z" id="cf_z">
					<div class="cfz_t">
						<font>父母养育测试</font>
					</div>
					<div class="cfz_cz">
						<ul>
							<?php
							 for($i=0;$i<7;$i++){ ?>
							<li>
								<div class="frzcd"></div>
								<div class="frzc_c"><a href="#"><font>[知识榜单]</font> 好啊好哦啊粉色的发生</a></div>
							</li>
							<?php
							}?>
						</ul>
					</div>		
				</div>
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
