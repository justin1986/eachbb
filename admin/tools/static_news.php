<?php
   	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		use_jquery_ui();
	?>
</head>
<body>
	<div>
		<p>选择日期</p>
		<p><div>开始时间</div><input type="text" class="date_jquery" id="start"></p>
		<p><div>结束时间</div><input type="text" class="date_jquery" id="end"></p>
		<p><input type="button" id="static" value="点击静态"></p>
		<p id="text"></p>
	</div>
</body>
</html>

<script>
	$(function(){
		$(".date_jquery").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
			dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dayNamesMin:["日","一","二","三","四","五","六"],
			dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dateFormat: 'yy-mm-dd'
		});
		
		$("#static").click(function(){
			$.post('static_all_news.php',{'start':$("#start").val(),'end':$("#end").val()},function(data){
				$("#text").html(data);
			});
		});
	});
</script>