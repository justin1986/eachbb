$(function(){
	$.post('/news/get_comments.ajax.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
});

$(".up").live('click',function(e){
	$.post('/news/ajax.post.php',{"type":"up"},function(type){
	$(".up font").html(type);
	});
	e.preventDefault();
});