<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-首页</title>
	<?php 
		include_once(dirname(__FILE__).'/frame.php');
		use_jquery_ui();
		css_include_tag('index','jquery_ui','bottom');
		js_include_tag('index','flashobj.js');
		init_page_items('index');
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<div id="top_login">
		<div id="login">
			<div id="login_login">
				<div id="login_img"></div>
				<div id="login_word"><a href="/login/">登录</a></div>
			</div>
			<div id="register">
				<div id="register_img"></div>
				<div id="register_word"><a href="/register/">注册</a></div>
			</div>
			<div id="comeback">
				<div id="comeback_img"></div>
				<div id="comeback_word"><a href="/">返回首页</a></div>
			</div>
			<div id="member">
				<div id="member_img"></div>
				<div id="member_word"><a href="#">用户中心</a></div>
			</div>
		</div>
	</div>
	<div id="top_menu">
			<div id="menu_left"></div>
			<div id="menu_center"></div>
			<div id="menu_right"></div>
	</div>
	<div id="fbody">
		<div id="f_l_pg"></div>
		<div id="f_c_m">
			<div id="flash">
				<div id="flash_left">
					<?php 
						$images = $db->query("select a.title,a.url,a.src from eb_images a left join eb_category b on a.category_id=b.id where a.is_adopt=1 and b.name='首页flash图片' order by a.priority asc, created_at desc limit 5");
						foreach ($images as $image){
							$src[] = $image->src;
							$title[]=$image->title;
							$url[] = $image->url;
						}
					?>
					<script type="text/javascript">
						var flash = new sohuFlash("flash/index.swf", "27", 665, 384, "7");
						flash.addParam("quality", "high");
						flash.addParam("wmode", "opaque");
						flash.addVariable("image","<?php echo implode('|',$src);?>");
						flash.addVariable("url","<?php echo implode('|',$url);?>");
						flash.addVariable("info", "<?php echo implode('|',$title);?>");
						flash.addVariable("stopTime","5000");
						flash.write("flash_left");
					</script>
				</div>
				<div id="flash_right">
					<div id="r_test">
						<a href="#"><img src="/images/index/img_r_a.jpg" /></a>
					</div>
					<div id="r_student">
						<div id="st_top">
							<div><img src="/images/index/class_tab_0_sel.jpg" class="student_tab"/></div>
							<div><img src="/images/index/class_tab_1.jpg" class="student_tab"/></div>
							<div><img src="/images/index/class_tab_2.jpg" class="student_tab"/></div>
						</div>
						<div id="student_value">
							<div class="student_left" id="student_left_0" style="display:inline;">
							<?php
							 	#$sql = "select id,title from eb_teach where is_adopt=1 and del_flag=0 order by priority,create_time desc limit 8";
								#$course = $db -> query($sql);
								for( $i = 0 ; $i < 4 ; $i++){ ?>
								<div class = "student_pg"<?php $pos="top_tab_1_$i";show_page_pos($pos,'link');?>>
									<div class = "student_l"/></div>
									<?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?>
								</div>
								<?php if($i != 3){?>
								<div class = "student_hr"></div>		
								<?php }}?>
							</div>
							<div class="student_left" id="student_left_1" style="display:none;">
							<?php
								for( $i = 4 ; $i < 9 ; $i++){ ?>
								<div class = "student_pg"<?php $pos="top_tab_2_$i";show_page_pos($pos,'link');?>>
									<div class = "student_l"/></div>
									<?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?>
								</div>
								<?php if($i != 8){?>
								<div class = "student_hr"></div>		
								<?php }}?>
							</div>
							<div class="student_left" id="student_left_2" style="display:none;">
							<?php
								for( $i = 0 ; $i < 4 ; $i++){ ?>
								<div class = "student_pg"<?php $pos="top_tab_3_$i";show_page_pos($pos,'link');?>>
									<div class = "student_l"/></div>
									<?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?>
								</div>
								<?php if($i != 3){?>
								<div class = "student_hr"></div>	
								<?php }}?>
							</div>
							<div id="student_right"></div>
						</div>
					</div>
					<div id="r_spring"></div>
				</div>
			</div>
			<div id="sousuo">
				<div id="sousuo_a"></div>
				<div id="sousuo_b">
					<div id="sousuo_left"></div>
					<div id="sousuo_center">
						<input type="text" id="input_search">
					</div>
					<div id="sousuo_right"></div>
				</div>
				<div id="sousuo_c"></div>
				<div id="sousuo_d"></div>
			</div>
			<div id="test">
			
				<div id="test_left">
					<div id="test_left_top">
						请输入宝宝的出生日期:　<input type="text" id='datepicker' />
					</div>
					<div id="btn_begin_test">
						<a href="#" id="a_begin_test"><img src="/images/index/test.png" border="0" /></a>
					</div>
					
					<div id="div_left_arrow">
						<a href="#" id="a_left_arrow"><img src="/images/index/l_l.png" border="0" /></a>
					</div>
					<?php for($i=0;$i<4;$i++){?>
					<div id="test_tab_<?php echo $i;?>" class="test_tab" <?php if($i==0) echo ' style="display:inline;"';?> <?php $pos="test_tab_{$i}"; show_page_pos($pos,'link_d_i')?>>
						<div class="test_img">
							<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1: '/images/index/test_sample.jpg';?>" border="0" /></a>
						</div>
						<div class="test_context">
							<div class="context_title"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							<div class="context_content"><?php echo_href($pos_items[$pos]->description, $pos_items[$pos]->href);?></div>
							<div class="test_content_more">
								<a href="<?php echo $pos_items[$pos]->href;?>"><img src="/images/index/more.gif" border="0" /></a>
							</div>
						</div>
					</div>
					<?php }?>
					<div id="div_right_arrow">
						<a href="#" id="a_right_arrow"><img src="/images/index/l_r.png" border="0" /></a>
					</div>
					
				</div>
				
				
				<div id="test_right">
					<script type="text/javascript">$('#test_right').load('/login/ajax.post.php?op=load_login_status_box');</script>
				</div>
			</div>
			<div id="student">
				<div id="student_l">
					<div id="student_top">
						<div id="u">
							<div><img src="/images/index/course_tab_0_sel.jpg" class="course_tab"></div>
							<div><img src="/images/index/course_tab_1.jpg" class="course_tab"></div>
							<div><img src="/images/index/course_tab_2.jpg" class="course_tab"></div>
							<div><img src="/images/index/course_tab_3.jpg" class="course_tab"></div>
						</div>
						<a href="/course/">
							<img id="dict_more"  style="margin-top:20px;" src="/images/index/more.gif" />
						</a> 
					</div>
					<?php 
					for($i=1;$i<5;$i++){
						#$teact=$db->query("select id,title,img_url,description from eb_teach where is_adopt=1 and del_flag=0 and age=".$i." order by create_time desc,priority desc limit 13");
						#$teact_count=$db->record_count;
					?>
					<div class="course_list" id="course_list_<?php echo $i-1;?>" style="<?php if(1==$i){ echo 'display:inline;';}else{ echo 'display:none;';} ?>">
					<div class="student_c"<?php $pos="course_tab_head_$i";show_page_pos($pos,'link_d_i');?>>
						<div class="s_pic_l"><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>" border="0"></a></div>
						<div class="s_pic_r">
							<div class="s_word_top"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							<div class="s_word_cotent"><?php echo_href($pos_items[$pos]->description, $pos_items[$pos]->href);?></div>
						</div>
					</div>
					<div class="stuent_d">
						<div class="word_z">
							<?php for($k=1;$k<=15;$k++){?>
							
							<div class="s_a"<?php $pos="course_tab_list_{$i}_{$k}";show_page_pos($pos,'link');?>>
								<div class="s_dian"></div>
								<div class="s_value"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php }?>
						</div>
					</div>
					</div>
					<?php }?>
				</div>
				<div id="student_r">
					<div id="dict_a">
						<div id="dict_title">咨询排行</div>
						<div id="div_dict_more">
							<a href="#" style="line-height: 30px;">
								<img src="/images/index/more.gif" border="0" />
							</a> 
						</div>
					</div>
					<div id="dict_menu"> 
						<div  class="dict_tab long">育儿早班车</div>
						<div  class="dict_tab long">邻家育儿</div>
						<div  class="dict_tab short">育儿早班车</div>
						<div  class="dict_tab short">潮爸潮妈</div>
						<div  class="dict_tab short">网趣动态</div>
					</div>
					<?php for($j=0;$j<5;$j++){?>
					<div class="desc" id="desc_<?php echo $j;?>" <?php if($j>0) echo " style='display:none;'"?>>
						<?php for($i = 1; $i < 7; $i++){ ?>
						<div class="dict_c"<?php $pos="right_tab_{$j}_{$i}";show_page_pos($pos,'link');?>>
							<div class="dict_number"<?php if($i==1) echo ' style="background:url(/images/index/red.jpg) no-repeat;"';?>><?php echo $i; ?></div>
							<div class="dict_value"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
						</div>
						<?php } ?>
					</div>
					<?php }?>
				</div>
			</div>
			<div id="mother">
				<div id="mother_l">
					<div id="m_l_t">
						<div>
							<a href="/assistant/index.php?age=-2">怀孕前</a>
							<a href="/assistant/index.php?age=-1">怀孕中</a>
							<a href="/assistant/index.php?age=1">0-1岁</a>
							<a href="/assistant/index.php?age=2">1-2岁</a>
							<a href="/assistant/index.php?age=3">2-3岁</a>
						</div>
						<a href="/assistant/">
							<img src="/images/index/more.gif" border="0" />
						</a> 
					</div>
					<div id="m_l_c">
						<?php
						#$news_m=$db->query(" SELECT id,title,short_title,description,video_photo_src,content FROM eb_news e where category_id=157 and is_adopt=1 order by created_at desc limit 9;");
						#$news_m_count=$db->record_count;
						?>
						<div id="m_l_a"<?php $pos="assistant_head_image";show_page_pos($pos,'link_t_i');?>>
							<div id="m_l_pic">
								<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1?>" border="0"></a>
							</div>
							<div id="m_l_title"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
						</div>
						<div id="m_l_b"<?php $pos="assistant_head";show_page_pos($pos,'link_t_d')?>>
							<div id="m_c_title"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?></div>
							<div id="m_c_content"><?php echo_href($pos_items[$pos]->description,$pos_items[$pos]->href);?></div>
							<div id="m_c_bottom"><a href="<?php echo $pos_items[$pos]->href;?>">查看详细内容&gt;&gt;</a></div>
						</div>
						<div id="m_l_c_r">
							<?php 
								for($i=1;$i<8;$i++){ ?>
							<div class="mlc"<?php $pos="assistant_list_$i";show_page_pos($pos,'link')?>>
								<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div id="mother_r">
					<div id="m_r_t"></div>
					<div id="m_r_c">
						<div class="son_top">
							<div class="son_t_l">关于<font style="color:#A4C853; font-weight:bold;" >新生儿</font></div>
							<div class="son_t_r"><a href="<?php echo get_news_list_url(208); ?>"><font style="color:#F33B0A; font-weight:bold;" >+</font> 更多</a></div>
						</div>
						<div class="son_content">
							<?php 
								#$news_son=$db->query("SELECT id,title,description,content,short_title FROM eb_news e where category_id=208 and is_adopt=1 order by created_at desc limit 19");
								#$news_son_count=$db->record_count;
								for($j=0;$j<8;$j++){
							 ?>
							<div class="son_c_z"<?php $pos="right_news_list_$j";show_page_pos($pos,'link')?>>
								<div class="son_c_z_l"></div>
								<div class="son_c_z_r">
									<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?>
								</div>
							</div>
							<?php }?>
						</div>
					</div>
					<div id="m_r_b"></div>
				</div>
			</div>
			<div id="qinzi">
				<div id="qin_left">
					<div id="q_menu_l">
						<div class="q_m_p" id="q_m_p" style="background:url(/images/index/w_pg_l.gif) no-repeat;">
							<div id="q_m_a"/></div>
						</div>
						<div class="q_m_p">
							<div id="q_m_b"/></div>
						</div>
						<div class="q_m_p">
							<div id="q_m_c"/></div>
						</div>
						<div class="q_m_p" id="qum">
							<div id="q_m_d"/></div>
						</div>
					</div>
					<div class="q_menu_r" id="q_0" style="display: inline;">
						<div class="q_m_pg_d">
							<div class="child_t">
								<div class="ch_t_pic"></div>
								<div class="ch_t_r">
									<div class="child_title"><a href="#">虽多次发111111111111的风采</a></div>
									<div class="child_content"><a href="#">虽虽虽多次发生的风采虽多次发生的风采多次发生的风采多次发生的风采虽虽多次发生的风采虽多次发生的风采多虽多次发生的风采次发生的风采</a></div>
								</div>
							</div>
							<div class="child_c">
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
							</div>
						</div>
					</div>
					<div class="q_menu_r" id="q_1">
						<div class="q_m_pg_d">
							<div class="child_t">
								<div class="ch_t_pic"></div>
								<div class="ch_t_r">
									<div class="child_title"><a href="#">虽多222222222222222发生的风采</a></div>
									<div class="child_content"><a href="#">虽虽虽多次发生的风采虽多次发生的风采多次发生的风采多次发生的风采虽虽多次发生的风采虽多次发生的风采多虽多次发生的风采次发生的风采</a></div>
								</div>
							</div>
							<div class="child_c">
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
							</div>
						</div>
					</div>
					<div class="q_menu_r" id="q_2">
						<div class="q_m_pg_d">
							<div class="child_t">
								<div class="ch_t_pic"></div>
								<div class="ch_t_r">
									<div class="child_title"><a href="#">33333333333</a></div>
									<div class="child_content"><a href="#">虽虽虽多次发生的风采虽多次发生的风采多次发生的风采多次发生的风采虽虽多次发生的风采虽多次发生的风采多虽多次发生的风采次发生的风采</a></div>
								</div>
							</div>
							<div class="child_c">
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
							</div>
						</div>
					</div>
					<div class="q_menu_r" id="q_3">
						<div class="q_m_pg_d">
							<div class="child_t">
								<div class="ch_t_pic"></div>
								<div class="ch_t_r">
									<div class="child_title"><a href="#">虽444444444444444</a></div>
									<div class="child_content"><a href="#">虽虽虽多次发生的风采虽多次发生的风采多次发生的风采多次发生的风采虽虽多次发生的风采虽多次发生的风采多虽多次发生的风采次发生的风采</a></div>
								</div>
							</div>
							<div class="child_c">
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
								<div class="child_img"></div>
							</div>
						</div>
					</div>
				</div>
				<div id="qin_right"></div>
			</div>
			<div class="quwen"></div>
			<div id="student_b">
				<div id="sb_l">
					<div id="sbl_l"></div>
					<div id="sbl_ca">
						<div id="sblc_t">
							<div id="sblct_a">
								<div class="sblct_l">
									<div class="sblct_t_title">育儿早班车</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(1);?>">更多</a></div>
									<div class="sblct_bb">
										<?php 
											#$category=array("120"=>"母乳喂养","121"=>"人工喂养","122"=>"混合喂养","123"=>"母乳准备","124"=>"母乳技巧","125"=>"吐奶溢奶");
											#$category_ids=array_keys($category);
											#$category_ids=implode(',',$category_ids);
											#$db=get_db();
											#$news_s=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($category_ids) order by created_at desc limit 1;");
										?>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
									<!--  
										<?php
										$i =0;
										foreach($category as $id => $val){ ?>
										<div class="sb_t_content" style="<?php if($i!==2 && $i!==5){ echo 'border-right:1px solid #EEDECF';} ?>">
											<a href="<?php echo get_news_list_url($id);?>" title="<?php echo $val?>">
												<?php echo $val?>
											</a>
										</div>
										<?php 
											$i++;
										}?>
										-->
									</div>
									<div class="sb_content">
										<?php
										#$news=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
										for($j=0;$j<3;$j++){ ?>
										<div class="sb_ctt"<?php $pos="bottom_news_list_0_$j";show_page_pos($pos,'link')?>>
											<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?>
										</div>
										<?php  }?>
									</div>
								</div>
							</div>
							<div id="sblct_b">
								<div class="sblct_l">
									<div class="sblct_t_title">邻家育儿</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(2);?>">更多</a></div>
									<div class="sblct_bb">
									<?php
										#$category=array("128"=>"脐带","129"=>"头部","130"=>"五官","131"=>"生殖器","132"=>"换尿布","133"=>"抱宝宝","134"=>"打襁褓","135"=>"剪指甲");
										#$newsid=array_keys($new);
										##$news_id=implode(',',$newsid);
										#$news=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 1;");
										#$n=$db->query("SELECT id,name,parent_id from eb_category where id in ($news_id)");
									?>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<!-- 
										<?php
											$i=0;
											foreach ($category as $k=>$v){
											?>
										<div class="sbb_t_a" style="<?php if($i!=3 && $i!=7){ echo 'border-right:1px solid #EEDECF;'; } ?>">
											<a href="<?php echo get_news_list_url($k); ?>" title="<?php echo $v; ?>">
												<?php echo $v; ?>
											</a>
										</div>
										<?php $i++;} ?>
										 -->
									</div>
									<div class="sb_content">
											<?php 
											#$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
											for($j=0;$j<3;$j++){ ?>
											<div class="sb_ctt"<?php $pos="bottom_news_list_1_$j";show_page_pos($pos,'link')?>>
												<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?>
											</div>
											<?php }?>
									</div>
								</div>
							</div>
						</div>
						<div id="sblc_b">
							<div id="sblcb_c">
								<div class="sblct_l">
								<div class="sblct_t_title">海外传真</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(3);?>">更多</a></div>
									<?php 
										#$category=array("136"=>"游戏","137"=>"抚摸","138"=>"训练","139"=>"对话");
										#$news_k=array_keys($news);
										#$news_id=implode(',',$news_k);
										#$new=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 1;");
										#$n=$db->query("SELECT id,name,parent_id from eb_category where id in ($news_id)");
									?>
									<div class="sblct_bb">
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<!-- 
										<?php
										$i=0;
										foreach ($category as $k=>$v){
										 ?>
										<div class="sbr_t_a" style="<?php if($i!=3){ echo 'border-right:1px solid #EEDECF;';} ?>">
										<a href="<?php echo get_news_list_url($k);?>" title="<?php echo $v; ?>"><?php echo $v; ?></a></div>
										<?php $i++; }?>
										 -->
									</div>
									<div class="sb_content">
										<?php 
											#$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
											for($j=0;$j<3;$j++){ ?>
											<div class="sb_ctt"<?php $pos="bottom_news_list_2_$j";show_page_pos($pos,'link')?>>
												<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?>
											</div>
										<?php }?>
									</div>
								</div>
							</div>
							<div id="sblcb_d">
								<div class="sblct_l">
									<div class="sblct_t_title">潮爸潮妈</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(4);?>">更多</a></div>
									<?php 
										#$category=array("136"=>"游戏","137"=>"抚摸","138"=>"训练","139"=>"对话");
										#$news_k=array_keys($news);
										#$news_id=implode(',',$news_k);
										#$new=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 1;");
										#$n=$db->query("SELECT id,name,parent_id from eb_category where id in ($news_id)");
									?>
									<div class="sblct_bb">
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<!-- 
										<?php
										$i=0;
										foreach ($category as $k=>$v){
										 ?>
										<div class="sbr_t_a" style="<?php if($i!=3){ echo 'border-right:1px solid #EEDECF;';} ?>">
										<a href="<?php echo get_news_list_url($k);?>" title="<?php echo $v; ?>"><?php echo $v; ?></a></div>
										<?php $i++; }?>
										 -->
									</div>
									<div class="sb_content">
										<?php 
											#$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
											for($j=0;$j<3;$j++){ ?>
											<div class="sb_ctt"<?php $pos="bottom_news_list_2_$j";show_page_pos($pos,'link')?>>
												<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?>
											</div>
										<?php }?>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div id="sbl_r"></div>
				</div>
				<div id="sb_r">
					<div id="sbl_tr"></div>
					<div id="sbl_cr">
						<div class="son_top">
							<div class="son_t_l">关于<font style="color:#A4C853; font-weight:bold;" >新生儿</font></div>
							<div class="son_t_r"><a href="<?php echo get_news_list_url(208); ?>"><font style="color:#F33B0A; font-weight:bold;" >+</font> 更多</a></div>
							<div class="son_content">
								<?php 
									for($k=8;$k<19;$k++){
								 ?>
								<div class="son_c_z"<?php $pos="right_bottom_list_$k";show_page_pos($pos,'link');?>>
									<div class="son_c_z_l"></div>
									<div class="son_c_z_r">
										<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href);?>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div id="sbl_br"></div>
				</div>
			</div>
			<div class="quwen"></div>
			<div id="pic">
				<div id="picc_left"></div>
				<div id="picc_right">
					<?php
						$images = $db->query("select a.title,a.url,a.src from eb_images a left join eb_category b on a.category_id=b.id where a.is_adopt=1 and b.name='首页底部图片' order by a.priority asc, created_at desc limit 22");
						$imgdb_count=$db->record_count;
						for($k=0;$k<$imgdb_count;$k++){
					 ?>
					<div class="picc_a"><a href="<?php echo $iamges[$i]->url?>" title="<?php echo  $images[$k]->title; ?>"><img src="<?php echo  $images[$k]->src; ?>"></a></div>
					<?php } ?>
				</div>
			</div>
		<div id="bottom">关于网趣宝贝 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">Copyright &c 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
	<div id="f_r_pg"></div>
	</div>
</div>
</body>
</html>
