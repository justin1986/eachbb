<?php
	session_start();
	include_once('../frame.php');
	$db =get_db();
	if(!isset($_SESSION['getpwd'])){
		$_SESSION['getpwd'] = rand_str();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>密码找回</title>
<?php
	use_jquery();
	css_include_tag('login_pwd','login_top');
	js_include_tag('get_pwd');
?>
</head>
<body>
<div id="ibody">
	<div id="fbody">
		<?php include_once(dirname(__FILE__) .'./../inc/_register_top.php');?>
		 <?php
		 	$verify = $_GET['verify'];
			if(empty($verify)){
				alert('您的申请不合法或者已经过期');
				redirect('/'); 
			}else{
				$db->query("select * from eb_get_pwd where verify='$verify' and now()<end_time");
				if(!$db->move_first()){
					alert('您的申请不合法或者已经过期');
					redirect('/'); 
				}else{$uid = $db->field_by_name('user_id');
		 ?>
		<div id="center">
			<div id="cpg_top"></div>
			<div id="cpg_c">
				<div id="cpg_l">
					<div id="cpg_t">
						<div id="cpgt_l"></div>
						<div id="cpgt_c">密码找回</div>
						<div id="cpgt_r"></div>
					</div>
					<div id="cpgc_c">
					<form action="getpwd.post.php" method="post">
						<div class="user">
							<div class="u_l2">修改密码：</div>
							<div class="u_r2"><input name="password" id="password1" type="password" /></div>
						</div>
						<div class="user">
							<div class="u_l2">确认密码：</div>
							<div class="u_r2"><input id="password2" type="password" /></div>
						</div>
						<div class="u_btn"><input id="getpwd" type="button"> </div>
						<input type="hidden" name="session" value="<?php echo $_SESSION['getpwd'];?>">
						<input type="hidden" name="uid" value="<?php echo $uid;?>">
					</form>
					</div>
					<div id="cpgc_b"></div>
				</div>
				<div id="cpg_r">
				</div>
			</div>
			<div id="cpg_b"></div>
		</div>
		<?php }}?>
		<?php include_once(dirname(__FILE__).'/inc/bottom.php');?>
	</div>
</div>
</body>
</html>
