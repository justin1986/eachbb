$(function(){
	birthday_display();
	
	$("#cad_v").click(function(){
		change_pic();
	});
	
	$("#baby_status").change(function(){
		birthday_display();
	});
	
	$("#name").blur(function(){
		check_name(false);
	});
	
	$("#email").blur(function(){
		check_email(false);
	});
	
	$(".birthday").datepicker(
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

function change_pic(){
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
