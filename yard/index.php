<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yyard','colorbox');
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
	<?php  include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
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
					<?php 
							$id = $_GET['id'];
							if($id){
								$user=$db->query("SELECT * FROM eachbb_member.member m where id=$id");
								$user = $user[0];
							}
							$sql="select m.*,s.* from eachbb_member.member m inner join eachbb_member.member_status s on m.uid=s.uid where m.id=".$user->id;
							$news=$db->query($sql);
							$sex='未知';
							if($user->gender == 1){
								$sex='男';
							}elseif($user->gender == 2){
								$sex='女';
							}
							?>
						<div id="r_img">
							<div id="r_pto"><img src="<?php echo $user->avatar ? thumb_name($user->avatar,'normal') : '/images/yard_info_img/1.jpg'; ?>"></div>
							<div id="r_bb"><?php echo $user->name;?></div>
							<div id="r_num">被访问过<?php if($news[0]->visit_count){echo $news[0]->visit_count;}else{echo 0;};?>次</div>
						</div>
						<?php if(!$id){?>
						<div id="r_geng">
							<div id="r_ge_a">
								<div id="r_gi_a"></div>
								<div id="r_gw_a"><a href="/yard/info.php">更换头像</a></div>
							</div>
							<div id="r_ge_b">
								<div id="r_gi_b"></div>
								<div id="r_gw_b"><a href="/yard/member.php">修改档案</a></div>
							</div>
						</div>
						<?php }?>
						<div id="r_ge_ge">
							<div id="r_ge_hr"></div>
							<div id="r_ge_table">
								<div class="r_ge_ct">
									<div class="r_ge_cta"><img src="/images/yard/r_a.jpg"></div>
									<div class="r_ge_ctb">性别：</div>
									<div class="r_ge_ctc"><?php echo $sex;?></div>
								</div>
								<div class="r_ge_ct">
									<div class="r_ge_cta"><img src="/images/yard/r_b.jpg"></div>
									<div class="r_ge_ctb">生日：</div>
									<div class="r_ge_ctc"><?php if( substr($user->baby_birthday,0,10) != "0000-00-00"){echo substr($user->baby_birthday,0,10); }else{ echo "未知";}?></div>
								</div>
								<div class="r_ge_ct">
									<div class="r_ge_cta"><img src="/images/yard/r_c.jpg"></div>
									<div class="r_ge_ctb">地址：</div>
									<div class="r_ge_ctc" style="width:115px;"><?php if(htmlspecialchars($user->address)!=""){ echo htmlspecialchars($user->address);}else{echo '不详';}?></div>
								</div>
								<div class="r_ge_ct">
									<div class="r_ge_cta"><img src="/images/yard/r_d.jpg"></div>
									<div class="r_ge_ctb">金币：</div>
									<div class="r_ge_ctc"><?php if($news[0]->score > 0){echo $news[0]->score; }else{ echo '0';}?></div>
								</div>
								<div class="r_ge_ct">
									<div class="r_ge_cta"><img src="/images/yard/r_e.jpg"></div>
									<div class="r_ge_ctb">等级：</div>
									<div class="r_ge_ctc"><?php if($news[0]->level > 0){echo $news[0]->level; }else{ echo '0';};?>级</div>
								</div>
								<!-- 
								<div class="r_ge_ct">
									<div class="r_ge_cta"><img src="/images/yard/r_f.jpg"></div>
									<div class="r_ge_ctb">最后天数：</div>
									<div class="r_ge_ctc" style="width:80px;">天</div>
								</div>
								 -->
								<div class="r_ge_ct">
									<div class="r_ge_cta"><img src="/images/yard/r_g.jpg"></div>
									<div class="r_ge_ctb">最后登录：</div>
									<div class="r_ge_ctc" style="width:90px;"><?php if($user->last_login!=""){echo substr($user->last_login,0,10);}else{echo "未知";}?></div>
								</div>
							</div>
							<div id="friendbox">
								<div class="friend">
									<div id="friend_l0">
										<img src="/images/yard/friend_l0.jpg" />
									</div>
									<div id="friend_word0">好友</div>
									<div id="friend_r0">
										<img src="/images/yard/friend_r0.jpg" />
									</div>
								</div>
								<div class="friend">
									<div id="friend_l1">
										<img src="/images/yard/friend_l1.jpg" />
									</div>
									<div id="friend_word1">最近访客</div>
									<div id="friend_r1">
										<img src="/images/yard/friend_r1.jpg" />
									</div>
								</div>
								<?php if(!$id){?>
								<div id="query_friend" style="float:right;">查询好友</div>
								<?php }?>
							</div>
						<div id="pic_r">
							<div id="pic_0" >
								<?php
								$visit = $db->query("select id,f_avatar,f_id,f_name from eachbb_member.visit_history where u_id='{$user->id}' order by create_at desc limit 9;");
								$m_visit = $db->record_count;
								$friend = $db->query("select id,f_name,f_id,f_avatar from eachbb_member.friend where u_id='{$user->id}' order by created_at desc limit 9;");
								$m_friend = $db->record_count;
								for($i=0;$i<$m_friend;$i++){?>
								<div class="pic_box">
									<div class="pic_pg" id="pic_pg_0">
										<a href="/yard/index.php?id=<?php echo $friend[$i]->f_id;?>" target="_blank">
										<IMG  class="pic_img" src="<?php if ($friend[$i]->f_avatar != null){echo thumb_name($friend[$i]->f_avatar,'small');}else{echo '/images/yard_info_img/1.jpg';}?>"/>
										</a>
									</div>
									<div class="name_pic"><a title="<?php echo $friend[$i]->f_name;?>" href="/yard/index.php?id=<?php echo $friend[$i]->f_id;?>"><?php echo $friend[$i]->f_name;?></a></div>
								</div>
								<?php }?>
							</div>
							<div id="pic_1" style="display:none;">
								<?php for($i=0;$i<$m_visit;$i++){?>
								<div class="pic_box">
									<div class="pic_pg">
										<a href="/yard/index.php?id=<?php echo $visit[$i]->f_id;?>" target="_blank">
										<IMG  class="pic_img" src="<?php if ($visit[$i]->f_avatar != null){echo thumb_name($visit[$i]->f_avatar,'small');}else{echo '/images/yard_info_img/1.jpg';}?>"/>
										</a>
									</div>
									<div class="name_pic"><a title="<?php echo $visit[$i]->f_name;?>" href="/yard/index.php?id=<?php echo $visit[$i]->f_id;?>"><?php echo $visit[$i]->f_name;?></a></div>
								</div>
								<?php } ?>
							</div>
						</div>
						</div>
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

