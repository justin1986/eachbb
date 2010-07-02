<?php
	include_once('../frame.php');
	if(!is_ajax()) die('invalid request!');
?>
<div id="banner">
	<div id="banner_top"></div>
	<div id="banner_content">
		<div id="banner_son">
			<div id="login" style="margin-top:50px;">
				<div class="title">用户登录</div>
				<div class="user_banner"><font>用户名：</font><input id="login_name" type="text"></div>
				<div class="user_banner"><font>密　码：</font><input id="login_password" type="password"></div>
				<input type="button" id="btn" value="提 交"/>
			</div>
			<div id="c_hr"></div>
			<div id="logon">
				<div class="title" style="width:470px; text-align:center;">用户注册</div>
				<div class="logon_left">
					<div class="menu">用户名：</div>
					<div class="menu">密　码：</div>
					<div class="menu">确认密码：</div>
					<div class="menu">性别：</div>
					<div class="menu">是否生育：</div>
					<div class="menu baby_birth">宝宝生日：</div>
					<div class="menu">出生日期：</div>
					<div class="menu">验证码：</div>
				</div>
				<div id="midden">
					<div class="menu"><input id="register_name" type="text"/></div>
					<div class="menu"><input id="register_password" type="password"></div>
					<div class="menu"><input id="confirm_password" type="password"></div>
					<div class="menu" style="margin-top:22px; line-height:20px;"><input name="gender" type="radio" style="width:13px; height:13px; margin:0px; border:0px solid red;" name="gender" value="1"/>男<input type="radio" id="nv" name="gender" style="width:13px; height:13px; margin:0px; margin-left:20px; border:0px solid red;" name="gender" checked="checked" value="2"/><font>女</font></div>
					<div class="menu" style="margin-top:18px;" >
						<select id="sel_baby_status">
							<option value="0">请选择</option>
							<option value="1">已生育</option>
							<option value="2">备孕中</option>
							<option value="3">怀孕中</option>
						</select>
					</div>
					<div class="menu baby_birth"><input id="input_baby_birth" class="datepicker" type="text"/></div>
					<div class="menu"><input id="input birthday" class="datepicker" type="text"/></div>
					<div class="menu"><input id="virefy" type="text"/></div>
				</div>
				<div id="right">
					<div class="menu">4-20位，包含英文大小字母和数字组成</div>
					<div class="menu">含英文大小写字母、数字和部分标点符号</div>
					<div class="menu">两次密码必须输入一致</div>
					<div class="menu" style="height:25px; margin-top:135px;"><div id="validate"></div><font style="margin-left:10px; color:#999999;">看不清楚？换张图片</font></div>
				</div>
				<input type="button" id="logon_btn" value="注  册"/>
			</div>
		</div>
	</div>
	<div id="banner_bottom"></div>
</div>
<script type="text/javascript">
	$(function(){
		$('#btn').click(function(){
			$.post('/register/ajax.post.php',{'type':'login','name':encodeURI($('#login_name').val()), 'password': encodeURI($('#login_password').val())},function(data){
				if(data){
					alert(data);
				}else{
					window.location.href="/test/save_test_result.php";
				}
			});
		});	

		$('#logon_btn').click(function(){
			if($('#register_name').val()==''){
				alert('请输入用户名');
				$('#register_name').focus();
				return;
			}
			if($('#register_password').val()==""){
				alert('请输入密码');
				$('#register_password').focus();
				return;
			}
			if($('#sel_baby_status').val()==0){
				alert('请选择您是否生育');
				$('#sel_baby_status').focus();
				return;
			}
			if(($('#sel_baby_status').val()== "1" ||$('#sel_baby_status').val()== "3") && $('#input_baby_birth').val()==''){
				alert('请输入宝宝生日或预产期！');
				$('#input_baby_status').focus();
				return;
			}
			if($('#input_birthday').val()==""){
				alert('请输入您的生日');
				$('#input_birthday').focus();
				return;
			}
		});
	});
</script>