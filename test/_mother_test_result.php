<div id="result" style="width:700px;" >
	<div class="result_box" style="width:700px;">
		<div class="content" style="width:700px; padding-bottom:5px;">
			<font>点评：</font>
		</div>
		<div class="content" style="width:690px; padding-left:10px;  background:#E7E7E7; "><?php echo $reports['dadongzuo']->description;?></div>
	</div>
	<div id="btn_recommand" style="margin-top:10px;"><a href="/test/review.php?id=<?php echo $test_id;?>">回顾题目</a></div>
</div>
<div id="recommand_container" style="width:700px; margin-left:25px; padding:0px;">
	<div class="rec_list">
		<div class="recpg_top" style="padding-bottom:5px; font-size:14px;">特别推荐</div>
		<div class="recommanmiddle" >
		<?php
			if(!$reports['dadongzuo']->recommands) $reports['dadongzuo']->recommands = array();
			$j=0; 
			foreach ($reports['dadongzuo']->recommands as $val){?>
			<div class="rec_son" style=" <?php if($j != 0) echo 'margin-top:20px;';?>text-indent:20px; margin-left:5px; line-height:20px; background:#E9E9E9;  overflow:hidden; font-weight:normal; font-size:12px; ">
				<?php echo $val->description; ?>
			</div>	
			<?php $j++;} ?>
		</div>
	</div>
</div>