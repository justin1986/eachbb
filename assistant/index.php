<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once dirname(__FILE__).'/../frame.php';
		css_include_tag('assistant'); 
		use_jquery();
		$db = get_db();
		js_include_tag('assistant/assistant');
		init_page_items('assistant_index');
	?>
</head>
<body>
<div id="ibody">
	<div id="top_banner">
		<div id="logo"></div>
		<div id="top_ad"><a href="#"><img src="/images/bbs/t.jpg" /></a></div>
	</div>
	<div id="menu_container">
		<div id="menu_pg">
			<div id="menu_left"></div>
			<div id="menu_center">
				<div id="menu_ct">
					<div id="menu_ctt">
						<input type="button" class="t_first" value="网站首页">
						<div class="me_a"><a href="#">特色测评</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">早教课程</a></div>
						<div class="me_h"></div>
						<div class="me_b" style="background:url(images/bbs/mo_pg.jpg) no-repeat;"><a href="#"><font class="son">妈妈</font><font class="bbs">助手</font></a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">我家小院子</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">我的宝宝</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">亲子论坛</a></div>
						<div class="me_h"></div>
						<div class="me_b"><a href="#">育儿咨询</a></div>
						<div class="me_h"></div>
						<div class="me_b" style="width:85px;"><a href="#">关于网趣宝宝</a></div>
						<div class="welcom">欢迎,<font>123</font></div>
						<div class="exit">退出</div>
						<div class="info">消息<a href="#" style="color:#FE843A">(1)</a></div>
					</div>
				</div>
				<div id="menu_ctb">
					<input type="button" id="t_first" value="我的网趣">
					<div class="me_aa"><a href="#">网趣宝宝首页</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">用户测评报告</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">用户课程订购</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">重要信息提示</a></div>
					<div class="me_hh"></div>
					<div class="me_bb"><a href="#">我家小院子</a></div>
					<div class="me_hh"></div>
					<div class="me_bb" ><a href="#">管理设置</a></div>
					<input type="text" id="me_in">
					<input type="button" id="me_btn">
				</div>
			</div>
			<div id="menu_right"></div>
		</div>
	</div>
	
	<div id="top2">
		<div id="top2_t">
			<div id="tt_l"></div>
			<div id="tt_c">
				<div class="ttc_a"><a href="?age=-2">准备怀孕</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=-1">怀孕期</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=1">0～1岁</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=2">1～2岁</a></div>
				<div class="ttc_hr"></div>
				<div class="ttc_a"><a href="?age=3">2～3岁</a></div>
				<a href="#">
				<img id="ttc_f" src="/images/helper/t_1.jpg"/>
				</a>
				<a href="#">
				<img id="ttc_g" src="/images/helper/t_2.jpg"/>
				</a>
				<a href="#">
				<img id="ttc_h" src="/images/helper/t_3.jpg"/>
				</a>
				<a href="#">
				<img id="ttc_j" src="/images/helper/t_4.jpg"/>
				</a>
			</div>
			<div id="tt_r"></div>
		</div>
		<div id="top2_b">
			<div id="t2b_l">你的宝宝多大了?</div>
			<div id="t2b_r">
				<div id="t2b_hr"></div>
				<div id="t2bv_a"><a href="#">怀孕期</a></div>
				<div id="t2bv_b"><a href="#">新生儿</a></div>
				<div id="t2bv_c"><a href="#">1岁</a></div>
				<div id="t2bv_d"><a href="#">2岁</a></div>
				<div id="t2bv_e"><a href="#">5岁</a></div>
				<div id="t2bv_f"><a href="#">6岁</a></div>
			</div>
		</div>
	</div>
	<div id="fbody">
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
									<div class="htct_t"><?php echo $top_cates[$i]->name;?></div>
									<div class="htct_b">
										<?php
										$itemp = 0; 
										$var = "category_$i";
										$$var = array();
										for($j=0;$j<$sub_len;$j++){
											if($sub_cates[$j]->parent_id != $top_cates[$i]->id) continue;
											array_push($$var, $sub_cates[$j]->id);
											$mod = $itemp % 3;
											$itemp++;
											switch ($mod) {
												case 0:
													$class="htct_ca";
												break;
												case 1:
													$class="htct_c";
												break;
												case 2:
													$class="htct_cc";
												break;
												default:
													;
												break;
											}
										?>
										<div class="<?php echo $class;?>"><a href="/assistant/list.php?category_id=<?php echo $sub_cates[$i]->id;?>" title="<?php echo $sub_cates[$j]->name;?>"><?php echo $sub_cates[$j]->name;?></a></div>
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
		<div id="bg_hr"></div>
		<div id="bottom">关于我们 - 加入我们 - 友情链接 - 联系我们 - 服务条款 - 隐私保护 - 网站地图</div>
		<div id="bottom_b">哈哈少儿旗下网站  Copyright © 1997-2010 HAHA.smg.com All Rights Reserved.</div>
	</div>
</div>
</body>
</html>
