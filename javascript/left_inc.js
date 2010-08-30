$(function(){
	$.post('_login.php',function(data){
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
	document.onkeydown = function(e){ 
		var ev = document.all ? window.event : e;
	    if(ev.keyCode==13 || ev.ctrlKey) {
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
	  };
});