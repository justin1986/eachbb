<!-- 右边 -->
<?php
		include_once dirname(__FILE__).'/../frame.php';
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
		function birthday($birthday){
			echo $birthday;
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
					<div class="indiv_value"><font>年龄：</font><?php echo birthday($user->birthday);?>岁</div>
					<div class="indiv_value" style="color:#37B0AD;"><font>宝宝：</font><?php echo $user->baby_name;?></div>
					<div class="indiv_value" style="color:#37B0AD;"><font>年龄：</font><?php echo $user->baby_birthday;?>个月</div>
				</div>
			</div>
			<div class="indiv_bottom">
				用户提问数<a href="#">(233)</a>
			</div>
			<div class="indiv_bottom" style="border-left:1px solid #FF9600;">
				用户回答数<a href="#">(233)</a>
			</div>
		</div>
	</div>
	<a href="/course/"><img class="recommand" src="/images/assistant_list/r_input.jpg"/></a>
	<a href="/test/"><img class="recommand" src="/images/assistant_list/btn_test.jpg"/></a>
	<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
	<div id="attention">
		<div id="att_top">热点关注<a href="#">更多&gt;&gt;</a></div>
		<div id="att_content">
			<div class="v_kong"></div>
			<?php for($i = 0 ; $i < 5 ; $i++){ ?>
			<div class="att_container">
				<div></div>
				<a href="#">斯蒂芬撒旦发射</a>
			</div>
			<?php } ?>
			<div class="v_kong"></div>
		</div>
		<div id="att_bottom"></div>
	</div>
	<a href="#"><img class="recommand" style="height:159px;" src="/images/assistant_list/img_1.jpg"/></a>
	<a href="#"><img class="recommand" style="height:152px;" src="/images/assistant_list/img_2.jpg"/></a>
</div>