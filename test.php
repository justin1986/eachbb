<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>New Document</title>
<style>
#TopAD{width:970px; height:240px; background:url(images/TopAD.jpg); padding:10px;}
h2{padding:15px 10px 5px 10px; margin:0;}
#TopAD h2 a{
	padding-left:10px;
	color:#fff;
	font-size:24px;
	line-height:1.3em;
	text-decoration: none;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
#TopAD .AdDate{
	display:block;
	margin-left:7px;
	clear:both;
	width:450px;
	color:#f2163f;
	font-size:11px;
	padding:0 15px;
	font-family: Arial, Helvetica, sans-serif;
}
#TopAD .Adbody {
	width:450px;
	height:120px;
	clear:both;
	margin-top:15px;
	margin-left:8px;
	padding:0 15px;}
 
#TopAD .Adbody a{	
	font-size:13px;	
	color:#c6c6c6;	
	text-decoration: none;
	line-height:1.7em;
}
#TopAD .TopAdleft{float:left; width:500px;}
#TopAD .TopAdright{float:right; width:340px; height:215px; margin-top:13px; margin-right:81px;}
 
 
#TopAD .link {padding-left:25px; margin-top:15px; width:500px; height:20px;}
#TopAD .link ul {
	padding:0;
	margin:0;
	list-style-type: none;
	display: block;
	padding-top:1px;
}
#TopAD .link ul li {
	width: 14px;
	height: 14px;
	float: left;
	display: block;
	color: #fff;
	text-align: center;
	margin: 1px;
	cursor: pointer;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
#TopAD .link ul li.on {
	background: #fff;
	color: #000;
}
#TopAD .link ul li.off {
	background: #111;
	color: #fff;
}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script type="text/javascript">
$(function(){
	var timer;
	var img = -1;
	//輪播停留時間
	var speed = 10000;
 
	//淡入淡出時間　
	var fOut = 500, fIn = 1000;
	var myImages = $(".list a");	
	$("#TopAD").slideDown();
 
	$(".link").append("<ul />");
	for(var i=1;i<=myImages.length;i++){
		$(".link ul").append("<li>"+i+"</li>");
	}
 
	//滑鼠點選頁籤切換
	$(".link li").click(function(){
		var idx = $(this).text() - 1;
		img = idx;
		//抓索引值
		var _link = myImages.eq(idx);
		//取得連結、標題、內文、日期...
		var adlink=_link.attr("href");
		var adtitle=_link.find("img").attr("title");
		var addate=_link.find("img").attr("rel");
		var adbody=_link.find("img").attr("alt");
		var adsrc=_link.find("img").attr("src");
		var adlink=_link.attr("href");
		var adtarget=_link.attr("target");
 
		/*淡入淡出效果*/
		$(".TopAdleft > *:not(.link)").fadeOut(fOut, function(){
			$(".TopAdleft h2").find("a").attr({
				href: adlink,
				target: adtarget
			});
			$(".TopAdleft h2 a").html(adtitle);
			//post by minwt on←自可更換成張貼者的作者名稱 
			$(".TopAdleft .AdDate").html("Post by Minwt on"+addate);
 
			$(".TopAdleft .Adbody a").html(adbody);
			$(".TopAdleft .Adbody").find("a").attr({
				href: adlink,
				target: adtarget
			});
		}).fadeIn(fIn);
		$(".TopAdright").fadeOut(fOut, function(){
			$(".TopAdright").find("a").attr({
				href: adlink,
				target: adtarget
			});
			$(".TopAdright").find("img").attr("src",adsrc);
		}).fadeIn(fIn);	
 
		$(this).removeClass("off").addClass("on")
			.siblings().removeClass("on").addClass("off");		
	});
 
	//當滑鼠滑入區塊停止自動播放
	$("#TopAD").hover(function(){
		clearTimeout(timer);
	}, function(){
		timer = setTimeout(autoShow, speed);
	});
 
	//自動輪播
	function autoShow(){
		img = (img+1<myImages.length) ? img+1 : 0;
		$(".link li").eq(img).click();
		timer = setTimeout(autoShow, speed);
	}
 
	//啟動自動輪播
	autoShow();	
});
</script>
</head>
<body>
<div id="minwt_StartMneuBar">
  <div id="TopAD">
	<div class="TopAdleft">
        <h2><a href="#"></a></h2>
        <span class="AdDate"></span>
        <div class="Adbody"><a href="#"></a></div>
        <div class="link"></div>
    </div>
      <div class="TopAdright"><a href="#"><img src="" border="0"/></a></div>     
</div>
<!-- 廣告顯示區塊 結束-->
 
<!--　廣告素材資料 開始-->
<div class="list" style="display:none;">
    <a href="http://www.minwt.com"><img src="images/AD01.jpg" title="iSing99愛唱久久" alt="KTV唱一天，iSing99歡唱一整年" rel="2009-12-03"/></a>
    <a href="http://www.minwt.com"><img src="images/AD02.jpg" title="瑪莎拉帝" alt="極致品味，享受奔馳快感"  rel="2009-12-04"/></a>
    <a href="http://www.minwt.com"><img src="images/AD03.jpg" title="Jenova時尚眼影" alt="今夏最夯的眼影款都在Jenova" rel="2009-12-05"/></a> 
</div>
<!--　廣告素材資料 結束-->
</body>
</html>
