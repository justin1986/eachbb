<div id="f_l">
			<div id="h_type">
				<div class="h_pg_t"></div>
				<div class="h_pg_c">
					<div class="h_pg_cc">
						<div class="ht_l_t">课程助手连接</div>
						<div class="ht_l_h"></div>
						<div class="htl_pg_c">
							<?php 
								$sql = "select * from eb_category where category_type='assistant' and level=1";
								$top_cates = $db->query($sql);
								$sql = "select * from eb_category where category_type='assistant' and level=2";
								$sub_cates = $db->query($sql);
								$top_len = count($top_cates);
								$sub_len = count($sub_cates);
								for($i=0;$i<$top_len;$i++){
							?>
							<div class="ht_c_z">
								<div class="ht_c_t">
									<div class="htct_l"></div>
									<div class="htct_t" param=<?php echo $i; ?>><?php echo $top_cates[$i]->name;?></div>
									<div class="htct_b" <?php if($i==0){?>style="display:inline;"<?php }?> >
										<?php
										$var = "category_$i";
										$$var = array();
										for($j=0;$j<$sub_len;$j++){
											if($sub_cates[$j]->parent_id != $top_cates[$i]->id) continue;
											array_push($$var, $sub_cates[$j]->id);
										?>
										<div class="htct_c"><a href="/assistant/list.php?category_id=<?php echo $sub_cates[$i]->id;?>" title="<?php echo $sub_cates[$j]->name;?>"><?php echo $sub_cates[$j]->name;?></a></div>
										<?php }?>
									</div>
								</div>
							</div>
							
							<div class="htct_hr"></div>
							<?php }?>
							<div class="htctc_hr"></div>
						</div>
					</div>
				</div>
				<div class="h_pg_b"></div>
			</div>
			<div id="fl_b">
				<div class="hlc_t"></div>
				<div class="hlc_b">
					<div class="hlcb_pg">
						<div class="hlct_t">简单计算小工具</div>
						<img src="/images/helper/lb_hd.jpg"> </div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">1</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">2</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
				</div>
				<div class="hlc_bb"></div>
			</div>
			<div id="hl_class">
				<div class="hlc_t"></div>
				<div class="hlc_b">
					<div class="hlcb_pg">
						<div class="hlct_t">热门助手排行榜</div>
						<img src="/images/helper/lb_hd.jpg"> </div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">1</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">3</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
				</div>
				<div class="hlc_bb"></div>
			</div>
			<div id="fl_c">
				<div class="hlc_t"></div>
				<div class="hlc_b">
					<div class="hlcb_pg">
						<div class="hlct_t">问答排行榜</div>
						<img src="/images/helper/lb_hd.jpg"> </div>
					<div class="hlcb_z">
						<div class="hlcb_l">
							<div class="r">1</div>
						</div>
						<div class="hlcb_r">
							<div class="hlcb_t">按时法十分</div>
							<div class="hlcb_t">上传者：哈哈</div>
							<div class="hlcb_t"><font>下载次数：</font>1232</div>
						</div>
					</div>
				</div>
				<div class="hlc_bb"></div>
			</div>
			<div id="hl_b"> <img src="/images/class/l_pg.jpg"> </div>
		</div>