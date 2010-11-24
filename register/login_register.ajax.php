<?php
	include_once('../frame.php');
	if(!is_ajax()) die('invalid request!');
?>
<style>
.menu font{font-size:12px; color:red;}
</style>
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
					<div class="menu"><font >*</font>用户名：</div>
					<div class="menu"><font >*</font>邮箱：</div>
					<div class="menu"><font >*</font>密　码：</div>
					<div class="menu"><font >*</font>确认密码：</div>
					<div class="menu"><font >*</font>性别：</div>
					<div class="menu"><font >*</font>是否生育：</div>
					<div class="menu baby_birth" id="baby_display" style="width:60px;">宝宝生日：</div>
					<div class="menu baby_name"><font >*</font>宝宝姓名：</div>
					<div class="menu">您的生日：</div>
					<div class="menu"><font >*</font>验证码：</div>
				</div>
				<div id="midden">
					<div class="menu"><input id="register_name" type="text"/></div>
					<div class="menu"><input id="register_email" type="text"/></div>
					<div class="menu"><input id="register_password" type="password"></div>
					<div class="menu"><input id="confirm_password" type="password"></div>
					<div class="menu" style="margin-top:22px; line-height:20px;"><input name="gender" type="radio" style="width:13px; height:13px; margin:0px; border:0px solid red;" name="gender" value="1"/>男<input type="radio" id="nv" name="gender" style="width:13px; height:13px; margin:0px; margin-left:20px; border:0px solid red;" name="gender" checked="checked" value="2"/>女</div>
					<div class="menu" style="margin-top:18px;" >
						<select id="sel_baby_status" name="sel_baby_status">
							<option value="0">请选择</option>
							<option value="1">已生育</option>
							<option value="2">未生育</option>
							<option value="3">怀孕中</option>
						</select>
					</div>
					<div class="menu baby_birth" style="display:none"><input id="input_baby_birth" type="text"/></div>
					<div class="menu baby_name" style="display:none;"><input id="baby_info_name" type="text"/></div>
					<div class="menu"><input id="input_birthday"  type="text"/></div>
					<div class="menu"><input id="virefy" type="text"/></div>
				</div>
				<div id="right">
					<div class="menu" id="menu_ida">4-20位，包含英文大小字母和数字组成</div>
					<div class="menu">请填写真实有效邮箱地址并妥善保管</div>
					<div class="menu">含英文大小写字母、数字</div>
					<div class="menu">两次密码必须输入一致</div>
					<div class="menu baby_name"></div>
					<div class="menu" id="verify_info" style="height:25px; margin-top:135px;"><div id="validate"><img src="/inc/verify.php?name=register"></div><font style="margin-left:10px; color:#999999; cursor:pointer;">看不清楚？换张图片</font></div>
				</div>
				<div id="mark">注:带<font style="font-size:12px; color:red;">*</font>的是必填项</div>
				<input type="button" id="logon_btn" value="注  册"/>
			</div>
		</div>
	</div>
	<div id="banner_bottom"></div>
	<input id="temp" type="hidden" value="<?php echo $_GET['temp'];?>" />
</div>
<script type="text/javascript">
$('.baby_name').hide();
	$(function(){
		$('#btn').click(function(){
			$.post('/register/ajax.post.php',{'type':'login','name':$('#login_name').val(), 'password':$('#login_password').val()},function(data){
				if(data == '用户名密码不对！'){					
					alert('用户名密码不对！');
				}else{
					var temp = $('#temp').val();
					window.location.href="/test/save_test_result.php?temp="+temp;
				}
			});
		});
		var babyname="no";
		$("#sel_baby_status").change(function(){
			if($(this).val()==1){
				$('.baby_birth').show();
				babyname = "babyname";
				$('#baby_display').html('<font>*</font>宝宝生日');
				$('.baby_name').show();
				$('#verify_info').css('margin-top','175px');
				$("#input_baby_birth").datepicker(
						{
							yearRange: 'c-10:c',
							changeMonth: true,
							changeYear: true,
							monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
							dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
							dayNamesMin:["日","一","二","三","四","五","六"],
							dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
							dateFormat: 'yy-mm-dd'
						});
			}else if($(this).val()== 2){
				$('.baby_name').hide();
				$('.baby_birth').hide();
				babyname="no";
			}else if($(this).val()==3){
				$('.baby_birth').show();
				$('#input_baby_birth').show();
				$('#baby_display').html('<font>*</font>预产期');
				$('#verify_info').css('margin-top','175px');
				$("#input_baby_birth").datepicker(
						{
							yearRange: 'c:c+1',
							changeMonth: true,
							changeYear: true,
							monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
							dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
							dayNamesMin:["日","一","二","三","四","五","六"],
							dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
							dateFormat: 'yy-mm-dd'
						});
				$('.baby_name').hide();
				babyname="no";
			}else{
				$('.baby_birth').hide();
				$('#verify_info').css('margin-top','135px');
				$('.baby_name').hide();
				babyname="no";
			}
		});

		$("#input_birthday").datepicker(
		{
			yearRange: 'c-70:c',
			changeMonth: true,
			changeYear: true,
			monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
			dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dayNamesMin:["日","一","二","三","四","五","六"],
			dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dateFormat: 'yy-mm-dd'
		});
		
		

		$("#validate").next().click(function(){
			$("#validate img").attr('src','/inc/verify.php?name=register&reload='+Math.round(Math.random()*10000));
		});

		$('#logon_btn').click(function(){
			if($('#register_name').val()==''){
//				$('#menu_ida').html("4-20位，包含英文大小字母和数字组成");
//				$('#menu_ida').css("color","red");
				alert('请输入用户名');
				$('#register_name').focus();
				return;
			}
			if($('#register_email').val()==''){
				alert('请输入邮箱');
				$('#register_email').focus();
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
			if(babyname == "babyname"){
				if(!$('#baby_info_name').val()){
				alert('请输入宝宝姓名');
				$('#baby_info_name').focus();
				return;
				}
			}
			$.post('/register/ajax.post.php',
				{'baby_name':$('#baby_info_name').val(),'name':$('#register_name').val(),
				 'email':$('#register_email').val(),
				 'password':$('#register_password').val(),
				 're_password':$('#confirm_password').val(),
				 'gender':$("input:checked").val(),
				 'baby_status':$('#sel_baby_status').val(),
				 'baby_birth':$('#input_baby_birth').val(),
				 'birthday':$('#input_birthday').val(),
				 'verify':$('#virefy').val(),
				 'type':'register'
				},function(data){
					if(data){
						alert(data);
					}else{
						var temp = "<?php echo $_SESSION['temp_flag']?>";
						window.location.href="/test/save_test_result.php?temp="+temp;
					}
				}
			);
		});
	});
</script>