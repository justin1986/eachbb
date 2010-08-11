<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Language" content="zh-cn">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>我的宝宝</title>
	<link href="/css/baby.css"  rel="stylesheet" type="text/css"/>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','baby_info','baby','yard_reset_password');
		
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$id=$user->id;
		$member = new table_class('eachbb_member.member');
		$member->find($id);
		$db = get_db();
		$avatars =$db->query("SELECT id,photo,status FROM eachbb_member.member_avatar where u_id=".$user->id.' order by create_at desc limit 3');
		$avatar_count = $db->record_count;
		$name =$user->name;
	?>
</head>
<body>
<div id="ibody" style="width:1000px;">
	<?php include_once(dirname(__FILE__).'/../inc/_baby_top.php'); ?>
	<div id="user">
	<div id="user_ma">
	<div id="user_ma_s"><font size="2" color="red" ><b>个人信息管理</b></font></div>
	<div id="user_ma_b"></div>
	
	<div id="user_ma_h"><div style="float:left;height:50px;width:50px;"><img  src="<?php echo $user->avatar; ?>" style="height:50px;width:50px;"/></div><div style="float:left;margin-left:3px;"><font size="2"><b><?php if($name){echo $name;}else{alert("操作有误！");} ?></b></font></div></div>
	<div class="user_b">
	<div class="user_b_t"><img src="/images/avatar/apoint.png"></img><font size="2" style="margin-left:5px;">您有</font><a href="talk.php"><font size="2" color="red" >0</font></a><font size="2" >条新消息</font></div>
	<div class="user_b_t" style="padding-bottom:5px;"><img src="/images/avatar/apoint.png"></img><a href="/yard/"><font size="2" color="black" style="margin-left:5px;">我的小院子</font></a></div></div>
	</div>
	<div id="user_me">
	<div id="user_me_top"></div>
	<div id="user_me_center">
		<div id="user_me_middle">
			<div class="user_me_s" >
				<div class="user_me_t" ><img src="/images/avatar/bpoint.png"></img><font size="2"><b>用户信息</b></font></div>
					<div class="user_me_b">
						<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="info.php"><font size="2" color="black">基本信息</font></a></div>
						<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="/baby/index.php"><font size="2" color="black">头像选择</font></a></div>
						<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><a href="/baby/reset_password.php"><font size="2" color="black">密码修改</font></a></div>
				</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>订单信息</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">最新订单</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">我到订单</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">订单发货查询</font></a></div>
			<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><a href="dd.php"><font size="2" color="black">往期订单查询</font></a></div>
			</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>测评报告</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">最新测评</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">我的测评</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">测评查询</font></a></div>
			<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><a href="report.php"><font size="2" color="black">测评历史查询</font></a></div>
			</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>订购课程</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">最新课程</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">我的课程</font></a></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">课程查询</font></a></div>
			<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><a href="class.php"><font size="2" color="black">课程历史查询</font></a></div>
			</div>
			</div>
			<div id="user_me_o"><img src="/images/avatar/bpoint.png"></img><a href="edit.php"><font size="2" color="black">[退出 ]</font></a></div>
		</div>
	</div>
	<div id="user_me_bottom"></div>
	</div>
	<div id="user_ad"><a href="4thblog.php"><img src="/images/avatar/user_ad.png" border="0"></img></a></div>
    </div>
    
    <div id="c_c">
			<div id="cc_t"></div>
			<div id="cc_c" >
				<div id="cc_pg">
					<div class=r_title id="r_log"><span><?php echo $member->true_name;?></span>的信息管理</div>
					<div id="r_log_hr">    
						<div>信息管理</div>
					</div>
					
					<div class="c_menu_pg">
						<div style="margin-left:0px;"><a href="">收件箱</a></div>
						<div id="c_menu_selected"><a href="">写信息</a></div>
					</div>
					<div class="c_menu_pg_p" >
						
					</div>
					<form action="/yard/write_message.post.php" method="post">
						<table class=r_table>
							
							
						
							<tr>
								<td class=td1>发送给：</td>
								<td class=td2><input id="md_name" name='md_name' type="text"/></td>
                                <td class="wr" id="old_password_info">接收者姓名</td>
							</tr>
							<tr>
								<td class=td1>信息内容：</td>
								<td class=td2>
								<textarea wrap="physical"  class="big_input" id="message_content" name='message_content' type="text"></textarea></td>
                                <td class="wr" id="new_password_info">信息内容</td>
                                
							</tr>
							
							
							
						</table>
						<div id=r_button>
							<button id="submit"></button>
						</div>
					</form>
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
    
     <?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
</div>
      

</body>
</html>
    