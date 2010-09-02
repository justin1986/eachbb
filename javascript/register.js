var name_flag = 'begin';
var email_flag = 'begin';
var verify_flag = 'begin';
var register_flag = 'begin';

$(function(){
	birthday_display();
	change_disabled();
	
	$("#cad_v").click(function(){
		change_verify();
	});
	
	$("#accept").click(function(){
		change_disabled();
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
	
	$("#baby_status").change(function(){
		check_status();
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
	
	$("#birthday").datepicker(
	{
		 yearRange: 'c-40:c+1',
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	});
	
	$("#baby_birthday2").datepicker(
	{
		 yearRange: 'c-10:c+5',
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd'
	});
	
	
	$("#register").click(function(){
		register_flag = 'begin';
		if(!check_name(true)){
			$("#name").focus();
			return false;
		}
		if(!check_email(true)){
			$("#email").focus();
			return false;
		}
		if(!check_password(true)){
			$("#password").focus();
			return false;
		}
		if(!check_re_password(true)){
			$("#re_password").focus();
			return false;
		}
		if(!check_status(true)){
			$("#baby_status").focus();
			return false;
		}
		if(!check_babybirthday()){
			$("#baby_birthday2").focus();
			return false;
		}
		if(!check_phone()){
			$("#phone").focus();
			return false;
		}
		if(!check_address()){
			$("#address").focus();
			return false;
		}
		if(!check_zip()){
			$("#zip").focus();
			return false;
		}
		if(!check_birthday()){
			$("#birthday").focus();
			return false;
		}
		if(!check_verify(true)){
			$("#verify").focus();
			return false;
		}
		register_flag = 'success';
		register_submit();
	});
});

function change_disabled(){
	if($("#accept").attr('checked')){
		$("#register").attr('disabled',false);
	}else{
		$("#register").attr('disabled','disabled');
	}
}

function register_submit(){
	if(name_flag=='wrong'){
		$("#name").focus();
		return false;
	}else if(name_flag=='locked'){
		return false;
	}
	if(email_flag=='wrong'){
		$("#email").focus();
		return false;
	}else if(email_flag=='locked'){
		return false;
	}
	if(verify_flag=='wrong'){
		$("#verify").focus();
		return false;
	}else if(verify_flag=='locked'){
		return false;
	}
	do_submit();
}

function do_submit(){
	if(register_flag=='success'&&name_flag=='success'&&email_flag=='success'&&verify_flag=='success'){
		$("form").submit();
	}
}

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
			$("#name_info").html('<span style=color:red>用户名不能含有特殊字符,只能包含英文大小字母和数字</span>');
			return false;
		}
		if (name_flag != 'locked') {
			name_flag = 'locked';
			$("#name_info").text('用户名验证中。。。');
			$.post('check_name.php', {
				'name': name
			}, function(data){
				if (data > 0) {
					$("#name_info").html('<span style=color:red>用户名已存在</span>');
					name_flag = 'wrong';
				}
				else {
					$("#name_info").html('<span style=color:green>用户名可以使用</span>');
					name_flag = 'success';
					do_submit();
				}
			});
		}
		return true;
	}else{
		if(is_submit){
			$("#name_info").html('<span style=color:red>用户名不能为空</span>');
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
		if(email.length>40){
			$("#email_info").html('<span style=color:red>邮箱太长</span>');
			return false;
		}
		if(!isEmail(email)){
			$("#email_info").html('<span style=color:red>邮箱格式不对,清输入正确邮箱地址</span>');
			return false;
		}
		if (email_flag != 'locked') {
			email_flag = 'locked';
			$("#email_info").text('邮箱验证中。。。');
			$.post('check_email.php', {
				'email': email
			}, function(data){
				if (data > 0) {
					$("#email_info").html('<span style=color:red>邮箱已存在</span>');
					email_flag = 'wrong';
				}
				else {
					$("#email_info").html('<span style=color:green>邮箱可以使用</span>');
					email_flag = 'success';
					do_submit();
				}
			});
		}
		return true;
	}else{
		if(is_submit){
			$("#email_info").html('<span style=color:red>邮箱不能为空</span>');
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
			$("#password_info").html('<span style=color:red>密码还有非法字符,只能包含英文大小字母和数字</span>');
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
			$("#password_info").html('<span style=color:red>密码不能为空</span>');
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

function check_re_password(is_submit){
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
	}else{
		if(is_submit){
			$("#re_password_info").html('<span style=color:red>请2次输入相同密码</span>');
			return false;
		}else{
			$("#re_password_info").html('');
		}
	}
}

function check_status(is_submit){
	if($("#baby_status").val()==0){
		if(is_submit){
			$("#status_info").html('<span style=color:red>请选择是否生育</span>');
			return false;
		}
	}else{
		$("#status_info").html('');
		return true;
	}
}

function check_babybirthday(){
	if($("#baby_birthday2").val()==''){
		if($("#baby_status").val()==1){
			$("#baby_birthday_info").html('<span style=color:red>请输入宝宝的生日</span>');
			return false;
		}else if($("#baby_status").val()==3){
			$("#baby_birthday_info").html('<span style=color:red>请输入宝宝的预产期</span>');
			return false;
		}else{
			return true;
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
		$("#birthday_info").html('<span style=color:red>请输入生日</span>');
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
		return check_str_length(phone.length,5,20,'电话','phone_info');
	}
	return true;
}

function check_address(){
	if($("#address").val()!=''){
		return check_str_length($("#address").val().length,0,30,'地址','address_info');
	}
	return true;
}

function check_zip(){
	if($("#zip").val()!=''){
		return check_str_length($("#zip").val().length,0,30,'邮编','zip_info');
	}
	return true;
}

function check_str_length(length,limit,limit2,info,name){
	if(length<limit){
		$("#"+name).html('<span style=color:red>'+info+'长度太短</span>');
		return false;
	}else if(length>limit2){
		$("#"+name).html('<span style=color:red>'+info+'长度太长</span>');
		return false;
	}else{
		$("#"+name).html('');
		return true;
	}
}

function check_verify(is_submit){
	if ($("#verify").val() == ''&&is_submit) {
		$("#cad_v").html("看不清楚？换张图片<span style=color:red>　请输入验证码</span>");
	}
	else {
		if (verify_flag != 'locked') {
			verify_flag = 'locked';
			$("#cad_v").html("看不清楚？换张图片　验证中。。。");
			$.post('check_verify.php', {
				'verify': $("#verify").val()
			}, function(result){
				if (result == 'wrong') {
					change_verify();
					$("#cad_v").html("看不清楚？换张图片<span style=color:red>　验证码错误</span>");
					verify_flag = 'wrong';
				}
				else {
					$("#cad_v").html("看不清楚？换张图片");
					verify_flag = 'success';
					do_submit();
				}
			});
		}
		return true;
	}
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
