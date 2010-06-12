<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('./frame.php');
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>网趣宝贝</title>
<link href="./css/index.css" rel="stylesheet" type="text/css" />
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
		<div id="menu_pg">
			<div id="menu_left">
				<div id="wangqu"></div>
			</div>
			<div id="menu_center"></div>
			<div id="menu_right"></div>
		</div>
	</div>
	<div id="fbody">
		<div id="flash">
			<div id="flash_left"></div>
			<div id="flash_right">
				<div id="r_test">
					<div id="test_value">
						<?php
						$db=get_db();
						$test=$db->query("select id,name from eb_problem where is_adopt=1 order by priority,create_time desc limit 4;");
						$test_count=$db->record_count;
						for($i=0;$i<$test_count;$i++){ ?>
						<div class="test_a"><a href="<?php get_test_url($test[$i]);?>" title="<?php echo $test[$i]->name;?>"><?php echo $test[$i]->name;?></a></div>
						<?php }?>
					</div>
				</div>
				<div id="r_student">
					<div id="st_top">
						<div id="s_t_a"><img src="images/index/img_b_a.gif"></div>
						<div id="s_t_b"><img src="images/index/img_b_b.gif"></div>
						<div id="s_t_c"><img src="images/index/img_b_c.gif"></div>
					</div>
					<div id="student_value">
						<?php
							$teact=$db->query("select id,title,img_url,description from eb_teach where is_adopt=1 and del_flag=0 order by priority,create_time desc limit 8");
							 for($i=0;$i<4;$i++){?>
							<div class="student_aa"><a href="<?php get_teach_url($teact[$i]);?>" title="<?php echo $teact[$i]->title;?>"><?php echo $teact[$i]->title;?></a></div>
						<?php }?>
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
					<input type="text">
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
						<img id="initial"/>
						</a>
						<div id="select_word" title="<?php echo strip_tags($pro[0]->description);?>">
								<div id="st_t">
								<a href="<?php get_test_url($pro[0]);?>">
									<?php echo strip_tags($pro[0]->description);?>
								</a>
								</div>
								<div id="st_b">
								<a href="#">
								<img id="select_more" />
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
				<div id="email">
					<div id="email_l">邮件地址</div>
					<div id="email_r">
						<input type="text" >
					</div>
				</div>
				<div id="password">
					<div id="email_l">密&nbsp;&nbsp;&nbsp;&nbsp;码</div>
					<div id="email_r">
						<input type="text" >
					</div>
				</div>
				<div id="pwd">
					<input type="checkbox" id="check" name="checkbox" value="checkbox" />
					<div id="my_check">
						<label for="check">记住我的帐号</label>
					</div>
					<div id="pwd_right"><a href="#">忘记密码</a></div>
				</div>
				<div id="login_user"> <a href="#">
					<img id="login_l"/>
					</a> <a href="#">
					<img id="login_r"/>
					</a> </div>
			</div>
		</div>
		<div id="student">
			<div id="student_l">
				<div id="student_top">
					<div id="u">
						<div><a href="#"><img src="/images/index/a_1.jpg"></a></div>
						<div><a href="#"><img src="/images/index/b_2.jpg"></a></div>
						<div><a href="#"><img src="/images/index/c_2.jpg"></a></div>
					</div>
					<a href="#">
					<img id="dict_more"  src="/images/index/more.gif" style="margin-top:20px;"/>
					</a> 
				</div>
				<?php 
				for($i=1;$i<4;$i++){
				$teact=$db->query("select id,title,img_url,description from eb_teach where is_adopt=1 and del_flag=0 and age=".$i." order by create_time,priority desc limit 13");
				$teact_count=$db->record_count;
				?>
				<div id="old" style="<?php if(1==$i){ echo 'display:inline;';}else{ echo 'display:none;';} ?>">
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
				<?php
				 }?>
			</div>
			<div id="student_r">
				<div id="dict_a">
					<div id="dict_title">咨询排行</div>
					<a href="#">
					<img id="dict_more"/>
					</a> </div>
				<div id="dict_menu"> 
					<div id="d_m_a" style="background:url(images/index/r_pg_f.png) no-repeat;"><a href="#">幼教</a></div>
					
					<div class="d_m_b"><a href="#">论坛</a> </div>
					
					<div class="d_m_b"><a href="#">博客</a> </div>
					
					<div class="d_m_b"><a href="#">咨询</a></div>
					
					<div class="d_m_b"><a href="#">测评</a></div>
					 </div>
				<div id="dict_b">
					<div class="dict_number" style="width:22px; height:22px; background:url(images/index/red.png) no-repeat;">1</div>
					<div class="dict_value">使得法国vsdva</div>
				</div>
				<div class="dict_c">
					<div class="dict_number">2</div>
					<div class="dict_value">使得法国vsdva</div>
				</div>
				<div class="dict_c">
					<div class="dict_number">3</div>
					<div class="dict_value">使得法国vsdva</div>
				</div>
				<div class="dict_c">
					<div class="dict_number">4</div>
					<div class="dict_value">使得法国vsdva</div>
				</div>
				<div class="dict_c">
					<div class="dict_number">5</div>
					<div class="dict_value">使得法国vsdva</div>
				</div>
				<div class="dict_c">
					<div class="dict_number">6</div>
					<div class="dict_value">使得法国vsdva</div>
				</div>
			</div>
		</div>
		<div id="mother">
			<div id="mother_l">
				<div id="m_l_t"> <a href="#">
					<img id="m_more" src="/images/index/more.gif"/>
					</a> </div>
				<div id="m_l_c">
					<?php
					$news_m=$db->query(" SELECT id,title,short_title,description,video_photo_src,content FROM eb_news e where category_id=157 and is_adopt=1 order by created_at desc limit 9;");
					$news_m_count=$db->record_count;
					?>
					<div id="m_l_a">
						<div id="m_l_pic"><img src="<?php echo $news_m[0]->video_photo_src; ?>"></div>
						<div id="m_l_title"><a href="<?php get_news_url($news_m[0]);?>" title="<?php echo $news_m[0]->title; ?>"><?php echo $news_m[0]->title; ?></a></div>
					</div>
					<div id="m_l_b">
						<div id="m_c_title"><a href="<?php get_news_url($news_m[0]);?>" title="<?php echo $news_m[0]->title; ?>"><?php echo $news_m[0]->title; ?></a></div>
						<div id="m_c_content"><a href="<?php get_news_url($news_m[0]);?>"><?php echo strip_tags($news_m[0]->content); ?></a></div>
						<div id="m_c_bottom"><a href="<?php get_news_url($news_m[0]);?>">查看详细内容&gt;&gt;</a></div>
					</div>
					<div id="m_l_c_r"> 
						<?php 
							for($i=1;$i<8;$i++){ ?>
						<div class="mlc">
							<a href="<?php get_news_url($news_m[$i]);?>" title="<?php echo $news_m[$i]->short_title;?>"><?php echo $news_m[$i]->short_title;?></a>
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
						<div class="son_t_r"><a href="#"><font style="color:#F33B0A; font-weight:bold;" >+</font> 更多</a></div>
					</div>
					<div class="son_content">
						<?php 
							$news_son=$db->query("SELECT id,title,description,content,short_title FROM eb_news e where category_id=208 and is_adopt=1 order by created_at desc limit 19");
							$news_son_count=$db->record_count;
							for($j=0;$j<8;$j++){
						 ?>
						<div class="son_c_z">
							<div class="son_c_z_l"></div>
							<div class="son_c_z_r"><a href="<?php get_news_url($news_son[$j]);?>" title="<?php echo $news_son[$j]->short_title;?>"><?php echo $news_son[$j]->short_title;?></a></div>
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
					<div class="q_m_pg" style="border-bottom:1px solid #ffffff; background:url(images/w_pg_l.gif) no-repeat;"><a href="#">
						<img id="q_m_a"/>
						</a></div>
					<div class="q_m_p" style="border-bottom:1px solid #ffffff; border-top:1px solid #8DD310;"><a href="#">
						<img id="q_m_b"/>
						</a></div>
					<div class="q_m_p" style="border-bottom:1px solid #ffffff; border-top:1px solid #8DD310;"><a href="#">
						<img id="q_m_c"/>
						</a></div>
					<div class="q_m_p" style="border-top:1px solid #8DD310;"><a href="#">
						<img id="q_m_d"/>
						</a></div>
				</div>
				<div id="q_menu_r">
					<div id="q_m_pg_d">
						<div id="child_t">
							<div id="ch_t_pic"></div>
							<div id="ch_t_r">
								<div id="child_title">虽多次发生的风采</div>
								<div id="child_content">虽虽虽多次发生的风采虽多次发生的风采多次发生的风采多次发生的风采虽虽多次发生的风采虽多次发生的风采多虽多次发生的风采次发生的风采</div>
							</div>
						</div>
						<div id="child_c">
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
								<div class="sblct_t"><a href="<?php get_news_url();?>">更多</a></div>
								<div class="sblct_bb">
									<?php 
										$news=array("120"=>"母乳喂养","121"=>"人工喂养","122"=>"混合喂养","123"=>"母乳准备","124"=>"母乳技巧","125"=>"吐奶溢奶");
										$new_id=array_keys($news);
										$news_id=implode(',',$new_id);
										$news_s=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in (".$news_id.") order by created_at desc limit 1;");
									?>
									<a href="<?php get_news_url($news[0]); ?>"><img src="<?php echo $news_s[0]->video_photo_src;?>"/></a>
								</div>
							</div>
							<div class="sblct_r">
								<div class="sb_title">
									<?php
									for($i=120;$i<126;$i++){ ?>
									<div class="sb_t_content" style="<?php if($i!==122 && $i!==125){ echo 'border-right:1px solid #EEDECF';} ?>">
										<a href="<?php get_news_url($news[$i]);?>" title="<?php echo $news[$i]->name;?>">
											<?php echo $news[$i]; ?>
										</a>
									</div>
									<?php }?>
								</div>
								<div class="sb_content">
									<?php
									
									$news=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in (".$news_id.") order by created_at desc limit 3;");
									for($j=0;$j<3;$j++){ ?>
									<div class="sb_ctt"><a href="<?php get_news_url($news[$j]);?>" title="<?php echo $news[$j]->title;?>"><?php echo $news[$j]->title; ?></a></div>
									<?php  }?>
								</div>
							</div>
						</div>
						<div id="sblct_b">
							<div class="sblct_l">
								<div class="sblct_t"><a href="#">更多</a></div>
								<div class="sblct_bb">
								<?php
									$new=array("128"=>"脐带","129"=>"头部","130"=>"五官","131"=>"生殖器","132"=>"换尿布","133"=>"抱宝宝","134"=>"打襁褓","135"=>"剪指甲");
									$news=array_keys($new);
									$news_id=implode(',',$news);
									$news=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in (".$news_id.") order by created_at desc limit 1;");
								?>
									<a href="<?php get_news_url($news[0]); ?>"><img src="<?php echo $news[0]->video_photo_src;?>"/></a>
								</div>
							</div>
							<div class="sblct_r">
								<div class="sb_title">
									<?php 
										$i=128;
										foreach ($new as $k=>$v){
										?>
									<div class="sbb_t_a" style="<?php if($i!=131 && $i!=135){ echo 'border-right:1px solid #EEDECF;'; } ?>">
										<a href="<?php get_news_url($i); ?>" title="<?php echo $v; ?>">
											<?php echo $v; ?>
										</a>
									</div>
									<?php $i++;} ?>
								</div>
								<div class="sb_content">
										<?php 
										$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in (".$news_id.") order by created_at desc limit 3;");
										for($j=0;$j<3;$j++){ ?>
										<div class="sb_ctt"><a href="<?php get_news_url($news[$j]); ?>" title="<?php echo $news[$j]->title; ?>"><?php echo $news[$j]->title; ?></a></div>
										<?php }?>
								</div>
							</div>
						</div>
					</div>
					<div id="sblc_b">
						<div id="sblcb_c">
							<div class="sblct_l">
								<div class="sblct_t"><a href="#">更多</a></div>
								<?php 
									$news=array("136"=>"游戏","137"=>"抚摸","138"=>"训练","139"=>"对话");
									$news_k=array_keys($news);
									$news_id=implode(',',$news_k);
									$new=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in (".$news_id.") order by created_at desc limit 1;");
								?>
								<div class="sblct_bb">
									<a href="<?php get_news_url($news[0]); ?>"><img src="<?php echo $new[0]->video_photo_src;?>"/></a>
								</div>
							</div>
							<div class="sblct_r">
								<div class="sb_title">
									<?php
									$i=136;
									foreach ($news as $k=>$v){
									 ?>
									<div class="sbr_t_a" style="<?php if($i!=139){ echo 'border-right:1px solid #EEDECF;';} ?>"><a href="<?php get_news_url($news[$i]);?>" title="<?php echo $v; ?>"><?php echo $v; ?></a></div>
									<?php $i++; }?>
								</div>
								<div class="sb_content">
									<?php 
										$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in (".$news_id.") order by created_at desc limit 3;");
										for($j=0;$j<3;$j++){ ?>
										<div class="sb_ctt"><a href="<?php get_news_url($news[$j]); ?>" title="<?php echo $news[$j]->title; ?>"><?php echo $news[$j]->title; ?></a></div>
									<?php }?>
								</div>
							</div>
						</div>
						<div id="sblcb_d"></div>
					</div>
				</div>
				<div id="sbl_r"> </div>
			</div>
			<div id="sb_r">
				<div id="sbl_tr"></div>
				<div id="sbl_cr">
					<div class="son_top">
						<div class="son_t_l">关于<font style="color:#A4C853; font-weight:bold;" >新生儿</font></div>
						<div class="son_t_r"><a href="#"><font style="color:#F33B0A; font-weight:bold;" >+</font> 更多</a></div>
						<div class="son_content">
							<?php 
								for($k=8;$k<19;$k++){
							 ?>
							<div class="son_c_z">
								<div class="son_c_z_l"></div>
								<div class="son_c_z_r"><a href="<?php get_news_url($news_son[$k]);?>" title="<?php echo $news_son[$k]->short_title;?>"><?php echo $news_son[$k]->short_title; ?></a></div>
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
</div>
</body>
</html>
