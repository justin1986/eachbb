<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('./frame.php');
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>consult</title>
<link href="./css/consult.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="ibody">
	<div id="top_login">
		<div id="tl_l"></div>
		<div id="tl_r"></div>
	</div>
	<div id="top_menu">
		<div id="menu_pg">
			<div id="menu_left"></div>
			<div id="menu_center">
				<div id="menu_ct">
					<div id="menu_ctt">
						<input type="button" class="t_first" value="网站首页">
						<div class="me_a"><a href="#">特色测评</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">早教课程</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">妈妈助手</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">我家小院子</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">我的宝宝</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">亲子论坛</a></div>
						<div class="me_h"></div>
						<div class="me_b" style="background:url(images/bbs/mo_pg.jpg) no-repeat;"><a href="#"><font class="son">育儿</font><font class="bbs">咨讯</font></a></div>
						<div class="me_h"></div>
						<div class="me_b" style="width:85px;"><a href="#">关于网趣宝宝</a></div>
						<div class="welcom">欢迎,<font>123</font></div>
						<div class="exit"><a href="#" style="color:#000;">退出</a></div>
						<div class="info">消息<a href="#" style="color:#FE843A">(1)</a></div>
						</div>
					</div>
				<div id="menu_ctb">
						<input type="button" id="t_first" value="我的网趣">
						<div class="me_aa"><a href="#">网趣宝宝首页</a></div>
						<div class="me_hh"></div>
						<div class="me_bb"><a href="#">用户测评报告</a></div>
						<div class="me_hh"></div>
						<div class="me_bb"><a href="#">用户课程订购</a></div>
						<div class="me_hh"></div>
						<div class="me_bb"><a href="#">重要信息提示</a></div>
						<div class="me_hh"></div>
						<div class="me_bb"><a href="#">我家小院子</a></div>
						<div class="me_hh"></div>
						<div class="me_bb" ><a href="#">管理设置</a></div>
						<input type="text" id="me_in">
						<input type="button" id="me_btn">
					</div>
			</div>
			<div id="menu_right"></div>
		</div>
	</div>
	<div id="fbody">
		<div id="b_l">
			<div id="bl_a">
				<div id="bla_img"></div>
				<div id="bla_r">
					<?php 
						$db=get_db();
						$pos_news=$db->query("SELECT  a.id,title,short_title,description,content,video_photo_src FROM  eb_news a left JOIN eb_position ta ON a.id=ta.source_id where ta.pos_name='hart_news' order by a.created_at desc limit 7");
					?>
					<div id="blar_t"> 
						<div id="pg_f"><a href="<?php get_news_url($pos_news[0]);?>">今日热点</a></div>
						
						<div id="blar_tit"><a href="<?php get_news_url($pos_news[0]);?>" title="<?php echo $pos_news[0]->title;?>"><?php echo $pos_news[0]->title;?></a></div>
					</div>
					<div id="blart_c"><a href="<?php get_news_url($pos_news[0]);?>" title="<?php echo $pos_news[0]->title;?>"><?php echo strip_tags($pos_news[0]->description);?></a></div>
					<div id="bla_hr"></div>
					<?php 
						for($i=1;$i<7;$i++)
						{
						?>
					<div class="bla_con">
						<div class="blaco_d"></div>
						<div class="blaco_c"><a href="<?php get_news_url($pos_news[$i]);?>" title="<?php echo $pos_news[$i]->title;?>"><?php echo $pos_news[$i]->title;?></a></div>
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
								$en_news=$db->query("SELECT id,category_id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id=153 and is_adopt=1 order by created_at desc limit 9;");
							?>
							<div class="tl_r" ><a href="<?php get_news_url($en_news[0]);?>"><img src="<?php echo $en_news[0]->video_photo_src; ?>"/></a></div>
						</div>
							<?php for($i=1;$i<9;$i++){?>
							<div class="tc_z" style="<?php if($i%2==1){ echo "margin-left:17px;";}?>">
								<div></div>
								<a href="<?php get_news_url($en_news[$i]);?>"  title="<?php echo strip_tags($en_news[$i]->title);?>"><?php echo strip_tags($en_news[$i]->title);?></a> 
							</div>
							<?php }?>
					</div>
					<div class="trade_z" >
						<div class="trade_l" style="background:url(images/consult/l_pgb.jpg) no-repeat;">
							<div class="tl_l">	
								<div class="tll_a">胎    教</div>
								<div class="tll_b"><a href="#">更多&gt;&gt;</a></div>
							</div>
							<?php 
								$en_news=$db->query("SELECT id,category_id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id=209 and is_adopt=1 order by created_at desc limit 9;");
							?>
							<div class="tl_r"><a href="<?php get_news_url($en_news[0]);?>"><img src="<?php echo $en_news[0]->video_photo_src;?>"/></a></div>
						</div>
						<?php for($i=1;$i<9;$i++){?>
							<div class="tc_z" style="<?php if($i%2==1){ echo "margin-left:17px;";}?>">
								<div></div>
								<a href="<?php get_news_url($en_news[$i]);?>" title="<?php echo strip_tags($en_news[$i]->title);?>"><?php echo strip_tags($en_news[$i]->title);?></a> 
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
				#$peo_new=$db->query("SELECT id,title,short_title,description,content,created_at,video_photo_src,last_edited_at FROM eb_news e  where is_adopt=1 and category_id=151;");
				for($l=0;$l<2;$l++){?>
				<div class="bld_z">
					<div class="bld_t">
						<div class="bt_l">5月5日 9:23 - 23:23</div>
						<div class="bt_r">
							<div><a href="#">进入咨询</a></div>
							<img src="images/consult/l_j.jpg"></div>
						 </div>
					<div class="bld_c">
						<div class="blc_l">
							<div class="bll_t"> <a href="">江润丰</a><font>(儿童心理保健)</font> </div>
							<div class="bll_c">斯蒂芬撒旦发射发声法反倒是防守对方</div>
							<div class="bll_b">
								<input type="button" class="btn_a" value="专家咨询">
								<input type="button" class="btn_b" value="咨询实录">
							</div>
						</div>
						<div class="blc_r"><img src="images/consult/pg.jpg"></div>
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
					<div id="bel_c">
					<?php 
						$ente_news=$db->query("SELECT id,title,content,video_photo_src FROM eb_news e where category_id=152 and is_adopt=1 order by created_at desc limit 4;");
					?>
						<div id="belc_img"><a href="<?php get_news_url($ente_news[0]);?>"><img src="<?php echo $ente_news[0]->video_photo_src;?>"></a></div>
						<div id="belc_ir">
							<div id=beir_t><a href="<?php get_news_url($ente_news[0]);?>" title="<?php echo $ente_news[0]->title;?>"><?php echo $ente_news[0]->title;?></a></div>
							<div id="beir_c">
								<a href="<?php get_news_url($ente_news[0]);?>" title="<?php echo strip_tags($ente_news[0]->content)?>"><?php echo strip_tags($ente_news[0]->content);?></a></div>
							</div>
					</div>
					<?php for($i=1;$i<=3;$i++){?>
					<div class="bel_b">
						<div class="bel_d"></div>
						<div class="belc_c"><a href="<?php get_news_url($ente_news[$i]);?>"><?php echo $ente_news[$i]->title;?></a></div>
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
						$cate_news=$db->query("SELECT id,title,video_photo_src FROM eb_news e where category_id=155 and is_adopt=1  order by created_at desc  limit 3");
						for($i=0;$i<3;$i++){ ?>
						<div class="becc_z" ><a href="<?php get_news_url($cate_news[$i]);?>"><img src="<?php echo $cate_news[$i]->video_photo_src;?>"/></a>
							<div class="becc_b" style="<?php if($i==0){ echo "background:#FE5F00;";}?>"><a href="<?php get_news_url($cate_news[$i]);?>"><?php echo $cate_news[$i]->title;?></a></div>
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
						$up_news=$db->query("SELECT id,title,short_title,video_photo_src,content FROM eb_news e where category_id=156 and is_adopt=1 order by created_at desc limit 1;");
						?>
						<div id="bf_pic"><a href="<?php get_news_url($up_news[0]);?>"><img src="<?php echo $up_news[0]->video_photo_src;?>"></a></div>
						<div id="bf_c">
							<div id="bfc_t"><a href="<?php get_news_url($up_news[0]);?>"><?php echo $up_news[0]->title;?></a></div>
							<div id="bfc_c"><a href="<?php get_news_url($up_news[0]);?>" title="<?php echo  strip_tags($up_news[0]->content);?>"><?php echo strip_tags($up_news[0]->content);?></a></div>
						</div>
					</div>
				</div>
				<div id="bf_b"></div>
			</div>
		</div>
		<div id="b_r">
			<div id="br_a">
				<div id="ba_t">
					<div id="bat_a"><a href="#"><img src="images/consult/rb_a.gif"></a></div>
					<div id="bat_b"><a href="#"><img src="images/consult/rb_b.jpg"></a></div>
					<div id="bat_c"><a href="#"><img src="images/consult/rb_c.jpg"></a></div>
				</div>
				<div id="ba_c">
					<?php
					$mom_news=$db->query("SELECT id,title FROM eb_news e where category_id=157 and is_adopt=1 limit 7;");
					for($i=0;$i<7;$i++){?>
					<div class="bac_z" style="<?php if($i==0){ echo ' margin-top:5px;';}?>;">
						<div class="bac_d"></div>
						<div class="bac_v"><a href="<?php get_news_url($mom_news[$i]);?>" title="<?php echo $mom_news[$i]->title;?>"><?php echo $mom_news[$i]->title;?></a></div>
						<?php if($i!=6){?>
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
						<div id="bct_a"><a href="#">幼教排行</a></div>
						<div id="bct_hr"></div>
						<div id="bct_b"><a href="#">论坛</a></div>
						<div class="bct_c"><a href="#">博客</a></div>
						<div class="bct_c"><a href="#">咨询</a></div>
						<div class="bct_c"><a href="#">测评</a></div>
					</div>
				</div>
				<?php for($i=0;$i<10;$i++){?>
				<div class="bct_cp">
					<div class="bct_cpl"  style="<?php if($i==0){ echo 'background:url(images/index/red.png) no-repeat';}?>"><?php echo $i+1?></div>
					<div class="bct_cpv"><a href="#">友情链接友情链接友情链接</a></div>
				</div>
				<?php  }?>
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
						$pro_news=$db->query("SELECT id,name FROM eb_problem e where is_adopt=1 order by create_time desc limit 13;");
						for($i=0;$i<13;$i++){?>
						<div class="bdcz_z">
							<div class="bdcz_l"></div>
							<div class="bdcz_r"><a href="#" title="<?php echo $pro_news[$i]->name; ?>"><?php echo $pro_news[$i]->name; ?></a></div>
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
