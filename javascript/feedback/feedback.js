$(function(){
	$.post('/feedback/feedback_comment.php',function(feedback){
		$("#res").html(feedback);
	});
	$('.a_comment_up').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		comment_id=comment_id.substring(comment_id.lastIndexOf('/')+1,comment_id.length);
		var $this = $(this);		
		$.post('/feedback/feedback.post.php',{"id":comment_id,"type":"up"},function(comment){
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
		$.post('/feedback/feedback.post.php',{"id":comment_id,"type":"down","num":down_num},function(comment){
			$this.attr('class','a_clicked');
			$this.find('.span_down_num').html(comment);
		});
	});
	$("#but").click(function(){
		var comment = $(this).parent().find('textarea').val();
		if(comment.length >2000){
			alert('请不要超过2000个字符');
			return;
		}
		if(comment.length == 0){
			alert('请输入评论内容!');
			return;
		}
		$.post('/feedback/feedback.post.php',{'type':'comment','comment':encodeURI(comment)},function(data){
			if(data)
			{
				alert(data);	
			}
			else
			{
				$('#res').load('/feedback/feedback_comment.php');	
			}
		});
	});
	$(".c_p_b").mouseover(function(){
		$(".c_p_b").attr('class','c_p_b');
		$(this).addClass('selected');
	});
});