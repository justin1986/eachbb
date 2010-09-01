<div id="result">
	<div class="result_box">
		<div class="content">
			<font>点评：</font>
			<?php echo $reports['dadongzuo']->description;?>
		</div>
	</div>
	<div id="btn_recommand"><a href="/test/review.php?id=<?php echo $test_id;?>">回顾题目</a></div>
</div>
  <div id="c_hr"></div>
<div id="recommand_container">
	<?php 
		if(!$reports['dadongzuo']->recommands) $reports['dadongzuo']->recommands = array();
		foreach ($reports['dadongzuo']->recommands as $val){
	?>
	<div class="recommand">
		<div class="recommand_pg_top">特别推荐</div>
		<div class="recommand_pg_middle">
			<div class="recommand_pg_son">
				<?php echo $val->description; ?>
			</div>	
		</div>
		<div class="recommand_pg_bottom"></div>
	</div>
	<?php 
		}?>
</div>