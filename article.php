<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('./frame.php');
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>consult</title>
<link href="./css/article.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="ibody">
	<?php include_once('inc/top_consult.php'); ?>
		<div id="fbody">
		<div id="log_top">
			<div id="log_t">
				<div id="log"></div>
				<div id="log_address">创业 &gt; 创业投资 &gt; 美国创业基金的中国风格</div>
			</div>
			<div id="hr"></div>
		</div>
		<div id="b_l">
			<div id="title"><a href="#">华为“跨界”切入电子阅读</a></div>
			<div id="title_b">
				<div id="ret">记者：<a href="#">阿斯多夫</a></div>
				<div id="problem">发布与：2010-1-21</div>
			</div>
			<div id="text">
				<div id="text_tpg"></div>
				<div id="text_cpg">
					<div id="text_word">
						<ul>
							<li><font>本文关键字：</font></li>
							<li><a href="#">电子、</a></li>
							<li><a href="#">财富、</a></li>
							<li><a href="#">通信、</a></li>
							<li><a href="#">华为、</a></li>
							<li><a href="#">方案、</a></li>
							<li><a href="#">用户、</a></li>
							<li><a href="#">营销、</a></li>
							<li><a href="#">客户端、</a></li>
							<li><a href="#">阅读器、</a></li>
							<li><a href="#">新闻出版</a></li>
						</ul>
						<div></div>
					</div>
				</div>
				<div id="text_bpg"></div>
			</div>
		</div>
		<div id="b_r">
			<div class="bd">
				<div class="bd_t"></div>
				<div class="bd_c">
					<div class="bdt_t">
						<div class="bdt_tl">用户调查</div>
						<div class="bdt_more"><a href="#"><font>+</font>更多</a></div>
					</div>
					<div class="bdt_hr">
						<div class="bdt_hr2"></div>
					</div>
					<div id="user_z">
						<form action="">
							<div id="user_a">
								<a href="#">
								<img id="pho"/>
								</a>
								<div id="pho_title">用户调查用户调查?</div>
							</div>
							<div id="bd_n"></div>
							<?php 
							for($x=0;$x<3;$x++){?>
							<div class="user_a">
								<input type="radio" class="user_rdo">
								<div class="user_rvalue">斯蒂芬妮斯的浪费那得分</div>
							</div>
							<?php  }?>
							<div id="user_hr"></div>
							<div id="user_pg">
								<input type="button" id="u_pa" value="投  票">
								<input type="button" id="u_pb" value="查看结果">
							</div>
							<div id="n"></div>
						</form>
					</div>
				</div>
				<div class="bd_b"></div>
			</div>
		</div>
		
		</div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
</div>
</body>
</html>
