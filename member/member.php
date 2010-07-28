<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-用户中心</title>
	<?php 
		include_once dirname(__FILE__).'/../frame.php';
		css_include_tag('member');
		use_jquery();
		js_include_tag('member');
		
	?>
</head>
<?php
	$id = intval($_GET['id']);
	if(empty($id)){
		die('非法访问');
	}
	$member = new table_class('eachbb_member.member');
	$member->find($id);
	$db = get_db();
?>
<body>
<div id="top_login">
	<div id="login">
		<div id="login_login">
			<div id="login_img"></div>
			<div id="login_word">登录</div>
		</div>
		<div id="register">
			<div id="register_img"></div>
			<div id="register_word">注册</div>
		</div>
		<div id="comeback">
			<div id="comeback_img"></div>
			<div id="comeback_word">返回首页</div>
		</div>
		<div id="member">
			<div id="member_img"></div>
			<div id="member_word">用户中心</div>
		</div>
	</div>
</div>
<div id="top_menu">
	<div id="menu_pg">
		<div id="menu_left">
			<div id="wangqu"></div>
		</div>
		<div id="menu_center"></div>
		<div id="menu_right"></div>
	</div>
</div>
<div id="ibody">
	<div id=ibody_left>
		<div id=member_left_top></div>
		<div id=member_left_middle>
			<div id=member_left_content>
				<div id=pic><a href=""><img border=0 src="/images/member/1.jpg"></a></div>
				<div id=pictitle><a href="">564828</a></div>
				<div id=piccontent>
					<button></button>
				</div>
				<div id=myscore>我的积分：
					<button></button>
				</div>
				<div class=l_title>用户信息</div>
				<div class=l_content>
					<div class=content><a href="">欢迎页</a></div>
					<div class=content><a href="">基本信息</a></div>
					<div class=content><a href="">会员信息</a></div>
					<div class=content><a href="">密码设置修改</a></div>
				</div>
				<div class=l_title>妈妈助手</div>
				<div class=l_content>
					<div class=content><a href="">最新新闻</a></div>
					<div class=content><a href="">助手推荐</a></div>
					<div class=content><a href="">发布新闻</a></div>
					<div class=content><a href="">收藏助手</a></div>
				</div>
				<div class=l_title>订单信息</div>
				<div class=l_content>
					<div class=content><a href="">最新订单</a></div>
					<div class=content><a href="">我的订单</a></div>
					<div class=content><a href="">订单发货查询</a></div>
					<div class=content><a href="">往期订单查询</a></div>
				</div>
				<div class=l_title>测评报告</div>
				<div class=l_content>
					<div class=content><a href="">最新订单</a></div>
					<div class=content><a href="">我的订单</a></div>
					<div class=content><a href="">订单发货查询</a></div>
					<div class=content><a href="">往期订单查询</a></div>
				</div>
				<div class=l_title>订购课程</div>
				<div class=l_content>
					<div class=content><a href="">最新订单</a></div>
					<div class=content><a href="">我的订单</a></div>
					<div class=content><a href="">订单发货查询</a></div>
					<div class=content><a href="">往期订单查询</a></div>
				</div>
				<div class="l_title exit"><a href="">[退出]</a></div>
			</div>
		</div>
		<div id=member_left_bottom></div>
	</div>
	<div id=ibody_right>
		<div class=r_title>基本<span>信息</span></div>
		<form>
		<table class=r_table>
			<tr>
				<td class=td1>昵称：</td>
				<td class=td2><span><?php echo $member->name;?></span></td>
			</tr>
			<tr>
				<td class=td1>电子邮箱：</td>
				<td class=td2><span><?php echo $member->email;?></span></td>
			</tr>
			<tr>
				<td class=td1>性别：</td>
				<td class=td2><input class="radio" type="radio" name='gender' <?php if($member->gender==1){?>checked=checked<?php }?> value="1">
					男
					<input class="radio" type="radio" value="2"  name='gender' <?php if($member->gender==2){?>checked=checked<?php }?>>
					女</td>
			</tr>
			<tr>
				<td class=td1>固定电话：</td>
				<td class=td2><input name='fix_phone' maxlength="13" value="<?php echo htmlspecialchars($member->fix_phone);?>" type="text"/></td>
			</tr>
			<tr>
				<td class=td1>联系手机：</td>
				<td class=td2><input type="text" name='phone' maxlength="11" value="<?php echo htmlspecialchars($member->phone);?>" /></td>
			</tr>
			<tr>
				<td class=td1>身份证号：</td>
				<td class=td2><input type="text" name='id_num' maxlength="18" value="<?php echo htmlspecialchars($member->id_num);?>" /></td>
			</tr>
			<tr>
				<td class=td1>教育程度：</td>
				<td class=td2><select name='education'>
						<option value=''>请选择</option>
						<option value='高中/中专'>高中/中专</option>
						<option value='大学本科/大学专科'>大学本科/大学专科</option>
						<option value='硕士'>硕士</option>
						<option value='博士'>博士</option>
					</select></td>
			</tr>
			<script>$("[name=education]").val('<?php echo $member->education;?>')</script>
			<tr>
				<td class=td1>行业：</td>
				<td class=td2><select name='industry'>
						  <option value=''>请选择</option>
						  <option value="1.制造业">1.制造业</option>
	                      <option value="2.进出口贸易">2.进出口贸易</option>
	                      <option value="3.批发 零售分销">3.批发/零售/分销</option>
	                      <option value="4.产品代理">4.产品代理</option>
	                      <option value="5.银行 金融">5.银行/金融</option>
	                      <option value="6.保险业">6.保险业</option>
	                      <option value="7.电信服务业">7.电信服务业</option>
	                      <option value="8.邮政服务">8.邮政服务</option>
	                      <option value="9.网络 信息服务 电子商务">9.网络/信息服务/电子商务</option>
	                      <option value="10.公用事业">10.公用事业</option>
	                      <option value="11.酒店 旅游">11.酒店/旅游</option>
	                      <option value="12.房地产">12.房地产</option>
	                      <option value="13.建筑">13.建筑</option>
	                      <option value="14.政府机构">14.政府机构</option>
	                      <option value="15.文化 教育 培训">15.文化/教育/培训</option>
	                      <option value="16.交通运输 航空 船务 铁路 货运等">16.交通运输(航空，船务，铁路，货运等)</option>
	                      <option value="17.法律 会计">17.法律/会计</option>
	                      <option value="18.商业咨询 顾问服务">18.商业咨询/顾问服务</option>
	                      <option value="19.媒体 公关 出版 广播 广告等">19.媒体/公关（出版，广播，广告等）</option>
	                      <option value="20.其他">20.其他</option>
					</select></td>
			</tr>
			<script>$("[name=industry]").val('<?php echo $member->industry;?>')</script>
			<tr>
				<td class=td1>家庭月收入：</td>
				<td class=td2><select name='income'>
						<option value=''>请选择</option>
						<option value='1000元以下'>1000元以下</option>
						<option value='1000-3000元'>1000-3000元</option>
						<option value='3000-5000元'>3000-5000元</option>
						<option value='5000-8000元'>5000-8000元</option>
						<option value='8000-10000元'>8000-10000元</option>
						<option value='10000元以上'>10000元以上</option>
					</select></td>
			</tr>
			<script>$("[name=income]").val('<?php echo $member->income;?>')</script>
		</table>
		<div class=r_title>会员<span>信息</span></div>
		<table class=r_table>
			<tr>
				<td class=td1><span>*</span> 真实姓名：</td>
				<td class=td2><input name="true_name" maxlength="6" value="<?php echo htmlspecialchars($member->true_name);?>" type="text"/></td>
			</tr>
			<?php 
				$address = $member->address;
				$address = explode('-',$address);
			?>
			<tr>
				<td class=td1><span>*</span> 地址：</td>
				<td class=td2><select name="province">
						<option value=''>请选择</option>
						<?php
							 $province = $db->query("select province from phpcms_city group by province order by cityid");
							 foreach($province as $v){
						?>
						<option value='<?php echo $v->province;?>'><?php echo $v->province;?></option>
						<?php }?>
					</select>
					<script>$("[name=province]").val('<?php echo $address[0];?>')</script>
					<select name="city">
						<option value=''>请选择</option>
					</select>
					<script>show_city('<?php echo $address[1];?>');</script>
					<br>
					<input name="address" maxlength="30" value="<?php echo htmlspecialchars($address[2]);?>" type="text"/></td>
			</tr>
			<tr>
				<td class=td1><span>*</span> 邮政编码：</td>
				<td class=td2><input name="zip" maxlength="6" value="<?php echo htmlspecialchars($member->zip);?>" type="text"/></td>
			</tr>
			<tr>
			<?php 
				$birthday = substr($member->birthday,0,10);
				$birthday = explode('-',$birthday);
				if($birthday[1]<10)$birthday[1] = substr($birthday[1],1,1);
				if($birthday[2]<10)$birthday[2] = substr($birthday[2],1,1);
			?>
				<td class=td1><span>*</span> 您的生日：</td>
				<td class=td2><select name="year">
						<option value=''>请选择</option>
						<?php
							$now_year = date('Y');
							for($i=$now_year;$i>$now_year-50;$i--){
						?>
						<option value='<?php echo $i;?>'><?php echo $i;?>年</option>
						<?php }?>
					</select>
					年<script>$("[name=year]").val('<?php echo $birthday[0];?>')</script>
					<select name="month">
						<option value=''>请选择</option>
						<?php
							for($i=1;$i<13;$i++){
						?>
						<option value='<?php echo $i;?>'><?php echo $i;?>月</option>
						<?php }?>
					</select>
					月<script>$("[name=month]").val('<?php echo $birthday[1];?>')</script>
					<select name="day">
						<option value=''>请选择</option>
					</select><script>show_day('<?php echo $birthday[2];?>');</script>
					日 </td>
			</tr>
		</table>
		<div class=r_title>宝宝<span>信息</span></div>
		<table class=r_table>
			<tr>
				<td class=td1><span>*</span> 宝宝信息：</td>
				<td class=td2><input class="radio" type="radio" <?php if($member->baby_status==2){?>checked="checked"<?php }?> name="nowstate" value="2" />
					未怀孕
					<input class="radio" type="radio" name="nowstate" value="3" <?php if($member->baby_status==3){?>checked="checked"<?php }?>>
					怀孕中
					<input class="radio" type="radio" name="nowstate" value="1" <?php if($member->baby_status==1){?>checked="checked"<?php }?>>
					已经生育</td>
			</tr>
			<tr class="bbs">
			<?php 
				$birthday = substr($member->baby_birthday,0,10);
				$birthday = explode('-',$birthday);
				if($birthday[1]<10)$birthday[1] = substr($birthday[1],1,1);
				if($birthday[2]<10)$birthday[2] = substr($birthday[2],1,1);
			?>
				<td class=td1>出生日期：</td>
				<td class=td2><select name="bb_year">
						<option value=''>请选择</option>
						<?php
							$now_year = date('Y');
							for($i=$now_year+2;$i>$now_year-10;$i--){
						?>
						<option value='<?php echo $i;?>'><?php echo $i;?>年</option>
						<?php }?>
					</select>
					年
					<script>$("[name=bb_year]").val('<?php echo $birthday[0];?>')</script>
					<select name="bb_month">
						<option value=''>请选择</option>
						<?php
							for($i=1;$i<13;$i++){
						?>
						<option value='<?php echo $i;?>'><?php echo $i;?>月</option>
						<?php }?>
					</select>
					月
					<script>$("[name=bb_month]").val('<?php echo $birthday[1];?>')</script>
					<select name="bb_day">
						<option value=''>请选择</option>
					</select>
					<script>show_baby_day('<?php echo $birthday[2];?>');</script>
					日 </td>
			</tr>
			<tr class="bbs">
				<td class=td1>宝宝姓名：</td>
				<td class=td2><input name="baby_name" maxlength="6" value="<?php echo htmlspecialchars($member->baby_name);?>" type="text" /></td>
			</tr>
			<tr class="bbs">
				<td class=td1>宝宝性别：</td>
				<td class=td2><input class="radio" type="radio" name="babysex" <?php if($member->baby_gender==1){?>checked="checked"<?php }?> value="1" />
					男
					<input class="radio" type="radio" name="babysex" value="2" <?php if($member->baby_gender==2){?>checked="checked"<?php }?> />
					女</td>
			</tr>
		</table>
		<div id=r_button>
			<button id="submit"></button>
		</div>
		<input type="hidden" name="id" value=<?php echo $id;?>>
		</form>
	</div>
	<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
	<div id="bottom_b">哈哈少儿旗下网站  Copyright ? 1997-2010 HAHA.smg.com All Rights Reserved.</div>
</div>
</body>
</html>
