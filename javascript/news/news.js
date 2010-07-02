$(function(){
	$.post('/news/get_comments.ajax.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
	$('.a_comment_up').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		var up_num = $(this).find('.span_up_num').html();
	});
});

