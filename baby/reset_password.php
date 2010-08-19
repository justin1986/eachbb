	<?php 
		include_once('../frame.php');
		use_jquery();
		js_include_tag('reset_password');
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$id=$user->id;
		$member = new table_class('eachbb_member.member');
		$member->find($id);
	?>
	<div id="cc_t"></div>
	<div id="cc_c" >
		<div id="cc_pg">
			<div class=r_title id="r_log"><span><?php echo $member->true_name;?></span>的账户管理</div>
			<div id="r_log_hr">
				<div>修改密码</div>
			</div>
			<div class="c_menu_pg_p" >
			</div>
			<form action="/yard/reset_password.post.php" method="post">
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