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
		$flag = true;
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/?last_url=/yard/');
			exit();
		}
		$info = $db->query("select * from eachbb_member.member where id=$id");
		if($id!=$user->id&&$id!=''){
			$flag = false;
			$db->execute("insert into eachbb_member.member_status (uid,created_at,last_login,score,level,friend_count,unread_msg_count,visit_count) values ({$info[0]->uid},now(),now(),0,0,0,0,1) ON DUPLICATE KEY update visit_count = visit_count +1");
			$vis_id=$db->query("select id from eachbb_member.visit_history where u_id= {$info[0]->id} and f_id= {$user->id}");
			if(!$vis_id){
				if(!$db->execute("insert into eachbb_member.visit_history(create_at,u_id,f_id,f_name,f_avatar)values(now(),$id,{$user->id},'{$user->name}','{$user->avatar}');")){
					echo "添加失败！";
				}
			}
			else{
				$db->execute("update eachbb_member.visit_history set create_at =now()}' where id={$vis_id[0]->id}");
			}
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
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_c.jpg) no-repeat;"></div>
					<div class="cllz_word">育儿账本</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_k.jpg) no-repeat;"></div>
					<div class="cllz_word">孕期计算</div>
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
					<div id="cc_pic">
						<img src="/images/yard/yard.jpg" usemap="#Map" />
						<map name="Map" id="Map">
						  	<area shape="poly" coords="264,91,205,102,190,26,216,21,249,17" href="/yard/album_list.php<?php if(!$flag)echo "?id=$id";?>" title="照片"/>
							<area shape="poly" coords="132,37,184,44,174,124,120,119" href="/yard/<?php if(!$flag)echo "home.php?id=$id";else echo "member.php";?>" title="档案" />
						</map>
					</div>
					<?php if(!$id){?>
					<div id="cc_photo">
						<div id="pho_l">
							<img src="<?php echo thumb_name($user->avatar,'small');?>" width="48" height="48" />
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
							<div class="c_ch_w">留言</div>
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
		<?php #include_once(dirname(__FILE__).'./../inc/bottom.php');?>
	</div>
</div>
</body>

<script type="text/javascript">
	$(function(){
		$('#query_friend').colorbox({href:'friend_query_list.php'});
	});
</script>
</html>

