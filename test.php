<div class="ht_l_t">课程助手链接</div>
								<div class="ht_l_h"></div>
								<div class="assistant_top_pg_a"<?php $pos = "assistant_top_pg_a";show_page_pos($pos,'link_i')?>>
									<a href="/course" target="_blank"><img src="<?php echo $pos_items[$pos]->image1 ?>"/></a>
								</div>
								<div class="assistant_top_pg_b"<?php $pos = "assistant_top_pg_b";show_page_pos($pos,'link_i')?>>
									<a href="/test" target="_blank"><img src="<?php echo $pos_items[$pos]->image1 ?>"/></a>
								</div>
								<div class="assistant_top_pg_c"<?php $pos = "assistant_top_pg_c";show_page_pos($pos,'link')?>>
									<div class="htct_l"></div>
											<a href="<?php echo $pos_items[$pos]->href;?>" class="die_assistant">
										<?php $tilte_count =mb_strlen($pos_items[$pos]->title,"utf-8");
										 echo # $tilte_count >45 ?mb_substr($pos_items[$pos]->title,0,46,"utf-8").'<font style="font-size:12px;">...</font>':
										 $pos_items[$pos]->title;?>
									</a>
								</div>
								<div class="htl_pg_c">
						</div>