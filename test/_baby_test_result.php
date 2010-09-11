<div id="result">
	<?php 
		if(array_key_exists('dadongzuo', $reports)){
	?>
	<div class="result_box">
		<div class="title">大动作</div>
		<div class="content">
			<font>点评：</font>
			<?php echo $reports['dadongzuo']->description;?>
		</div>
	</div>
	<?php }
		if(array_key_exists('jingxidongzuo', $reports)){
	?>
	<div class="result_box" style="margin-top:20px;">
		<div class="title">精细动作</div>
		<div class="content">
			<font>点评：</font>
			<?php echo $reports['jingxidongzuo']->description;?>
		</div>
	</div>
	<?php }
		if(array_key_exists('yuyan', $reports)){
	?>
	<div class="result_box" style="margin-top:20px;">
		<div class="title">语言</div>
		<div class="content">
			<font>点评：</font>
			<?php echo $reports['yuyan']->description;?>
		</div>
	</div>
	<?php }
		if(array_key_exists('renshi', $reports)){
	?>
	<div class="result_box" style="margin-top:20px;">
		<div class="title">认识</div>
		<div class="content">
			<font>点评：</font>
			<?php echo $reports['renshi']->description;?>
		</div>
	</div>
	<?php }
		if(array_key_exists('shehuihuodong', $reports)){
	?>
	<div class="result_box" style="margin-top:20px;">
		<div class="title">社会形为和生活习惯</div>
		<div class="content">
			<font>点评：</font>
			<?php echo $reports['shehuihuodong']->description;?>
		</div>
	</div>
	<?php }?>
	<div id="btn_recommand"><a href="/test/review.php?id=<?php echo $test_id;?>">回顾题目</a></div>
</div>
  <div id="c_hr"></div>
<div id="recommand_container">
	<?php 
		$recommd_types = array("dadongzuo" => "大动作","jingxidongzuo"=>"精细动作","yuyan"=>"语言","renshi" => "认识","shehuihuodong" => "社会形为和生活习惯");
		foreach ($recommd_types as $key => $val){
			if($reports[$key]->recommands){
	?>
	<div class="recommand">
		<div class="recommand_pg_top"><?php echo $val?></div>
		<div class="recommand_pg_middle">
			<div class="recommand_pg_son">
				<?php
				//handle the image recommand
				foreach ($reports[$key]->recommands as $recommand){
					if($recommand->image){
				?>
				<div class="recommand_image">
					<img src="<?php echo $recommand->image;?>"/>
					<a href="<?php echo $recommand->href;?>"><?php echo $recommand->title;?></a>
				</div>
				<div class="recommand_hr"></div>
				<?php 
					}
				}
				?>
				<?php foreach ($reports[$key]->recommands as $recommand){
				 	if(!$recommand->image && $recommand->recommand_type=='assister'){?>
				<div class="recommand_assistant">
					<a href="<?php echo $recommand->href;?>"><?php echo $recommand->title;?></a>
				</div>
				<div class="menu_hr"></div>
				<?php 
				 	} 
				 	if(!$recommand->image && $recommand->recommand_type=='course'){?>
				<div class="recommand_course">
					<a href="<?php echo $recommand->href;?>"><?php echo $recommand->title;?></a>
				</div>
				<div class="menu_hr"></div>
				<?php 
					}
				}
				?>
			</div>	
		</div>
		<div class="recommand_pg_bottom"></div>
	</div>
	<?php 
			}
		}?>
</div>