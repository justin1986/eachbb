<div id="result" style="width:700px;">
	<div class="result_box" style="width:700px;">
		<div class="content" style="width:700px; padding-bottom:5px;">
			<font>点评：</font>
		</div>
		<div class="content" style="width:700px; padding-left:10px; "><?php echo $reports['dadongzuo']->description;?></div>
	</div>
	<div id="btn_recommand"><a href="/test/review.php?id=<?php echo $test_id;?>">回顾题目</a></div>
</div>
<div id="recommand_container" style="width:700px; margin-left:25px; padding:0px;">
	<?php 
		if(!$reports['dadongzuo']->recommands) $reports['dadongzuo']->recommands = array();
	?>
	<div class="rec_list">
		<div class="recpg_top" style="padding-bottom:5px; font-size:14px;">特别推荐</div>
		<div class="recommanmiddle" >
		<?php 	foreach ($reports['dadongzuo']->recommands as $val){?>
			<div class="rec_son" style="width:300px; height:20px;  margin-left:5px; line-height:20px;  overflow:hidden; font-weight:lighter; font-size:12px; ">
				<?php echo $val->description; ?>
			</div>	
			<?php 
		}?>
		</div>
	</div>
</div>