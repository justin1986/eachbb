$(function(){
	$.post('/assistant/get_comments.ajax.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
	$('.a_comment_up').live('click',function(e){
		
		e.preventDefault();
		var comment_id = $(this).attr('href');
		comment_id = comment_id.substring(comment_id.lastIndexOf('/')+1,comment_id.length);
		var $this = $(this);
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"up"},function(comment){
			$this.attr('class','a_clicked');
			$this.find('.span_up_num').html(comment);
		});
	});
	$('.a_comment_down').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		comment_id=comment_id.substring(comment_id.lastIndexOf('/')+1,comment_id.length);
		var down_num = $(this).find('.span_down_num').html();
		var $this = $(this);
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"down","num":down_num},function(comment){
			$this.attr('class','a_clicked');
			$this.find('.span_down_num').html(comment);
		});
	});
	$('.ttc_a').hover(function(e){
	e.preventDefault();
	var selected = $('.ttc_a').index($(this));
	for(var i = 0; i < 5; i++){
		if(i == selected){
			continue;
		}
		$('.ttc_a').attr('style','background:#A9D780;');
	}
	$(this).attr('style','background:#95D171');
	},function(){});
	
	$("#button_age").click(function(){
		window.location.href = 'list.php?type=age';
	});
	$("#button_cate").click(function(){
		window.location.href = 'list.php?type=cate';
	});
})