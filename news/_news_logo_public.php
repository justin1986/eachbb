<?php
include_once('../frame.php');
?>
<div id="class">
		<div class="cla_t"></div>
		<div class="cla_c">
			<div class="cla_title">早教课程</div>
			<div class="cla_img">
				<?php
				$db=get_db();
				$list=$db->query("SELECT id FROM eb_category where category_type = 'news'");
				$count = $db->query("SELECT count(id)id FROM eb_category where category_type = 'news'");
				$news_id;
				for($i = 0 ; $i < $count[0]->id ;  $i++)
				{
					//echo $result_id->id;
						$news_id .= $list[$i]->id.",";
				}
				$list=$db->query("SELECT id,name,url FROM eb_images  where category_id in (".$news_id.") and is_adopt=1 order by create_time desc,click_count desc limit 3;");
				for($i=0;$i<3;$i++){ ?>
				<div class="ci_z">
					<div class="ci_pg"><img src="<?php echo $list[$i]->url;?>"></div>
					<div class="ci_title"><?php echo $list[$i]->name;?></div>
				</div>
				<?php } ?>
			</div>
			<div class="cla_hr"></div>
			<img src="/images/index/img_r_a.jpg" style="width:289px; margin-top:10px; border:0px solid red;"/>
		</div>
	</div>