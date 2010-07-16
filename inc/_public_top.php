<?php 
	include_once('../frame.php');
	set_charset('utf-8');
?>
<style>
#top_login{
	width:970px;
	height:83px;
}
#tl_l{
	width:227px;
	height: 83px;
	background:url('/images/top/logon.jpg') no-repeat;
	float:left;
}
#tl_r{
	width:720px; 
	height:83px;
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
	width:678px;
	height:83px;
	background:url('/images/top/t_c.jpg') repeat-x;
	float:left;
}
.me_hh{
	width:3px; 
	height:14px;
	margin-left:2px;
	margin-top:8px; 
	margin-right:2px; 
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
	margin-left:14px; 
	margin-top:3px; 
	font-size:12px; 
	overflow:hidden; 
	float:right; 
	display:inline;
}
#me_btn{width:47px; height:20px; margin-left:4px; margin-top:5px; background:url(/images/top/btn.jpg) no-repeat; border:0px solid red; float:right; display:inline;}
.xiaoxi{
	width:70px;
	height:13px;
	margin-top:10px;
	font-size:12px;
	line-height:13px;
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
	width:50px;
	height:13px;
	margin-top:10px;
	font-size:12px;
	line-height:13px;
	font-weight:bold;
	text-align:center;
	float:right;
	display:inline;
}

</style>
<div id="top_login">
		<div id="tl_l"></div>
		<div id="tl_r">
			<div id="tl_r_l"></div>
			<div id="tl_r_c"></div>
			<div id="tl_r_r"></div>
		</div>
	</div>
	<div id="top_menu" style="height:33px;">
			<div id="menu_left"></div>
			<div id="menu_center">
				<div id="menu_ctb" style="line-height: 33px;">
						<?php
						$i = 0;
						foreach ($news_list as $list){
						?>
						<a href="#" style="<?php if($i == 0){ echo 'margin-left:10px;';}?> font-size:12px; font-weight:bold; color:#000000; text-decoration:none; float:left;"><?php echo $list;?></a>
						<div class="me_hh"></div>
						<?php 
						$i++;
						} 
						?>
						<div class="xiaoxi" style="margin-top:9px; margin-right:5px;">消息<a href="#" style="color:#FE6E0E;">（1）</a></div>
						<div class="exit" style="border-left:2px solid #949494; border-right:2px solid #949494;"><a href="#" style="color:#000000;">退出</a></div>
						<div class="xiaoxi" style="width:80px;">欢迎，<a href="#" style="color:#FE6E0E;">1244</a></div>
						<input type="button" id="me_btn" >
						<input type="text" id="me_in" style="height:18px;"/>
					</div>
			</div>
			<div id="menu_right"></div>
	</div>