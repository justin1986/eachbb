<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','yard_reset_password');
		js_include_tag('yard/yard','member','reset_password');
		$db = get_db();
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");?>
			<script>window.location.href="/login/";</script>
			<?php 
		}
  	
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic" style="background:url(../images/yard/m_0_sel.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic" style="background:url(../images/yard/m_1.jpg) no-repeat;"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
	</div>
	<div id="content">
		<div id="c_l">
			<?php include(dirname(__FILE__).'/../yard/_yard_left.php');?>
		</div>
		<div id="c_ll">
			<div id="cl_t"></div>
			<div id="cl_c"></div>
			<div id="cl_r"></div>
		</div>
		<div id="c_c">
			<div id="cc_t"></div>
			<div id="cc_c" >
				<div id="cc_pg">
					<div class=r_title id="r_log"><span><?php echo $member->true_name;?></span>的账户管理</div>
					<div id="r_log_hr">
						<div>个人资料</div>
					</div>
					<div class="c_menu_pg">
						<div style="margin-left:0px;"><a href="/yard/member.php">基本资料</a></div>
						<div><a href="/yard/info.php">修改头像</a></div>
						<div id="c_menu_selected"><a href="">修改密码</a></div>
					</div>
					<div class="c_menu_pg_p" >
						
					</div>
					<form action="reset_password.post.php" method="post">
						<table class=r_table>
							
							
						
							<tr>
								<td class=td1>当前密码：</td>
								<td class=td2><input id="old_password" name='old_password' type="password"/></td>
                                <td class="wr" id="old_password_info">当前密码</td>
							</tr>
							<tr>
								<td class=td1>新密码：</td>
								<td class=td2><input id="new_password" name='new_password' type="password" /></td>
                                <td class="wr" id="new_password_info">请设置4-20个字符，包含英文大小写字母、数字和部分标点符号组合</td>
                                
							</tr>
							<tr>
								<td class=td1>确认密码：</td>
								<td class=td2><input id="re_new_password" name='re_new_password' type="password"/></td>
                                <td class="wr" id="re_new_password_info">确认密码</td>
                                
							</tr>
							
							
						</table>
						<div id=r_button>
							<button id="zsubmit"></button>
						</div>
					</form>
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</div>
</body>

</html>
