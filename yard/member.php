<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member');
		js_include_tag('yard/yard','member');
		$db = get_db();
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");?>
			<script>window.location.href="/login/";</script>
			<?php 
		}
		$id=$user->id;
		$member = new table_class('eachbb_member.member');
		$member->find($id);
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time">2010年05月28日</div>
			<div id="yard_day_ct">星期天</div>
		</div>
		<div id="menu_a" class="menu_pic"style="background:url(../images/yard/m_a.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic" style="background:url(../images/yard/m_1.jpg) no-repeat;"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_e" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
	</div>
	<div id="content">
		<div id="c_l">
			<div id="cll_z">
				<div class="cll_zz" style="background:url(/images/yard/ffffff.gif) no-repeat;">
					<div class="cllz_img" style="background:url(/images/yard/l_a.jpg) no-repeat;"></div>
					<div class="cllz_word">音乐</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_b.jpg) no-repeat;"></div>
					<div class="cllz_word">转帖</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_c.jpg) no-repeat;"></div>
					<div class="cllz_word">投票</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_d.jpg) no-repeat;"></div>
					<div class="cllz_word">说秘密</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_e.jpg) no-repeat;"></div>
					<div class="cllz_word">真心话</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_f.jpg) no-repeat;"></div>
					<div class="cllz_word">天天向上</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_g.jpg) no-repeat;"></div>
					<div class="cllz_word">游戏大厅</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_k.jpg) no-repeat;"></div>
					<div class="cllz_word">宠物村</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_l.jpg) no-repeat;"></div>
					<div class="cllz_word">池塘边</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_m.jpg) no-repeat;"></div>
					<div class="cllz_word">梦幻城</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_p.jpg) no-repeat;"></div>
					<div class="cllz_word">阳光牧场</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_o.jpg) no-repeat;"></div>
					<div class="cllz_word">绿光森林</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_q.jpg) no-repeat;"></div>
					<div class="cllz_word">抢吧</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_r.jpg) no-repeat;"></div>
					<div class="cllz_word">贺卡</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_s.jpg) no-repeat;"></div>
					<div class="cllz_word">新手任务</div>
				</div>
				<div class="cll_zz">
					<div class="cllz_img" style="background:url(/images/yard/l_t.jpg) no-repeat;"></div>
					<div class="cllz_word">白小报</div>
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
				<div id="r_pho">
					<div id="r_img">
						<div id="r_pto"><img src="/images/yard/r_pg_pg.jpg"></div>
						<div id="r_bb">网趣宝宝</div>
						<div id="r_num">被访问过0次</div>
					</div>
					<div id="r_geng"> 
						<div id="r_ge_a">
							<div id="r_gi_a"></div>
							<div id="r_gw_a"><a href="#">更换头像</a></div>
						</div>
						<div id="r_ge_b">
							<div id="r_gi_b"></div>
							<div id="r_gw_b"><a href="#">修改档案</a></div>
						</div>
					</div>
					<div id="r_ge_ge">
						<div id="r_ge_hr"></div>
						<div id="r_ge_table">
							<div class="r_ge_ct">
								<div class="r_ge_cta"><img src="/images/yard/r_a.jpg"></div>
								<div class="r_ge_ctb">性别：</div>
								<div class="r_ge_ctc">男</div>
							</div>
							<div class="r_ge_ct">
								<div class="r_ge_cta"><img src="/images/yard/r_b.jpg"></div>
								<div class="r_ge_ctb">生日：</div>
								<div class="r_ge_ctc">1988-12-12</div>
							</div>
							<div class="r_ge_ct">
								<div class="r_ge_cta"><img src="/images/yard/r_c.jpg"></div>
								<div class="r_ge_ctb">地址：</div>
								<div class="r_ge_ctc">北京市 参赛权</div>
							</div>
							<div class="r_ge_ct">
								<div class="r_ge_cta"><img src="/images/yard/r_d.jpg"></div>
								<div class="r_ge_ctb">金币：</div>
								<div class="r_ge_ctc">5</div>
							</div>
							<div class="r_ge_ct">
								<div class="r_ge_cta"><img src="/images/yard/r_e.jpg"></div>
								<div class="r_ge_ctb">等级：</div>
								<div class="r_ge_ctc">2级</div>
							</div>
							<div class="r_ge_ct">
								<div class="r_ge_cta"><img src="/images/yard/r_g.jpg"></div>
								<div class="r_ge_ctb">最后登录：</div>
								<div class="r_ge_ctc">2010-2-2</div>
							</div>
						</div>
						<div id="friend">
							<div id="friend_a"></div>
							<div id="friend_b"></div>
						</div>
						<div id="pic_r">
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
							<div class="pic_pg">
								<a href="#">
								<IMG  class="pic_img" src="/images/yard/pho.jpg"/>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
	</div>
</div>
</body>
</html>
