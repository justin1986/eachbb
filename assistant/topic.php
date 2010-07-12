<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>妈妈助手</title>
	<?php
		include_once('./../frame.php');
		css_include_tag('topic','assistant/assistant_content','assistant/assistant_question','right_inc/assistant_right','left_inc/assistant_left'); 
		use_jquery();
		js_include_tag('assistant/assistant');
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/_assistant_top.php'); ?>
	<div id="fbody">
		<?php include_once('/_assistant_left.php'); ?>
		<div id="result">
			<div id="container">
				<div id="container_result">
					<div id="result_list">
						<div id="weekly">
							<a href="#"><img src="/images/topic/top.jpg" /></a>
						</div>
						<div id="result_news">
							<div>标题标题标题标题标题</div>
							<div class="kong" style="width:501;"></div>
							内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
						</div>
						<div id="questionary">
							<div id="questionary_container">
								<div class="questionary_pg">
									<div class="questionary_title">生理发展</div>
									<div class="questionary_banner">
										<div></div>
										<a href="#">沙俄法沙俄法十分沙俄法十分沙俄法十分十分</a>
									</div>
									<div class="questionary_banner">
										<div></div>
										<a href="#">沙俄法沙俄法十分沙俄法十分沙俄法十分十分</a>
									</div>
								</div>
								<div class="questionary_pg" style="float:right;">
									<div class="questionary_title">心智发展</div>
									<div class="questionary_banner">
										<div></div>
										<a href="#">沙俄法沙俄法十分沙俄法十分沙俄法十分十分</a>
									</div>
									<div class="questionary_banner">
										<div></div>
										<a href="#">沙俄法沙俄法十分沙俄法十分沙俄法十分十分</a>
									</div>
								</div>
								<div class="questionary_pg">
									<div class="questionary_title">感官与发射</div>
									<div class="questionary_banner">
										<div></div>
										<a href="#">沙俄法沙俄法十分沙俄法十分沙俄法十分十分</a>
									</div>
									<div class="questionary_banner">
										<div></div>
										<a href="#">沙俄法沙俄法十分沙俄法十分沙俄法十分十分</a>
									</div>
								</div>
								<div class="questionary_pg" style="float:right;">
									<div class="questionary_title">社会与发展</div>
									<div class="questionary_banner">
										<div></div>
										<a href="#">沙俄法沙俄法十分沙俄法十分沙俄法十分十分</a>
									</div>
									<div class="questionary_banner" style="margin-top:10px; ">
									<a href="#" style="font-size: 12px; text-decoration:none; float:right; color:#FD691C;">更多婴儿期知识&gt;&gt;</a>
									</div>
								</div>
							</div>
						</div>
						<div id="help_title"></div>
						<div class="kong"></div>
						<?php for($i = 0 ; $i < 5 ; $i++){ ?>
						<div class="help_banner">
							<div class="help_dian"></div>
							<div class="help">你很帅哦哦的护发素你很哦的护发素护发素iuhinnsd你很帅哦的护发素</div>
						</div>
						<?php } ?>
						<div class="attention_pg">
							<div class="top">婴儿臀部护理</div>
							<div class="attention_pg_content">
								<div style="margin-top:10px;">婴儿由于大小婴儿由于大小便次数较多，特别是母乳宝宝，有时候每天婴儿由于大小便次数较多，特别是母乳宝宝，有时候每天便次数较多，特别是母乳宝宝，有时候每天</div>
								<div>儿由于大小婴儿由于大小便次数较多</div>
								<?php for($i = 0; $i < 8; $i++){ ?>
								<div><img src="/images/topic/dian.jpg">由于大小婴儿由于大小便次数较</div>
								<?php } ?>
								<div class="content_banner_bottom">更多内容请查看：<a href="#">婴儿由于大小便次&nbsp;</a></div>
							</div>
							<div class="bottom"></div>
						</div>
						<div id="clew"></div>
						<div class="kong"></div>
						<?php for($i = 0 ; $i < 5 ; $i++){ ?>
						<div class="help_banner">
							<div class="help_dian"></div>
							<div class="help">你很帅哦哦的护发素你很哦的护发素护发素iuhinnsd你很帅哦的护发素</div>
						</div>
						<?php } ?>
						<div class="attention_pg">
							<div id="top_2"></div>
							<div class="attention_pg_content">
								<div style="margin-top:10px;">婴儿由于大小婴儿由于大小便次数较多，特别是母乳宝宝，有时候每天婴儿由于大小便次数较多，特别是母乳宝宝，有时候每天便次数较多，特别是母乳宝宝，有时候每天</div>
								<div>儿由于大小婴儿由于大小便次数较多</div>
								<?php for($i = 0; $i < 4; $i++){ ?>
								<div><img src="/images/topic/dian.jpg">由于大小婴儿由于大小便次数较</div>
								<?php } ?>
								<div class="content_banner_bottom">更多内容请查看：<a href="#">婴儿由于大小便次&nbsp;</a></div>
							</div>
							<div class="bottom"></div>
						</div>
						<div id="game_time">每周游戏时间</div>
						<div class="game_banner">
							你很帅哦哦的护发素你很哦的护发素护发素iuhinnsd你很帅哦的护发素你很帅哦哦的护发素你很哦的护发素护发素iuhinnsd你很帅哦的护发素你很帅哦哦的护发素你很哦的护发素护发素iuhinnsd你很帅哦的护发素
						</div>
						<div class="kong"></div>
					</div>
					<?php include_once('/_assistant_content.php'); ?>
				</div>
				<div id="container_recommand">
					<a href="#"><img class="recommand" style="margin-top:0px;" src="/images/assistant_list/r_input.jpg"/></a>
					<a href="#"><img class="recommand" src="/images/assistant_list/btn_test.jpg"/></a>
					<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
					<div id="attention">
						<div id="att_top">热点关注<a href="#">更多&gt;&gt;</a></div>
						<div id="att_content">
							<div class="v_kong"></div>
							<?php for($i = 0 ; $i < 5 ; $i++){ ?>
							<div class="att_container">
								<div></div>
								<a href="#">斯蒂芬撒旦发射</a>
							</div>
							<?php } ?>
							<div class="v_kong"></div>
						</div>
						<div id="att_bottom"></div>
					</div>
					<a href="#"><img class="recommand" style="height:159px;" src="/images/assistant_list/img_1.jpg"/></a>
					<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
					<a href="#"><img class="recommand" style="height:152px;" src="/images/assistant_list/img_2.jpg"/></a>
					<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
					<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/img_1.jpg"/></a>
					<a href="#"><img class="recommand" style="height:152px;" src="/images/assistant_list/img_2.jpg"/></a>
					<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
				</div>
			</div>
			<?php include_once('/_assistant_question.php'); ?>
		</div>
		<?php include_once('../inc/bottom.php'); ?>
	</div>
</div>
</body>
</html>