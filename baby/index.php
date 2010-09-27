<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Language" content="zh-cn">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>我的宝宝</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('baby','test_report','yard','baby_info','yard_reset_password');
		js_include_tag('yard/yard_info','baby/report','member');
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/?last_url=/baby/');
			exit();
		}
		$db = get_db();
		$avatars =$db->query("SELECT id,photo,status FROM eachbb_member.member_avatar where u_id=".$user->id.' order by create_at desc limit 3');
		$avatar_count = $db->record_count;
		$name =$user->name;
		session_start();
		$_SESSION['page_from'] = 'baby';
	?>
</head>
<body>
<div id="ibody">
<input type="hidden"  id="type_test" value="<?php echo $_GET["type"];?>"/>
	<?php include_once(dirname(__FILE__).'/../inc/_baby_top.php'); ?>
	<?php include_once(dirname(__FILE__).'/../baby/_inc_index_left.php'); ?>
	<div id="haha">
		<div id="right">
	     	<div id="right_up">
	     		<div ><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>基本</b></font><font size="2" color="red"><b>信息</b></font></div>
	     		<div class="line1" ><hr color="#A3C1CD" width=100%; size="2" /></div>
	     		<div id="head">
						<div id="head_b">
							<img id="pic_left" src="<?php echo $user->avatar ? $user->avatar : '/images/yard_info_img/1.jpg'; ?>"/>
						</div>
						<div style="float:left;margin-top:5px;"><font size="3" ><B>我的头像库</B></font><font size="2" >(</font><font size="2" color="red" ><?php echo $avatar_count;?></font><font size="2" >张)</font></div>
						<div class="pichr_menu" id="set_avatar" name="/baby" style="margin-left:100px;float:left;margin-top:5px;"><font size="2">[选择头像]</font></div>
				    <div style="margin-top:5px;margin-left:5px;height:20px; float:left;"><a href="/yard/info.php"><font size="2" color="red" >[上传头像]</font></a></div>
				    <div style="margin-top:5px;height:7px;float:left;"><hr color="#8A7777" width=401px;; size="2" /></div>
					  <div id="pic_hr_pg">
					  	<?php 
									if($avatars){
										for($i=0 ; $i < $avatar_count; $i++){
											if($avatars[$i]->status == 1){
												$current_avatar_index = $i;
											}
										}
									}
										for( $i=0; $i < 3 ; $i++){
											if($i < $avatar_count){
												$avatar_id = $avatars[$i]->id;
											}else{
												$avatar_id = "default_avatar";
											}
										?>
										<div class="avatar_container" id="<?php echo $avatar_id;?>" <?php if($i == 0){  if($current_avatar_index == $i){echo 'style="margin-left:5px; background:url(/images/yard_info_img/pg2.jpg) no-repeat;"';}else{?>style='margin-left:0px;' <?php }}?><?php if($current_avatar_index == $i){echo 'style="background:url(/images/yard_info_img/pg2.jpg) no-repeat;"';}?>>
											<img src="<?php echo  $avatars[$i]->photo ? $avatars[$i]->photo : '/images/yard_info_img/1.jpg';?>"/>
										</div>
										<?php }?>
					  </div>
				  </div>     
		<div id="right_up_right">
		<div class="record">
		<div ><font size="2" color="red"><b>好友的最新动态</b></font></div>
		<div class="add"><hr color="#A3C1CD" width=100%; size="4" /></div>
		<?php 
		$last_news=$db->query("SELECT id,content,u_id,u_name from eachbb_member.lastest_news where u_id in (SELECT f_id FROM eachbb_member.friend where u_id={$user->id}) and resource_type='oneword' order by created_at desc LIMIT 7");
		for($i = 0 ; $i <= 7 ; $i++){
		?>
		<div class="text" style="width:340px; padding-left:10px; height:18px; line-height:18px; overflow:hidden; background:url(/images/avatar/smallpoint.png) no-repeat 0px 7px;">
			<?php if($last_news[$i]->u_id){?><a href="/yard/index.php?id=<?php echo $last_news[$i]->u_id; ?>">[<?php echo $last_news[$i]->u_name;?>]</a><?php }?>
			<a href="/baby/index_daily_show.php?daily_id=<?php echo $last_news[$i]->id; ?>" style="font-size:12px; color:#8C8C8C;">
				<?php echo $last_news[$i]->content; ?>
			</a>
		</div>
		<?php }?>
		</div>
		<div class="record">
		<div ><font size="2" color="red"><b>重要信息提醒</b></font></div>
		<div class="add"><hr color="#A3C1CD" width=100%; size="4" /></div>
		<div class="text" style="margin-top:5px;"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
		<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
		<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
		<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
		<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
		<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
		<div class="text"><img src="/images/avatar/smallpoint.png"></img><a href="baby.php"><font size="2">宝宝因为好奇四处探索，常常引发一系……</font></a></div>
		</div>
		<div id="mother"><a href="4th_mother.php"><img src="/images/avatar/mother.png" border="0"></img></a></div>
		</div>
	    </div>
	    </div>
	    <div id="right_bottom">
	    <div class="txt">
		    <div>
			    	<img src="/images/avatar/point.png"></img>
			    	<font size="2" style="margin-left:5px;"><b>测评</b></font>
			    	<font size="2" color="red"><b>报告</b></font>
		    </div>
	    	<div class="line1"><hr color="#F5F5F5" width=100%; size="2" /></div> <div class="line2"><hr color="#F5F5F5" width=760px; size="1" /></div>
		    	<?php 
		    		$teach=$db->query("SELECT * FROM eachbb.eb_problem e  where id in (SELECT problem_id FROM eachbb.eb_test_record e where user_id={$user->id}) order by create_time desc LIMIT 10;");
		    		for($i = 0 ; $i < 10; $i++){
		    	?>
			   	 <div class="text2" style="width:314px; height:20px; line-height:20px; overflow:hidden; padding-top:0px;">
			   	 	<img src="/images/avatar/smallpoint.png" style="margin-top:5px;"></img>
			   	 		<a href="/test/test_result.php?test_id=<?php echo $teach[$i]->id;?>">
			   	 			<font size="2" ><?php echo strip_tags($teach[$i]->description); ?></font>
			   	 		</a>
			   	 		<?php if($teach[$i]->id){?>
			   	 		<a href="/test/test_result.php?test_id=<?php echo $teach[$i]->id;?>">测试结果</a>
			   	 		<a href="/test/review.php?id=<?php echo $teach[$i]->id;?>" style="padding-left:20px;">测试回顾</a>
			   	 		<?php }?>
				</div>
				<?php }?>
	    </div>    
	    <?php 
//	    	$teach=$db->query("SELECT id,title,img_url FROM eachbb.eb_teach e where is_adopt=1 and del_flag=0 order by priority,click_count,create_time desc limit 10;");
	    ?>
	    <div class="txt">
		    <div><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>订购</b></font><font size="2" color="red"><b>课程</b></font></div>
		  	 <div class="line1"><hr color="#F5F5F5" width=100%; size="2" /></div> <div class="line2"><hr color="#F5F5F5" width=760px; size="1" /></div>
		    <?php 
		    		$teach=null;$db->query("SELECT * FROM eachbb.eb_problem e  where id in (SELECT problem_id FROM eachbb.eb_test_record e where user_id={$user->id}) order by create_time desc LIMIT 10;");
		    		for($i = 0 ; $i < 10; $i++){
		    	?>
			   	 <div class="text2" style="width:314px; height:20px; line-height:20px; overflow:hidden; padding-top:0px;">
			   	 	<img src="/images/avatar/smallpoint.png" style="margin-top:5px;"></img>
			   	 		<a href="/test/test_result.php?test_id=<?php echo $teach[$i]->id;?>">
			   	 			<font size="2" ><?php echo strip_tags($teach[$i]->description); ?></font>
			   	 		</a>
			   	 		<?php if($teach[$i]->id){?>
			   	 		<a href="/test/test_result.php?test_id=<?php echo $teach[$i]->id;?>">测试结果报表</a>
			   	 		<a href="/test/review.php?id=<?php echo $teach[$i]->id;?>" style="padding-left:20px;">测试回顾</a>
			   	 		<?php }?>
				</div>
				<?php }?>
	   </div>
	   
	    <div class="txt">
	    <div><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><B>我家</B></font><font size="2" color="red"><b>小院子</b></font></div>
	    <div class="line1"><hr color="#F5F5F5" width=100%; size="2" /></div> <div class="line2"><hr color="#F5F5F5" width=760px; size="1" /></div>
	    <div class="att"><div style="float:left"><a href="milk.php"><img src="/images/avatar/yard.png" border="0"></img></a></div>
	    <?php 	
				$diary_list=$db->query("SELECT id,title from eachbb_member.daily where u_id={$user->id} order by last_edit_time desc  limit 4;");
				if(!$diary_list){
						echo '<div style="width:440px; height:80px; line-height:80px;  margin-left:10px; text-align:center;  float:left; display:inline;"><a href="/yard/diary.php" style="font-size:20px; font-weight:bold; color:#8A9F9A;">您日志列表为空,马上发表日志吧！</a></div>';
				}else{
				foreach ($diary_list as $diary){
			?>
	    <div class="text2" style="padding-top:0px;"><img src="/images/avatar/smallpoint.png"></img><a href="/yard/diary_show.php?edit=<?php echo $diary->id;?>"><font size="2" ><?php echo htmlspecialchars_decode($diary->title);?></font></a></div>    
		<?php $i++; }}?>
	    <div id="inyard"><a href="/yard"><img src="/images/avatar/inyard.png" border="0" ></img></a></div></div> </div>
	    </div>

	</div>
        <?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
</div>
</body>
</html>

