$(function(){
	$.post('/news/get_comments.ajax.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
	$('.a_comment_up').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		var $this = $(this);		
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"up"},function(comment){
			$this.attr('class','a_clicked');
			$this.find('.span_up_num').html(comment);
		});
	});
	$('.a_comment_down').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		var down_num = $(this).find('.span_down_num').html();
		var $this = $(this);
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"down","num":down_num},function(comment){
			$this.attr('class','a_clicked');
			$this.find('.span_down_num').html(comment);
		});
	});
	
	$('.a_clicked').live('click',function(e){
		e.preventDefault();
		alert('请不要重复提交！');
	});
});

