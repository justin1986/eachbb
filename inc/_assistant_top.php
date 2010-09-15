	<?php 
	$db = get_db();
	$category = $db->query("select id,name from eb_category where parent_id = 0 and category_type='assistant'");
	foreach ($category as $cat){
		$key = '/assistant/index.php?category_id=' .$cat->id;
		$news_list[$key] = $cat->name;
	}
	#$news_list=array("/assistant/index.php?category_id=-2" => "积极备孕","/assistant/index.php?category_id=-2" => "孕期生活","/assistant/index.php?category_id=-2" => "生长发育","/assistant/index.php?category_id=-2" => "日常护理","/assistant/index.php?category_id=-2" => "疾病与接种","/assistant/index.php?category_id=-2" => "早期教育","/assistant/index.php?category_id=-2" => "宠爱自己");
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
				<div class="ttc_a"><a href="?age=-2&category_id=<?php echo $category_id;?>" id="-2">准备怀孕</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=-1&category_id=<?php echo $category_id;?>" id="-1">怀孕期</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=1&category_id=<?php echo $category_id;?>" id="1">0～1岁</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=2&category_id=<?php echo $category_id;?>" id="2">1～2岁</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=3&category_id=<?php echo $category_id;?>" id="3">2～3岁</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=4&category_id=<?php echo $category_id;?>" id="4">3～6岁</a></div>
				<a id="asdf " href="_knowledge.php" target="iframe">
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
						//window.location.href = "topic.php?id=" + $(this).attr('id');
					});
				</script>
				<div id="t2bv_a"><a href="/assistant/index.php?age=-2">怀孕期</a></div>
				<div id="t2bv_b"><a href="/assistant/index.php?age=-1">新生儿</a></div>
				<div id="t2bv_c"><a href="/assistant/index.php?age=1">1岁</a></div>
				<div id="t2bv_d"><a href="/assistant/index.php?age=2">2岁</a></div>
				<div id="t2bv_e"><a href="/assistant/index.php?age=3">3岁</a></div>
				<div id="t2bv_f"><a href="/assistant/index.php?age=4">6岁</a></div>
			</div>
		</div>
	</div>