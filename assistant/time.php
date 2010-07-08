<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>妈妈助手</title>
	<?php
		include_once dirname(__FILE__).'/../frame.php';
		css_include_tag('assistance_time','assistant_content','assistant_question','right_inc/assistant_right','top_inc/assistant_top','left_inc/assistant_left','bottom'); 
		use_jquery();
		js_include_tag('assistant/assistant');
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once('../inc/assistant_top.php'); ?>
	<div id="fbody">
		<?php include_once('../inc/assistant_left.php'); ?>
		<div id="result">
			<div id="container">
				<div id="container_result">
					<div id="result_list">
						<div id="weekly"></div>
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
						<div id="help_value">
							<div class="help_banner">
								<div class="help_dian"></div>
								<div class="help"></div>
							</div>
							
						</div>
					</div>
					
					<?php include_once('../inc/assistant_content.php'); ?>
				</div>
				<?php include_once('../inc/assistant_right.php'); ?>
			</div>
			<?php include_once('../inc/assistant_question.php'); ?>
		</div>
		<?php include_once('../inc/bottom.php'); ?>
	</div>
</div>
</body>
</html>
