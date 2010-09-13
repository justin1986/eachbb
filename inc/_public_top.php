<?php 
	include_once(dirname(__FILE__).'./../frame.php');
	set_charset('utf-8');
	js_include_tag('swfobject','public_top');
	use_jquery_ui();
?>
<style>
#top_login{
	width:970px;
	height:103px;
}
#tl_l{
	width:227px;
	background:url('/images/top/logo.png') no-repeat;
	float:left;
}
#tl_r{
	width:702px; 
	height:103px;
	background:none;
	float:right;
	display:inline;
}
#tl_r_l{
	width:22px;
	height:82px;
	background:url('/images/top/t_l.jpg') no-repeat;
	float:left;
}
#tl_r_r{
	width:20px;
	height:83px;
	background:url('/images/top/t_r.jpg') no-repeat;
	float:right;
	display: inline;
}
#tl_r_c{
	width:702px;
	height:103px;
	float:left;
}
.me_hh{
	width:2px; 
	height:14px;
	margin-top:8px; 
	margin-left:5px;
	padding-right:5px;
	background:url(/images/bbs/hr_t.jpg) no-repeat; 
	font-size:0px; 
	border:0px solid red; 
	line-height:0px;
	float:left;
	display:Inline;
}
#menu_ctb{
	width:970px;
	height:33px;
}
#menu_left{
	width:3px;
	height:33px;
	background:url(/images/top/l_pg.jpg) no-repeat;
	float:left;
}
#menu_center{
	width:964px;
	height:31px;
	overflow:hidden;
	line-height:31px;
	border-top:1px solid #E0E0E0;
	border-bottom:1px solid #E0E0E0;
	background:#F5F5F5;
	float:left;
	display:inline;
}
#menu_right{
	width:3px;
	height:33px;
	background:url(/images/top/r_pg.jpg) no-repeat;
	float:left;
}
#top_menu{
	margin-top:5px;
}
#me_in{
	width:150px; 
	height:20px; 
	margin-top:3px; 
	font-size:12px; 
	overflow:hidden; 
	float:right; 
	display:inline;
}
#me_btn{
	width:47px; 
	height:20px; 
	margin-left:4px; 
	margin-top:5px; 
	background:url(/images/top/btn.jpg) no-repeat; 
	border:0px solid red; 
	float:right; 
	display:inline;
	}
.xiaoxi{
	height:16px;
	margin-top:7px;
	font-size:12px;
	line-height:16px;
	font-weight:bold;
	text-align:center;
	float:right;
	display:inline;
}
.xiaoxi a{
	font-size:12px;
	color:#FE6E0E;
	font-weight:bold;
	text-decoration: none;
}
.exit a{
	font-size:12px;
	color:#FE6E0E;
	font-weight:bold;
	text-decoration: none;
}
.exit{
	height:16px;
	margin-top:7px;
	font-size:12px;
	line-height:16px;
	font-weight:bold;
	text-align:center;
	float:right;
	display:inline;
}
</style>
<div id="top_login">
		<div id="tl_l" style="height: 83px; margin-top:10px;"></div>
		<div id="tl_r">
			<!-- <div id="tl_r_l"></div><div id="tl_r_r"></div> background:url('/images/top/t_c.jpg') repeat-x;-->
			<div id="tl_r_c">
			</div>
			
		</div>
	</div>
	<div id="top_menu" style="height:33px;">
			<div id="menu_left"></div>
			<div id="menu_center">
				<div id="menu_ctb" style="line-height: 33px;">
						<?php
						$i = 0;
						foreach ($news_list as $key => $list){
						?>
						<a href="<?php echo $key?>" style="<?php if($i == 0){ echo 'margin-left:10px;';}?> font-size:12px; font-weight:bold; color:#000000; text-decoration:none; float:left;"><?php echo $list;?></a>
						<?php if(count($news_list)-1 != $i){ ?>
						<div class="me_hh"></div>
						<?php }
						$i++;
						} 
						?>
						<div id="test_result" style="width:450px; height:30px; overflow:hidden; float:right; display: inline;"></div>
					</div>
			</div>
			<div id="menu_right"></div>
	</div>