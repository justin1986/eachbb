<!-- 右边 -->
<?php
		include_once dirname(__FILE__).'/../frame.php';
		use_jquery();
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		function gender($value){
			if($value){
				return $value == 1 ? '男' : '女';
			}else{
				return "未知";
			}
		}
		function son($time){
			return now()-substr($time,0,4);
		}
		function birhday($time){
			$time=(substr(now(),0,4)-substr($time,0,4))*12+son($time);
			if( $time > 100)
			{
				$time=0;
			}
			return $time;
		}
	?>
<div id="container_recommand">
<!-- 右边 第一个  个人档案 -->
	<div id="individual">
		<div id="indiv_top"></div>
		<div id="indiv_container">
			<div id="indiv">
				<div id="img_pg">
					<img src="<?php echo $user->avatar ? $user->avatar : '/images/assistant_list/pho.jpg';?>"/>
				</div>
				<div id="indiv_menu">
					<div id="indiv_name"><?php echo $user->true_name;?><img src="/images/assistant_list/pg_p.jpg"></div>
					<div class="indiv_value"><font>来自：</font><?php echo $user->address;?></div>
					<div class="indiv_value"><font>性别：</font><?php echo gender($user->gender);?></div>
					<div class="indiv_value"><font>年龄：</font><?php echo son($user->birthday)?son($user->birthday) : 0;?>岁</div>
					<div class="indiv_value" style="color:#37B0AD;"><font>宝宝：</font><?php echo $user->baby_name;?></div>
					<div class="indiv_value" style="color:#37B0AD;"><font>年龄：</font><?php echo birhday($user->baby_birthday) ? birhday($user->baby_birthday) : 0;?>个月</div>
				</div>
			</div>
		</div>
	</div>
	<div <?php $pos="top_image"; show_page_pos($pos,'link_i')?>><a href="<?php echo $pos_items[$pos]->href;?>"><img class="recommand" src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/assistant_list/r_input.jpg';?>"/></a></div>
	<a href="/test/"><img class="recommand" src="/images/assistant_list/btn_test.jpg"/></a>
	<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
	<a href="#"><img class="recommand" style="height:159px;" src="/images/assistant_list/img_1.jpg"/></a>
	<a href="#"><img class="recommand" style="height:152px;" src="/images/assistant_list/img_2.jpg"/></a>
</div>