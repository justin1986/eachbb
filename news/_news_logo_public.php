<?php
	include_once dirname(__FILE__).'/../frame.php';
	use_jquery_ui();
	css_include_tag('article','news_list');
	init_page_items('_news_right');
?>
<div id="class">
		<div id="br_img" <?php $pos="assistant_right_img";show_page_pos($pos,'link_i');?>style="padding-bottom:20px;">
			<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/article/r1.jpg' ;?>"/></a>
		</div>
		<div class="cla_t"></div>
		<div class="cla_c">
			<div class="cla_title">早教课程</div>
			<div class="cla_img">
				<?php
				$db=get_db();
//				$list=$db->query("SELECT id FROM eb_category where category_type = 'news'");
//				$count = $db->query("SELECT count(id)id FROM eb_category where category_type = 'news'");
//				$news_id;
//				for($i = 0 ; $i < $count[0]->id ;  $i++)
//				{
//					//echo $result_id->id;
//						$news_id .= $list[$i]->id.",";
//				}
//				$list=$db->query("SELECT id,name,url FROM eb_images  where category_id in (".$news_id.") and is_adopt=1 order by create_time desc,click_count desc limit 3;");
				for($i=0;$i<3;$i++){ ?>
				<div class="ci_z"<?php $pos="assistant_right_s_$i";show_page_pos($pos,'link_t_i');?>>
					<div class="ci_pg"><a href="<?php echo $pos_items[$pos]->url;?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
					<div class="ci_title"><?php echo $pos_items[$pos]->title;?></div>
				</div>
				<?php } ?>
			</div>
			<div class="cla_hr"></div>
			<a  class="result_news" style="border:0px solid red;" <?php $pos="assistant_right_s_$i";show_page_pos($pos,'link_i');?> href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>" style="width:289px; margin-top:10px; border:0px solid red;" /></a>
		</div>
	</div>
	<div id="tag">
			<div id="tag_l"></div>
			<div id="tag_c">
				<div id="tagc_t"><font>热门</font>关键字</div>
				<div class="tag_menu">
					<?php 
					$db=get_db();
					$list = $db->query("SELECT id,name FROM eb_news_keywords order by id desc LIMIT 10");
						$line_array = array();
					foreach ($list as $list){
					if(!strpos($list->name,"||")){
						$lines = explode(" ",$list->name);
					}else{
						$lines = explode("||",$list->name);
					}
					foreach ($lines as $line_result){
						if($line_result){
//						for($i = 0 ; $i <12 ; $i++){
						if(in_array($line_result,$line_array))continue;
						$line_array[]=$line_result;
							?>
							<div class="cla_m_v" <?php # $pos="assistant_ri_result_$i";show_page_pos($pos,'link');?> style="text-align: center;">
								<a href="/news/search.php?key=<?php echo $line_result; #$pos_items[$pos]->href;?>" title="<?php echo $line_result;?>">
									<?php echo $line_result;#$pos_items[$pos]->title;?>
								</a>
							</div>
							<?php # if($i !=3 &&  $i != 7 && $i !=11){?>
							<div class="cla_r"></div>
						<?php #}
						}
						}
					}?>
				</div>
			</div>
			<div id="tag_b"></div>
		</div>
