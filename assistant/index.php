<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once dirname(__FILE__).'/../frame.php';
		css_include_tag('assistant','left_inc/assistant_left'); 
		use_jquery();
		$db = get_db();
		js_include_tag('assistant/assistant');
		init_page_items('assistant_index');
	?>
</head>
<body>
<div id="ibody">
	<?php include_once("../inc/_assistant_top.php"); ?>
	<div id="fbody">
		<?php include_once dirname(__FILE__)."/_assistant_left.php"; ?>
		<div id="f_r">
			<div id="fr_t">
				<div id="fr_tp"></div>
				<div id="fr_trp">
					<div id="h_type">
						<div class="h_pg_t"></div>
						<div class="h_pg_c">
							<div class="h_pg_cc">
								<div class="ht_l_t">助手链接</div>
								<div class="ht_l_h"></div>
								<div class="htl_pg_c">
									<div <?php $pos="top_image";show_page_pos($pos,'link_i2')?>><img class="htc_img" src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/l_pg_c.jpg';?>" /></div>
									<div ><img class="htc_img" src="<?php echo $pos_items[$pos]->image2 ?$pos_items[$pos]->image2 :'/images/class/l_pg_c.jpg';?>" /></div>
									<div class="ht_c_z" style="height:53px;">
										<div class="ht_c_t">
											<div class="htct_l"></div>
											<div class="htct_t"<?php $pos="top_list";show_page_pos($pos,'link')?>><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href)?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="h_pg_b"></div>
					</div>
				</div>
			</div>
			<div id="fr_c">
				<?php 
				$c = 'a';
				for($i=0;$i<6;$i++){
				?>
				<div class="fc_l" <?php echo "id='fct_$c'";?>>
					<div class="fc_t" <?php echo "id='fc_$c'";?>>
						<div class="fct_l" <?php echo "id='fct_l$c'";?>><?php echo $top_cates[$i]->name;?></div>
						<div class="fct_r" <?php echo "id='fct_r$c'";?>><a href="list.php?category_id=<?php echo $top_cates[$i]->id;?>">更多&gt;&gt;</a></div>
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
			</div>
			<div id="fr_b">
				<div id="frb_tz">
					<div id="frbt_l"></div>
					<div id="frbt_c">
						<div id="frbt_img"></div>
						<div id="frbt_v">精彩<font>生活</font></div>
						<div id="frbt_rrr"></div>
					</div>
					<div id="frbt_r"></div>
				</div>
				<?php for($w=0;$w<2;$w++){?>
				<div class="frb_z">
					<?php for($j=0;$j<5;$j++){
						$pos= "bottom_list_{$w}_$j";
					?>
					<div class="frb_zz">
						<div class="frbzz_d"></div>
						<div class="frbzz_c"<?php show_page_pos($pos,'link')?>>
							<?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href)?>
						</div>
					</div>
					<?php }?>
				</div>
				<?php }?>
			</div>
		</div>
		<?php include_once('../inc/bottom.php'); ?>
	</div>
</div>
</body>
</html>
