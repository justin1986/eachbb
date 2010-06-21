<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once('./frame.php');
	$id = trim(intval($_GET['id']));
	if(empty($id)){
		$name = $_GET['name'];
		if(empty($name) or strlen($name) > 20){
			die();
		}
		$db = get_db();
		$db->query("select id from eb_news where id='{$name}'");
		if($db->record_count <= 0) die();
		$id = $db->field_by_name('id');
	}
	$column = new table_class('fb_user');
	$column->find($id);
	if(!$column->id){
		redirect('error.html');
		die();
	}
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
					
					
					</div>
					<div id="text_content">
						<font>本文摘要：</font>
						<a href="#">哈哈哈撒旦法哈哈哈撒旦法沃尔夫斯蒂芬哈哈哈撒旦法沃尔夫斯蒂芬哈哈哈撒旦法沃尔夫斯蒂芬哈哈哈撒旦法沃尔夫斯蒂芬沃尔夫斯蒂芬</a>
					</div>
					<div id="text_menu">
						<div class="tm_a"><a href="#">打印</a></div>
						<div id="tm_b"><a href="#">收藏</a></div>
						<div class="tm_a"><a href="#">分享</a></div>
						<div id="tm_ticket"><a href="#">支持&nbsp;100</a></div>
					</div>
				</div>
				<div id="text_bpg"></div>
			</div>
			<div id="content">
				使得法网上风使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2使得法网上风    新闻出版总署科技与数字出版司，2新闻出版总署科技与数字出版司，2
			</div>
			<div id="pagination">
				<a href="#">上一页</a>&nbsp;<a href="#">1</a>&nbsp;|&nbsp;<a href="#">2</a>&nbsp;<a href="#">下一页</a>
			</div>
			<div id="critique">
				<div id="c_l">读者评论<a href="#">(共5条)</a></div>
				<div id="c_r"><a href="#">查看所有评论</a></div>
			</div>
			<div class="cri_content">
				<?php for($i=0;$i<4;$i++){ ?>
				<div class="cri_tz">
					<div class="crit_l"><a href="#">哈哈阿萨法</a>&nbsp;&nbsp;&nbsp;2010-03-12 10:43:15</div>
					<div class="crit_r"><a href="#">支持(0)</a><a href="#">反对(0)</a></div>
					<div class="cri_c"><a href="#">哈哈阿萨法哈哈阿萨法哈哈阿萨法哈哈阿萨法哈哈阿萨法</a></div>
					<div class="c_hr"></div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div id="b_r">
			<div id="br_img"></div>
			<div id="class">
				<div class="cla_t"></div>
				<div class="cla_c">
					<div class="cla_title">早教课程</div>
					<div class="cla_img">
						<?php for($i=0;$i<3;$i++){ ?>
						<div class="ci_z">
							<div class="ci_pg"><a href="#"><img src="/images/article/r1.jpg"></a></div>
							<div class="ci_title"><a href="#">早教课程</a></div>
						</div>
						<?php } ?>
					</div>
					<div class="cla_hr"></div>
					<div class="cla_menu">
						<?php for($i=0; $i<9; $i++){ ?>
						<div class="cla_m_v"><a href="">早教课程</a></div>
						<div class="cla_r"></div>
						<?php } ?>
					</div>
				</div>
				<div class="cla_b"></div>
			</div>
			
			
			<div id="tag">
				<div id="tag_l"></div>
				<div id="tag_c">
					<div id="tagc_t"><font>热门</font>关键字</div>
					<div class="tag_menu">
						<?php for($i=0; $i<9; $i++){ ?>
						<div class="cla_m_v"><a href="">早教课程</a></div>
						<div class="cla_r"></div>
						<?php } ?>
					</div>
				</div>
				<div id="tag_b"></div>
			</div>
			
			
			<div class="bd">
				<div class="bd_t"></div>
				<div class="bd_c">
					<div class="bdt_t">
						<div class="bdt_tl">文章列表</div>
						<div class="bdt_more"><a href="#"><font>+</font>更多</a></div>
					</div>
					<div class="bdt_hr">
						<div class="bdt_hr2"></div>
					</div>
					<div class="bdt_v">
						<?php for($i=0;$i<9;$i++){ ?>
						<div>
							<div class="bdt_l"></div>
							<div class="book_title">
								<a href="#">撒旦法十分</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="bd_b"></div>
			</div>
			
			<div id="comment">
				<div id="comm_l"></div>
				<div id="comm_c">
					<div id="comm_t">
						<div id="com_title">相关评论</div>
						<div id="com_x">
						</div>
						<a href="#"><img/></a>
					</div>
					<?php for($i=0;$i<10;$i++){ ?>
					<div id="comm_con">
						<a href="#">选购得宝也能当，宝宝食</a>
					</div>
					<?php } ?>
				</div>
				<div id="comm_r"></div>
			</div>
			
			
		</div>
		
		</div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
</div>
</body>
</html>
