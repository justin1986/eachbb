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
	css_include_tag('course/course_top','class_s','colorbox','top_inc/test_left');
	js_include_tag('class/class_s','swfobject','jquery.colorbox-min');
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
					<script type="text/javascript">
						var flashvar = {};
						swfobject.embedSWF("/flash/course.swf","cr_flash","520","300","8",false,flashvar,flashparam);
					</script>
					<div id="img_flash" class="ad_banner"></div>				
				</div>
				<div id="crcb_t">
					<div class="cr_a"  style="color:#ffffff;">大运动</div>
					<div class="cr_a" >精细动作</div>
					<div class="cr_a" >认知</div>
					<div class="cr_a" >语言</div>
					<div class="cr_a" >情感培养</div>
				</div>
				<div class="cr_cb"  style="position: relative; z-index:1">
					<?php for($j = 0 ; $j <5; $j++){?>
					<div class="crc_pg"  id="crr_zz_<?php echo $j;?>">
						<div class="crb_img" >
							<?php for($i = 0; $i < 4; $i++){ ?>
							<script type="text/javascript">
								$('.banner_0').show();
							</script>
							<div class="banner banner_<?php echo $i?>" id="<?php echo "middle_image_".$i."_".$j; ?>" <?php $pos="middle_image_".$i."_".$j;show_page_pos($pos,'link_i');?>>
								<img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/l_pg_c.jpg';?>" />
							</div>
							<?php } ?>
							<div class="num_banner">
							<div class="num" style="margin-left:195px;background:#CE0609;">1</div>
								<div class="num">2</div>
								<div class="num">3</div>
								<div class="num">4</div>
							</div>
						</div>
						<div class="crr_z">
							<a href="#"><img class="class_img" src="/images/class/class.png"/></a>
							<div class="crb_title">
								推荐<font>课程</font>
							</div>
							<div class="class_val">
								<div class="crr_t" <?php $pos="middle_headline_$j";show_page_pos($pos,'link_d_i');?>>
									<div class="crrt_l"><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/cr_l.jpg';?>" border="0"></a></div>
									<div class="crrt_c"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									<?php 
									if(mb_strlen($pos_items[$pos]->description,'utf-8'))
									{
										if(mb_strlen($pos_items[$pos]->description,'utf-8') < 160){
											echo $pos_items[$pos]->description.'<a class="beiju" href="#"></a>';
										}else{
											echo mb_substr($pos_items[$pos]->description,0,160,'utf-8')."<a class='beiju' href='#'><font style='font-size:10px;'>...</font>【查看全文】</a>";
										}
									}else{
										echo '<a class="beiju" href="#"></a>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div id="cr_ci">
					<div id="cri_t"></div>
					<div id="cri_c">
						<div id="cric_pg">
							<div id="pric_l"></div>
							<div id="cric_title"><font>精彩课程展示</font> </div>
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
				<div id="bg_pg" class="ad_banner"></div>
			</div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
</html>
