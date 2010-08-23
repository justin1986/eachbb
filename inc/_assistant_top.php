	<?php 
	$news_list=array("积极备孕页","孕期生活告","生长发育购","日常护理示","疾病与接种子","早期教育置","宠爱自己");
	include_once(dirname(__FILE__) .'/../inc/_public_top.php');
	?> 
	<script type="text/javascript">
					var flashvar = {defaultIndex:'4'};
					var flashparam = {wmode:'Transparent'};
					swfobject.embedSWF("/flash/menu.swf","tl_r_c","702","103","8",false,flashvar,flashparam);
	</script>
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
				<a href="knowledge.php">
				<img id="ttc_g" src="/images/helper/t_2.jpg"/>
				</a>
			</div>
			<div id="tt_r"></div>
		</div>
		<div id="top2_b">
			<div id="t2b_l">你的宝宝多大了?</div>
			<div id="t2b_r">
				<div id="t2b_hr">
					<?php for($i=0;$i<84;$i++){?>
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
				<div id="t2bv_e"><a href="#">3岁</a></div>
				<div id="t2bv_f"><a href="#">6岁</a></div>
			</div>
		</div>
	</div>