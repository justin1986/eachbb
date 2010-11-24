<?php
		include_once dirname(__FILE__).'/../frame.php';
		use_jquery();
		js_include_tag('assistant/assistant_login');
		css_include_tag('test_left_inc');
	?>
	<style>
		.indiv_value{margin-top:10px;}
		#indiv_value{margin-top:10px;}
		#indiv_container{width:198px; height:170px;}
		#container_recommand a img{margin-top:8px;}
		#indiv_name a{font-size:15px; font-weight:bold; color:#00398B; text-decoration: none;}
		.ad_banner{width:200px; height:200px; margin-top:5px; float:right; display:inline;}
		.ad_pg{width:200px; height:140px; margin-top:5px; float:right; display:inline;}
	</style>
<div id="container_recommand" style="width:200px; height:1100px; overflow:hidden; float:right; display: inline;">
<!-- 右边 第一个  个人档案 -->
	<div id="l_pho" style="margin-left:0px; float:left;"></div>
	<div class="ad_banner" id="couser_a"></div>
	<div class="ad_pg ad_banner" id="couser_b"></div>
	<div class="ad_pg ad_banner" id="couser_c"></div>
	<div class="ad_pg ad_banner" id="couser_d"></div>
	<div class="ad_pg ad_banner" id="couser_e"></div>
</div>
<script src="/javascript/get_ad.js">
</script>