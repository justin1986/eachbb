<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>bbs</title>
<?php 
	include_once(dirname(__FILE__).'/frame.php');
	use_jquery_ui();
	css_include_tag('bbs','jquery_ui','bottom');
	init_page_items('bbs');
	js_include_tag('bbs/bbs');
?>
<link href="./css/bbs.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/inc/_bbs_top.php'); ?>
	<div id="fbody">
		<div id="b_l">
			<div id="bl_a">
				<div id="bla_img">
					<div class="fr_img" id="img_tab_0" style="display:inline;">
						<a href=""><img src="/images/bbs/m1.jpg"/></a>
					</div>
					<div class="fr_img" id="img_tab_1">
						<a href=""><img src="/images/bbs/m5.jpg"/></a>
					</div>
					<div class="fr_img" id="img_tab_2">
						<a href=""><img src="/images/bbs/login.jpg"/></a>
					</div>
					<div class="fr_img" id="img_tab_3">
						<a href=""><img src="/images/bbs/pg_e.gif"/></a>
					</div>
					<div class="fr_img" id="img_tab_4">
						<a href=""><img src="/images/bbs/p_p.gif"/></a>
					</div>
					<div class="fr_number">
						<div class="num" id="num4">5</div>
						<div class="num" id="num3">4</div>	
						<div class="num" id="num2">3</div>	
						<div class="num" id="num1">2</div>	
						<div class="num" id="num0" style="background:#FF6600">1</div>	
					</div>
				</div>
				<div id="bla_r">
					<div id="blar_t">
						<div id="pg_f"><a href="#">今日热点</a></div>
						<div id="blar_tit" <?php $pos="top1";show_page_pos($pos,'link_t_d');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
					</div>
					<div id="blart_c"><?php echo $pos_items[$pos]->description;?></div>
					<div id="bla_hr"></div>
					<?php  for($i=2;$i<8;$i++) { ?>
					<div class="bla_con">
						<div class="blaco_d"></div>
						<div class="blaco_c" <?php $pos="top".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div id="bit_ban">
				<div id="blt_img">论坛板块</div>
				<div id="bltc_hr"></div>
			</div>
			<div id="bit_c">
				<div class="bitc_a">
					<div class="bitca_t">
						<div class="bi_l"><a href="#">专  题</a></div>
						<div class="bi_r"><a href="#">more</a></div>
					</div>
					<div class="bitca_c">
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs1_img1";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=1;$i<=3;$i++){?>
								<div class="bical_z" <?php if($i==3)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs1_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs1_img2";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=4;$i<=6;$i++){?>
								<div class="bical_z" <?php if($i==6)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs1_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="bitc_a" style="float:right; margin-right:20px;">
					<div class="bitca_t" style="background:url(images/bbs/c2.jpg)">
						<div class="bi_l"><a href="#">专  题</a></div>
						<div class="bi_r"><a href="#">more</a></div>
					</div>
					<div class="bitca_c" style="border:3px solid #FEAF59; border-top:0px solid red;">
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs2_img1";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=1;$i<=3;$i++){?>
								<div class="bical_z" <?php if($i==3)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs2_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs2_img2";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=4;$i<=6;$i++){?>
								<div class="bical_z" <?php if($i==6)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs2_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="bitc_a">
					<div class="bitca_t" style="background:url(images/bbs/c3.jpg) no-repeat">
						<div class="bi_l"><a href="#">专  题</a></div>
						<div class="bi_r"><a href="#">more</a></div>
					</div>
					<div class="bitca_c" style="border:3px solid #7FE574; border-top:0px solid red;">
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs3_img1";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=1;$i<=3;$i++){?>
								<div class="bical_z" <?php if($i==3)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs3_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs3_img2";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=4;$i<=6;$i++){?>
								<div class="bical_z" <?php if($i==6)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs3_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="bitc_a" style="float:right; margin-right:20px;">
					<div class="bitca_t" style="background:url(images/bbs/c4.jpg) no-repeat;">
						<div class="bi_l"><a href="#">专  题</a></div>
						<div class="bi_r"><a href="#">more</a></div>
					</div>
					<div class="bitca_c" style="border:3px solid #C8E25D; border-top:0px solid red;">
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs4_img1";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=1;$i<=3;$i++){?>
								<div class="bical_z" <?php if($i==3)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs4_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
						<div class="bic_a">
							<div class="bica_li" <?php $pos="bbs4_img2";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="bica_lr">
								<?php for($i=4;$i<=6;$i++){?>
								<div class="bical_z" <?php if($i==6)echo 'style="border:0px solid red;"';?>>
									<div class="bical_d"></div>
									<div class="bical_value" <?php $pos="bbs4_href".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
								</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="bl_img"><img src="images/bbs/pg_f.jpg"></div>
			<div id="bl_b">
				<div id="bl_ti">
					<div class="special">
						<div class="bl_sp_t">
							<div class="bl_a" style="background:url(images/bbs/t1.jpg) no-repeat;"><font><a href="#">专题</a></font></div>
							<div class="bl_hr" style="background:url(images/bbs/h1.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m1.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic1_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic1_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic1_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
					<div class="special">
						<div class="bl_sp_t"> 
							<div class="bl_a" style="background:url(images/bbs/t2.jpg) no-repeat;"><a href="#">专题</a></div>
							<div class="bl_hr" style="background:url(images/bbs/h2.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m2.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic2_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic2_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic2_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
					<div class="special">
						<div class="bl_sp_t"> 
							<div class="bl_a" style="background:url(images/bbs/t3.jpg) no-repeat;"><a href="#">专题</a></div>
							<div class="bl_hr" style="background:url(images/bbs/h3.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m3.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic3_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic3_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic3_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
					<div class="special">
						<div class="bl_sp_t"> 
							<div class="bl_a" style="background:url(images/bbs/t4.jpg) no-repeat;"><a href="#">专题</a></div>
							<div class="bl_hr" style="background:url(images/bbs/h4.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m4.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic4_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic4_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic4_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
					<div class="special">
						<div class="bl_sp_t"> 
							<div class="bl_a" style="background:url(images/bbs/t5.jpg) no-repeat;"><a href="#">专题</a></div>
							<div class="bl_hr" style="background:url(images/bbs/h5.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m5.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic5_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic5_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic5_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
					<div class="special">
						<div class="bl_sp_t"> 
							<div class="bl_a" style="background:url(images/bbs/t6.jpg) no-repeat;"><a href="#">专题</a></div>
							<div class="bl_hr" style="background:url(images/bbs/h6.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m6.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic6_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic6_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic6_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
					<div class="special">
						<div class="bl_sp_t"> 
							<div class="bl_a" style="background:url(images/bbs/t7.jpg) no-repeat;"><a href="#">专题</a></div>
							<div class="bl_hr" style="background:url(images/bbs/h7.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m7.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic7_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic7_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic7_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
					<div class="special">
						<div class="bl_sp_t"> 
							<div class="bl_a" style="background:url(images/bbs/t8.jpg) no-repeat;"><a href="#">专题</a></div>
							<div class="bl_hr" style="background:url(images/bbs/h8.jpg) repeat-x;"></div>
							<div class="bl_r" style="background:url(images/bbs/m8.jpg) no-repeat;"><a href="#">+MORE</a></div>
						</div>
						<div class="bl_sp_c">
							<div class="blspc_l" <?php $pos="topic8_img";show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<div class="blspc_r">
								<?php for($i = 1 ; $i <=4; $i++){ ?>
								<div class="blspc_a">
									<div class="blspcc_l"></div>
									<div class="blspcc_value" <?php $pos="topic8_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
									</div>
								<?php if($i!=2) { ?>
								<div class="blspc_hr"></div>
								<?php } } ?>
							</div>
						</div>
						<div class="bl_sp_b">
							<div class="blb_hr"></div>
							<?php for($i = 5 ; $i <=7 ; $i++){ ?>
							<div class="blb_bz">
								<div class="blb_d"></div>
								<div class="blb_v" <?php $pos="topic8_link".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php  }  ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="b_r">
			<div id="test_right">
				<script type="text/javascript">$('#test_right').load('/login/ajax.post.php?op=load_login_status_box&rd='+Math.random());</script>
			</div>
			<div id="br_e">
				<?php for($i=1;$i<=6;$i++){ ?>
				<div class="br_bz" style="<?php if($i==1){ echo 'margin-top:20px;'; }?>">
					<div class="br_bzl"></div>
					<div class="br_bzr" <?php $pos="notice".$i;show_page_pos($pos,'link');?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
				</div>
				<?php  }?>
			</div>
			<div id="br_f"><a href="#"><img src="images/bbs/b.jpg"></a></div>
			<div id="br_g"><a href="#"><img src="images/bbs/c.jpg"></a></div>
			<div id="br_c"></div>
			<div id="br_h">
				<div id="rh_t">
					<div>滚动热帖精华帖</div>
				</div>
				<div id="rh_c">
					<div id="rh_pg">
						<?php for($i=1;$i<=15;$i++) { ?>
						<div class="rhc_z" <?php $pos="hot".$i;show_page_pos($pos,'link');?> style="<?php if($i==1){ echo 'margin-top:8px;';}?>"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
						<? }?>
					</div>
				</div>
				<div id="rh_b">
					<div id="rhb_g"><a href="#">更多<img src="images/bbs/pg_e.jpg"></a></div>
				</div>
			</div>
			<div id="i"></div>
			<div class="o">
				<div class="i_l">最活跃用户排名</div>
				<div class="i_r">HOT  USER</div>
			</div>
			<?php for($i=0;$i<10;$i++){?>
			<div class="o_z" style="<?php if($i==0){echo 'margin-top:10px;';}?>">
				<div class="oz_l">
					<div></div>
					<font>萨达菲</font></div>
				<div class="oz_c">2398 帖</div>
				<div class="oz_r">198237分</div>
			</div>
			<?php }?>
			<div id="i"></div>
			<div class="o">
				<div class="i_l">用户精彩问答</div>
				<div id="i_r"><a href="#">更多&gt;&gt;</a></div>
			</div>
			<?php  for($i=1;$i<=2;$i++){ ?>
			<div class="p" style="<?php if($i==1){ echo 'margin-top:12px;';}?>" <?php $pos="qa".$i;show_page_pos($pos,'qa');?>>
				<div class="p_l"></div>
				<div class="p_r"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
			</div>
			<div class="q">
				<div class="q_l"></div>
				<div class="q_r"><?php echo_href($pos_items[$pos]->description, $pos_items[$pos]->href);?></div>
			</div>
			<?php  if($i==1){ echo '<div class="p_hr"></div>'; } }?>
		</div>
		<div id="fb_pg">
			<div id="fbp_l"><a href="#">
				<div></div>
				</a></div>
			<div id="fbp_c">
				<?php  for($i=1;$i<=5;$i++) { ?>
				<div class="fb_pg" <?php $pos="photo".$i;show_page_pos($pos,'link_t_i');?>><a title="<?php echo $pos_items[$pos]->title;?>" href="<?php echo $pos_items[$pos]->href?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
				<?}?>
			</div>
			<div id="fbp_r"><a href="#">
			<div></div>
			</a></div>
		</div>
		<?php include_once(dirname(__FILE__).'/inc/bottom.php');?>
	</div>
</div>
</body>
</html>