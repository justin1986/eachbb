$(function(){
	$("#u_r").click(function(){
		change_verify();
	});
	
	$("#get_pwd").click(function(){
		if(!check_name()){
			return false;
		}
		
		if(!check_email()){
			return false;
		}
		
		form_submit();
	});
	
	$("#getpwd").click(function(){
		if(!check_password()){
			return false;
		}
		$("form").submit();
	});
});


function change_verify(){
	$("#verify_img").attr('src','/inc/verify.php?name=get_pwd&reload='+Math.round(Math.random()*10000));
}

function check_name(){
	var name = $("#name").val();
	if(name!=''){
		if(name.length<4){
			alert('用户名太短');
			return false;
		}
		if(name.length>20){
			alert('用户名太长');
			return false;
		}
		if(!isNumberOrLetter(name)){
			alert('用户名不能含有特殊字符');
			return false;
		}
		return true;
	}else{
		alert('用户名不能为空');
		return false;
	}
}

function check_email(){
	var email = $("#email").val();
	if(email!=''){
		if(email.length<4){
			alert('邮箱太短');
			return false;
		}
		if(email.length>40){
			alert('邮箱太长');
			return false;
		}
		if(!isEmail(email)){
			alert('邮箱格式不对');
			return false;
		}
		return true;
	}else{
		alert('邮箱不能为空');
		return false;
	}
}

function check_password(){
	var password = $("#password1").val();
	var password2 = $("#password2").val();
	if(password==''){
		alert('请输入新密码！');
		return false;
	}
	if(password.length<4){
		alert('新密码太短！');
		return false;
	}
	if(password.length>20){
		alert('新密码太长！');
		return false;
	}
	if(!isNumberOrLetter2(password)){
		alert('新密码含有特殊字符!');
		return false;
	}
	if(password!=password2){
		alert('请2次输入相同密码！');
		return false;
	}
	return true;
}

function form_submit(){
	if($("#verify_text").val()==''){
		alert('验证码不能为空');
		return false;
	}else{
		$.post('check_verify.php', {
			'verify': $("#verify_text").val()
		}, function(result){
			if (result == 'wrong') {
				change_verify();
				alert('验证码错误');
			}
			else {
				$("form").submit();
			}
		});
	}
}


function isNumberOrLetter(s){//判断是否是数字或字母 
	var regu = "^[0-9a-zA-Z]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}

function isNumberOrLetter2(s){//判断是否是数字或字母及少量特殊符号
	var regu = "^[0-9a-zA-Z.!@#$%^&*]+$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
	}
}


function isEmail(str){ 
	var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; 
	if(myReg.test(str)) return true; 
	return false; 
}