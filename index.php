<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-首页</title>
	<?php 
		include_once(dirname(__FILE__).'/frame.php');
		use_jquery_ui();
		css_include_tag('index','jquery_ui','bottom','colorbox');
		js_include_tag('index','swfobject','jquery.colorbox-min');
		init_page_items('index');
		$db = get_db();
	?>
</head>
<body>
<div id="ibody">
	<div id="top_menu">
			<div id="menu_left"></div>
			<div id="menu_center">
				<div id="menu_flash" style="margin-top:-5px;">
				</div>
				<script type="text/javascript">
					var flashvar = {defaultIndex:'1'};
					var flashparam = {wmode:'Transparent'};
					swfobject.embedSWF("flash/menu.swf","menu_flash","702","103","8",false,flashvar,flashparam);
				</script>
			</div>
			<div id="menu_right"></div>
	</div>
	<div id="fbody">
		<div id="f_l_pg"></div>
		<div id="f_c_m">
			<div id="flash">
				<div id="flash_left">
					<div id="img_flash_container">
					</div>
					<?php 
						$images = $db->query("select a.title,a.url,a.src from eb_images a left join eb_category b on a.category_id=b.id where a.is_adopt=1 and b.name='首页flash图片' order by a.priority asc, created_at desc limit 5");
						foreach ($images as $image){
							$src[] = $image->src;
							$title[]=$image->title;
							$url[] = $image->url;
						}
					?>
					<script type="text/javascript">
						var flashvar = {image:"<?php echo implode('|',$src);?>",url:"<?php echo implode('|',$url);?>",info:"<?php echo implode('|',$title);?>"};
						swfobject.embedSWF("flash/index.swf","flash_left","665","384","8",false,flashvar,flashparam);
					</script>
				</div>
				<div id="flash_right">
					<div id="r_test"<?php $pos="index_teach_pg";show_page_pos($pos,'link_i');?>>
						<img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1:'/images/index/img_r_a.jpg';?>"/>
					</div>
					<div id="r_student">
						<div id="st_top">
							<div><img src="/images/index/class_tab_0_sel.jpg" class="student_tab"/></div>
							<div><img src="/images/index/class_tab_1.jpg" class="student_tab"/></div>
							<div><img src="/images/index/class_tab_2.jpg" class="student_tab"/></div>
						</div>
						<div id="student_value">
							<div class="student_left" id="student_left_0" style="display:inline;">
							<?php
							 	#$sql = "select id,title from eb_teach where is_adopt=1 and del_flag=0 order by priority,create_time desc limit 8";
								#$course = $db -> query($sql);
								for( $i = 0 ; $i < 4 ; $i++){ ?>
								<div class = "student_pg"<?php $pos="top_tab_1_$i";show_page_pos($pos,'link');?>>
									<div class = "student_l"/></div>
									<a href="<?php echo $pos_items[$pos]->href;?>"  title="<?php echo $pos_items[$pos]->title;?>" target ='_blank'><?php echo mb_strlen($pos_items[$pos]->title,"utf-8")>15 ? mb_substr($pos_items[$pos]->title,0,14,"utf-8")."...":$pos_items[$pos]->title;?></a>
								</div>
								<?php if($i != 3){?>
								<div class = "student_hr"></div>		
								<?php }}?>
							</div>
							<div class="student_left" id="student_left_1" style="display:none;">
							<?php
								for( $i = 4 ; $i < 9 ; $i++){ ?>
								<div class = "student_pg"<?php $pos="top_tab_2_$i";show_page_pos($pos,'link');?>>
									<div class = "student_l"/></div>
									<a href="<?php echo $pos_items[$pos]->href;?>"  title="<?php echo $pos_items[$pos]->title;?>" target ='_blank'><?php echo mb_strlen($pos_items[$pos]->title,"utf-8")>15 ? mb_substr($pos_items[$pos]->title,0,14,"utf-8")."...":$pos_items[$pos]->title;?></a>
								</div>
								<?php if($i != 8){?>
								<div class = "student_hr"></div>
								<?php }}?>
							</div>
							<div class="student_left" id="student_left_2" style="display:none;">
							<?php
								for( $i = 0 ; $i < 4 ; $i++){ ?>
								<div class = "student_pg"<?php $pos="top_tab_3_$i";show_page_pos($pos,'link');?>>
									<div class = "student_l"/></div>
									<a href="<?php echo $pos_items[$pos]->href;?>"  title="<?php echo $pos_items[$pos]->title;?>" target ='_blank'><?php echo mb_strlen($pos_items[$pos]->title,"utf-8")>15 ? mb_substr($pos_items[$pos]->title,0,14,"utf-8")."...":$pos_items[$pos]->title;?></a>
								</div>
								<?php if($i != 3){?>
								<div class = "student_hr"></div>
								<?php }}?>
							</div>
							<div id="student_right"></div>
						</div>
					</div>
					<div class="ad_banner" id="index_right_banner_1"></div>
				</div>
			</div>
			<div id="sousuo">
				<div id="sousuo_a"></div>
				<div id="sousuo_b">
					<div id="sousuo_left"></div>
					<div id="sousuo_center">
						<input type="text" id="input_search">
					</div>
					<div id="sousuo_right"></div>
				</div>
				<div id="sousuo_c"></div>
				<div id="sousuo_d"></div>
			</div>
			<div id="test">
				<div id="test_left"  style="position: relative; z-index:1">
					<div id="test_id">
						<div id="test_left_top" style="z-index:2000">
							请输入宝宝的出生日期:　<input style="z-index:2000" type="text" id='date_picker' />
						</div>
						<div id="btn_begin_test">
							<a href="#" id="a_begin_test"><img src="/images/index/test.png" border="0" /></a>
						</div>
					</div>
					<div id="test_pg_zong">
						<div id="div_left_arrow">
							<a href="#" id="a_left_arrow"><img src="/images/index/l_l.png" border="0" /></a>
						</div>
						<?php for($i=0;$i<5;$i++){?>
						<div id="test_tab_<?php echo $i;?>" class="test_tab" <?php if($i==0) echo ' style="display:inline;"';?> <?php $pos="test_tab_{$i}"; show_page_pos($pos,'link_d_i')?>>
							<div class="test_img">
								<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1: '/images/index/test_sample.jpg';?>" border="0" /></a>
							</div>
							<div class="test_tab_postion"></div>
							<div class="test_context">
								<div class="context_title"><?php echo $pos_items[$pos]->title;?></div>
								<div class="context_content"><?php echo  $pos_items[$pos]->description ? mb_substr($pos_items[$pos]->description,0,75,'utf-8').'...' : ''; ?></div>
								<div class="test_content_more">
									<a href=""  class="beijiu"> 查看全文</a>
								</div>
							</div>
						</div>
						<?php }?>
						<div id="div_right_arrow">
							<a href="#" id="a_right_arrow"><img src="/images/index/l_r.png" border="0" /></a>
						</div>
					</div>
				</div>
				<div id="test_right">
					<script type="text/javascript">$('#test_right').load('/login/ajax.post.php?op=load_login_status_box&rd='+Math.random());</script>
				</div>
			</div>
			<div id="student">
				<div id="student_l">
					<div id="student_top">
						<div id="u">
							<div><img src="/images/index/course_tab_0_sel.jpg" class="course_tab"></div>
							<div style="margin-left:25px;"><img src="/images/index/course_tab_1.jpg" class="course_tab"></div>
							<div style="margin-left:35px;"><img src="/images/index/course_tab_2.jpg" class="course_tab"></div>
							<div style="margin-left:30px;"><img src="/images/index/course_tab_3.jpg" class="course_tab"></div>
						</div>
						<div id="dict_more"><a href="/course/">more&gt;</a></div>
						
					</div>
					<?php 
					for($i=1;$i<5;$i++){
						#$teact=$db->query("select id,title,img_url,description from eb_teach where is_adopt=1 and del_flag=0 and age=".$i." order by create_time desc,priority desc limit 13");
						#$teact_count=$db->record_count;
					?>
					<div class="course_list" id="course_list_<?php echo $i-1;?>" style="<?php if(1==$i){ echo 'display:inline;';}else{ echo 'display:none;';} ?>">
					<div class="student_c"<?php $pos="course_tab_head_$i";show_page_pos($pos,'link_d_i');?>>
						<div class="s_pic_l">
							<a href="#"><img src="<?php echo $pos_items[$pos]->image1;?>" border="0"></a>
						</div>
						<div class="s_pic_r" style="width:510px;">
							<div class="s_word_top"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href,array('target' => '_blank'));?></div>
							<div class="s_word_cotent"><?php echo_href($pos_items[$pos]->description, $pos_items[$pos]->href,array('target' => '_blank'));?></div>
						</div>
					</div>
					<div class="stuent_d">
						<div class="word_z">
							<?php for($k=1;$k<=18;$k++){?>
							<div class="s_a"<?php $pos="course_tab_list_{$i}_{$k}";show_page_pos($pos,'link');?>>
								<div class="s_dian"></div>
								<div class="s_value"><?php echo_href($pos_items[$pos]->title, $pos_items[$pos]->href);?></div>
							</div>
							<?php }?>
						</div>
					</div>
					</div>
					<?php }?>
				</div>
				<div id="student_r">
					<div id="dict_a">
						<div id="dict_title">咨询排行</div>
						<div id="div_dict_more">
							<a href="/news">more&gt;</a>
						</div>
					</div>
					<div id="dict_menu"> 
						<div  class="dict_tab long" style="background:url(/images/index/r_ffff.gif) no-repeat; color:#FF6600;">育儿早班车</div>
						<div  class="dict_tab long">邻家育儿</div>
						<div  class="dict_tab short">海外传真</div>
						<div  class="dict_tab short">潮爸潮妈</div>
						<div  class="dict_tab short">网趣动态</div>
					</div>
					<?php for($j=0;$j<5;$j++){?>
					<div class="desc" id="desc_<?php echo $j;?>" <?php if($j>0) echo " style='display:none;'"?>>
						<?php for($i = 1; $i < 7; $i++){ ?>
						<div class="dict_c"<?php $pos="right_tab_{$j}_{$i}";show_page_pos($pos,'link');?>>
							<div class="dict_number"<?php if($i==1) echo ' style="background:url(/images/index/red.jpg) no-repeat;"';?>><?php echo $i; ?></div>
							<div class="dict_value" style='margin-top:3px;'>
								<a href="<?php echo $pos_items[$pos]->href?>" title="<?php echo $pos_items[$pos]->title;?>" target="_blank"><?php echo mb_strlen($pos_items[$pos]->title,"utf-8") > 15 ? mb_substr($pos_items[$pos]->title,0,14,"utf-8")."...":$pos_items[$pos]->title;?></a>
								<?php # echo_href($pos_items[$pos]->title, $pos_items[$pos]->href,array('target' => '_blank'));?></div>
						</div>
						<?php } ?>
					</div>
					<?php }?>
				</div>
			</div>
			<div id="mother">
				<div id="mother_l">
					<div id="m_l_t">
						<div>
							<a href="/assistant/index.php?age=-2"><img src="/images/index/1.png" /></a>
							<a href="/assistant/index.php?age=-1"><img src="/images/index/2.png"/></a>
							<a href="/assistant/index.php?age=1"><img src="/images/index/3.png"/></a>
							<a href="/assistant/index.php?age=2"><img src="/images/index/4.png"/></a>
							<a href="/assistant/index.php?age=3"><img src="/images/index/5.png"/></a>
							<a href="/assistant/index.php?age=4"><img src="/images/index/6.png"/></a>
						</div>
						<a href="/assistant/" style="font-size:14px; color:#444444; text-decoration: none;">
							more&gt;
						</a> 
					</div>
					<div id="m_l_c">
						<?php
						#$news_m=$db->query(" SELECT id,title,short_title,description,video_photo_src,content FROM eb_news e where category_id=157 and is_adopt=1 order by created_at desc limit 9;");
						#$news_m_count=$db->record_count;
						?>
						<div id="m_l_a"<?php $pos="assistant_head_image";show_page_pos($pos,'link_t_i');?>>
							<div id="m_l_pic">
								<a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1?>" border="0"></a>
							</div>
							<div id="m_l_title"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href,array('target' => '_blank'));?></div>
						</div>
						<div id="m_l_b"<?php $pos="assistant_head";show_page_pos($pos,'link_t_d')?>>
							<div id="m_c_title" title="<?php echo $pos_items[$pos]->title;?>"><?php echo mb_strlen($pos_items[$pos]->title,"utf-8")>10 ? mb_substr($pos_items[$pos]->title,0,9,"utf-8")."...":$pos_items[$pos]->title;?></div>
							<div id="m_c_content"><?php echo $pos_items[$pos]->description ? mb_substr($pos_items[$pos]->description, 0 ,48, "UTF-8")."...":'' ;?></div>
							<div id="m_c_bottom"><a href="<?php echo $pos_items[$pos]->href;?>">查看详细内容&gt;&gt;</a></div>
						</div>
						<div id="m_l_c_r">
							<?php 
								$list=$db->query("SELECT id,category_id,title,created_at FROM eb_assistant where is_adopt=1  order by click_count,rand() desc limit 8");
								for($i=1;$i<8;$i++){ 
									$type = $db->query("select name from eb_category  where category_type='assistant' and id=".$list[$i]->category_id);
									?>
							<div class="mlc">
								<a  href="/assistant/assistant.php?id=<?php echo $list[$i]->id;?>" target="_blank"  title="<?php echo $list[$i]->title;?>"><?php echo mb_strlen("[".$type[0]->name."]".$list[$i]->title,"utf-8")>20 ? mb_substr("[".$type[0]->name."] ".$list[$i]->title,0,20,"utf-8")."...":"[".$type[0]->name."] ".$list[$i]->title;?></a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div id="mother_r">
					<div id="m_r_t"></div>
					<div id="m_r_c">
						<div class="son_top">
							<div class="son_t_l">精彩<font style="color:#A4C853; font-weight:bold;" >问答</font></div>
							<div class="son_t_r"><a href="/bbs/forumdisplay.php?fid=10"><font style="color:#F33B0A; font-weight:bold;" >+</font> 更多</a></div>
						</div>
						<div class="son_content">
							<?php 
							//	$list=$db->query("SELECT id,category_id,title,created_at FROM eb_assistant where is_adopt=1  order by click_count,rand() desc limit 8");
								#$news_son=$db->query("SELECT id,title,description,content,short_title FROM eb_news e where category_id=208 and is_adopt=1 order by created_at desc limit 19");
								#$news_son_count=$db->record_count;
								for($j=0;$j<8;$j++){
									//$numid = rand(0, 200);
							 ?>
							<div class="son_c_z"<?php $pos="right_news_list_$j";show_page_pos($pos,'link')?>>
								<div class="son_c_z_l"></div>
								<div class="son_c_z_r">
									<a href="<?php echo $pos_items[$pos]->href;?>" target='_blank' title="<?php echo $pos_items[$pos]->title;?>"><?php echo mb_strlen($pos_items[$pos]->title,"UTF-8")>19 ? mb_substr($pos_items[$pos]->title, 0 ,19, "UTF-8")."...":$pos_items[$pos]->title ;?>
								</div>
							</div>
							<?php }?>
						</div>
					</div>
					<div id="m_r_b"></div>
				</div>
			</div>
			<div id="qinzi">
				<div id="qin_left">
					<div id="q_menu_l">
						<div class="q_m_p" id="q_m_p" style="background:url(/images/index/w_pg_l.gif) no-repeat;">
							<div id="q_m_a"/></div>
						</div>
						<div class="q_m_p">
							<div id="q_m_b"/></div>
						</div>
						<div class="q_m_p">
							<div id="q_m_c"/></div>
						</div>
						<div class="q_m_p" id="qum">
							<div id="q_m_d"/></div>
						</div>
					</div>
					<?php for($i = 0 ; $i < 5 ; $i++){?>
					<div class="q_menu_r" id="q_<?php echo  $i;?>" <?php if($i == 0) echo 'style="display: inline;"';?>>
						<div class="q_m_pg_d">
							<div class="child_t">
								<div class="ch_t_pic"<?php $pos="yard_$i";show_page_pos($pos,'link_d_i')?>>
									<a href="<?php echo $pos_items[$pos]->href;?>"><img  src="<?php echo $pos_items[$pos]->image1;?>"/></a>
								</div>
								<div class="ch_t_r">
									<div class="child_title"><?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href,array('target' => '_blank'));?></div>
									<div class="child_content"><?php echo_href($pos_items[$pos]->description,$pos_items[$pos]->href,array('target' => '_blank'));?></div>
								</div>
							</div>
							<div class="child_c">
								<?php for($j = 0 ; $j < 5 ; $j++){ ?>
									<div class="child_img"<?php $pos="yard_son_$i$j";show_page_pos($pos,'link_d_i')?>><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo $pos_items[$pos]->image1;?>"/></a></div>
								<?php }?>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div id="qin_right"<?php $pos="yard_right";show_page_pos($pos,'link_i')?>>
					<a href="<?php echo $pos_items[$pos]->href; ?>"><img src="<?php echo $pos_items[$pos]->image1;?>" /></a>
				</div>
			</div>
			<div class="quwen ad_banner" id="index_middle_banner" <?php $pos="yard_img";show_page_pos($pos,'link_i')?>>
				<img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/index/hr.png';?>"/>
			</div>
			<div id="student_b">
				<div id="sb_l">
					<div id="sbl_l"></div>
					<div id="sbl_ca">
						<div id="sblc_t">
							<div id="sblct_a">
								<div class="sblct_l">
									<div class="sblct_t_title">育儿早班车</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(1);?>">更多</a></div>
									<div class="sblct_bb" <?php $pos="bot_a_a";show_page_pos($pos,'link_i')?>>
										<img src="<?php echo $pos_items[$pos]->image1; ?>"/>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
									<!--  
										<?php
										$i =0;
										foreach($category as $id => $val){ ?>
										<div class="sb_t_content" style="<?php if($i!==2 && $i!==5){ echo 'border-right:1px solid #EEDECF';} ?>">
											<a href="<?php echo get_news_list_url($id);?>" title="<?php echo $val?>">
												<?php echo $val?>
											</a>
										</div>
										<?php 
											$i++;
										}?>
										-->
									</div>
									<div class="sb_content">
										<?php
										#$news=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
										for($j=0;$j<5;$j++){ ?>
										<div class="sb_ctt"<?php $pos="bottom_news_list_0_$j";show_page_pos($pos,'link')?>>
											<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href,array('target' => '_blank'));?>
										</div>
										<?php  }?>
									</div>
								</div>
							</div>
							<div id="sblct_b">
								<div class="sblct_l">
									<div class="sblct_t_title">邻家育儿</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(2);?>">更多</a></div>
									<div class="sblct_bb" <?php $pos="bot_a_b";show_page_pos($pos,'link_i')?>>
										<img src="<?php echo $pos_items[$pos]->image1; ?>"/>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<!-- 
										<?php
											$i=0;
											foreach ($category as $k=>$v){
											?>
										<div class="sbb_t_a" style="<?php if($i!=3 && $i!=7){ echo 'border-right:1px solid #EEDECF;'; } ?>">
											<a href="<?php echo get_news_list_url($k); ?>" title="<?php echo $v; ?>">
												<?php echo $v; ?>
											</a>
										</div>
										<?php $i++;} ?>
										 -->
									</div>
									<div class="sb_content">
										<?php 
										for($j=0;$j<5;$j++){ ?>
										<div class="sb_ctt"<?php $pos="bottom_news_list_1_$j";show_page_pos($pos,'link')?>>
											<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href,array('target' => '_blank'));?>
										</div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
						<div id="sblc_b">
							<div id="sblcb_c">
								<div class="sblct_l">
								<div class="sblct_t_title">海外传真</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(3);?>">更多</a></div>
									<div class="sblct_bb" <?php $pos="bot_a_c";show_page_pos($pos,'link_i')?>>
										<img src="<?php echo $pos_items[$pos]->image1; ?>"/>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<!-- 
										<?php
										$i=0;
										foreach ($category as $k=>$v){
										 ?>
										<div class="sbr_t_a" style="<?php if($i!=3){ echo 'border-right:1px solid #EEDECF;';} ?>">
										<a href="<?php echo get_news_list_url($k);?>" title="<?php echo $v; ?>"><?php echo $v; ?></a></div>
										<?php $i++; }?>
										 -->
									</div>
									<div class="sb_content">
										<?php 
											#$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
											for($j=0;$j<5;$j++){ ?>
											<div class="sb_ctt"<?php $pos="bottom_news_list_2_$j";show_page_pos($pos,'link')?>>
												<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href,array('target' => '_blank'));?>
											</div>
										<?php }?>
									</div>
								</div>
							</div>
							<div id="sblcb_d">
								<div class="sblct_l">
									<div class="sblct_t_title">潮爸潮妈</div>
									<div class="sblct_t"><a href="<?php echo get_news_list_url(4);?>">更多</a></div>
									<?php 
										#$category=array("136"=>"游戏","137"=>"抚摸","138"=>"训练","139"=>"对话");
										#$news_k=array_keys($news);
										#$news_id=implode(',',$news_k);
										#$new=$db->query("SELECT id,title,short_title,description,content,video_photo_src FROM eb_news e where category_id in ($news_id) order by created_at desc limit 1;");
										#$n=$db->query("SELECT id,name,parent_id from eb_category where id in ($news_id)");
									?>
									<div class="sblct_bb" <?php $pos="bot_a_d";show_page_pos($pos,'link_i')?>>
										<img src="<?php echo $pos_items[$pos]->image1; ?>"/>
									</div>
								</div>
								<div class="sblct_r">
									<div class="sb_title">
										<!-- 
										<?php
										$i=0;
										foreach ($category as $k=>$v){
										 ?>
										<div class="sbr_t_a" style="<?php if($i!=3){ echo 'border-right:1px solid #EEDECF;';} ?>">
										<a href="<?php echo get_news_list_url($k);?>" title="<?php echo $v; ?>"><?php echo $v; ?></a></div>
										<?php $i++; }?>
										 -->
									</div>
									<div class="sb_content">
										<?php 
											#$news=$db->query("SELECT id,title,short_title,description,content FROM eb_news e where category_id in ($news_id) order by created_at desc limit 3;");
											for($j=0;$j<5;$j++){ ?>
											<div class="sb_ctt"<?php $pos="bottom_news_list_3_$j";show_page_pos($pos,'link')?>>
												<?php echo_href($pos_items[$pos]->title,$pos_items[$pos]->href,array('target' => '_blank'));?>
											</div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="sbl_r"></div>
				</div>
				<div id="sb_r">
					<div id="sbl_tr"></div>
					<div id="sbl_cr">
						<div class="son_top">
							<div class="son_t_l">助手<font style="color:#A4C853; font-weight:bold;" >排行</font></div>
							<div class="son_t_r"><a href="/assistant"><font style="color:#F33B0A; font-weight:bold;" >+</font> 更多</a></div>
						</div>
						<div class="son_content">
							<?php 
								$list=$db->query("SELECT id,category_id,title,created_at FROM eb_assistant where is_adopt=1  order by click_count,rand() desc limit 11");
								for($k=0;$k<11;$k++){
								$type = $db->query("select name from eb_category  where category_type='assistant' and id=".$list[$k]->category_id);
							 ?>
							<div class="son_c_z">
								<div class="son_c_z_l"></div>
								<div class="son_c_z_r">
									<a  href="/assistant/assistant.php?id=<?php echo $list[$k]->id;?>" target="_blank" title="<?php echo $list[$k]->title;?>"><?php echo mb_strlen("[".$type[0]->name."]".$list[$k]->title,"utf-8")>17 ? mb_substr("[".$type[0]->name."]".$list[$k]->title,0,17,"utf-8")."...":"[".$type[0]->name."]".$list[$k]->title;?></a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
					<div id="sbl_br"></div>
				</div>
			</div>
			<div class="quwen"<?php $pos="yardd_img";show_page_pos($pos,'link_i')?>>
				<img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/index/hr.png';?>"/>
			</div>
			<div id="pic">
				<div id="picc_left"></div>
				<div id="picc_right">
					<?php
						for($k = 0 ; $k < 22;$k++){
					 ?>
					<div class="picc_a"<?php $pos="bottom_$k";show_page_pos($pos,'link_i');?>><a href="<?php echo $pos_items[$pos]->href;?>"><img src="<?php echo  $pos_items[$pos]->image1; ?>"/></a></div>
					<?php } ?>
				</div>
			</div>
		<?php include_once(dirname(__FILE__).'/inc/bottom.php');?>
		</div>
		<div id="f_r_pg"></div>
	</div>
</div>
</body>
</html>
