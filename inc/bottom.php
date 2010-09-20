<style>
#bg_hr{width:958px; height:4px; margin-top:25px; margin-left:10px; background:url(/images/class/b_hr.jpg) repeat-x; float:left; display:inline;}
#bottom{width:980px; margin-top:15px; text-align:center; font-size:12px; color:#666666; float:left; display:inline;}
#bottom_b{width:980px; margin-top:10px; margin-bottom:50px; text-align:center; float:left; font-size:12px; color:#666666; display:inline;}
.bottom_a{font-size:12px; color:#666666;  text-decoration: none;}
</style>
	<?php 
			include_once(dirname(__FILE__).'./../frame.php');
			use_jquery_ui();
			init_page_items('bottom');
	?>
<div id="bg_hr"></div>
<div id="bottom">
	<a class="bottom_a"<?php $pos="bottom_a";show_page_pos($pos,'link');?> href="<?php echo $pos_items[$pos]->href;?>" ><?php echo $pos_items[$pos]->title; ?> -</a> 
	<a class="bottom_a"<?php $pos="bottom_b";show_page_pos($pos,'link');?> href="<?php echo $pos_items[$pos]->href;?>" ><?php echo $pos_items[$pos]->title; ?> -</a>
	<a class="bottom_a"<?php $pos="bottom_c";show_page_pos($pos,'link');?> href="<?php echo $pos_items[$pos]->href;?>" ><?php echo $pos_items[$pos]->title; ?> -</a>
	<a class="bottom_a"<?php $pos="bottom_d";show_page_pos($pos,'link');?> href="<?php echo $pos_items[$pos]->href;?>" ><?php echo $pos_items[$pos]->title; ?> -</a>
	<a class="bottom_a"<?php $pos="bottom_e";show_page_pos($pos,'link');?> href="<?php echo $pos_items[$pos]->href;?>" ><?php echo $pos_items[$pos]->title; ?> -</a>
	<a class="bottom_a"<?php $pos="bottom_f";show_page_pos($pos,'link');?> href="<?php echo $pos_items[$pos]->href;?>" ><?php echo $pos_items[$pos]->title; ?> -</a>
	<a class="bottom_a"<?php $pos="bottom_g";show_page_pos($pos,'link');?> href="<?php echo $pos_items[$pos]->href;?>" ><?php echo $pos_items[$pos]->title; ?></a>
</div>
<div id="bottom_b">沪ICP备10204500号  <script src="http://s17.cnzz.com/stat.php?id=2415758&web_id=2415758&show=pic1" language="JavaScript"></script></div>
<script src="/javascript/get_ad.js">
</script>