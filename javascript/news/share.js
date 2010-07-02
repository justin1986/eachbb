$(function(){
	$('#add').click(function(){
		var str = '<div class="share_line">'
				+'	<div class="share_mail"><span>好友邮件：</span><input name="mail[]" type="text"></div>'
				+'	<div class="share_name"><span>好友昵称：</span><input name="name[]" type="text"></div>'
				+'</div>';
		$(this).parent().before(str);
	});
	
	$('#share_submit').click(function(){
		$('.share_mail input').each(function(){
			var mail = $(this).val();
			if(mail.length > 0 && !is_email(mail)){
				alert('邮件格式不正确，请检查');
				$(this).focus();
				return false;
			}
		});
		$('form').submit();
	});
});