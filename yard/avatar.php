<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子--测试版</title>
	<link href="/css/top_inc/avatar.css"  rel="stylesheet" type="text/css"/>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('avatar');
		js_include_tag('yard/yard');
		$db=get_db();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="user">
	<div id="user_ma">
	<div id="user_ma_s"><font size="2" color="red" ><b>个人信息管理</b></font></div>
	<div id="user_ma_b"></div>
	<div id="user_ma_h"><div style="float:left"><img src="/images/avatar/user_ma_h.png" ></img></div><div style="float:left;margin-left:3px;"><font size="2"><b>564828</b></font></div></div>
	<div class="user_b">
	<div class="user_b_t"><img src="/images/avatar/apoint.png"></img><font size="2" style="margin-left:5px;">您有</font><a href="talk.php"><font size="2" color="red" >0</font></a><font size="2" >条新评论</font></div>
	<div class="user_b_t"><img src="/images/avatar/apoint.png"></img><a href="myblog.php"><font size="2" color="black" style="margin-left:5px;">我的博客</font></a></div></div>
	</div>
	<div id="user_me">
	<div id="user_me_top"></div>
	<div id="user_me_center">
		<div id="user_me_middle">
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>用户信息</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="welcome.php"><font size="2" color="black">欢迎页</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="welcome.php"><font size="2" color="black">基本信息</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="message.php"><font size="2" color="black">会员信息</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="message.php"><font size="2" color="black">密码设置修改</font></a></div>
			</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>订单信息</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">最新订单</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">我到订单</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">订单发货查询</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">往期订单查询</font></a></div>
			</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>测评报告</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">最新测评</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">我的测评</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">测评查询</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">测评历史查询</font></a></div>
			</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>订购课程</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">最新课程</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">我的课程</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">课程查询</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">课程历史查询</font></a></div>
			</div>
			</div>
			<div id="user_me_o"><img src="/images/avatar/bpoint.png"></img><a href="edit.php"><font size="2" color="black">[退出 ]</font></a></div>
		</div>
	</div>
	<div id="user_me_bottom"></div>
	</div>
	<div id="user_ad"><a href="4thblog.php"><img src="/images/avatar/user_ad.png" border="0"></img></a></div>
    </div>
    
     <div id="right">
     <div id="right_up">
     <div ><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>基本</b></font><font size="2" color="red"><b>信息</b></font></div>
     <div class="line1" ><hr color="#A3C1CD" width=100%; size="2" /></div>
     <div id="head">
			<div id="head_b">
			<div id="head_t">
			<font size="5" style="padding-left:3px;">更新头像</font>
			<div style="margin-top:5px;"><a href="up_photo.php"><img src="/images/avatar/cc_h_u.png" border="0"></a></div>
			</div>
			</div>
			
		    <div style="margin-top:5px;"><a href="up_photo.php"><font size="2" color="black">[更新头像    </font></a><a href="up_photo.php"><font size="2" color="black" style="border-bottom:1px #000000 solid;">照片]</font></a></div>
			<div style="margin-left:20px;margin-top:5px;color:#8A7777;"><font size="3" ><B>我的头像库</B></font><font size="2" >(</font><a href="up_photo.php"><font size="2" color="red">0</font></a><font size="2" >张)</font>
			<font size="2" ></font><a href="up_photo.php"><font size="2" color="red" style="margin-left:30px;">[选择头像]</font></a><font size="2" ></font><a href="up_photo.php"><font size="2" color="red" >[上传头像]</font></a>
			</div>
			<div id="head_a"><hr color="#A3C1CD" width=100%; size="2" /></div>
			        <a href="photo.php"><img src="/images/avatar/photo.png" style="margin-left:3px;margin-top:5px;float:left;"border="0"></img></a>
			        <a href="photo.php"><img src="/images/avatar/photo.png" class="head_i" border="0"></img></a>
					<a href="photo.php"><img src="/images/avatar/photo.png" class="head_i" border="0"></img></a>
					
	</div>
	
	<div id="right_up_right">
	<div class="record">
	<div ><font size="2" color="red"><b>用户最新动态</b></font></div>
	<div class="add"><hr color="#A3C1CD" width=100%; size="4" /></div>
	<div class="text" style="margin-top:5px;"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	</div>
	<div class="record">
	<div ><font size="2" color="red"><b>重要信息提醒</b></font></div>
	<div class="add"><hr color="#A3C1CD" width=100%; size="4" /></div>
	<div class="text" style="margin-top:5px;"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
	</div>
	<div id="mother"><a href="4th_mother.php"><img src="/images/avatar/mother.png" border="0"></img></a></div>
	</div>
    </div>
    <div id="right_bottom">
    
    <div class="txt">
    <div><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>测评</b></font><font size="2" color="red"><b>报告</b></font></div>
    <div class="line1"><hr color="#F5F5F5" width=100%; size="2" /></div> <div class="line2"><hr color="#F5F5F5" width=760px; size="1" /></div>
    <div class="att"><div style="float:left"><a href="milk.php"><img src="/images/avatar/milk.png" border="0"></img></a></div>
    <div class="left"style="margin-left:10px;"><div class="left" style="margin-top:10px;"><a href="baby.php"><font size="2" color="black"><b>如何为新生儿选合适奶粉</b></font></a></div>
    <div class="left" style="margin-top:8px;"><a href="baby.php"><font size="2px" color="black" >怎样为婴儿宝宝选择一款奶粉呢？光看包装是看不到区别的，细心的爸妈要动用各种方法从细节入手，为宝宝选择合适的奶粉。</font></a></div></div></div>
    <div class="text1" style="margin-top:5px;"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div>    
    <div class="text1"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div>
    <div class="text1"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div> </div>
    
    <div class="txt">
    <div><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>订购</b></font><font size="2" color="red"><b>课程</b></font></div>
   <div class="line1"><hr color="#F5F5F5" width=100%; size="2" /></div> <div class="line2"><hr color="#F5F5F5" width=760px; size="1" /></div>
    <div class="att"><div style="float:left"><a href="milk.php"><img src="/images/avatar/think.png" border="0"></img></a></div>
    <div class="text2" style="padding-top:0px;"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div>    
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div>
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div>
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div>
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a><img src="/images/avatar/smallpoint.png" style="margin-left:50px;"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食</font></a></div></div> </div>
   
    <div class="txt">
    <div><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><B>我家</B></font><font size="2" color="red"><b>小院子</b></font></div>
    <div class="line1"><hr color="#F5F5F5" width=100%; size="2" /></div> <div class="line2"><hr color="#F5F5F5" width=760px; size="1" /></div>
    <div class="att"><div style="float:left"><a href="milk.php"><img src="/images/avatar/yard.png" border="0"></img></a></div>
    <div class="text2" style="padding-top:0px;"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食选购得当，宝宝也能吃零食选购</font></a></div>    
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食选购得当，宝宝也能吃零食选购</font></a></div>
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食选购得当，宝宝也能吃零食选购</font></a></div>
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食选购得当，宝宝也能吃零食选购</font></a></div>
    <div class="text2"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2" >选购得当，宝宝也能吃零食选购得当，宝宝也能吃零食选购</font></a></div>
    <div id="inyard"><a href="milk.php"><img src="/images/avatar/inyard.png" border="0" ></img></a></div></div> </div>
   
    </div>
    
		
</div>
        <div id="bottom_l"><hr color="#FB6104" width="100%" size="2" /></div>
        

        
        <div id="bottom">关于网趣宝贝 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">Copyright &c 1997-2010 HAHA.smg.com All Rights Reserved.</div>
</div>
      

</body>
</html>

