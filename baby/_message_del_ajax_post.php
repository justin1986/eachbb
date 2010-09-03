	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('baby','test_report','yard','baby_info','yard_reset_password','message');
		js_include_tag('yard/yard_info','baby/message');
		$user = User::current_user();
		$id=intval($_GET['id']);
		$result=$id;
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
		if($id){
			$member=$db->query("SELECT name,avatar FROM eachbb_member.member where id=$id");
			if(!$member){
			die("非法操作！");
			}
		}
//		$avatars =$db->query("SELECT id,photo,status FROM eachbb_member.member_avatar where u_id=".$user->id.' order by create_at desc limit 3');
//		$avatar_count = $db->record_count;
//		$name =$user->name;
	?>

	<div id="haha">
		<div id="right">
	     		<div class="right_dvi"><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>回收站</b></font><font size="2" color="red"><b>信息</b></font>
     					<div class="ri_message" id="road_message">返回</div>
	     				<div class="ri_message">已读信息</div>
	     		</div>
	     		<div class="line1" ><hr color="#A3C1CD" width=100%; size="2" /></div>
	    </div>
			<?php 
				$list=$db->query("SELECT * FROM eachbb_member.message m where recieve_id=$id and status=2 order by created_at desc LIMIT 50");
				if($list){
				foreach ($list as $list){
				$member=$db->query("SELECT name,avatar FROM eachbb_member.member where id={$list->send_id}");
			?>
			<div class="message_stauts">
					<div class="message_title">删除时间：&nbsp;<font><?php echo $list->last_edit_at;?></font>
							<div class="banner_del">
								<a href="message_delete.php?id=<?php echo $list->id;?>">永久删除</a>
							</div>
					</div>
					<div class="message_banner">
							<img class="message_img" src="<?php echo $list->avatar;?>"/>
							<div class="message_result"><?php echo $list->content;?></div>
					</div>
			</div>
			<?php }}else{
					echo 
					'<div class="message_banner" style="line-height:50px; font-size:20px; text-align:center;">
					对不起！回收站为空！
					</div>';
				}
			?>