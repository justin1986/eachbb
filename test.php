<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>New Document</title>
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    (function(){
        $("#play_list").css("opacity","0.3"); //设置透明度
        $("#play_list").children().clone().appendTo("#selector"); //复制元素
        $("#selector").css({
            left:$("#play_list").offset().left,
            top:$("#play_list").offset().top
        }); //定位选择器
        $("#selector").scrollLeft(0); //回到第一帧
    })();

    var $intervalID = null
    $("#play_list a").mouseover(function(){
        clearInterval();
        var $move = $(this).offset().left - $(this).parent().offset().left; //目标滑动位置
        var $left = $("#play_list").offset().left + $move; //目标左边距位置
        var $m =$("#selector").scrollLeft(); //现滑动位置
        var $l = parseInt($("#selector").css("left")); //现左边距位置
        var $direct = ($l < $left)?1:-1; //滑动方向
        var $multiple = ($left - $l ) *$direct / 12; //倍数
        $intervalID = window.setInterval(function(){
            $l+=$multiple*$direct;
            $m+=$multiple*$direct;
            if($l *$direct < $left*$direct){
                $("#selector").css("left",$l).scrollLeft($m);
            }else{
                $("#selector").css("left",$left).scrollLeft($move);
                clearInterval();
            }
        }, 1); 
    });

    //清除前面的动画效果
    function clearInterval(){
        if($intervalID != null){
            window.clearInterval($intervalID);
            $intervalID = null;
        }
    }
})
</script>
<style>
a {
	text-decoration: none;
}

#selector img,#play_list img {
	width: 120px;
	border: 1px;
}
</style>
</head>
<body>
<div id="selector"
	style="overflow: hidden; width: 120px; white-space: nowrap; position: absolute; Z-index: 100"></div>
<br>
<br>
<br>
<br>
<br>
<br>
<div id="play_list"><a href="http://koyoz.com/1.jpg"> <img
	src="http://www.koyoz.com/demo/html/autoplay_xunlei/imgs/1.jpg"
	alt="相恋9年尔冬升再婚娶相恋9年女友" /> </a> <a href="http://koyoz.com/2.jpg"> <img
	src="http://www.koyoz.com/demo/html/autoplay_xunlei/imgs/2.jpg"
	alt="恋情变贤周海媚公开6年恋情变贤妇" /> </a> <a href="http://koyoz.com/3.jpg"> <img
	src="http://www.koyoz.com/demo/html/autoplay_xunlei/imgs/3.jpg"
	alt="为啥这么“熊猫”阿宝为啥这么红？" /> </a>
</div>
</body>
</html>
