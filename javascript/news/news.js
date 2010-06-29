$(function(){
	$.post('/news/get_comments.ajax.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
	$('.a_comment_up').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		var up_num = $(this).find('.span_up_num').html();
		var $this = $(this);		
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"up","num":up_num},function(comment){
			$(this).removeAttr("class");
			$this.attr('href',"#");
			if(comment_id=="#"){
			alert("对不起！您已支持！");
			}
			$this.find('.span_up_num').html(comment);
		});
	});
	$('.a_comment_down').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		var down_num = $(this).find('.span_down_num').html();
		var $this = $(this);
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"down","num":down_num},function(comment){
			$(this).removeAttr("class");
			$this.attr('href',"#");
			if(comment_id=="#"){
			alert("对不起！您已反对！");
			}
			$this.find('.span_down_num').html(comment);
		});
	});
});

