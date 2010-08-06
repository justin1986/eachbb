<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','usercenter2');
		js_include_tag('yard/usercenter2');
		$db = get_db();
		$id =$_GET['id'];
		$info = $db->query("select * from eachbb_member.member where id=$id");
		$daily_count=$db->query("select id from eachbb_member.daily where u_id=$id;");
		$album_count=$db->query("select id from eachbb_member.album where u_id=$id;");
		if($info[0]->gender != 1){
			$its="她";
		}else{
			$its="他";
		}
		
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic"style="background:url(../images/yard/m_a.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic" style="background:url(../images/yard/m_1.jpg) no-repeat;"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_e" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
	</div>
	</div>
	<div id="content">
		<div id="c_l">
			<?php include(dirname(__FILE__).'/../yard/_yard_left.php');?>
		</div>
		<div id="c_ll">
			<div id="cl_t"></div>
			<div id="cl_c"></div>
			<div id="cl_r"></div>
		</div>
		<div id="c_c">
			<div id="log_t">
				<img src="/images/yard/log_t.jpg" />
			</div>
			<div id="cc_info">
				<div id="info_p1">
					<div id = "p1_phobox">
						<div id="photo">
							<img src="<?php echo $info[0]->avatar;?>" />
						</div>
					</div>
					<div id = "p1_buttonbox">
						<div class="p1_but">
							<div class="but_nl"></div>
							<div class="but_name">发短消息</div>
							<div class="but_nr"></div>
						</div>
						<div class="p1_but" style="float:right;">
							<div class="but_nl"></div>
							<div class="but_name">加为好友</div>
							<div class="but_nr"></div>
						</div>
						<div class="p1_but">
							<div class="but_nl"></div>
							<div class="but_name">写留言</div>
							<div class="but_nr"></div>
						</div>
					</div>
					<div id= "p1_other">
						<div class = "other">
							<div class ="oth_go">
							<img src="/images/yard/oth_go.gif" />
							</div>
							<div class ="oth_words"><a href="#"><?php echo $its?>的日志<font>(<?php echo count($daily_count);?>)</font></a></div>
						</div>
						<div class = "other">
							<div class ="oth_go">
							<img src="/images/yard/oth_go.gif" />
							</div>
							<div class ="oth_words"><a href="#"><?php echo $its?>的相册<font>(<?php echo count($album_count);?>)</font></a></div>
						</div>
						<div class = "other">
							<div class ="oth_go">
							<img src="/images/yard/oth_go.gif" />
							</div>
							<div class ="oth_words"><a href="#"><?php echo $its?>的帖子<font>(0)</font></a></div>
						</div>
					</div>
				</div>
				<div id="info_p2">
					<div id="p2_namebox">
						<div class="info_word">
							<div class="word_l">昵&nbsp; 称：</div>
							<div id="word_r1"><?php echo $info[0]->name;?></div>
						</div>
						<div class="info_word">
							<div class="word_l">一句话：</div>
							<div id="word_r2">宝宝</div>
						</div>
					</div>
					<div id ="line1"></div>
					<div id ="p2_info">
						<div id ="info_other">
							<div class="oth_botton">
								<div class="oth_nl"></div>
								<div class="oth_name"><?php echo $its?>的日志</div>
								<div class="oth_nr"></div>
							</div>
							<div class="oth_botton">
								<div class="oth_nl"></div>
								<div class="oth_name"><?php echo $its?>的相册</div>
								<div class="oth_nr"></div>
							</div>
							<div class="oth_botton">
								<div class="oth_nl"></div>
								<div class="oth_name"><?php echo $its?>的分享</div>
								<div class="oth_nr"></div>
							</div>
						</div>
						<div class="basic_info">
							<div class="word">基本资料</div>
							<div class ="info_left">
								<div class="left_words">
									<div class="box">性别：</div>
									<div class="info"><?php if($info[0]->gender != 1){echo "女";}else{echo "男";}?></div>
								</div>
								<div class="left_words">
									<div class="box">学历：</div>
									<div class="info"><?php echo $info[0]->education;?></div>
								</div>
								<div class="left_words">
									<div class="box">行业：</div>
									<div class="info"><?php echo $info[0]->industry;?></div>
								</div>
								<div class="left_words">
									<div class="box">收入：</div>
									<div class="info"><?php echo $info[0]->income;?></div>
								</div>
								<div id="ad_words">
									<div class="box">地址：</div>
									<div id="address"><?php echo $info[0]->address;?></div>
								</div>
							</div>
						</div>
					</div>
				<div id="line2"></div>
				<div id="p2_bb">
					<div class="basic_info">
							<div class="word">
							<?php 
							if($info[0]->baby_status == 0){
								echo "对不起，您尚未对任何小天使进行预约，请继续努力！";
							}elseif($info[0]->baby_status == 1){
								echo "Hey！小天使即将到来，你准备好了吗？";
							}else{
								echo $its."的宝宝";
							}
							?></div>
							<?php if($info[0]->baby_status == 2){ ?>
							<div class ="info_left">
								<div class="left_words">
									<span class="box">小名：</span>
									<span class="info"><?php echo $info[0]->baby_name;?></span>
								</div>
								<div class="left_words">
									<span class="box">性别：</span>
									<span class="info"><?php if($info[0]->baby_gender != 1){echo "女";}else{echo "男";}?></span>
								</div>
								<div class="left_words">
									<span class="box">年龄：</span>
									<span class="info">
									<?php $date_1 =now();
										$date_2 =$info[0]->baby_birthday;
										$d1=strtotime($date_1);
										$d2=strtotime($date_2);
										$days=round(($d1-$d2)/3600/24);
										if($days<=365){echo $days."天";}
										elseif($days>365){echo floor($days/365)."周岁";}
									?>
									</span>
								</div>
								<div class="left_words">
									<div class="box">生日：</div>
									<div class="info">
									<?php $info[0]->baby_birthday;
									echo substr($info[0]->baby_birthday,0,10);
									?></div>
								</div>
							</div>
							<?php }?>
						</div>
				</div>
				</div>
				<div id="info_p3">
					<div class="title_info">
						<div class="word2" >最新动态</div>
					</div>
					<?php for($i=0;$i<5;$i++){?>
					<div class="news_box">
						<div class="test">&nbsp;
							<div class ="news_logo">
								<img src="/images/yard/testlogo.gif" />
							</div>
						</div>
						<span class="news_txt">
							<span class="u_id"><a href="#"><?php echo $info[0]->name;?></a></span>
							<span class="news_type">
								<span class="type_p1">回复了</span>
								<span class="f_id"><a href="#">xiangxiang</a></span>
								<span class="type_p2">的帖子：</span>
							</span>
							<span>Hallie秋之爱：皮衣/柳丁/国企学/军服/流速/保温/褶皱/大红叉2002</span>
						</span>
						<span class="news_time">2002-10-10 10:30:00</span>
						<div class="line3"></div>
					</div>
					<?php }?>
					<div id="test1"></div>
				</div>
				<div id="info_p4">
					<div class="title_info">
						<div class="word2" >留言板</div>
					</div>
					<div id="c_expression">
						<?php for($i=0;$i<5;$i++){?>
						<div class="expression">
							<img src="/images/yard/express1.gif" />
						</div>
						<?php }?>
					</div>
					<div id="text_write">
					<form id="b_bord" action="usercenter.post.php" method="post">
						<textarea name="b_words" id="b_words"></textarea>
						<input type="text" name="id" style="display:none;" value="<?php echo $id?>">
					</form>
					</div>
					<div id="text_push">
						<div id="whisper">
							<input type="checkbox" name="checkbox" id="checkbox">悄悄话
						</div>
						<div id="push">发表留言</div>
					</div>
					<div class="text_display">
						<div class="f_content">
							<div class="f_pho">
								<img src="/images/yard/info_p4fpho.gif " />
							</div>
				<?php $comment =$db->query("select nick_name,created_at,comment from eachbb_member.comment where user_id=$id and resource_id='1099' order by created_at desc");?>
							<div class="content_box">
								<div class="f_info">
									<div class="f_name"><a href="#"><?php echo $comment[0]->nick_name?></a></div>
									<div class="f_button">
										<img src="/images/yard/f_button.gif " />
									</div>
									<div class="created_at"><?php echo $comment[0]->created_at?></div>
								</div>
								<div class="f_words"><?php echo htmlspecialchars($comment[0]->comment);?></div>
							</div>
						</div>
						<div id="u_reply">
							<div id="reply_title">
								<span class="u_id"><a href="#"><?php echo $info[0]->name;?></a></span>
								<span>的回复：</span>
								<span id="reply_time">2010-11-11 11:11:11</span>
							</div>
							<div id="reply_words">jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj</div>
						</div>
						<div id="more_reply">
							<div id="next_reply"><a href="#">查看全部>></a></div>
							<div id="total_reply">共<?php echo count($comment)?>条留言</div>
						</div>
					</div>
				</div>
			</div>
			<div id="cc_bottom">
				<div id="copyright">版权</div>
			</div>
		</div>
	</div>
</body>