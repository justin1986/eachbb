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
		$db=get_db();
		function news_type($data){
			switch ($data){
				case 1:
					return "育儿早班车";
				case 2:
					return "邻家育儿";
				case 3:
					return "海外传真";
				case 4:
					return "潮爸潮妈";
				case 5:
					return "网趣动态";
			}
		}
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_consult_top.php'); ?>
	<div id="fbody">
		<div id="b_l">
			<div id="bl_a">
				<div id="bla_img">
					<?php for($i = 1 ; $i <= 5 ; $i++){?>
					<div class="pic_img"<?php $pos="news_top_pg_l_$i";show_page_pos($pos,'link_i');?> id="img_tab_<?php echo $i;?>"  <?php if($i == 1){ ?> style="display:inline;"<?php }else{?>style="display:none;"<?php }?>>
						<a href="<?php echo $pos_items[$pos]->href;?>"><img style="border:0px solid red;" src="<?php echo $pos_items[$pos]->image1;?>"/></a>
					</div>
					<?php }?>
					<div id="pic_number">
						<div id="nn_5" class="num">5</div>	
						<div id="nn_4" class="num" >4</div>
						<div id="nn_3" class="num">3</div>
						<div id="nn_2" class="num">2</div>
						<div id="nn_1" class="num selected">1</div>
					</div>
				</div>
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
					<div id="blt_img">育儿早班车</div>
					<div class="more" style="margin-top:10px;"><a href="/news/news_list.php?category_id=1">More&gt;</a></div>
					<div id="bltc_hr"></div>
					<div class="trade_z" >
						<div class="trade_l">
							<?php 
								#$en_news=$db->query("SELECT id,category_id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id=153 and is_adopt=1 order by created_at desc limit 9;");
							?>
							<div class="tl_r" <?php $pos="assistan_hb_link_a"; show_page_pos($pos,'link_i');?>>
								<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>"/></a>
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
							<?php 
								#$en_news=$db->query("SELECT id,category_id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id=209 and is_adopt=1 order by created_at desc limit 9;");
							?>
							<div class="tl_r"<?php $pos="assistan_hb_link_b"; show_page_pos($pos,'link_i');?>>
								<a href="<?php echo $pos_items[$pos]->href;?>">
									<img src="<?php echo $pos_items[$pos]->image1;?>"/>
								</a>
							</div>
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
				<div class="more"><a href="/news/news_list.php?category_id=2">More&gt;</a></div>
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
						<div id="bel_l">海外传真</div>
						<div id="bel_r"><a href="/news/news_list.php?category_id=3">查看更多</a></div>
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
							<div class="svm"><a href="/news/news_list.php?category_id=4"><font>+</font>更多</a></div>
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
			<div class="bd"<?php $pos="right_course_sdf";show_page_pos($pos,'link_i')?> style="height:190px; margin-top:0px;">
				<img src="<?php echo $pos_items[$pos]->image1;?>" style="width:287px; height:190px; border:0px solid red;"/>
			</div>
			<div id="br_a" style="margin-top:20px;">
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
				</div>
				<div id="bc_t2">
					<div id="bct_z">
						<div class="dict_tab long" style="background:url(/images/news/r_ffff.gif) no-repeat; color:#FF6600;">育儿早班车</div>
						<div class="dict_tab long">邻家育儿</div>
						<div class="dict_tab short">海外传真</div>
						<div class="dict_tab short">潮爸潮妈</div>
						<div class="dict_tab short">网趣动态</div>
					</div>
				</div>
				<?php for($j = 0 ; $j < 5; $j++){?>
				<div class="bct_number"  id="bn_<?php echo $j;?>">
						<?php for($i=0; $i<10;$i++){?>
						<div class="bct_cp"<?php $pos="news_right_tab_".$j."_".$i;show_page_pos($pos,'link')?>>
							<div class="bct_cpl"  style="<?php if($i==0){ echo 'background:url(/images/index/red.jpg) no-repeat';}?>">
								<?php echo $i+1?>
							</div>
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
					</div>
					<div class="bdt_hr">
						<div class="bdt_hr2"></div>
					</div>
					<div id="bdc_z">
						<?php
						#$list = $db->query("SELECT resource_id,comment,title FROM eb_comment e where resource_type='assistant' order by created_at desc LIMIT 13");
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
		</div>
		<div id="bt_i">
			<div id="bi_t">
				<div id="bit_l">
					<div id="bit_f"><font>育儿</font>咨询</div>
				</div>
				<div id="bit_r"></div>
			</div>
			<div id="bi_c">
				<div class="news_banner_left">
				<?php
				$list = array();
				foreach(array(1,2) as $cate){
						$items =$db->query("select * from eb_news where category_id=$cate order by created_at,rand() limit 5");
						$list = array_merge($list,$items);
				}
				for($i = 0 ; $i < 10 ; $i++){ ?>
				<div class="bil_y">
					<div><span>[<?php echo news_type($list[$i]->category_id);?>]</span>
					<a href="/news/news.php?id=<?php echo $list[$i]->id;?>" title="<?php echo $list[$i]->title;?>"><?php echo $list[$i]->title;?></a>
					</div>
					<font><?php echo $list[$i]->created_at;?></font>
				</div>
				<?php }?>
				</div>
				<div class="news_banner_left">
				<?php
				$list = array();
				foreach(array(3,4) as $cate){
						$items =$db->query("select * from eb_news where category_id=$cate order by created_at,rand() limit 5");
						$list = array_merge($list,$items);
				}
				for($i = 0 ; $i < 10 ; $i++){ ?>
				<div class="bil_y">
					<div><span>[<?php echo news_type($list[$i]->category_id);?>]</span>
					<a href="/news/news.php?id=<?php echo $list[$i]->id;?>" title="<?php echo $list[$i]->title;?>"><?php echo $list[$i]->title;?></a>
					</div>
					<font><?php echo $list[$i]->created_at;?></font>
				</div>
				<?php }?>
				</div>
				
			</div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>
</html>