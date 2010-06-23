<?php

include "../frame.php";

/*

if(! $test_id = intval($_SESSION['doing_test'])) die('invalid request!');
$test = new table_class('eb_problem');
$test->find($test_id);
if(!$test->id){
	die_not_found();
}
set_charset();
foreach ($_SESSION['question_queue'] as $question) {
	$var = $question['question_type'];
	$$var += $question['score'];
}

echo "大动作得分：{$dadongzuo}<br/>";
echo "精细动作得分：{$jingxidongzuo}<br/>";
echo "语言得分：{$yuyan}<br/>";
echo "认识得分：{$renshi}<br/>";
echo "社会活动和行为规范得分：{$shehuihuodong}<br/>";
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
	<title>测评报告</title>
	<?php set_charset();
		css_include_tag('test_result','top_inc/test_blue.top','top_inc/test_left');
	?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once('../inc/top_blue.inc.php'); ?>
		<!-- 外部容器 -->
		<div id="container">
			<?php include_once('../inc/left_inc.php'); ?>
			<div id="right">
			<!-- 右侧放置内容的地方 -->
				<div id="content">
					<div id="result_container">
						<div class="result">
							<div class="title">撒旦发射发生</div>
							<div class="content">撒旦发射发生撒旦发射发生</div>
						</div>
					</div>
					<div id="recommand_container">
						<div class=""></div>
					</div>
				</div>
				<!-- 右侧放置内容结束 -->
				<div id="bottom_banner"><img src="/images/test/pp.jpg"/></div>
			</div>
			
		</div>
		<div id="bg_hr"></div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
</div>
</body>
</html>
