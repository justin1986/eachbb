<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		$user = User::current_user();
		js_include_tag('yard/query_friend_list');
		if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
		}
	?>
</head>
<body>
<div id="friend_banner">
	<div id="friend_title">查询好友</div>
	<form action="friend_query_list.php" method="post">
	<div id="friend_where">
		用户名：<input type="text" id="nike_name" name="nike_name" />
		邮箱：<input type="text" id="email" name="email" />
		地址：<input type="text" id="address" name="address"/>
		<div id="friend_btn" >查  询</div>
	</div>
	</form>
	<div id="friend_value"></div>
</div>
</body>
<style>
#friend_banner{width:850px; float:left; display:inline;}
#friend_title{width:840px; height:30px; padding-left:10px; background:#A8C783; line-height:30px; font-size:14px; font-weight:bold; float:left; display:inline;}
#friend_where{width:840px; height:35px; margin-top:20px; padding-left:10px; line-height:10px; font-size:14px; float:left; display:inline;}
#friend_btn{width:100px; height:35px; border:0px solid red;  cursor:pointer;  text-align:center; line-height:30px; background:url(/images/assistant_list/btn_1.jpg) no-repeat; float:right; display: inline;}
#friend_value{width:850px; margin-top:20px; float:left; display:inline;}
.friend_result_banner{width:850px; float:left; display:inline;}
.friend_img{width:80px; height:80px; padding:10px;}
.friend_result_title{width:840px; height:24px; padding-left:10px;  background:#E5F3CD; line-height:24px; float:left; display:inline;}
.friend_img img{width:80px; height:80px; border:0px solid red;}
.friend_nike_name{width:700px; height:100px; line-height:100px; font-size:14px; float:right; display:inline;}
.friend_nike_name a{padding-right:70px;float:right; display:inline;} 
</style>
</html>
