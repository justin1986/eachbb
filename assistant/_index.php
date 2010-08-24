<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once dirname(__FILE__).'/../frame.php';
		css_include_tag('top_inc/assistant_top','assistant','left_inc/assistant_left'); 
		use_jquery();
		$db = get_db();
		js_include_tag('assistant/assistant');
		init_page_items('assistant_index');
	?>
</head>
<body>			
			<div id="fr_c">
				<?php 
				$c = 'a';
				for($i=0;$i<6;$i++){
				?>
				<div class="fc_l" <?php echo "id='fct_$c'";?>>
					<div class="fc_t" <?php echo "id='fc_$c'";?>>
						<div class="fct_l" <?php echo "id='fct_l$c'";?> ><?php echo $top_cates[$i]->name;?></div>
						<div class="fct_r" <?php echo "id='fct_r$c'";?> ><a href="list.php?category_id=<?php echo $top_cates[$i]->id;?>">更多&gt;&gt;</a></div>
					</div>
					<div class="fcl_l">
						<div class="fci_a"<?php $pos = "list_image_{$i}_a";show_page_pos($pos,'link_i')?>><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/helper/peo.jpg';?>"></div>
						<div class="fci_b"<?php $pos = "list_image_{$i}_b";show_page_pos($pos,'link_i')?>><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/helper/peo.jpg';?>"></div>
					</div>
					<div class="fcl_r">
						<?php
						$var = "category_$i";
						$ids = implode(',', $$var);
						$sql = "select a.id,a.title,b.name from eb_assistant a left join eb_category b on a.category_id = b.id where a.is_adopt=1 and a.category_id in({$ids})";
						$valid_ages=array(-2,-1,1,2,3);
						if(in_array($_GET['age'], $valid_ages)){
							$sql .=" and age=" .$_GET['age'];
						}
						$sql .=" order by a.priority,created_at desc limit 7";
						$assistants = $db->query($sql);
						$assistants || $assistants = array(); 
						foreach($assistants as $assistant){?>
						<div class="fcr_c">
							<div class="fcrc_d"></div>
							<div class="fcrc_c">[<?php echo $assistant->name;?>] <a href="assistant.php?id=<?php echo $assistant->id;?>" title="<?php echo $assistant->title?>" ><?php echo $assistant->title?></a></div>
						</div>
						<?php  }?>
					</div>
				</div>
				<?php 
					$c++;
				}
				
				?>
				
				<div class=fc_c>
					<div class="fc_c_t">
						<div class="fct_l" id="fct_lb" style="width:600px;"><?php echo $top_cates[6]->name;?></div>	
						<div class="fct_r" id="fct_rb"><a href="list.php?category_id=<?php echo $top_cates[6]->id;?>">更多&gt;&gt;</a></div>
						<?php
							$var = "category_6";
							$ids = implode(',', $$var);
							$sql = "select a.id,a.title,b.name from eb_assistant a left join eb_category b on a.category_id = b.id where a.is_adopt=1 and a.category_id in ($ids)";
							$valid_ages=array(-2,-1,1,2,3);
							if(in_array($_GET['age'], $valid_ages)){
										$sql .=" and age=" .$_GET['age'];
							}
							$sql .=" order by a.priority,created_at desc limit 14";
							$assistants = $db->query($sql);
						 for($i=6;$i<8;$i++){ ?>
						<div class=content>
						<div class="fcl_l">
							<div class="fci_a"<?php $pos = "list_image_{$i}_a";show_page_pos($pos,'link_i')?>><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/helper/peo.jpg';?>"></div>
							<div class="fci_b"<?php $pos = "list_image_{$i}_b";show_page_pos($pos,'link_i')?>><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/helper/peo.jpg';?>"></div>
						</div>
						<div class="fcl_r">
						<?php 
							for($j=($i-6)*7;$j<($i-6)*7+7;$j++){ ?>
						<div class="fcr_c">
							<div class="fcrc_d"></div>
							<div class="fcrc_c">[<?php echo $assistants[$j]->name;?>] <a href="assistant.php?id=<?php echo $assistants[$j]->id;?>" title="<?php echo $assistants[$j]->title?>" ><?php echo $assistants[$j]->title?></a></div>
						</div>
					<?php  }?>
						</div>
					</div>
					<?php }?>
					</div>
				</div>
			</div>
</body>
</html>			