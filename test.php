<!--<div id="student_top">
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
				-->