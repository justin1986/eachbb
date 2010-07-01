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
						<div id="result_top"></div>
						<div id="result_pg">
							<div id="result">
								<!--  中间  左边  有边的  每个 内容 的 大DIV  "大动作" 开始 -->
								<div class="result_ledger">
									<div class="title">大动作</div>
									<div class="content"><font>点评：</font>撒旦发射撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生发生撒旦发射发生</div>
								</div>
								<!-- 中间  左边  有边的  每个 内容 的 大DIV  "大动作"  结束 -->
								
								<!--  中间  左边  有边的  每个 内容 的 大DIV  "精细动作" 开始 -->
								<div class="result_ledger" style="margin-top:20px;">
									<div class="title">精细动作</div>
									<div class="content"><font>点评：</font>撒旦发射撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生发生撒旦发射发生</div>
								</div>
								<!-- 中间  左边  有边的  每个 内容 的 大DIV “精细动作” 结束 -->
								<!--  中间  左边  有边的  每个 内容 的 大DIV  "语言" 开始 -->
								<div class="result_ledger" style="margin-top:20px;">
									<div class="title">语言</div>
									<div class="content"><font>点评：</font>撒旦发射撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生发生撒旦发射发生</div>
								</div>
								<!-- 中间  左边  有边的  每个 内容 的 大DIV “语言” 结束 -->
								<!--  中间  左边  有边的  每个 内容 的 大DIV  "认识" 开始 -->
								<div class="result_ledger" style="margin-top:20px;">
									<div class="title">认识</div>
									<div class="content"><font>点评：</font>撒旦发射撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生发生撒旦发射发生</div>
								</div>
								<!-- 中间  左边  有边的  每个 内容 的 大DIV “认识” 结束 -->
								<!--  中间  左边  有边的  每个 内容 的 大DIV  "社会形为和生活习惯" 开始 -->
								<div class="result_ledger" style="margin-top:20px;">
									<div class="title">社会形为和生活习惯</div>
									<div class="content"><font>点评：</font>撒旦发射撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生撒旦发射发生发生撒旦发射发生</div>
								</div>
								<!-- 中间  左边  有边的  每个 内容 的 大DIV “社会形为和生活习惯” 结束 -->
								<input id="btn_recommand" type="button" value="回顾题目"/>
							</div>
							<div id="c_hr"></div>
							<div id="recommand_container">
								<div class="recommand">
									<div class="recommand_pg_top"><div>大动作</div></div>
									<div class="recommand_pg">
										<div class="recommand_pg_son">
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="#">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="#">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand" style="margin-top:10px;">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_b.jpg"/>
												<a href="#">课程推荐</a>
											</div>
											
										</div>	
									</div>
									<div class="recommand_pg_bottom"></div>
								</div>
								<div class="recommand" style="margin-top:10px;">
									<div class="recommand_pg_top"><div>精细动作</div></div>
									<div class="recommand_pg">
										<div class="recommand_pg_son">
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand" style="margin-top:10px;">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_b.jpg"/>
												<a href="#">课程推荐</a>
											</div>
											
										</div>	
									</div>
									<div class="recommand_pg_bottom"></div>
								</div>
								<div class="recommand" style="margin-top:10px;">
									<div class="recommand_pg_top"><div>语言</div></div>
									<div class="recommand_pg">
										<div class="recommand_pg_son">
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand" style="margin-top:10px;">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_b.jpg"/>
												<a href="#">课程推荐</a>
											</div>
											
										</div>	
									</div>
									<div class="recommand_pg_bottom"></div>
								</div>
								<div class="recommand" style="margin-top:10px;">
									<div class="recommand_pg_top"><div>认识</div></div>
									<div class="recommand_pg">
										<div class="recommand_pg_son">
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand" style="margin-top:10px;">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_b.jpg"/>
												<a href="#">课程推荐</a>
											</div>
										</div>	
									</div>
									<div class="recommand_pg_bottom"></div>
								</div>
								<div class="recommand" style="margin-top:10px;">
									<div class="recommand_pg_top"><div>社会形为和生活习惯</div></div>
									<div class="recommand_pg">
										<div class="recommand_pg_son">
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 大动作   总的 面板 开始-->
											<div class="recommand_banner">
												<img src="/images/test_result/p.jpg"/>
												<a href="">真是的发生哦对佛真是的发生哦对佛啊说真是的发生哦对佛啊说啊说</a>
											</div>
											<!-- 大动作   总的 面板 结束-->
											<!-- 横色 背景线条-->
											<div class="recommand_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand" style="margin-top:10px;">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_a.jpg"/>
												<a href="#">妈妈助手</a>
											</div>
											<!-- 菜单横色 背景线条 -->
											<div class="menu_hr"></div>
											<!-- 菜单大面板 -->
											<div class="menu_recommand">
												<img src="/images/test_result/p_b.jpg"/>
												<a href="#">课程推荐</a>
											</div>
										</div>	
									</div>
									<div class="recommand_pg_bottom"></div>
								</div>
							</div>
						</div>
						<div id="result_bottom"></div>
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
