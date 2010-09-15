<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once dirname(__FILE__).'/../frame.php';
		/*
		 * handle the -2 and -1
		 */
		use_jquery();
		if($_GET['age'] == -2){
		?>
		<script type="text/javascript">
			//parent.$('.htct_t:first a').click();
			location.href = "list.php?category_id=6&age=-2";
		</script>	
		<?php }
		if($_GET['age'] == -1){
		?>
		<script type="text/javascript">
			//parent.$('.htct_t:eq(1) a').click();
			location.href = "list.php?category_id=7&age=-1";
		</script>	
		<?php }
		css_include_tag('assistant/_index','assistant','top_inc/assistant_top','left_inc/assistant_left','colorbox'); 
//		css_include_tag(); 
		$db = get_db();
		js_include_tag('assistant/assistant','news/index','jquery.colorbox-min');
//			js_include_tag('index','swfobject');
		init_page_items('assistant_index');
		function convert_age($age){
			switch ($age) {
				case -2: return '准备怀孕';break;
				case -1:return '怀孕中';break;
				case 1:return '0~1岁';break;
				case 2:return '1~2岁';break;
				case 3:return '2~3岁';break;
				case 4:return '3~6岁';break;
				default:return '';
			}
		}
	?>
</head>
<body>			
	<div id="body_container">
		<?php if(intval($_GET['age']) > 0){?>
		<div id="breadbrum">
			<a href="/assistant/_index.php">助手首页</a> &gt;&gt; <?php echo convert_age($_GET['age']);?>
		</div>
		<?php }?>
		<div id="assistant_top_banner">
				<div id="assistant_top_left_banner">
					<div id="bla_img" style="width:505px; height:300px;">
						<?php for($i = 1 ; $i <= 5 ; $i++){?>
						<div class="pic_img"<?php $pos="assistan_pg_l_$i";show_page_pos($pos,'link_i');?> id="img_tab_<?php echo $i;?>"  <?php if($i == 1){ ?> style="display:inline;"<?php }else{?>style="display:none;"<?php }?>>
							<a href="<?php echo $pos_items[$pos]->href;?>"><img style="width:505px; height:300px; border:0px solid red;" src="<?php echo $pos_items[$pos]->image1;?>"/></a>
						</div>
						<?php }?>
						<div id="pic_number" style="width:500px; bottom: 0px;">
							<div id="nn_5" class="num">5</div>	
							<div id="nn_4" class="num" >4</div>
							<div id="nn_3" class="num">3</div>
							<div id="nn_2" class="num">2</div>
							<div id="nn_1" class="num selected">1</div>
						</div>
					</div>
				</div>
				<div id="assistant_top_right_banner">
					<div class="h_pg_t"></div>
					<div class="h_pg_c">
						<div class="h_pg_cc">
								<div class="ht_l_t">课程助手链接</div>
								<div class="ht_l_h"></div>
								<div class="assistant_top_pg_a"<?php $pos = "assistant_top_pg_a";show_page_pos($pos,'link_i')?>>
									<a href="<?php echo $pos_items[$pos]->href; ?>"><img src="<?php echo $pos_items[$pos]->image1 ?>"/></a>
								</div>
								<div class="assistant_top_pg_b"<?php $pos = "assistant_top_pg_b";show_page_pos($pos,'link_i')?>>
									<a href="<?php echo $pos_items[$pos]->href; ?>"><img src="<?php echo $pos_items[$pos]->image1 ?>"/></a>
								</div>
								<div class="assistant_top_pg_c"<?php $pos = "assistant_top_pg_c";show_page_pos($pos,'link')?>>
									<div class="htct_l"></div>
<!--									<a href="<?php echo $pos_items[$pos]->href;?>" class="die_assistant">-->
										<?php $tilte_count =mb_strlen($pos_items[$pos]->title,"utf-8");
										 echo # $tilte_count >45 ?mb_substr($pos_items[$pos]->title,0,46,"utf-8").'<font style="font-size:12px;">...</font>':
										 $pos_items[$pos]->title;?>
<!--									</a>-->
								</div>
								<div class="htl_pg_c">
						</div>
					</div>
					<div class="h_pg_b"></div>
				</div>
		</div>
		</div>
		<?php 
		$sql = "select * from eb_category where category_type='assistant' and level=1";
		$top_cates = $db->query($sql);
		for($i=0;$i<6;$i++){
			if(($i == 1 || $i == 0) &&$_GET['age'] > 0) continue;
		?>
		<div class="list_box" id="list_box_<?php echo $i + 1;?>">
			<div class="list_title">
				<div class="title"><?php echo $top_cates[$i]->name;?></div>
				<span class="more"><a href="list.php?category_id=<?php echo $top_cates[$i]->id;?>">更多&gt;&gt;</a></span>
			</div>
			<div class="img_box">
				<div <?php $pos = "list_image_{$i}_a";show_page_pos($pos,'link_i')?>><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/helper/peo.jpg';?>"></div>
				<div <?php $pos = "list_image_{$i}_b";show_page_pos($pos,'link_i')?>><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 :'/images/helper/peo.jpg';?>"></div>
			</div>
			<div class="list_item_box">
				<?php
				$sql = "select a.id,a.title,a.category_id,b.name from eb_assistant a left join eb_category b on a.category_id = b.id where a.is_adopt=1 and a.category_id in(select id from eb_category where category_type='assistant' and parent_id={$top_cates[$i]->id})";
				$valid_ages=array(-2,-1,1,2,3);
				if(in_array($_GET['age'], $valid_ages)){
					$sql .=" and age=" .$_GET['age'];
				}
				$sql .=" order by a.priority,created_at desc limit 7";
				$assistants = $db->query($sql);
				$assistants || $assistants = array(); 
				foreach($assistants as $assistant){?>
				<div class="list_item">
					<div class="dot"></div>
					<div class="item">
						<?php 
						if(mb_strlen($assistant->name.$assistant->title,"utf-8") > 17){?>
							[<a href="list.php?category_id=<?php echo $assistant->category_id?>" class="a_category_list"><?php echo $assistant->name;?></a>] <a href="assistant.php?id=<?php echo $assistant->id;?>" title="<?php echo $assistant->title?>" target="_blank" ><?php echo mb_substr($assistant->title,0,16-mb_strlen($assistant->name,"utf-8"),"utf-8")."<font style='font-size:10px;'>...</font>";?></a>
							<?php
							#echo mb_substr("[<a href='list.php?category_id=".$assistant->category_id."' class='a_category_list'>{$assistant->name}</a>] <a href='assistant.php?id={$assistant->id}' title='{$assistant->title}' target='_blank'>{$assistant->title}</a> ",0,20,"utf-8")."<font style='font-size:10px;'>...</font>"?>
						<?php }else{?>
							[<a href="list.php?category_id=<?php echo $assistant->category_id?>" class="a_category_list"><?php echo $assistant->name;?></a>] <a href="assistant.php?id=<?php echo $assistant->id;?>" title="<?php echo $assistant->title?>" target="_blank" ><?php echo $assistant->title?></a>
						<?php }?>
					</div>
				</div>
				<?php  }?>
			</div>
		</div>
		<?php 
		}
		?>
		<div class=fc_c>
			<div class="fc_c_t">
				<div class="fct_l" id="fct_lb" style="width:600px;"><?php echo $top_cates[6]->name;?></div>	
				<div class="fct_r" id="fct_rb"><a href="list.php?category_id=<?php echo $top_cates[6]->id;?>">更多&gt;&gt;</a></div>
				<?php
					$sql = "select a.id,a.title,a.category_id,b.name from eb_assistant a left join eb_category b on a.category_id = b.id where a.is_adopt=1 and a.category_id in(select id from eb_category where category_type='assistant' and parent_id={$top_cates[6]->id})";
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
					<div class="fcrc_c">
					<?php 
						$assistant_count = mb_strlen($assistants[$j]->name.$assistants[$j]->title,"utf-8");
					?>
						<a style="color:#6EB6CA" href="list.php?category_id=<?php echo $assistant->category_id;?>">
							[<?php echo $assistants[$j]->name;?>]
						</a>
						<a href="assistant.php?id=<?php echo $assistants[$j]->id;?>" title="<?php echo $assistants[$j]->title?>" target="_blank" >
							<?php echo $assistant_count >18 ? mb_substr($assistants[$j]->title,0,$assistant_count - mb_strlen($assistants[$j]->name,"utf-8")-2,"UTF-8")."<font style='font-size:10px;'>...</font>" : $assistants[$j]->title;?>
						</a>
					</div>
				</div>
			<?php  }?>
				</div>
			</div>
			<?php }?>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
//	$(".die_assistant").colorbox({href:'/inc/_public_result_ajax_post_view.php?page=assistant&result=assistant_top_pg_c'});
	function filter_age(age){
		var url = window.location.href;
		var exp = /age=\d+/;
		url = url.replace(exp, '');
		if(url.indexOf('?')<=0){
			url = url + '?';
		}
		url = url + '&age=' + age;
		window.location.href=url;
	}
</script>
<style type="text/css">
	#assistant_top_banner{width:720px; height:300px; margin-left:15px;  float:left; display:inline;}
	#assistant_top_right_banner{width:198px; float:right; display:inline;}
	#assistant_top_left_banner{width:505px; height:300px; float:left; display:inline; }
	#bla_img{width:297px; height:207px; position:relative; float:left; display: inline;}
	#pic_number{width:297px; height:18px;  position:absolute; overflow:hidden; float:left;}
	.num{width:16px; height:16px; margin-left:1px; cursor:pointer; color:#FFFFFF; font-size:12px; line-height:16px; font-weight:bold; text-align:center; background:#4E3431; float:right;}
	.num.selected{background:#FF6600;}
	.h_pg_cc{height:285px; overflow:hidden;}
	.pic_img{width:505px; height:300px;  display: none;}
	.pic_img img{width:505px; height:300px;  border:0px solid red;} 
	.assistant_top_pg_a{width:180px; height:70px; margin-left:5px;margin-top:10px;  float:left; display:inline; }
	.h_pg_cc div img{width:180px; height:70px; border:0px solid red;}
	.assistant_top_pg_b{width:180px; height:70px; margin-left:5px;margin-top:10px;  float:left; display:inline;}
	.assistant_top_pg_c{width:180px; height:80px; margin-left:5px; margin-top:10px;font-size:12px; color:#333333; line-height:20px; text-indent:5px; overflow:hidden;  float:left; display:inline;}
	.assistant_top_pg_c a{font-size:12px; text-decoration: none; color:#333333;}
</style>
</html>