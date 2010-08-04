<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','usercenter2');
		js_include_tag('yard/yard','usercenter2');
		$db = get_db();
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect("/login/");
			exit;
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
						<img src="/images/yard/test1_pho.gif" />
					</div>
				</div>
				<div id = "p1_buttonbox">
					<div class="button">
						<div class="but_nl"></div>
						<div class="but_name">发短消息</div>
						<div class="but_nr"></div>
					</div>
					<div class="button" style="float:right;">
						<div class="but_nl"></div>
						<div class="but_name">加为好友</div>
						<div class="but_nr"></div>
					</div>
					<div class="button">
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
						<div class ="oth_words">她的日志<font>(0)</font></div>
					</div>
					<div class = "other">
						<div class ="oth_go">
						<img src="/images/yard/oth_go.gif" />
						</div>
						<div class ="oth_words">她的相册<font>(0)</font></div>
					</div>
					<div class = "other">
						<div class ="oth_go">
						<img src="/images/yard/oth_go.gif" />
						</div>
						<div class ="oth_words">她的帖子<font>(0)</font></div>
					</div>
				</div>
			</div>
			<div id="info_p2">
				<div id="p2_namebox">
					<div class="info_word">
						<div class="word_l">昵&nbsp; 称：</div>
						<div class="word_r"></div>
					</div>
					<div class="info_word">
						<div class="word_l">一句话：</div>
						<div class="word_r"></div>
					</div>
				</div>
				<div id ="line1"></div>
				<div id ="p2_info">
					<div id ="info_other">
						<div class="oth_botton">
							<div class="oth_nl"></div>
							<div class="oth_name">她的日志</div>
							<div class="oth_nr"></div>
						</div>
						<div class="oth_botton">
							<div class="oth_nl"></div>
							<div class="oth_name">她的相册</div>
							<div class="oth_nr"></div>
						</div>
						<div class="oth_botton">
							<div class="oth_nl"></div>
							<div class="oth_name">她的分享</div>
							<div class="oth_nr"></div>
						</div>
					</div>
					<div class="basic_info">
						<div class="font">基本资料</div>
						<div class ="info_left">
							<div class="left_words">
								<div class="box">性别：</div>
								<div class="info"></div>
							</div>
							<div class="left_words">
								<div class="box">职业：</div>
								<div class="info"></div>
							</div>
							<div class="left_words">
								<div class="box">城市：</div>
								<div class="info"></div>
							</div>
							<div class="left_words">
								<div class="box">城市：</div>
								<div class="info"></div>
							</div>
							<div class="left_words">
								<div class="box">城市：</div>
								<div class="info"></div>
							</div>
						</div>
					</div>
				</div>
			<div id="line2"></div>
			<div id="p2_bb">
				<div class="basic_info">
						<div class="font">她的宝宝</div>
						<div class ="info_left">
							<div class="left_words">
								<div class="box">小名：</div>
								<div class="info"></div>
							</div>
							<div class="left_words">
								<div class="box">性别：</div>
								<div class="info"></div>
							</div>
							<div class="left_words">
								<div class="box">年龄：</div>
								<div class="info"></div>
							</div>
							<div class="left_words">
								<div class="box">生日：</div>
								<div class="info"></div>
							</div>
						</div>
					</div>
			</div>
			</div>
			<div id="info_p3">
				<div id="new_info">
					<div id="font2" >最新动态</div>
				</div>
				<div class="news"></div>
			</div>
		</div>
	</div>
		</div>
</body>