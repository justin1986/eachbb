<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('./frame.php');
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝</title>
	<?php 
		use_jquery();
		css_include_tag('index');
		js_include_tag('index');
	?>
</head>
<body>
<div id="ibody">
	<div id="top_login">
		<div id="login">
			<div id="login_login">
				<div id="login_img"></div>
				<div id="login_word">登录</div>
			</div>
			<div id="register">
				<div id="register_img"></div>
				<div id="register_word">注册</div>
			</div>
			<div id="comeback">
				<div id="comeback_img"></div>
				<div id="comeback_word">返回首页</div>
			</div>
			<div id="member">
				<div id="member_img"></div>
				<div id="member_word">用户中心</div>
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
				<div id="flash_left"></div>
				<div id="flash_right">
					<div id="r_test">
						<div id="test_value">
						<?php
							$db=get_db();
							$test=$db->query("select id,name from eb_problem where is_adopt=1 order by priority,create_time desc limit 8;");
							for($i=0;$i<4;$i++){ ?>
							<div class="test_a"><a href="<?php get_test_url($test[$i]);?>" title="<?php echo $test[$i]->name;?>"><?php echo $test[$i]->name;?></a></div>
						<?php }?>
						</div>
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
							 	$sql = "select id,title from eb_teach where is_adopt=1 and del_flag=0 order by priority,create_time desc limit 8";
								$course = $db -> query($sql);
								for( $i = 0 ; $i < 4 ; $i++){ ?>
								<div class = "student_pg">
									<img class = "student_l"/>
									<a href = "<?php get_course_url($course[$i]); ?>" title="<?php  echo $course[$i] -> title; ?>"><?php echo $course[$i] -> title; ?></a>
								</div>
								<?php if($i != 3){?>
								<div class = "student_hr"></div>		
								<?php }}?>
							</div>
							<div class="student_left" id="student_left_1" style="display:none;">
							<?php
								for( $i = 4 ; $i < 9 ; $i++){ ?>
								<div class = "student_pg">
									<img class = "student_l"/>
									<a href = "<?php get_test_url($test[$i]); ?>" title="<?php  echo $test[$i] -> name; ?>"><?php echo $test[$i] -> name; ?> </a>
								</div>
								<?php if($i != 8){?>
								<div class = "student_hr"></div>		
								<?php }}?>
							</div>
							<div class="student_left" id="student_left_2" style="display:none;">
							<?php
								for( $i = 0 ; $i < 4 ; $i++){ ?>
								<div class = "student_pg">
									<img class = "student_l"/>
									<a href = "<?php get_course_url($course[$i]); ?>" title="<?php  echo $course[$i] -> title; ?>"><?php echo $course[$i] -> title; ?> </a>
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
					<div id="t_l_pg">
					<?php 
					$db=get_db();
					$pro=$db->query("SELECT id,name,photo_url,description FROM eb_problem e where is_adopt=1 order by create_time desc limit 1");
					?>
						<div id="t_content_left">
							<div id="pic_top">请输入宝宝的出生日期:</div>
							<div id="pic_bottom"><a href="#">
								<img id="pic_left"/>
								</a>
								<div id="picc">
								<img id="pic_right" src="<?php echo $pro[0]->photo_url;?>" title="<?php echo $pro[0]->photo_url;?>"/>
								<div id="pic_word"><a href="<?php get_test_url($pro[0]);?>">怀孕期测试</a></div>
								</div>
							</div>
						</div>
						<div id="t_cc_z">
							<div id="select_st">
								<div id="select_s">
									<select id="select_a" name="select">
									</select>
									<select id="select_b" name="select">
									</select>
									<select id="select_c" name="select">
									</select>
								</div>
								<div id="select_title" title="<?php echo $pro[0]->name;?>"><a href="<?php get_test_url($pro[0]);?>"><?php echo $pro[0]->name;?></a></div>
							</div>
							<a href="#">
							<img id="initial" src="/images/index/test.png"/>
							</a>
							<div id="select_word" title="<?php echo strip_tags($pro[0]->description);?>">
									<div id="st_t">
									<a href="<?php get_test_url($pro[0]);?>">
										<?php echo strip_tags($pro[0]->description);?>
									</a>
									</div>
									<div id="st_b">
									<a href="/test/index.php">
										<div id="select_more"></div>
									</a>
									</div>
							</div>
							<div id="t_content_right" > <a href="#">
								<img id="initial_img" src="/images/index/l_r.png" />
								</a> </div>
						</div>
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
						</div>
						<a href="<?php get_news_list_url() ?>">
							<div id="dict_more"  style="margin-top:20px;"></div>
						</a> 
					</div>
					<?php 
					for($i=1;$i<4;$i++){
						$teact=$db->query("select id,title,img_url,description from eb_teach where is_adopt=1 and del_flag=0 and age=".$i." order by create_time desc,priority desc limit 13");
						$teact_count=$db->record_count;
					?>
					<div class="course_list" id="course_list_<?php echo $i-1;?>" style="<?php if(1==$i){ echo 'display:inline;';}else{ echo 'display:none;';} ?>">
					<div class="student_c">
						<div class="s_pic_l"><a href="<?php get_teach_url($teact[0]);?>"><img src="<?php echo $teact[0]->img_url;?>"></a></div>
						<div class="s_pic_r">
							<div class="s_word_top"><a href="<?php get_teach_url($teact[0]);?>" title="<?php echo $teact[0]->title;?>"><?php echo $teact[0]->title;?></a></div>
							<div class="s_word_cotent"><a href="<?php get_teach_url($teact[0]);?>" title="<?php echo strip_tags($teact[0]->description);?>"><?php echo strip_tags($teact[0]->description);?></a></div>
						</div>
					</div>
					<div class="stuent_d">
						<div class="word_z">
							<?php for($k=1;$k<=12;$k++){?>
							
							<div class="s_a">
								<div class="s_dian"></div>
								<div class="s_value"><a href="<?php get_teach_url($teact[$k]);?>" title="<?php echo $teact[$k]->title; ?>"><?php echo $teact[$k]->title; ?></a></div>
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
						<a href="#">
						<div id="dict_more"></div>
						</a> </div>
					<div id="dict_menu"> 
						<div id="d_m_a"  class="dict_tab" style="background:url(/images/index/r_pg_f.png) no-repeat; color:#FF6600;">幼教</div>
						
						<div  class="dict_tab">论坛</div>
						
						<div  class="dict_tab">博客</div>
						
						<div  class="dict_tab">咨询</div>
						
						<div  class="dict_tab">测评</div>
						 </div>
					<div class="desc" id="desc_0">
						<div id="dict_b">
							<div class="dict_number" style="background:url(/images/index/red.jpg) no-repeat;">1</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<div class="dict_c">
							<div class="dict_number">2</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php for($i = 2; $i < 6; $i++){ ?>
						<div class="dict_c">
							<div class="dict_number"><?php echo $i; ?></div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php } ?>
					</div>
					<div class="desc" id="desc_1" style="display:none;">
						<div id="dict_b">
							<div class="dict_number" style="background:url(/images/index/red.jpg) no-repeat;">1</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<div class="dict_c">
							<div class="dict_number">2</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php for($i = 2; $i < 6; $i++){ ?>
						<div class="dict_c">
							<div class="dict_number"><?php echo $i; ?></div>
							<div class="dict_value"><a href="#">使得sd国vsdva</a></div>
						</div>
						<?php } ?>
					</div>
					<div class="desc" id="desc_2" style="display:none;">
						<div id="dict_b">
							<div class="dict_number" style="background:url(/images/index/red.jpg) no-repeat;">1</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<div class="dict_c">
							<div class="dict_number">2</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php for($i = 2; $i < 6; $i++){ ?>
						<div class="dict_c">
							<div class="dict_number"><?php echo $i; ?></div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php } ?>
					</div>
					<div class="desc" id="desc_3" style="display:none;">
						<div id="dict_b">
							<div class="dict_number" style="background:url(/images/index/red.jpg) no-repeat;">1</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<div class="dict_c">
							<div class="dict_number">2</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php for($i = 2; $i < 6; $i++){ ?>
						<div class="dict_c">
							<div class="dict_number"><?php echo $i; ?></div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php } ?>
					</div>
					<div class="desc" id="desc_4" style="display:none;">
						<div id="dict_b">
							<div class="dict_number" style="background:url(/images/index/red.jpg) no-repeat;">1</div>
							<div class="dict_value"><a href="#">使得法sadf国vsdva</a></div>
						</div>
						<div class="dict_c">
							<div class="dict_number">2</div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php for($i = 2; $i< 6; $i++){ ?>
						<div class="dict_c">
							<div class="dict_number"><?php echo $i; ?></div>
							<div class="dict_value"><a href="#">使得法国vsdva</a></div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div id="mother">
				<div id="mother_l">
					<div id="m_l_t"> <a href="<?php echo  get_news_list_url(157);?>">
						<div id="m_more"></div>
						</a> </div>
					<div id="m_l_c">
						<?php
						$news_m=$db->query(" SELECT id,title,short_title,description,video_photo_src,content FROM eb_news e where category_id=157 and is_adopt=1 order by created_at desc limit 9;");
						$news_m_count=$db->record_count;
						?>
						<div id="m_l_a">
							<div id="m_l_pic">
								<a href="<?php echo get_news_url($news_m[0]); ?>"><img src="<?php echo $news_m[0]->video_photo_src; ?>"></a>
							</div>
							<div id="m_l_title"><a href="<?php echo get_news_url($news_m[0]);?>" title="<?php echo $news_m[0]->title; ?>"><?php echo $news_m[0]->title; ?></a></div>
						</div>
						<div id="m_l_b">
							<div id="m_c_title"><a href="<?php echo get_news_url($news_m[0]);?>" title="<?php echo $news_m[0]->title; ?>"><?php echo $news_m[0]->title; ?></a></div>
							<div id="m_c_content"><a href="<?php echo get_news_url($news_m[0]);?>"><?php echo strip_tags($news_m[0]->content); ?></a></div>
							<div id="m_c_bottom"><a href="<?php echo get_news_url($news_m[0]);?>">查看详细内容&gt;&gt;</a></div>
						</div>
						<div id="m_l_c_r">
							<?php 
								for($i=1;$i<8;$i++){ ?>
							<div class="mlc">
								<a href="<?php echo get_news_url($news_m[$i]);?>" title="<?php echo $news_m[$i]->short_title;?>"><?php echo $news_m[$i]->short_title;?></a>
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
								$news_son=$db->query("SELECT id,title,description,content,short_title FROM eb_news e where category_id=208 and is_adopt=1 order by created_at desc limit 19");
								$news_son_count=$db->record_count;
								for($j=0;$j<8;$j++){
							 ?>
							<div class="son_c_z">
								<div class="son_c_z_l"></div>
								<div class="son_c_z_r"><a href="<?php echo get_news_url($news_son[$j]);?>" title="<?php echo $news_son[$j]->short_title;?>"><?php echo $news_son[$j]->short_title;?></a></div>
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
									<div class="sblct_t"><a href="<?php echo get_news_list_url(119);?>">更多</a></div>
									<div class="sblct_bb">
										<?php 
											$news=array("120"=>"母乳喂养","121"=>"人工喂养","122"=>"混合喂养","123"=>"母乳准备","124"=>"母乳技巧","125"=>"吐奶溢奶");
											$new_id=array_keys($news);
											$news_id=implode(',',$new_id);
											$db=get_db();
											$news_s=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 1;");
											$n=$db->query("SELECT id,name,parent_id from eb_category where id in ($news_id)");
										?>
										<a href="<?php echo get_news_url($news_s[0]); ?>" title="<?php $news_s[0]->title; ?>"><img src="<?php echo $news_s[0]->video_photo_src;?>"/></a>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<?php
										for($i=0;$i<6;$i++){ ?>
										<div class="sb_t_content" style="<?php if($i!==2 && $i!==5){ echo 'border-right:1px solid #EEDECF';} ?>">
											<a href="<?php echo get_news_list_url($n[$i]);?>" title="<?php echo $new_id[$i]->name;?>">
												<?php echo $news[$new_id[$i]]; ?>
											</a>
										</div>
										<?php }?>
									</div>
									<div class="sb_content">
										<?php
										$news=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
										for($j=0;$j<3;$j++){ ?>
										<div class="sb_ctt"><a href="<?php echo get_news_url($news[$j]);?>" title="<?php echo $news[$j]->title;?>"><?php echo $news[$j]->title; ?></a></div>
										<?php  }?>
									</div>
								</div>
							</div>
							<div id="sblct_b">
								<div class="sblct_l">
									<div class="sblct_t"><a href="<?php echo get_news_list_url(120);?>">更多</a></div>
									<div class="sblct_bb">
									<?php
										$new=array("128"=>"脐带","129"=>"头部","130"=>"五官","131"=>"生殖器","132"=>"换尿布","133"=>"抱宝宝","134"=>"打襁褓","135"=>"剪指甲");
										$newsid=array_keys($new);
										$news_id=implode(',',$newsid);
										$news=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 1;");
										$n=$db->query("SELECT id,name,parent_id from eb_category where id in ($news_id)");
									?>
										<a href="<?php echo get_news_url($news[0]); ?>" title="<?php $news[0]->title; ?>"><img src="<?php echo $news[0]->video_photo_src;?>"/></a>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<?php
											$i=0;
											foreach ($new as $k=>$v){
											?>
										<div class="sbb_t_a" style="<?php if($i!=3 && $i!=7){ echo 'border-right:1px solid #EEDECF;'; } ?>">
											<a href="<?php echo get_news_url($n[$i]); ?>" title="<?php echo $v; ?>">
												<?php echo $v; ?>
											</a>
										</div>
										<?php $i++;} ?>
									</div>
									<div class="sb_content">
											<?php 
											$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
											for($j=0;$j<3;$j++){ ?>
											<div class="sb_ctt"><a href="<?php echo get_news_url($news[$j]); ?>" title="<?php echo $news[$j]->title; ?>"><?php echo $news[$j]->title; ?></a></div>
											<?php }?>
									</div>
								</div>
							</div>
						</div>
						<div id="sblc_b">
							<div id="sblcb_c">
								<div class="sblct_l">
									<div class="sblct_t"><a href="<?php echo get_news_list_url(121);?>">更多</a></div>
									<?php 
										$news=array("136"=>"游戏","137"=>"抚摸","138"=>"训练","139"=>"对话");
										$news_k=array_keys($news);
										$news_id=implode(',',$news_k);
										$new=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 1;");
										$n=$db->query("SELECT id,name,parent_id from eb_category where id in ($news_id)");
									?>
									<div class="sblct_bb">
										<a href="<?php get_news_url($new[0]); ?>" title="<?php get_news_url($news[0]); ?>"><img src="<?php echo $new[0]->video_photo_src;?>"/></a>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<?php
										$i=0;
										foreach ($news as $k=>$v){
										 ?>
										<div class="sbr_t_a" style="<?php if($i!=3){ echo 'border-right:1px solid #EEDECF;';} ?>">
										<a href="<?php echo get_news_url($n[$i]);?>" title="<?php echo $v; ?>"><?php echo $v; ?></a></div>
										<?php $i++; }?>
									</div>
									<div class="sb_content">
										<?php 
											$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
											for($j=0;$j<3;$j++){ ?>
											<div class="sb_ctt"><a href="<?php echo get_news_url($news[$j]); ?>" title="<?php echo $news[$j]->title; ?>"><?php echo $news[$j]->title; ?></a></div>
										<?php }?>
									</div>
								</div>
							</div>
							<div id="sblcb_d"></div>
						</div>
					</div>
					<div id="sbl_r"></div>
				</div>
				<div id="sb_r">
					<div id="sbl_tr"></div>
					<div id="sbl_cr">
						<div class="son_top">
							<div class="son_t_l">关于<font style="color:#A4C853; font-weight:bold;" >新生儿</font></div>
							<div class="son_t_r"><a href="<?php echo get_news_url(208); ?>"><font style="color:#F33B0A; font-weight:bold;" >+</font> 更多</a></div>
							<div class="son_content">
								<?php 
									for($k=8;$k<19;$k++){
								 ?>
								<div class="son_c_z">
									<div class="son_c_z_l"></div>
									<div class="son_c_z_r"><a href="<?php echo get_news_url($news_son[$k]);?>" title="<?php echo $news_son[$k]->short_title;?>"><?php echo $news_son[$k]->short_title; ?></a></div>
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
						$imgdb=$db->query("select id,title,description,src,src2 from eb_images where is_adopt=1 order by created_at desc limit 22");
						$imgdb_count=$db->record_count;
						for($k=0;$k<$imgdb_count;$k++){
					 ?>
					<div class="picc_a"><a href="#" title="<?php echo  $imgdb[$k]->src; ?>"><img src="<?php echo  $imgdb[$k]->src; ?>"></a></div>
					<?php } ?>
				</div>
			</div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
	<div id="f_r_pg"></div>
	</div>
</div>
</body>
</html>
