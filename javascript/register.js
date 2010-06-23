$(function(){
	birthday_display();
	
	$("#cad_v").click(function(){
		change_verify();
	});
	
	$("#baby_status").change(function(){
		birthday_display();
	});
	
	$("#name").change(function(){
		check_name(false);
	});
	
	$("#email").change(function(){
		check_email(false);
	});
	
	$("#password").change(function(){
		check_password(false);
	});
	
	$("#re_password").change(function(){
		check_re_password(false);
	});
	
	$("#baby_birthday2").change(function(){
		check_babybirthday();
	});
	
	$("#birthday").change(function(){
		check_birthday();
	});
	
	$("#phone").change(function(){
		check_phone();
	});
	
	$("#address").change(function(){
		check_address();
	});
	
	$("#zip").change(function(){
		check_zip();
	});
	
	$("#verify").change(function(){
		check_verify();
	});
	
	$("#birthday,#baby_birthday2").datepicker(
	{
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	});
});

function change_verify(){
	$("#validate img").attr('src','/inc/verify.php?name=register&reload='+Math.round(Math.random()*10000));
}


function birthday_display(){
	if($("#baby_status").val()==1){
		$("#baby_birthday").text('宝宝生日');
		$("#baby_birthday").parent().show();
	}else if($("#baby_status").val()==3){
		$("#baby_birthday").text('宝宝预产期');
		$("#baby_birthday").parent().show();
	}else{
		$("#baby_birthday").parent().hide();
	}
}

function check_name(is_submit){
	var name = $("#name").val();
	if(name!=''){
		if(name.length<4){
			$("#name_info").html('<span style=color:red>用户名太短</span>');
			return false;
		}
		if(name.length>20){
			$("#name_info").html('<span style=color:red>用户名太长</span>');
			return false;
		}
		if(!isNumberOrLetter(name)){
			$("#name_info").html('<span style=color:red>用户名不能含有特殊字符</span>');
			return false;
		}
		$.post('check_name.php',{'name':name},function(data){
			if(data>0){
				$("#name_info").html('<span style=color:red>用户名已存在</span>');
				return false;
			}else{
				$("#name_info").html('<span style=color:green>用户名可以使用</span>');
				return true;
			}
		});
	}else{
		if(is_submit){
			alert('请输入用户名！');
			return false;
		}else{
			$("#name_info").text('4-20位，包含英文大小字母和数字组成');
		}
	}
}

function check_email(is_submit){
	var email = $("#email").val();
	if(email!=''){
		if(email.length<4){
			$("#email_info").html('<span style=color:red>邮箱太短</span>');
			return false;
		}
		if(email.length>20){
			$("#email_info").html('<span style=color:red>邮箱太长</span>');
			return false;
		}
		if(!isEmail(email)){
			$("#email_info").html('<span style=color:red>邮箱格式不对</span>');
			return false;
		}
		$.post('check_email.php',{'email':email},function(data){
			if(data>0){
				$("#email_info").html('<span style=color:red>邮箱已存在</span>');
				return false;
			}else{
				$("#email_info").html('<span style=color:green>邮箱可以使用</span>');
				return true;
			}
		});
	}else{
		if(is_submit){
			alert('请输入邮箱地址！');
			return false;
		}else{
			$("#email_info").text('邮箱作为您找回密码的唯一凭证，请填写真实有效邮箱地址并妥善保管！');
		}
	}
}

function check_password(is_submit){
	var password = $("#password").val();
	var re_password = $("#re_password").val();
	if(password!=''){
		if(password.length<4){
			$("#password_info").html('<span style=color:red>密码太短</span>');
			return false;
		}
		if(password.length>20){
			$("#password_info").html('<span style=color:red>密码太长</span>');
			return false;
		}
		if(!isNumberOrLetter2(password)){
			$("#password_info").html('<span style=color:red>密码还有非法字符</span>');
			return false;
		}
		if (re_password != '') {
			if (password != re_password) {
				$("#re_password_info").html('<span style=color:red>请2次输入相同密码</span>');
				return false;
			}
			else {
				$("#re_password_info").html('<span style=color:green>输入一致</span>');
				$("#password_info").html('<span style=color:green>密码可以使用</span>');
				return true;
			}
		}else{
			$("#password_info").html('<span style=color:green>密码可以使用</span>');
			return true;
		}
	}else{
		if(is_submit){
			alert('请输入密码！');
			return false;
		}else{
			$("#password_info").text('请设置4-20个字符，包含英文大小写字母、数字和部分标点符号组合！');
			if (re_password != '') {
				$("#re_password_info").html('<span style=color:red>请2次输入相同密码</span>');
				return false;
			}
		}
	}
}

function check_re_password(){
	var password = $("#password").val();
	var re_password = $("#re_password").val();
	if(password!=''&&re_password!=''){
		if(password!=re_password){
			$("#re_password_info").html('<span style=color:red>请2次输入相同密码</span>');
			return false;
		}else{
			$("#re_password_info").html('<span style=color:green>输入一致</span>');
			return true;
		}
	}
}

function check_status(){
	if($("#baby_status").val()==0){
		alert('请选择是否生育');
		return false;
	}else{
		return true;
	}
}

function check_babybirthday(){
	if($("#baby_birthday2").val()==''){
		if($("#baby_status").val()==1){
			alert('请输入宝宝的生日！');
			return false;
		}else if($("#baby_status").val()==3){
			alert('请输入宝宝的预产期！');
			return false;
		}
	}else{
		if(!check_date($("#baby_birthday2").val())){
			$("#baby_birthday_info").html('<span style=color:red>请输入正确的日期格式</span>');
			$("#baby_birthday2").attr('value','');
			return false;
		}else{
			$("#baby_birthday_info").html('');
			return true;
		}
	}
}

function check_birthday(){
	if($("#birthday").val()==''){
		alert("请输入生日！");
		return false;
	}else{
		if(!check_date($("#birthday").val())){
			$("#birthday_info").html('<span style=color:red>请输入正确的日期格式</span>');
			$("#birthday").attr('value','');
			return false;
		}else{
			$("#birthday_info").html('');
			return true;
		}
	}
}

function check_phone(){
	var phone = $("#phone").val();
	if(phone!=''){
		return check_str_length(phone.length,5,20,'电话');
	}
	return true;
}

function check_address(){
	if($("#address").val()!=''){
		return check_str_length($("#address").val().length,0,30,'地址');
	}
	return true;
}

function check_zip(){
	if($("#zip").val()!=''){
		return check_str_length($("#zip").val().length,0,30,'邮编');
	}
}

function check_str_length(length,limit,limit2,info){
	if(length<limit){
		alert(info+"长度太短!");
		return false;
	}else if(length>limit2){
		alert(info+"长度太长!");
		return false;
	}else{
		return true;
	}
}

function check_verify(){
	$.post('check_verify.php',{'verify':$("#verify").val()},function(result){
		if(result=='wrong'){
			change_verify();
			alert('验证码错误!');
			$("#verify").attr('value','');
			return false;
		}else{
			return true;
		}
	});
}

function check_date(s){
	//var regu = "^/d{4}$";
	var regu = "^[0-9]{4}-[0-9]{2}-[0-9]{2}$";
	var re = new RegExp(regu);
	if(re.test(s)){
		return true;
	}else{
		return false;
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
