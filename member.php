<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-用户中心</title>
	<?php 
		include_once dirname(__FILE__).'/frame.php';
		css_include_tag('member');
		use_jquery();
	?>
</head>
<?php
	$id = intval($_GET['id']);
	if(empty($id)){
		die('非法访问');
	}
	$member = new table_class('eb_member');
	$member->find($id);
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
				<td class=td2><input class="radio" type="radio" name="gender" <?php if($member->gender==1){?>checked=checked<?php }?> value="1" />
					男
					<input class="radio" type="radio" name="gender" value="2" <?php if($member->gender==2){?>checked=checked<?php }?>/>
					女</td>
			</tr>
			<tr>
				<td class=td1>固定电话：</td>
				<td class=td2><input name='fix_phone' value="<?php echo $member->fix_phone;?>" type="text"/></td>
			</tr>
			<tr>
				<td class=td1>联系手机：</td>
				<td class=td2><input type="text" name='phone' value="<?php echo $member->phone;?>" /></td>
			</tr>
			<tr>
				<td class=td1>身份证号：</td>
				<td class=td2><input type="text" name='id_num' value="<?php echo $member->id_num;?>" /></td>
			</tr>
			<tr>
				<td class=td1>教育程度：</td>
				<td class=td2><select name='education' id='education'>
						<option value=''>请选择</option>
						<option value='高中/中专'>高中/中专</option>
						<option value='大学本科/大学专科'>大学本科/大学专科</option>
						<option value='硕士'>硕士</option>
						<option value='博士'>博士</option>
					</select></td>
			</tr>
			<script>$("#education").val('<?php echo $member->education;?>')</script>
			<tr>
				<td class=td1>行业：</td>
				<td class=td2><select name='industry' id="industry">
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
			<script>$("#industry").val('<?php echo $member->industry;?>')</script>
			<tr>
				<td class=td1>家庭月收入：</td>
				<td class=td2><select name='income' id='income'>
						<option value=''>请选择</option>
						<option value='1000元以下'>1000元以下</option>
						<option value='1000-3000元'>1000-3000元</option>
						<option value='3000-5000元'>3000-5000元</option>
						<option value='5000-8000元'>5000-8000元</option>
						<option value='8000-10000元'>8000-10000元</option>
						<option value='10000元以上'>10000元以上</option>
					</select></td>
			</tr>
			<script>$("#income").val('<?php echo $member->income;?>')</script>
		</table>
		<div class=r_title>会员<span>信息</span></div>
		<table class=r_table>
			<tr>
				<td class=td1><span>*</span> 注册手机：</td>
				<td class=td2><input type="text"/></td>
			</tr>
			<tr>
				<td class=td1><span>*</span> 真实姓名：</td>
				<td class=td2><input type="text"/></td>
			</tr>
			<tr>
				<td class=td1><span>*</span> 地址：</td>
				<td class=td2><select>
						<option>请选择</option>
					</select>
					<select>
						<option>请选择</option>
					</select>
					<select>
						<option>请选择</option>
					</select>
					<br>
					<input type="text"/></td>
			</tr>
			<tr>
				<td class=td1><span>*</span> 邮政编码：</td>
				<td class=td2><input type="text"/></td>
			</tr>
			<tr>
				<td class=td1><span>*</span> 您的生日：</td>
				<td class=td2><select>
						<option>请选择</option>
					</select>
					年
					<select>
						<option>请选择</option>
					</select>
					月
					<select>
						<option>请选择</option>
					</select>
					日 </td>
			</tr>
		</table>
		<div class=r_title>宝宝<span>信息</span></div>
		<table class=r_table>
			<tr>
				<td class=td1><span>*</span> 宝宝信息：</td>
				<td class=td2><input class="radio" type="radio" name="nowstate" checked=checked value="准备怀孕" />
					准备怀孕
					<input class="radio" type="radio" name="nowstate" value="预产期" />
					预产期
					<input class="radio" type="radio" name="nowstate" value="宝宝生日" />
					宝宝生日</td>
			</tr>
			
			<tr>
				<td class=td1>出生日期：</td>
				<td class=td2><select>
						<option>请选择</option>
					</select>
					年
					<select>
						<option>请选择</option>
					</select>
					月
					<select>
						<option>请选择</option>
					</select>
					日 </td>
			</tr>
			<tr>
				<td class=td1>宝宝姓名：</td>
				<td class=td2><input type="text" /></td>
			</tr>
			<tr>
				<td class=td1>宝宝性别：</td>
				<td class=td2><input class="radio" type="radio" name="babysex" checked=checked value="1" />
					男
					<input class="radio" type="radio" name="babysex" value="0" />
					女</td>
			</tr>
		</table>
		<div id=r_button>
			<button></button>
		</div>
	</div>
	<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
	<div id="bottom_b">哈哈少儿旗下网站  Copyright ? 1997-2010 HAHA.smg.com All Rights Reserved.</div>
</div>
</body>
</html>
