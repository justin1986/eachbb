<?php 
	include_once( dirname(__FILE__) .'/../frame.php');
	$key = $_GET['key'];
	$db = get_db();
	if(strlen($key)>100){
		redirect('error.html');
		die();
	}
	if(empty($key)){
		$count = 0;
		$page_record_count = 0;
	}else{
		$record = search_content($key);
		$count = count($record);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo $key;?>_新闻检索_网趣宝贝</title>
	<?php
		$result_key=$key;
		use_jquery();
		js_include_tag('news_highlight.js');
		css_include_tag('article','news_search');
	?>
</head>
<body>
	<div id="ibody">
		<?php include_once('../inc/_consult_top.php'); ?>
		<div id="bread"><img src="/images/article/log.jpg" /> 新闻检索</div>
		<div id="bread_line"></div>
		
		<div id="l">
			<div class="news_caption">
					<div class="captions">搜索关键字“<span id="span_key"><?php echo $result_key;?></span>”的新闻<span>共<?php echo $page_record_count;?>篇</span></div>
			</div>
			<div id="list_content">
				<?php
					for($i=0;$i<$count;$i++){
				?>
				<div class="list_box">
					<div class="head_line">
						<div class="title"><a title="<?php echo $record[$i]->title;?>" target="_blank" href="<?php echo get_news_url($record[$i],'static');?>"><?php echo $record[$i]->title?></a></div>
						<div class=info>发布于：<?php echo substr($record[$i]->created_at,0,10);?></div>
					</div>
					<div class=description ><?php echo strip_tags($record[$i]->description);?></div>
				</div>
				<?php }?>
				<div id=page><?php paginate();?></div>
			</div>
		</div>	
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
</body>
</html>