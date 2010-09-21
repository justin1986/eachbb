<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<?php
	include_once(dirname(__FILE__).'/frame.php');
?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta http-equiv=Content-Language content=zh-CN>
<title>意见反馈</title>
<?php
	use_jquery();
	css_include_tag('feedback','index','top_inc/test_left','test_left_inc');
	js_include_tag('jquery.cookie','feedback/feedback','swfobject');
	init_page_items('feedback');
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
					var flashvar = {defaultIndex:''};
					var flashparam = {wmode:'Transparent'};
					swfobject.embedSWF("flash/menu.swf","menu_flash","702","103","8",false,flashvar,flashparam);
				</script>
			</div>
			<div id="menu_right"></div>
	</div>
	<div id="fbody"  style="width:972px;">
		<div id="content">
			<?php include_once(dirname(__FILE__).'/test/left_inc.php'); ?>
			<div id="c_r">
				<div id="address">当前位置：<a href="/">网站首页</a> &gt; 
				<?php 
					$type=$_GET['type'];
					if($type =='test'){
				?>
				<a href="/test">测评首页</a> &gt; 
				<?php }else if($type == 'course'){
					?>
					<a href="/course">课程首页</a> &gt; <?php 
				}?><font style="font-size:12px;">意见反馈</font></div>
				<div id="c_hr"></div>
				<div id="h_title"<?php $pos="feedback_title1";show_page_pos($pos,'link')?>><a href="<?php echo $pos_items[$pos]->href;?>" target="_blank"><?php echo $pos_items[$pos]->title;?></a></div>
				<div id="c_title"<?php $pos="feedback_title2";show_page_pos($pos,'link_t_d');?>><a href="<?php echo $pos_items[$pos]->href;?>" target="_blank"><?php echo $pos_items[$pos]->title;?></a></div>
				<div id="cc_hr"></div>
				<div id="cc_c"><?php echo $pos_items[$pos]->description;?></div>
				<?php 
				$user = User::current_user();
				if(!$user){
				?>
				<div style="width:710px; height:200px; line-height:200px; text-align:center; font-size:20px; font-weight:bold;"><a href="/login">登录成功后才可以进行评论！</a></div>
				<?php }else{?>
				<div id="c_view">
					<div id="cv_title">发表意见</div>
					<textarea name="textarea" id="cv_text"></textarea>
					<input type="button" id="but" value="提交">
					<div id="cv_bz">与主题无关的评论，一律予以删除！(最多2000字)</div>
				</div>
				<div id="res"></div>
				<?php }?>
			</div>
		</div>
		<?php include_once(dirname(__FILE__).'/inc/bottom.php');?>
	</div>
</div>
</body>
</html>
