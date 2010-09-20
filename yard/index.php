<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','colorbox');
		js_include_tag('yard/yard','jquery.colorbox-min');
		$db=get_db();
		$id = $_GET['id'];
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/?last_url=/yard/');
			exit();
		}
		if($id){
			$user=$db->query("SELECT * FROM eachbb_member.member m where id=$id");
			$user = $user[0];
		}
		session_start();
		$_SESSION['page_from'] = 'yard';
		?>
</head>
<body>
<div id="ibody">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic"></div>
		<div id="menu_b" class="menu_pic"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
	</div>
	<div id="content">
		<div id="c_l">
			<div id="cll_z">
				<div class="cll_zz" style="background:url(/images/yard/ffffff.gif) no-repeat;">
					<div class="cllz_img" style="background:url(/images/yard/l_a.jpg) no-repeat;"></div>
					<div class="cllz_word">音乐</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_b.jpg) no-repeat;"></div>
					<div class="cllz_word">转帖</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_c.jpg) no-repeat;"></div>
					<div class="cllz_word">投票</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_d.jpg) no-repeat;"></div>
					<div class="cllz_word">说秘密</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_e.jpg) no-repeat;"></div>
					<div class="cllz_word">真心话</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_f.jpg) no-repeat;"></div>
					<div class="cllz_word">天天向上</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_g.jpg) no-repeat;"></div>
					<div class="cllz_word">游戏大厅</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_k.jpg) no-repeat;"></div>
					<div class="cllz_word">宠物村</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_l.jpg) no-repeat;"></div>
					<div class="cllz_word">池塘边</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_m.jpg) no-repeat;"></div>
					<div class="cllz_word">梦幻城</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_p.jpg) no-repeat;"></div>
					<div class="cllz_word">阳光牧场</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_o.jpg) no-repeat;"></div>
					<div class="cllz_word">绿光森林</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_q.jpg) no-repeat;"></div>
					<div class="cllz_word">抢吧</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_r.jpg) no-repeat;"></div>
					<div class="cllz_word">贺卡</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_s.jpg) no-repeat;"></div>
					<div class="cllz_word">新手任务</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_t.jpg) no-repeat;"></div>
					<div class="cllz_word">白小报</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_u.jpg) no-repeat;"></div>
					<div class="cllz_word">添加</div>
				</div>
				<div id="cll_hr"></div>
				<a href="#"><img id="cllz_bs" src="/images/yard/l_l_s.jpg" /></a>
			</div>
		</div>
		<div id="c_ll">
			<div id="cl_t"></div>
			<div id="cl_c"></div>
			<div id="cl_r"></div>
		</div>
		<div id="c_c">
			<div id="cc_t"></div>
			<div id="cc_c">
				<div id="cc_pg">
					<div id="cc_pic"></div>
					<?php if(!$id){?>
					<div id="cc_photo">
						<div id="pho_l">
							<img src="<?php echo $user->avatar;?>" width="48" height="48" />
						</div>
						<form id="xxx" action="daily.post.php" method="post">
							<textarea name="pho_r" id="pho_r">你正在作什么?</textarea>
						</form>
					</div>
					<?php }?>
					<div id="cc_ps" >
					<div id="box_test"></div>
					<div id="box_right">
						<?php if(!$id){?>
						<div id="ccps_l" style="float:left;"><a href="/yard/info.php"><img src="/images/yard/c_p.jpg" border=0/></a></div>
						<div id="ccps_c">
							<div id="ccpsc_la">
								<div id="ccpsc_imga"></div>
								<div id="ccpsc_worda"><a href="/yard/upload_photo.php">传照片</a></div>
								</div>
							<div id="ccpsc_lb">
								<div id="ccpsc_imgb"></div>
								<div id="ccpsc_wordb"><a href="/yard/diary.php">发日记</a></div>
								</div>
							<div id="c_moblie">
								<div id="c_moblie_w"><a href="">发布</a></div>
								</div>
						</div>
						<?php }?>
						<div id="c_ch">
							<div id="m_w"></div>
							<div class="c_ch_w" style=" border-bottom:0px solid #E3F2DF;background:url(/images/yard/m_pg.jpg) no-repeat;">全部</div>
							<div class="c_ch_w">动态</div>
							<div class="c_ch_w">照片</div>
							<div class="c_ch_w">日记</div>
							<div class="c_ch_w">随便看看</div>
							<div id="m_w" style="width:30px;"></div>
						</div>
					<div id="test"></div>
					</div>
					</div>
				</div>
				<div id="r_pho">
					<?php include_once(dirname(__FILE__).'/../inc/_yard_right.php'); ?>
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
		<?php include_once(dirname(__FILE__).'./../inc/bottom.php');?>
	</div>
</div>
</body>

<script type="text/javascript">
	$(function(){
		$('#query_friend').colorbox({href:'friend_query_list.php'});
	});
</script>
</html>

