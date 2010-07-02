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
	
	$('#a_print').click(function(e){
		e.preventDefault();
		window.print();
	});
	
	$('#a_collect').click(function(e){
		e.preventDefault();
		$.post('ajax.post.php',{'type':'collect','news_id': $('#newsid').val()},function(d){
			alert(d);
		});
	});
	
	$('#div_btn_comment').click(function(){
		if($('#div_write_comment').css('display')!='none') return;
		if(!$.cookie('cache_name')){
			alert('请先登录!');
			return;
		}
		$('#div_write_comment').show();
	});
	
	$('#submit_comment').click(function(){
		var comment = $(this).parent().find('textarea').val();
		if(comment.length >1000){
			alert('请不要超过1000个字符');
			return;
		}
		if(comment.length == 0){
			alert('请输入评论内容!');
			return;
		}
		$.post('/news/ajax.post.php',{'type':'comment','comment':encodeURI(comment),'news_id':$('#newsid').val()},function(d){
			if(d){
				alert(d);
			}else{
				$('#res').load('/news/get_comments.ajax.php?id=' + $('#newsid').val());
			}
		});
	});
});

