

$(function(e){
	$("#zsubmit").click(function(){
		if($("#old_password").val()==''){
			alert('当前密码不能为空');
			return false;
		}
		if($("#new_password").val()==''){
			alert('新密码不能为空');
			return false;
		}
 	    if($("#new_password").val().length<4){
			alert('新密码太短');
			return false;
		}
        if($("#new_password").val().length>20){
			alert('新密码太长');
			return false;
		}
        if(!isNumberOrLetter2($("#new_password").val())){
            alert('含有非法字符');
            return false;
        }
        if($("#re_new_password").val()==''){
			alert('确认密码不能为空');
			return false;
		}
        if($("#new_password").val() != $("#re_new_password").val()){
            alert('确认密码输入不一致');
            return false;
        }
		$("form").submit();
	});
	document.onkeydown = function(e){ 
	    var ev = document.all ? window.event : e;
	    if(ev.keyCode==13 || ev.ctrlKey) {
	    	if($("#old_password").val()==''){
				alert('当前密码不能为空');
				return false;
			}
			if($("#new_password").val()==''){
				alert('新密码不能为空');
				return false;
			}
            if($("#new_password").val().length<4){
			alert('新密码太短');
			return false;
		    }
            if($("#new_password").val().length>20){
			alert('新密码太长');
			return false;
		    }
            if(!isNumberOrLetter2($("#new_password").val())){
            alert('含有非法字符');
            return false;
            }
            if($("#re_new_password").val()==''){
				alert('确认密码不能为空');
				return false;
			}
             if($("#new_password").val() != $("#re_new_password").val()){
            alert('确认密码输入不一致');
               return false;
            }
			$("form").submit();
	    }
	  }  
});


function isNumberOrLetter2(s){//判断是否是数字或字母及少量特殊符号
	var regu = "^[0-9a-zA-Z.!@#$%^&*]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}


