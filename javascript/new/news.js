$(function(){
	$.post('news_fun.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
});
