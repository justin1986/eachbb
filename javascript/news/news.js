$(function(){
	$.post('/news/get_comments.ajax.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
	
});

