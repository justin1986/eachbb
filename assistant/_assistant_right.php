<!-- 右边 -->
<?php
		include_once dirname(__FILE__).'/../frame.php';
		use_jquery();
		$user = User::current_user();
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
			if( $time > 70)
			{
				$time=0;
			}
			return $time;
		}
	?>
	<style>
		.indiv_value{margin-top:10px;}
		#indiv_value{margin-top:10px;}
		#indiv_container{height:170px;}
		#container_recommand a img{margin-top:8px;}
		#indiv_name a{font-size:15px; font-weight:bold; color:#00398B; text-decoration: none;}
	</style>
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
					<div id="indiv_name"><a target="_blank" href="/yard/home.php?id=<?php echo $user->id;?>"><?php echo $user->true_name;?></a></div>
					<div class="indiv_value" style="margin-top:25px;"><font>来自：</font><?php echo $user->address;?></div>
					<div class="indiv_value"><font>性别：</font><?php echo gender($user->gender);?></div>
					<div class="indiv_value"><font>年龄：</font><?php echo son($user->birthday)?son($user->birthday) : 0;?>岁</div>
					</div>
			</div>
			<div class="indiv_value" style="width:160px; margin-top:0px; margin-left:10px; color:#37B0AD; float:left; display:inline;"><font>宝宝：</font><?php echo $user->baby_name;?></div>
			<div class="indiv_value" style="width:160px; margin-left:10px; color:#37B0AD; float:left; display:inline;"><font>年龄：</font><?php echo birhday($user->baby_birthday) ? birhday($user->baby_birthday) : 0;?>个月</div>
		</div>
	</div>
	<a href="/course"><img class="recommand" src="/images/assistant_list/r_input.jpg"/></a>
	<a href="/test/"><img class="recommand" src="/images/assistant_list/btn_test.jpg"/></a>
	<a href="#"><img class="recommand" style="height:137px;" src="/images/assistant_list/217.jpg"/></a>
	<a href="#"><img class="recommand" style="height:159px;" src="/images/assistant_list/img_1.jpg"/></a>
	<a href="#"><img class="recommand" style="height:152px;" src="/images/assistant_list/img_2.jpg"/></a>
</div>