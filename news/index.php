<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-育儿资讯</title>
	<?php
		include_once(dirname(__FILE__).'/../frame.php');
		use_jquery();
		css_include_tag('consult');
		js_include_tag('news/index');
		init_page_items('consult_index');
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/top_consult.php'); ?>
	<div id="fbody">
		<div id="b_l">
			<div id="bl_a">
				<div id="bla_img"></div>
				<div id="bla_r">
					<?php 
						$db=get_db();
						#$pos_news=$db->query("SELECT  a.id,title,short_title,description,content,video_photo_src FROM  eb_news a left JOIN eb_position ta ON a.id=ta.source_id where ta.pos_name='hart_news' order by a.created_at desc limit 7");
					?>
					<div id="blar_t"<?php $pos="headline";show_page_pos($pos,'link_t_d');?>> 
						<div id="pg_f"><a href="#">今日热点</a></div>
						
						<div id="blar_tit"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
					</div>
					<div id="blart_c"<?php show_page_pos($pos,'link_t_d');?>><?php echo_href($pos_items[$pos]->description,$pos_items[$pos]->href);?></div>
					<div id="bla_hr"></div>
					<?php 
						for($i=1;$i<7;$i++)
						{
						?>
					<div class="bla_con"<?php $pos="headline_$i";show_page_pos($pos,'link')?>>
						<div class="blaco_d"></div>
						<div class="blaco_c"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div id="bl_b">
				<div id="bl_ti">
					<div id="blt_img">论坛板块</div>
					<div id="blt_c"> <a href="#">产后</a>
						<div class="bltc_z"></div>
						<a href="#">安胎</a>
						<div class="bltc_z"></div>
						<a href="#">产检</a>
						<div class="bltc_z"></div>
						<a href="#">胎教</a>
						<div class="bltc_z"></div>
						<a href="#">遗传</a>
						<div class="bltc_z"></div>
						<a href="#">不孕</a>
						<div class="bltc_z"></div>
						<a href="#">避孕</a>
						<div class="bltc_z"></div>
						<a href="#">生男生女</a>
						<div class="bltc_z"></div>
						<a href="#">孕期营养</a>
						<div class="bltc_z"></div>
						<a href="#">孕期禁忌</a>
						<div class="bltc_z"></div>
						<a href="#">坐月子</a> </div>
					<div id="bltc_hr"></div>
					<div class="trade_z" >
						<div class="trade_l">
							<div class="tl_l">
								<div class="tll_a"> 怀孕保养</div>
								<div class="tll_b"><a href="#">更多&gt;&gt;</a></div>
							</div>
							<?php 
								#$en_news=$db->query("SELECT id,category_id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id=153 and is_adopt=1 order by created_at desc limit 9;");
							?>
							<div class="tl_r" >
							</div>
						</div>
							<?php for($i=1;$i<9;$i++){?>
							<div class="tc_z"<?php $pos="news_list1_$i"; show_page_pos($pos,'link');?> style="<?php if($i%2==1){ echo "margin-left:17px;";}?>">
								<div></div>
								<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?> 
							</div>
							<?php }?>
					</div>
					<div class="trade_z" >
						<div class="trade_l" style="background:url(/images/consult/l_pgb.jpg) no-repeat;">
							<div class="tl_l">	
								<div class="tll_a">胎    教</div>
								<div class="tll_b"><a href="#">更多&gt;&gt;</a></div>
							</div>
							<?php 
								#$en_news=$db->query("SELECT id,category_id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id=209 and is_adopt=1 order by created_at desc limit 9;");
							?>
							<div class="tl_r"><a href="<?php get_news_url($en_news[0]);?>"><img src="<?php echo $en_news[0]->video_photo_src;?>"/></a></div>
						</div>
						<?php for($i=1;$i<9;$i++){?>
							<div class="tc_z"<?php $pos="news_list2_$i";show_page_pos($pos,'link');?> style="<?php if($i%2==1){ echo "margin-left:17px;";}?>">
								<div></div>
								<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?> 
							</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div id="bl_c">
				<a href="#">
				<img id="blc_a"/>
				</a> 
				<a href="#">
				<img id="blc_b"/>
				</a>
				<a href="#">
				<img id="blc_c"/>
				</a> 
				<a href="#">
				<img id="blc_d"/>
				</a>
				<div class="more"><a href="#">More&gt;</a></div>
			</div>
			<div id="bl_d">
				<?php
				#$peo_new=$db->query("SELECT id,title,author,video_photo_src,content FROM eb_news e where category_id =151 order by created_at desc limit 2;");
				for($i=0;$i<2;$i++){?>
				<div class="bld_z"<?php $pos="rwft_$i";show_page_pos($pos,'link_d_i');?>>
					<div class="bld_c">
						<div class="blc_l">
							<div class="bll_t"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
							<div class="blc_r"><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
							<?php echo_href($pos_items[$pos]->description,$pos_items[$pos]->href);?>
						</div>
						
					</div>
				</div>
				<?php }?>
			</div>
			<div id="bl_e">
				<div id="be_l">
					<div id="bel_t">
						<div id="bel_l">娱乐八卦</div>
						<div id="bel_r"><a href="#">查看更多</a></div>
					</div>
					<div id="bel_c"<?php $pos="ylbg_headline";show_page_pos($pos,'link_d_i');?>>
					<?php 
						#$ente_news=$db->query("SELECT id,title,content,video_photo_src FROM eb_news e where category_id=152 and is_adopt=1 order by created_at desc limit 4;");
					?>
						<div id="belc_img">
							<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>" border="0"></a>
						</div>
						<div id="belc_ir">
							<div id=beir_t><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
							<div id="beir_c">
								<?php echo_href($pos_items[$pos]->description,$pos_items[$pos]->href);?>
							</div>
						</div>
					</div>
					<?php for($i=1;$i<=3;$i++){?>
					<div class="bel_b"<?php $pos="ylbg_news_$i";show_page_pos($pos,'link');?>>
						<div class="bel_d"></div>
						<div class="belc_c"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
					</div>
					<?php }?>
				</div>
				<div id="be_c"></div>
				<div id="be_r">
					<div id="ber_t">
						<div id="bert_ta">
							<div id="bert_pgl"></div>
							<div id="bert_pgr">潮爸潮妈</div>
							<div id="bert_hr">
								<div></div>
							</div>
						</div>
					</div>
					<div id="ber_tt">
						<div id="bert_t"></div>
						<div id="bert_c">
							<div class="svm"><a href="#"><font>+</font>更多</a></div>
							<div id="bert_b"></div>
						</div>
					</div>
					<div id="be_cc">
						<?php 
						#$cate_news=$db->query("SELECT id,title,video_photo_src FROM eb_news e where category_id=155 and is_adopt=1  order by created_at desc  limit 3");
						for($i=0;$i<3;$i++){ ?>
						<div class="becc_z"<?php $pos="cbcm_news_$i";show_page_pos($pos,'link_t_i');?>>
							<a href="<?php $pos_items[$pos]->href;?>">
								<img src="<?php echo $pos_items[$pos]->image1;?>" border="0"/>
							</a>
							<div class="becc_b" style="<?php if($i==0){ echo "background:#FE5F00;";}?>"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div id="bl_f">
				<div id="bf_t"></div>
				<div id="bf_z">
					<div id="bf_zz">
						<?php 
						#$up_news=$db->query("SELECT id,title,short_title,video_photo_src,content FROM eb_news e where category_id=156 and is_adopt=1 order by created_at desc limit 1;");
						?>
						<div id="bf_pic"<?php $pos="zxdt_0";show_page_pos($pos)?>>
							<a href="<?php $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a>
						</div>
						<div id="bf_c">
							<div id="bfc_t"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
							<div id="bfc_c"><?php echo_href($pos_items[$pos]->description,$pos_items[$pos]->href);?></div>
						</div>
					</div>
				</div>
				<div id="bf_b"></div>
			</div>
		</div>
		<div id="b_r">
			<div id="br_a">
				<div id="ba_t">
					<div><img src="/images/consult/0.jpg" class="student_tab"/></div>
					<div><img src="/images/consult/1a.jpg" class="student_tab"/></div>
					<div><img src="/images/consult/2a.jpg" class="student_tab"/></div>
				</div>
				<div class="ba_c" id="bac_0" style="display:inline;">
					<?php
					#$mom_news=$db->query("SELECT id,title FROM eb_news e where category_id=157 and is_adopt=1 limit 7;");
					for($i = 0 ; $i < 7 ; $i++){?>
					<div class="bac_z"<?php $pos="right_assistant_$i";show_page_pos($pos,'link');?> style="<?php if($i == 0){ echo ' margin-top:5px;';}?>;">
						<div class="bac_d"></div>
						<div class="bac_v"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
						<?php if($i != 6){?>
						<div class="bac_c"></div>
						<?php }?>
					</div>
					<?php }?>
				</div>
				<div class="ba_c" id="bac_1">
					<?php
					#$mom_news=$db->query("SELECT id,name FROM eb_problem e where is_adopt=1 order by create_time desc limit 7;");
					for($i = 0 ; $i < 7 ; $i++){?>
					<div class="bac_z"<?php $pos="right_test_$i";show_page_pos($pos,'link')?> style="<?php if($i == 0){ echo ' margin-top:5px;';}?>;">
						<div class="bac_d"></div>
						<div class="bac_v"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
						<?php if($i != 6){?>
						<div class="bac_c"></div>
						<?php }?>
					</div>
					<?php }?>
				</div>
				<div class="ba_c" id="bac_2">
					<?php
					#$mom_news=$db->query("SELECT id,title FROM eb_teach e where is_adopt=1  order by create_time desc limit 7;");
					for($i = 0 ; $i < 7 ; $i++){?>
					<div class="bac_z"<?php $pos="right_course_$i";show_page_pos($pos,'link')?>  style="<?php if($i == 0){ echo ' margin-top:5px;';}?>;">
						<div class="bac_d"></div>
						<div class="bac_v"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
						<?php if($i != 6){?>
						<div class="bac_c"></div>
						<?php }?>
					</div>
					<?php }?>
				</div>
				<div id="ba_b"></div>
			</div>
			<div id="bc_z">
				<div id="bc_t">
					<div id="bct2_l">最热排行</div>
					<div id="bct2_r"><a href="#">More&gt;</a></div>
				</div>
				<div id="bc_t2">
					<div id="bct_z">
						<div class="bct_c" id="bc_0" style="width:74px; height:24px; margin-left:4px; background:url(../images/consult/rc_l.jpg) no-repeat; line-height:24px; color:#FF6600; float:left; display:inline;">幼教排行</div>
						<div id="bct_hr"></div>
						<div class="bct_c" id="bc_1">论坛</div>
						<div class="bct_c" id="bc_2">博客</div>
						<div class="bct_c" id="bc_3">咨询</div>
						<div class="bct_c" id="bc_4">测评</div>
					</div>
				</div>
				<?php for($j=0;$j<5;$j++){?>
				<div class="bct_number" id="bn_<?php echo $j;?>" style="display:<?php echo $j==0 ? "inline" : "none"?>;">
				<?php for($i=0;$i<10;$i++){?>
					<div class="bct_cp"<?php $pos="right_tab_$j_$i";show_page_pos($pos,'link')?>>
						<div class="bct_cpl"  style="<?php if($i==0){ echo 'background:url(/images/index/red.png) no-repeat';}?>"><?php echo $i+1?></div>
						<div class="bct_cpv"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
					</div>
				<?php  }?>
				</div>
				<?php }?>
				<div id="bct_cb"></div>
			</div>
			<div class="bd">
				<div class="bd_t"></div>
				<div class="bd_c">
					<div class="bdt_t">
						<div class="bdt_tl">最热评论</div>
						<div class="bdt_more"><a href="#"><font>+</font>更多</a></div>
					</div>
					<div class="bdt_hr">
						<div class="bdt_hr2"></div>
					</div>
					<div id="bdc_z">
						<?php
						#$pro_news=$db->query("SELECT id,name FROM eb_problem e where is_adopt=1 order by create_time desc limit 13;");
						for($i=0;$i<13;$i++){?>
						<div class="bdcz_z"<?php $pos="right_comments_$i";show_page_pos($pos,'link');?>>
							<div class="bdcz_l"></div>
							<div class="bdcz_r"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="bd_b"></div>
			</div>
			<div class="bd">
				<div class="bd_t"></div>
				<div class="bd_c">
					<div class="bdt_t">
						<div class="bdt_tl">用户调查</div>
						<div class="bdt_more"><a href="#"><font>+</font>更多</a></div>
					</div>
					<div class="bdt_hr">
						<div class="bdt_hr2"></div>
					</div>
					<div id="user_z">
						<form action="">
							<div id="user_a">
								<a href="#">
								<img id="pho"/>
								</a>
								<div id="pho_title">用户调查用户调查?</div>
							</div>
							<div id="bd_n"></div>
							<?php for($x=0;$x<3;$x++){?>
							<div class="user_a">
								<input type="radio" class="user_rdo">
								<div class="user_rvalue">斯蒂芬妮斯的浪费那得分</div>
							</div>
							<?php  }?>
							<div id="user_hr"></div>
							<div id="user_pg">
								<input type="button" id="u_pa" value="投  票">
								<input type="button" id="u_pb" value="查看结果">
							</div>
							<div id="n"></div>
						</form>
					</div>
				</div>
				<div class="bd_b"></div>
			</div>
		</div>
		<div id="bt_i">
			<div id="bi_t">
				<div id="bit_l">
					<div id="bit_f"><font>实用</font>推荐</div>
				</div>
				<div id="bit_r"></div>
			</div>
			<div id="bi_c">
				<div id="bi_l">
					<div class="bil_a">
						<div class="bil_img"><font>妊娠反应</font></div>
						<div class="bil_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=158;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_yu" style="<?php if(strlen($uty_news[$i]->name)===12){ echo "width:60px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</div>
					</div>
					<div class="bil_a">
						<div class="bil_img"><font>孕期营养</font></div>
						<div class="bil_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=161;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_y"  style="<?php if(strlen($uty_news[$i]->name)>7){ echo "width:60px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</div>
					</div>
					<div class="bil_a">
						<div class="bil_img"><font>心里健康</font></div>
						<div class="bil_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=164;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_y" style="<?php if(strlen($uty_news[$i]->name)>7){ echo "width:60px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</DIV>
					</div>
				</div>
				<div id="bi_cc">
					<div class="bil_a">
						<div class="bil_img"><font>孕期生活</font></div>
						<div class="bil_value"> 
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=159;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_yu" style="<?php if(strlen($uty_news[$i]->name)>7){ echo "width:60px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</div>
					</div>
					<div class="bil_a">
						<div class="bil_img"><font>孕期不适</font></div>
						<div class="bil_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=162;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_yu" style="<?php if(strlen($uty_news[$i]->name)>7){ echo "width:60px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</div>
					</div>
					<div class="bil_a">
						<div class="bil_img"><font>产检相关</font></div>
						<div class="bil_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=165;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_yu"  style="<?php if(strlen($uty_news[$i]->name)>7){ echo "width:60px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</div>
					</div>
				</div>
				<div id="bi_r">
					<div class="bill_a">
						<div class="bil_img"><font>孕期异常</font></div>
						<div class="bill_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=160;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_y" style="<?php if(strlen($uty_news[$i]->name)>10){ echo "width:60px;";}elseif(strlen($uty_news[$i]->name)>8){ echo "width:50px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</div>
					</div>
					<div class="bill_a">
						<div class="bil_img"><font>孕期疾病</font></div>
						<div class="bill_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=163;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_yu" style="<?php if(strlen($uty_news[$i]->name)>14){ echo "width:70px;";}elseif(strlen($uty_news[$i]->name)>8){echo "width:50px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							
							<?php }}?>
						</div>
					</div>
					<div class="bill_a">
						<div class="bil_img"><font>乳房保健</font></div>
						<div class="bill_value">
							<?php 
								$uty_news=$db->query("SELECT id,name FROM eb_category where parent_id=166;");
								$uty_news_count=$db->record_count;
								for($i=0;$i<$uty_news_count;$i++){
							?>
							<div class="bil_yu" style="<?php if(strlen($uty_news[$i]->name)>10){ echo "width:60px;";}?>"><a href="#" title="<?php echo $uty_news[$i]->name;?>"><?php echo $uty_news[$i]->name;?></a></div>
							<?php if($i!==($uty_news_count-1)){?>
							<div class="bil_hr"></div>
							<?php }}?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
</div>
</body>
</html>
