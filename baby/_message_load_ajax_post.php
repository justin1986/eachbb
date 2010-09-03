	<?php 
		include_once('../frame.php');
		$user = User::current_user();
		$db = get_db();
	?>
		<div id="right">
	     		<div class="right_dvi"><img src="/images/avatar/point.png"></img><font size="2" style="margin-left:5px;"><b>已读</b></font><font size="2" color="red"><b>消息</b></font>
     					<div class="ri_message" id="road_message">返回</div>
	     				<div class="ri_message" id="r_dele">回收站</div>
	     		</div>
	     		<div class="line1" ><hr color="#A3C1CD" width=100%; size="2" /></div>
	    </div>
			<?php 
				$list=$db->query("SELECT * FROM eachbb_member.message m where recieve_id={$user->id} and status=1 order by created_at desc LIMIT 50");
				if($list){
					$i=0;
				foreach ($list as $list){
				$member=$db->query("SELECT name,avatar FROM eachbb_member.member where id={$list->send_id}");
			?>
			<div class="message_stauts">
					<div class="message_title">发布时间：&nbsp;<font><?php echo $list->last_edit_at;?></font>
							<div class="banner_dell">
								<input type="hidden" id="banner_<?php echo $i;?>" value="<?php echo $list->id;?>"/>删除
							</div>
					</div>
					<div class="message_banner">
							<img class="message_img" src="<?php echo $list->avatar;?>"/>
							<div class="message_result"><?php echo $list->content;?></div>
					</div>
			</div>
			<?php $i++; }}else{
					echo 
					'<div class="message_banner" style="line-height:50px; font-size:20px; text-align:center;">
					对不起！已读消息为空！
					</div>';
				}
			?>