<div id="cr_flash">
					<div id="cr_banner">
						<div id="crf_l">flash</div>
						<script type="text/javascript">
							var flashvar = {};
							var flashparam = {wmode:'Transparent'};
							swfobject.embedSWF("/flash/test_index.swf","crf_l","410","260","8",false,flashvar,flashparam);
						</script>
						<div id="crf_r">
						<?php $course_tilte=Array("测评理念","测评架构","测评的特色","父母养育测试");?>
						<?php for($i =0 ; $i < 4; $i++){
							$pos = "top_intr_$i";
						?>
						<div class="crf_c" id="cr_<?php echo $i;?>"<?php show_page_pos($pos,'link_d_i')?> style="margin-left:10px; float:left; padding:0px;">
							<div id="crf_t"><?php echo $course_tilte[$i];?></div>
							<div class="crf_ti"><img src="<?php echo $pos_items[$pos]->image1?>"></div>
							<div class="crg_tt"><?php echo $pos_items[$pos]->title;?></div>
							<?php
								if(mb_strlen($pos_items[$pos]->description,'utf-8'))
								{
									if(mb_strlen($pos_items[$pos]->description,'utf-8') < 150){
										echo $pos_items[$pos]->description.'<a href="#"></a>';
									}else{
										echo mb_substr($pos_items[$pos]->description,0,150,'utf-8')."<a href='#'><font style='font-size:10px;'>...</font>【查看全文】</a>";
									}
								}else{
									echo '<a href="#"></a>';
								}
							?>
						</div>
						<?php }?>
						<div id="crf_d">
							<div class="cr_num" style="background:url(/images/test/r_na.jpg) no-repeat; color:#0086F8;">1</div>
							<div class="cr_num">2</div>
							<div class="cr_num">3</div>
							<div class="cr_num">4</div>
						</div>
					</div>
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<div id="crc"></div>
			<div id="crd">
				<div class="crd_z" id="crd_z" <?php $pos="test_midden_a";show_page_pos($pos,'link_t_i');?>><img src="<?php echo  $pos_items[$pos]->image1;?>"><div class="crd_f"><a href="<?php echo  $pos_items[$pos]->href;?>" target="_blank"><?php echo  $pos_items[$pos]->title;?></a></div></div>
				<div class="crd_z" <?php $pos="test_midden_b";show_page_pos($pos,'link_t_i');?>><img src="<?php echo  $pos_items[$pos]->image1;?>"><div class="crd_f"><a href="<?php echo  $pos_items[$pos]->href;?>" target="_blank"><?php echo  $pos_items[$pos]->title;?></a></div></div>
				<div class="crd_z" <?php $pos="test_midden_c";show_page_pos($pos,'link_t_i');?>><img src="<?php echo  $pos_items[$pos]->image1;?>"><div class="crd_f"><a href="<?php echo  $pos_items[$pos]->href;?>" target="_blank"><?php echo  $pos_items[$pos]->title;?></a></div></div>
			</div>
			<div id="cre"<?php $pos="test_midden_d";show_page_pos($pos,'link_i');?>>
					<a href="<?php echo $pos_items[$pos]->href;?>" target="_blank"><img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1:"/images/test/tc_b.jpg";?>"></a>
			</div>
			<div id="cr_ci">
					<div id="cri_t"></div>
					<div id="cri_c">
						<div id="cric_pg">
							<div id="pric_l"></div>
							<div id="cric_title"><font>精彩课程展示</font></div>
							<div id="cric_c">
								<?php for($i=0;$i<6;$i++){?>
								<div class="cricc_a">
									<div <?php $pos="test_bottom_img_$i";show_page_pos($pos,'link_i');?>>
										<a href="<?php echo $pos_items[$pos]->href;?>" target="_blank">
											<img src="<?php echo $pos_items[$pos]->image1 ? $pos_items[$pos]->image1 : '/images/class/c_pg_a.jpg';?>">
										</a>
									</div>
								</div>
								<?php }?>
							</div>
							<div id="pric_rl"></div>
						</div>
					</div>
					<div id="cri_b"></div>
				</div>