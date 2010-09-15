<!-- 右边 -->
<?php
		include_once dirname(__FILE__).'/../frame.php';
		use_jquery();
		js_include_tag('assistant/assistant_login','test_left_inc');
		css_include_tag('test_left_inc');
	?>
	<style>
		.indiv_value{margin-top:10px;}
		#indiv_value{margin-top:10px;}
		#indiv_container{width:198px; height:170px;}
		#container_recommand a img{margin-top:8px;}
		#indiv_name a{font-size:15px; font-weight:bold; color:#00398B; text-decoration: none;}
	</style>
<div id="container_recommand" style="width:200px; height:1100px; overflow:hidden; float:right; display: inline;">
<!-- 右边 第一个  个人档案 -->
	<div id="l_pho" style="margin-left:0px; float:left;"></div>
	<a href="/course"><img class="recommand" src="/images/assistant_list/r_input.jpg"/></a>
	<a href="/test/"><img class="recommand" src="/images/assistant_list/btn_test.jpg"/></a>
	<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
	<a href="#"><img class="recommand" style="height:159px;" src="/images/assistant_list/img_1.jpg"/></a>
	<a href="#"><img class="recommand" style="height:152px;" src="/images/assistant_list/img_2.jpg"/></a>
</div>