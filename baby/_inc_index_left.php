<div id="user">
	<div id="user_ma">
	<div id="user_ma_s"><font size="2" color="red" ><b>个人信息管理</b></font></div>
	<div id="user_ma_b"></div>
	<div id="user_ma_h"><div style="float:left;height:50px;width:50px;"><img  src="<?php echo $user->avatar; ?>" style="height:50px;width:50px;"/></div><div style="float:left;margin-left:3px;"><font size="2"><b><?php if($user->name)echo $user->name; ?></b></font></div></div>
	<div class="user_b">
	<?php 
		$db = get_db();
		$count_new = $db->query("select count(id) as num from eachbb_member.message where recieve_id={$user->id} and status=0");
		if(!$count_new){
			$count_new = 0;
		}else{
			$count_new = $count_new[0]->num;
		}
	?>
	<div class="user_b_t"><a href="/baby/message_index.php">您有<font size="2" ><?php echo $count_new;?></font>条新消息</a></div>
	<div class="user_b_t" style="padding-bottom:5px;"><a href="/yard/">我的小院子</a></div></div>
	</div>
	<div id="user_me">
	<div id="user_me_top"></div>
	<div id="user_me_center">
		<div id="user_me_middle">
			<div class="user_me_s" >
				<div id="user_baby" ><img src="/images/avatar/bpoint.png"></img><a href="/baby" style='color:#000; text-decoration: none;'><font size="2"><b>宝宝首页</b></font></a></div>
				<div class="user_me_t" ><img src="/images/avatar/bpoint.png"></img><font size="2"><b>用户信息</b></font></div>
					<div class="user_me_b">
						<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">基本信息</font></div>
						<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">头像选择</font></div>
						<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">密码修改</font></div>
				</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>订单信息</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">最新订单</font></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">历史订单</font></div>
<!--			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">订单发货查询</font></div>-->
<!--			<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">往期订单查询</font></div>-->
			</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>测评报告</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">最新测评</font></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">历史测评</font></div>
<!--			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">测评查询</font></div>-->
<!--			<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">测评历史查询</font></div>-->
			</div>
			</div>
			<div class="user_me_s">
			<div class="user_me_t"><img src="/images/avatar/bpoint.png"></img><font size="2"><b>订购课程</b></font></div>
			<div class="user_me_b">
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">最新订购课程</font></div>
			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">历史订购课程</font></div>
<!--			<div class="user_me_t"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">课程查询</font></div>-->
<!--			<div class="user_me_t" style="padding-bottom:10px;"><img src="/images/avatar/cpoint.png"></img><font size="2" color="black">课程历史查询</font></div>-->
			</div>
			</div>
			<div id="user_me_o"><img src="/images/avatar/bpoint.png"></img><font size="2" color="black" style="text-decoration: none;">[退出]</font></div>
		</div>
	</div>
	<div id="user_me_bottom"></div>
	</div>
	<div id="user_ad"><a href="4thblog.php"><img src="/images/avatar/user_ad.png" border="0"></img></a></div>
    </div>