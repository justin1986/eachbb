<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
	$db = get_db();
	$id = intval($_GET['id']);
	$vote = new table_class("fb_vote");
	$vote->find($id);
	$item = $db->query("select * from fb_vote_item where vote_id=$id");
	$item_count = $db->record_count;
	if($vote->vote_type!='more_vote'){
		$record = $db->query("select * from fb_vote where id=$id");
		$count = 1;
	}else{
		$record = $db->query("SELECT t1.id,t1.name,t1.max_item_count FROM fb_vote t1 join fb_vote_item t2 on t1.id=t2.sub_vote_id where t2.vote_id=$id");
		$count = $item_count;
		$item = $db->query("SELECT t1.id as vote_id,t3.title,t3.id FROM fb_vote t1 join fb_vote_item t2 on t1.id=t2.sub_vote_id join fb_vote_item t3 on t1.id=t3.vote_id where t2.vote_id=$id");
		$item_count = $db->record_count;
	}
	#$in_type = "radio";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯中文网</title>
	<?php
		use_jquery();
		css_include_tag('public','survey','admin');
	?>
</head>
<body>
	<div id=ibody>
		<div id=icaption>
		    <div id=title style="font-size:20px;overflow:hidden"><?php echo $vote->name;?></div>
			  <a href="result.php" id=btn_back></a>
		</div>
		<div id="question_div2">
			<?php for($i=0;$i<$count;$i++){
				$total = 0;
			    $result = $db->query("select count(item_id) as num,item_id from fb_survey_record2 where vote_id={$record[$i]->id} group by item_id");
				for($k=0;$k<count($result);$k++){
					$total = $total+$result[$k]->num;
				}	
			?>
				<div class="survey2_z2">
					<div class="s2_top2">
						<div class="top_pg2">
							<div class="title_pic"><img src="/images/survey/top2_redio.jpg"></div>
							<div class="s2_title2">
								<?php echo $record[$i]->name;?>
							</div>
						</div>
					</div>
					<div class="s2_content">
						<input type="hidden" name="record_id[]" value="<?php echo $record[$i]->id;?>">
						<?php for($j=0;$j<$item_count;$j++){
							if($item[$j]->vote_id==$record[$i]->id){
						?>
							<div class="s2_c2">
								<div class="s2_c_content2">
									<div style="width:50px;">
									<?php
										$flag = 0;
										for($k=0;$k<count($result);$k++){
											if($result[$k]->item_id==$item[$j]->id){
												echo round($result[$k]->num/$total,3)*100; 
												$flag = 1;
											}
										}
										if($flag==0)echo '0';
									?>%</div><div style="width:800px;"><?php echo $item[$j]->title;?></div></div>
							</div>
						<?php }}?>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</body>
<html>