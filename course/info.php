<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('../frame.php');
	$id =intval(trim($_REQUEST['id']));
	if(empty($id)){
		#redirect('error.html');
		#die();
	}
	$age=intval($_GET['age']);
	$month=intval($_GET['month']);
	$mon = 0 <= $mon && $mon <= 35 ? $mon=$month+1 : 1;
	$month = $month % 12;
	$valid_age = array(1,2,3);
	$age = in_array($age,$valid_age) ? $age : 1;
	$month = 0 <= $month && $month <= 11 ? $month=$month+1 : 1;
	$user = User::current_user();
	?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>网趣宝贝-课程列表</title>
<?php
	use_jquery();
	css_include_tag('course/course_top','info','test_left_inc');
	js_include_tag('course/info','left_inc');
?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/_top_course.php'); ?>
	<div id="fbody">
		<div id="c_l">
				<div id="l_img">
					<img src="/images/info/t_<?php echo $mon;?>.jpg"/>
				</div>
				<div id="l_pho"></div>
				<a href="#">
				<img id="l_look" src="/images/yetrb/asdf.jpg"/>
				</a>
				<div class="hlc_t"></div>
				<div class="hlc_b">
					<div class="hlcb_pg">
						<div class="hlct_t">意见反馈榜</div>
						<img src="/images/helper/lb_hd.jpg"> </div>
					<div class="hlcb_z">
						<a href="#">
							撒旦发射发生是否斯蒂芬阿桑地方撒旦法速度封杀地方撒挡风沙地方打算地方啊
						</a>
					</div>
				</div>
				<div class="hlc_bb"></div>
				<div id="l_f">
					<div id="lf_l">我的<font>好友</font></div>
				</div>
				<div id="pic_r">
					<?php
						$db=get_db();
						$list=$db->query("SELECT id,f_id,f_name,f_avatar FROM eachbb_member.friend f where u_id={$user->id} LIMIT 6");
						foreach($list as $friend){ ?>
						<div class="ppg">
							<div class="pic_pg">
								<div class="pic_img"><img src="<?php echo $friend->f_avatar; ?>"></div>
							</div>
							<div class="ppg_w"><?php echo $friend->f_name; ?></div>
						</div>
						<?php }
						if(!$list){
							echo '<div style="width:210px; height:20px; padding-bottom:20px; margin-top:20px; line-height:20px; text-align:center; font-size:14px; font-weight:bold;">您的好友为空！</div>';
						}
						?>
				</div>
				<img id="pg_a" src="/images/info/img_<?php echo $age;?>.jpg"/>
			</div>
			<div id=cr>
				<div id=title>
					<div class="cr_title<?php if($age == 0){ echo " selected" ;}?>" style="margin-left:3px;" id="cr_t_0"><a href="/course/">首 页</a></div>
					<div class="cr_title<?php if($age == 1){ echo " selected" ;}?>" id="cr_t_1">0-1岁</div>
					<div class="cr_title<?php if($age == 2){ echo " selected" ;}?>" id="cr_t_2">1-2岁</div>
					<div class="cr_title<?php if($age == 3){ echo " selected" ;}?>" id="cr_t_3">2-3岁</div>
					<input type="hidden" id="age_val" value="<?php echo $age;?>">
				</div>
				<div id=month_l></div>
				<div class=month_c id="month_0" style="<?php if($age == 1){ echo "display:inline;";} ?>">
					<div class="month" style="margin-left:53px; <?php if($mon == 1) echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";?>">1月</div>
					<?php for($i = 2 ; $i <= 12 ; $i++){ ?>
					<div class="month" style="<?php if($mon == $i){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>"><?php echo $i; ?>月</div>
					<?php } ?>
				</div>
				<div class=month_c id="month_1"  style="<?php if($age == 2){ echo "display:inline;";} ?>">
					<div class="month" style="margin-left:53px; <?php if($mon == 13){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">13月</div>
					<?php for($i = 14 ; $i <= 24 ; $i++){ ?>
					<div class="month" style="<?php if($mon == $i){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>"><?php echo $i; ?>月</div>
					<?php } ?>
				</div>
				<div class=month_c id="month_2" style="<?php if($age == 3){ echo "display:inline;";} ?>">
					<div class="month" style="margin-left:53px; <?php if($mon == 25){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>">25月</div>
					<?php for($i = 26 ; $i <= 36 ; $i++){ ?>
					<div class="month" style="<?php if($mon == $i){ echo "background: url(/images/info/month_bg_red.jpg) no-repeat;";}?>"><?php echo $i; ?>月</div>
					<?php } ?>
				</div>
				<div id=month_r></div>
				<?php
					$db=get_db();
					$sql="SELECT id,title,description,img_url,key_teach,big_action,detail_action,knowledge,language,music,social_behavior,book,toy,age FROM eb_teach e where is_adopt=1 and month={$month} and age={$age} order by create_time desc limit 1;";
					$teach=$db->query($sql);
				?>
				<div id=key>
					<div id=key_l></div>
					<div id=key_c>
						<div id=key_c_l>
							成长关键词：							
							<a href="<?php get_teach_url($teach[0]); ?>" title="<?php echo $teach[0]->key_teach; ?>"><?php echo $teach[0]->key_teach; ?></a>
						</div>
						<div id=key_c_r><button></button></div>
					</div>
					<div id=key_r></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#B4E888;">
						<div class=context style="color:#72aa1d;">宝宝关键期指导</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->key_teach;?>"><?php echo strip_tags($teach[0]->key_teach);?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#93d7eb;">
						<div class=context style="color:#1aa9d3;">宝宝大运动</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->big_action;?>"><?php echo $teach[0]->big_action;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9daadc;">
						<div class=context style="color:#5066b8;">宝宝精细动作</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->detail_action;?>"><?php echo $teach[0]->detail_action; ?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9bcb78;">
						<div class=context style="color:#438a0f;">宝宝认知</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->knowledge;?>"><?php echo $teach[0]->knowledge; ?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#ff8587;">
						<div class=context style="color:#ce0000;">宝宝语言</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->language; ?>"><?php echo $teach[0]->language; ?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#B4E888;">
						<div class=context style="color:#72aa1d;">宝宝音乐欣赏</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->music;?>"><?php echo $teach[0]->music;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#93d7eb;">
						<div class=context style="color:#1aa9d3;">宝宝社会行为</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->social_behavior;?>"><?php echo $teach[0]->social_behavior;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9daadc;">
						<div class=context style="color:#5066b8;">宝宝图书欣赏和推荐</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->book;?>"><?php echo $teach[0]->book;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#9bcb78;">
						<div class=context style="color:#438a0f;">宝宝玩具推荐</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>" title="<?php echo $teach[0]->toy;?>"><?php echo $teach[0]->toy;?></a></div>
				</div>
				<div class=content>
					<div class=c_title style="background:#ff8587;">
						<div class=context style="color:#ce0000;">课程订购说明</div>	
					</div>
					<div class=piccontent><a href="<?php echo get_news_url($teach[0]);?>">挖矿结婚打算到离开家哈萨克交流会到拉萨快回答</a></div>
				</div>
			</div>
			<?php include_once('../inc/bottom.php');?>
	</div>
	
</div>
</body>
</html>