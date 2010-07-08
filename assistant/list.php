<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>妈妈助手</title>
	<?php
		include_once dirname(__FILE__).'/../frame.php';
		css_include_tag('assistant_list','assistant_content','assistant_question','right_inc/assistant_right','top_inc/assistant_top','left_inc/assistant_left','bottom'); 
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
			<div id="result_top_btn">
				<input type="button" value="按年龄查看"/>
				<input type="button" value="按主题查看"/>
				<input type="button" value="全部专题"/>
			</div>
			<div id="container">
				<div id="container_result">
					<div id="result_list">网趣宝贝测评课程论坛热帖列表</div>
					<?php for($j = 0; $j < 3; $j++){ ?>
					<div class="result_banner">
						<div class="result_pg_top">健康育儿</div>
						<div class="result_pg_content">
							<?php for($i = 0; $i < 4; $i++){ ?>
							<div class="result_container" style="<?php if($i == 0) echo "margin-top:10px;"; ?>">
								<img src="/images/assistant_list/pho.jpg"/>
								<div class="result_title"><a href="#">社会观念在</a></div>
								<div class="result_value">真是的发生哦对佛啊说v真是的发生哦对佛啊说vadfasdf真是的发生哦对fasdf<a href="#">[查看全文]</a></div>
							</div>
							<?php } ?>
							<div class="kong"></div>
						</div>
						<div class="result_pg_bottom"></div>
					</div>
					<?php } ?>
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
