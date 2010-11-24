<?php
	include_once dirname(__FILE__).'/../frame.php';
	use_jquery_ui();
	css_include_tag('article','news_list');
	init_page_items('_news_right');
	$category_id = $_GET["category_id"];
	$id = $_GET["id"];
	$db=get_db();
?>
<style>
#brr_img{width:297px; height:195px;  float:right; display:inline;}
</style>
<div id="list_container">
		<div id="class">
		<div id="brr_img" class="ad_banner"></div>
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
					<div class="ci_pg"><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>"></a></div>
					<div class="ci_title"><?php echo $pos_items[$pos]->title;?></div>
				</div>
				<?php } ?>
			</div>
			<div class="cla_hr"></div>
			<div class="ad_banner" id="news_wenzhan_right" style="width:297px; height:195px; margin-top:10px; border:0px solid red; float: right; display:inline;" ></a>
		</div>
	</div>
	<div id="tag">
			<div id="tag_l"></div>
			<div id="tag_c">
				<div id="tagc_t"><font>热门</font>关键字</div>
				<div class="tag_menu">
					<?php 
					$db=get_db();
					$list = $db->query("SELECT id,name FROM eb_news_keywords order by rand() desc LIMIT 10");
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
								<div class="cla_r"></div>
							<?php # if($i !=3 &&  $i != 7 && $i !=11){?>
						<?php #}
						}
						}
					}?>
				</div>
			</div>
			<div id="tag_b"></div>
		</div>
		<div id="comment">
		<div id="comm_l"></div>
		<div id="comm_c">
			<div id="comm_t">
				<div id="com_title">资讯排行榜</div>
				<div id="com_x">
				</div>
			</div>
			<!-- 右边 业界快讯 一条列表的内容  开始in(".substr($news_id,0,-1).") -->
			<?php
//			if($category_id){
//				if (!is_numeric($category_id))die("非法操作");
//				$list = $db->query("SELECT id,title FROM eb_news  where  is_adopt=1 and category_id = $category_id  order by click_count desc LIMIT 10");
//			}else{
//				if (!is_numeric($id))die("非法操作");
//				$list = $db->query("SELECT id,title FROM eb_news  where  is_adopt=1 and category_id = (select category_id from eb_news where id=$id)  order by click_count desc LIMIT 10");
//			}
			$list = $db->query("SELECT id,title FROM eb_news  where  is_adopt=1  order by click_count desc LIMIT 10");
			for($i=0;$i<10;$i++){ ?>
			<div id="comm_con">
				<div class="number" style="<?php if($i==0){ echo "background:url(/images/new_list/number.jpg) no-repeat;";} ?>"><?php echo $i+1; ?></div>
				<a href="/news/news.php?id=<?php echo $list[$i]->id;?>" target='_blank'><?php echo $list[$i]->title;?></a>
			</div>
			<!-- 右边 业界快讯 一条列表的内容  结束 -->
			<?php } ?>
		</div>
		<div id="comm_r"></div>
	</div>
	<div  class="ad_banner" id="brrrr_img" style="width:297px; height:195px; margin-top:20px; float:right; display:inline;"></div>
</div>
<script src="/javascript/get_ad.js">
</script>