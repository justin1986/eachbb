<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<?php
	include_once(dirname(__FILE__).'/../frame.php');
 ?>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>特色测评</title>
<?php
	use_jquery();
	css_include_tag('top_inc/test_top','test','top_inc/test_left');
	js_include_tag('test/test');
	init_page_items('test_index');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once(dirname(__FILE__).'/../inc/_test_top.php'); ?>
		<div id="content">
			<?php include_once(dirname(__FILE__).'/../inc/left_inc.php'); ?>
			<div id="c_r">
				<div id="cr_flash">
					<div id="cr_banner">
						<div id="crf_l">flash</div>
					<div id="crf_r">
						<div id="crf_t">特色评价<font>特色介绍</font></div>
						<?php for($i =0 ; $i < 4; $i++){
							$pos = "top_intr_$i";
						?>
						<div class="crf_c" id="cr_<?php echo $i;?>"<?php show_page_pos($pos,'link_d_i')?> style="margin-left:10px; float:left; padding:0px;">
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
							<div class="crb_cc" style="border-bottom:1px solid #ffffff; color:#43A0D6;">大运动</div>
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
							<div class="crb_cc">认知</div>
						</div>
						<div class="crb_hh"></div>
						<div class="crb_vv">
							<div class="crb_ttt"></div>
							<div class="crb_cc" style="width:149px;" id="crb_5">社会行为和生活习惯</div>
						</div>
						<div id="cr_hr"></div>
					</div>
					<?php for($i = 0; $i < 5; $i++){
						$pos = "middle_intr_$i";
					?>
					<div class="crb_c"<?php show_page_pos($pos,'link_d_i')?> id="crbc_<?php echo $i; ?>" style="<?php if($i == 0){ echo 'display:inline;';}else{ echo 'display:none;';} ?>">
							<div class="crbc_a">
								<a href="#">
									<img src="<?php echo $pos_items[$pos]->image1?>">
								</a>
							</div>
							<div class="crbci_t">
								<?php echo_href($pos_items[$pos]->description, $pos_items[$pos]->href)?>
							</div>
					</div>
					<?php } ?>
					</div>
			<div id="crc"></div>
			<div id="crd">
				<div class="crd_z" id="crd_z" <?php $pos="test_midden_a";show_page_pos($pos,'link_t_i');?>><img src="<?php echo  $pos_items[$pos]->image1;?>"><div class="crd_f"><a href="<?php echo  $pos_items[$pos]->href;?>"><?php echo  $pos_items[$pos]->title;?></a></div></div>
				<div class="crd_z" <?php $pos="test_midden_b";show_page_pos($pos,'link_t_i');?>><img src="<?php echo  $pos_items[$pos]->image1;?>"><div class="crd_f"><a href="<?php echo  $pos_items[$pos]->href;?>"><?php echo  $pos_items[$pos]->title;?></a></div></div>
				<div class="crd_z" <?php $pos="test_midden_c";show_page_pos($pos,'link_t_i');?>><img src="<?php echo  $pos_items[$pos]->image1;?>"><div class="crd_f"><a href="<?php echo  $pos_items[$pos]->href;?>"><?php echo  $pos_items[$pos]->title;?></a></div></div>
			</div>
			<div id="cre"<?php $pos="test_midden_a";show_page_pos($pos,'link_i');?>>
					<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1:"/images/test/tc_b.jpg";?>"></a>
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
									<div <?php $pos="test_bottom_img_$i";show_page_pos($pos,'link_i');?>>
										<a href="<?php echo $pos_items[$pos]->href;?>">
											<img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/c_pg_a.jpg';?>">
										</a>
									</div>
								</div>
								<?php }?>
							</div>
							<div id="pric_rl"></div>
						</div>
					</div>
					<div id="cri_b"></div>
				</div>
			</div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
