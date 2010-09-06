$(function(){
	$.post('/test/_login.php',function(data){
		$('#l_pho').html(data);
	});
	$("#login_bn").live('click',function(){
		if($("#name").val()==''){
			alert('请输入用户名');
			return false;
		}
		if($("#password").val()==''){
			alert('请输入密码');
			return false;
		}
		$("form").submit();
	});
	
	$('#name').live('keypress',function(e){
		if(e.keyCode == 13){
			$('#password').focus();
		}
	});
	
	$('#password').live('keypress',function(e){
		if(e.keyCode == 13){
			if($("#name").val()==''){
				alert('请输入用户名');
				return false;
			}
			if($("#password").val()==''){
				alert('请输入密码');
				return false;
			}
			$("form").submit();
		}
	});
	
});