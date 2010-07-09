<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once('./../frame.php');
		css_include_tag('assistant_list','assistant_content','assistant_question','right_inc/assistant_right','top_inc/assistant_top','left_inc/assistant_left','bottom'); 
		use_jquery();
		js_include_tag('assistant/assistant');
		$type = $_GET['type'];
		$category_id = intval($_GET['category_id']);
		$age = intval($_GET['age']);
		$db = get_db();
		if($type=='age'){
			$level = -1;
			$categorys = $db->query("select * from eb_category where category_type='assistant' and level=1");
			$category = new category_class('assistant');
		}else if($type=='cate'){
			$level = 0;
			$categorys = $db->query("select * from eb_category where category_type='assistant' and level=1");
			$category = new category_class('assistant');
		}else{
			$category_id = intval($_GET['category_id']);
			if(!$category_id) die('invalid param');
			$category = new category_class('assistant');
			$parent = $category->find($category_id);
			$level = $parent->level;
		}
		if($level==1){
			$childs = $category->find_sub_category($category_id);
		}
	?>
</head>
<body>
<div id="ibody">
	<?php include_once('./_assistant_top.php'); ?>
	<div id="fbody">
		<?php include_once('./_assistant_left.php'); ?>
		<div id="result">
			<div id="result_top_btn">
				<input type="button" id="button_age" value="按年龄查看"/>
				<input type="button" id="button_cate" value="按主题查看"/>
			</div>
			<div id="container">
				<div id="container_result">
				<?php if($level==1){?>
					<div class="result_list"><?php echo $parent->name;?></div>
					<?php foreach($childs as $child){?>
					<div class="result_banner">
						<div class="result_pg_top"><?php echo $child->name;?><a href="list.php?category_id=<?php echo $child->id;?>">更多&gt;&gt;</a></div>
						<div class="result_pg_content">
							<?php 
							$sql = "select * from eb_assistant where is_adopt=1 and category_id = {$child->id} limit 4";
							$assistants = $db->query($sql);
							$len = count($assistants);
							for($i = 0; $i < $len; $i++){ ?>
							<div class="result_container" style="<?php if($i == 0) echo "margin-top:10px;"; ?>">
								<img src="<?php if($assistants[$i]->image!=''){echo $assistants[$i]->image;}else{?>/images/assistant_list/pho.jpg<?php }?>"/>
								<div class="result_title"><a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>"><?php echo $assistants[$i]->title;?></a></div>
								<div class="result_value"><?php echo mb_substr(trim(strip_tags($assistants[$i]->description)),0,45,'utf-8');?>……<a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>">[查看全文]</a></div>
							</div>
							<?php } ?>
						</div>
						<div class="result_pg_bottom"></div>
					</div>
					<?php }}else if($level==2){?>
					<div class="result_banner" style="margin:0;">
						<div class="result_pg_top"><?php echo $parent->name;?></div>
						<div class="result_pg_content">
							<?php 
							$sql = "select * from eb_assistant where is_adopt=1 and category_id = {$parent->id}";
							if($age!=0){
								$sql .= " and age=$age";
							}
							$assistants = $db->paginate($sql,10);
							$len = count($assistants);
							for($i = 0; $i < $len; $i++){ ?>
							<div class="result_container" style="<?php if($i == 0) echo "margin-top:10px;"; ?>">
								<img src="<?php if($assistants[$i]->image!=''){echo $assistants[$i]->image;}else{?>/images/assistant_list/pho.jpg<?php }?>"/>
								<div class="result_title"><a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>"><?php echo $assistants[$i]->title;?></a></div>
								<div class="result_value"><?php echo mb_substr(trim(strip_tags($assistants[$i]->description)),0,45,'utf-8');?>……<a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>">[查看全文]</a></div>
							</div>
							<?php } ?>
							<div id="paginage"><?php paginate();?></div>
						</div>
						<div class="result_pg_bottom"></div>
					</div>
					<?php }else if($level==0){?>
						<?php foreach($categorys as $cate){
								$parent = $category->find($cate->id);
								$childs = $category->find_sub_category($cate->id);
						?>
							<div class="result_list"><?php echo $parent->name;?></div>
							<?php foreach($childs as $child){?>
							<div class="result_banner">
								<div class="result_pg_top"><?php echo $child->name;?><a href="list.php?category_id=<?php echo $child->id;?>">更多&gt;&gt;</a></div>
								<div class="result_pg_content">
									<?php 
									$sql = "select * from eb_assistant where is_adopt=1 and category_id = {$child->id} limit 4";
									$assistants = $db->query($sql);
									$len = count($assistants);
									for($i = 0; $i < $len; $i++){ ?>
									<div class="result_container" style="<?php if($i == 0) echo "margin-top:10px;"; ?>">
										<img src="<?php if($assistants[$i]->image!=''){echo $assistants[$i]->image;}else{?>/images/assistant_list/pho.jpg<?php }?>"/>
										<div class="result_title"><a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>"><?php echo $assistants[$i]->title;?></a></div>
										<div class="result_value"><?php echo mb_substr(trim(strip_tags($assistants[$i]->description)),0,45,'utf-8');?>……<a href="/assistant/assistant.php?id=<?php echo $assistants[$i]->id;?>">[查看全文]</a></div>
									</div>
									<?php } ?>
								</div>
								<div class="result_pg_bottom"></div>
							</div>
							<?php }?>
						<?php }?>
					<?php }else if($level==-1){
						for($i=-2;$i<=3;$i++){if($i!=0){
					?>
						<div class="result_list">
							<?php 
								switch($i){
									case -2:echo '准备怀孕';break;
									case -1:echo '怀孕中';break;
									case 1:echo '0~1岁';break;
									case 2:echo '1~2岁';break;
									case 3:echo '2~3岁';break;
								}
							?>
						</div>
						<?php foreach($categorys as $cate){
								$parent = $category->find($cate->id);
								$childs = $category->find_sub_category($cate->id);
						?>
						<div class="result_banner">
							<div class="result_pg_top"><?php echo $parent->name;?></div>
							<div class="result_pg_content">
								<?php foreach($childs as $child){?>
								<div class="category_name"><a href='list.php?age=<?php echo $i;?>&category_id=<?php echo $child->id;?>'><?php echo  $child->name;?></a></div>
								<?php }?>
							</div>
							<div class="result_pg_bottom"></div>
						</div>
						<?php }?>
					<?php }}}?>
					<?php include_once('./_assistant_content.php'); ?>
				</div>
				<?php include_once('./_assistant_right.php'); ?>
			</div>
			<?php include_once('./_assistant_question.php'); ?>
		</div>
		<?php include_once('../inc/bottom.php'); ?>
	</div>
</div>
</body>
</html>
