<div id="top_banner">
		<div id="logo"></div>
		<div id="top_ad"><a href="#"><img src="/images/bbs/t.jpg" /></a></div>
	</div>
	<div id="menu_container">
		<div id="menu_pg">
			<div id="menu_left"></div>
			<div id="menu_center">
				<div id="menu_ct">
					<div id="menu_ctt">
						<div class="t_first"><a href="/" style="color:#000000; font-weight:bold;">网站首页</a></div>
						<div class="me_a"><a href="/test">特色测评</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="/course">早教课程</a></div>
						<div class="me_h"></div>
						<div class="me_b" style="background:url(/images/assistant_list/top_t.jpg) no-repeat;"><a href="/assistant"><font class="son">妈妈</font><font class="bbs">助手</font></a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">我家小院子</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">我的宝宝</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">亲子论坛</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="/news">育儿咨询</a></div>
						<div class="me_h"></div>
						<div class="me_b" style="width:85px;"><a href="#">关于网趣宝宝</a></div>
						<div class="welcom">欢迎,<font>123</font></div>
						<div class="exit">退出</div>
						<div class="info">消息<a href="#" style="color:#FE843A">(1)</a></div>
					</div>
				</div>
				<div id="menu_ctb">
					<div class="me_aa"><a href="#">积极备孕页</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">孕期生活告</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">生长发育购</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">日常护理示</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">疾病与接种子</a></div>
					<div class="me_hh"></div>
					<div class="me_bb" ><a href="#">早期教育置</a></div>
					<div class="me_hh"></div>
					<div class="me_bb" ><a href="#">宠爱自己</a></div>
					<input type="text" id="me_in">
					<input type="button" id="me_btn">
				</div>
			</div>
			<div id="menu_right"></div>
		</div>
	</div>
	
	<div id="top2">
		<div id="top2_t">
			<div id="tt_l"></div>
			<div id="tt_c">
				<div class="ttc_a"><a href="?age=-2&category_id=<?php echo $category_id;?>">准备怀孕</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=-1&category_id=<?php echo $category_id;?>">怀孕期</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=1&category_id=<?php echo $category_id;?>">0～1岁</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=2&category_id=<?php echo $category_id;?>">1～2岁</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=3&category_id=<?php echo $category_id;?>">2～3岁</a></div>
				<a href="#">
				<img id="ttc_g" src="/images/helper/t_2.jpg"/>
				</a>
			</div>
			<div id="tt_r"></div>
		</div>
		<div id="top2_b">
			<div id="t2b_l">你的宝宝多大了?</div>
			<div id="t2b_r">
				<div id="t2b_hr">
					<?php for($i=0;$i<40;$i++){?>
					<div class="age_block" id="<?php echo $i;?>"></div>
					<?php }?>
				</div>
				<script type="text/javascript">
					$('.age_block').hover(function(){
						$(this).css('width','10px');
						$(this).css('background-color','#76B037');
					},function(){
						$(this).css('width','8px');
						$(this).css('background-color','#D8EDC6');
					}).click(function(){
						window.location.href = "topic.php?id=" + $(this).attr('id');
					});
				</script>
				<div id="t2bv_a"><a href="#">怀孕期</a></div>
				<div id="t2bv_b"><a href="#">新生儿</a></div>
				<div id="t2bv_c"><a href="#">1岁</a></div>
				<div id="t2bv_d"><a href="#">2岁</a></div>
				<div id="t2bv_e"><a href="#">5岁</a></div>
				<div id="t2bv_f"><a href="#">6岁</a></div>
			</div>
		</div>
	</div>