$(function(){
	$.post('_assistant_login.php',function(data){
		$('#individual').html(data);
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
	  }  
	
	
	$('#assisnt_exit').live('click',function(){
		if(confirm("您确认要退出吗？")){
			window.open('/assistant');
		}
	});
});
