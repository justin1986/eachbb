$(function(e){
	$("#login_bn").click(function(){
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
	    if(ev.keyCode==13 ) {
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
	  }  
});
