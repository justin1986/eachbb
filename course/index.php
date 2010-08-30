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
	css_include_tag('course/course_top','class_s');
	js_include_tag('class/class_s');
	init_page_items('course_index');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once(dirname(__FILE__).'/../inc/_top_course.php'); ?>
		<div id="content">
		<?php include_once(dirname(__FILE__).'/../course/left_inc.php'); ?>
			<div id="c_r">
				<div id="cr_top">
					<div id="cr_flash">flash</div>
					<div id="img_flash"<?php $pos="top_image"; show_page_pos($pos,'link_i')?>><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/class/c_pg_a.jpg';?>" border="0"/></a></div>				
				</div>
				<div id="crcb_t">
					<div class="cr_a" ><a href="#"  style="color:#ffffff;">大运动</a></div>
					<div class="cr_a" ><a href="#" >精细动作</a></div>
					<div class="cr_a" ><a href="#" >认识</a></div>
					<div class="cr_a" ><a href="#" >语言</a></div>
					<div class="cr_a" ><a href="#" >情感培养</a></div>
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
						<?php for($j = 0 ; $j <5; $j++){?>
						<div class="crr_z" id="crr_z_<?php echo $j;?>" <?php if($j === 0) echo "style='display:inline;'"?>>
							<a href="#"><img class="class_img" src="/images/class/class.png"/></a>
							<div class="crb_title">
								推荐<font>课程</font>
							</div>
							<div class="class_val">
								<div class="crr_t"<?php $pos="middle_headline_$j";show_page_pos($pos,'link_d_i');?>>
									<div class="crrt_l"><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/cr_l.jpg';?>" border="0"></a></div>
									<div class="crrt_c"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									<div class="crrt_b"><?php echo $pos_items[$pos]->description;?></div>
								</div>
								<div class="crr_c"></div>
								<div class="crrab_z">
									<?php for($i=0;$i<6;$i++){?>
									<div class="crr_b"<?php $pos="_mse_list_$j$i";show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href)?></div>
									<?php }?>
								</div>
							</div>
					</div>
					<?php }?>
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
									<div <?php $pos="bottom_imsg_$i";show_page_pos($pos,'link_i');?>>
										<a href="<?php echo $pos_items[$pos]->href;?>">
											<img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/c_pg_a.jpg';?>"/>
										</a></div>
								</div>
								<?php }?>
							</div>
							<div id="pric_rl"></div>
						</div>
					</div>
					<div id="cri_b"></div>
				</div>
				<div id="bg_pg"<?php $pos="bottom_img_$i";show_page_pos($pos,'link_i');?>> 
					<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>"/></a>
				</div>
			</div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
