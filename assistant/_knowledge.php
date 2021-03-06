<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once('../frame.php');
		css_include_tag('top_inc/assistant_top','logo','assistant/knowledge','assistant/assistant_content','assistant/assistant_question','right_inc/assistant_right','left_inc/assistant_left'); 
		use_jquery();
		$db = get_db();
		$category = new category_class('assistant');
		$age = intval($_GET['age']);
		function convert_age($age){
			switch($age){
				case -2: return '准备怀孕';
				case -1: return '怀孕期';
				case 1:return '0~1岁';break;
				case 2:return '1~2岁';break;
				case 3:return '2~3岁';break;
				case 4:return '3~6岁';break;
			}
		}
	?>
</head>
<body>
<input type="hidden" id="user_id" value="<?php echo $user->id;?>">
<div id="container">
	<div id="container_result" style="overflow: hidden;">
		<div id="breadbrum">
				<a href="/" target="_blank"><div id="log"></div></a>
				<a href="/assistant/_index.php">助手首页</a> &gt;&gt; <a href="_knowledge.php">知识专题</a>
				<?php if($age && in_array($age, array(-2,-1,1,2,3,4))){
					echo ">> ",convert_age($age);
				} ?>
			</div>
		<div class='menu' <?php if($age&&$age!=-2){?>style="display:none;"<?php }?>>准备怀孕</div>
		<div class="box" <?php if($age&&$age!=-2){?>style="display:none;"<?php }?>>
			<?php 
				$cate = $category->find_by_name('积极备孕');
				$childrens = $category->find_sub_category($cate->id);
				!$childrens && $childrens = array();
			?>
			<div class="first_title"><a href="list.php?category_id=<?php echo $cate->id;?>&age=-2"><?php echo $cate->name?></a></div>
			<?php 
				foreach($childrens as $child){
			?>
			<div class="second_title"><a href="list.php?category_id=<?php echo $child->id;?>&age=-2"><?php echo $child->name;?></a></div>
			<?php }?>
		</div>
		
		<div class='menu' <?php if($age&&$age!=-1){?>style="display:none;"<?php }?>>怀孕期间</div>
		<div class="box" <?php if($age&&$age!=-1){?>style="display:none;"<?php }?>>
			<?php 
				$cate = $category->find_by_name('孕期生活');
				$childrens = $category->find_sub_category($cate->id);
				!$childrens && $childrens = array();
			?>
			<div class="first_title"><a href="list.php?category_id=<?php echo $cate->id;?>&age=-1"><?php echo $cate->name?></a></div>
			<?php 
				foreach($childrens as $child){
			?>
			<div class="second_title"><a href="list.php?category_id=<?php echo $child->id;?>&age=-1"><?php echo $child->name;?></a></div>
			<?php }?>
		</div>
		<?php for($i=1;$i<=4;$i++){
			if($age && $age != $i) continue;
		?>
		<div class='menu' <?php  if($age&&$age!=$i){?>style="display:inline;"<?php }?>>
			<?php 
				switch($i){
					case 1:echo '0~1岁';break;
					case 2:echo '1~2岁';break;
					case 3:echo '2~3岁';break;
					case 4:echo '3~6岁';break;
				}
			?>
		</div>
		<div class="box" <?php # if($age&&$age!=$i){?>style="display:inline;"<?php #}?>>
			<?php 
				$cate = $category->find_by_name('生长发育');
				$childrens = $category->find_sub_category($cate->id);
				!$childrens && $childrens = array();
			?>
			<div class="first_title"><a href="list.php?category_id=<?php echo $cate->id;?>&age=<?php echo $i;?>"><?php echo $cate->name?></a></div>
			<?php 
				foreach($childrens as $child){
			?>
			<div class="second_title"><a href="list.php?category_id=<?php echo $child->id;?>&age=<?php echo $i;?>"><?php echo $child->name;?></a></div>
			<?php }?>
			<?php 
				$cate = $category->find_by_name('日常护理');
				$childrens = $category->find_sub_category($cate->id);
				!$childrens && $childrens = array();
			?>
			<div class="first_title"><a href="list.php?category_id=<?php echo $cate->id;?>&age=<?php echo $i;?>"><?php echo $cate->name?></a></div>
			<?php
				$filter_array = array();
				switch($i){
					case 1:break;
					case 2:break;
					case 3:array_push($filter_array,'宝宝排泄');break;
				}
				foreach($childrens as $child){
					if(!in_array($child->name,$filter_array)){
			?>
			<div class="second_title"><a href="list.php?category_id=<?php echo $child->id;?>&age=<?php echo $i;?>"><?php echo $child->name;?></a></div>
			<?php }}?>
			<?php 
				$cate = $category->find_by_name('疾病与接种');
				$childrens = $category->find_sub_category($cate->id);
				!$childrens && $childrens = array();
			?>
			<div class="first_title"><a href="list.php?category_id=<?php echo $cate->id;?>&age=<?php echo $i;?>"><?php echo $cate->name?></a></div>
			<?php 
				foreach($childrens as $child){
			?>
			<div class="second_title"><a href="list.php?category_id=<?php echo $child->id;?>&age=<?php echo $i;?>"><?php echo $child->name;?></a></div>
			<?php }?>
			<?php 
				$cate = $category->find_by_name('早期教育');
				$childrens = $category->find_sub_category($cate->id);
				!$childrens && $childrens = array();
			?>
			<div class="first_title"><a href="list.php?category_id=<?php echo $cate->id;?>&age=<?php echo $i;?>"><?php echo $cate->name?></a></div>
			<?php
				$filter_array = array();
				switch($i){
					case 1:array_push($filter_array,'入园准备');break;
					case 2:array_push($filter_array,'入园准备');break;
					case 3:break;
				}
				foreach($childrens as $child){
					if(!in_array($child->name,$filter_array)){
			?>
			<div class="second_title"><a href="list.php?category_id=<?php echo $child->id;?>&age=<?php echo $i;?>"><?php echo $child->name;?></a></div>
			<?php }}?>
			<?php 
				$cate = $category->find_by_name('宠爱自己');
				$childrens = $category->find_sub_category($cate->id);
				!$childrens && $childrens = array();
			?>
			<div class="first_title"><a href="list.php?category_id=<?php echo $cate->id;?>&age=<?php echo $i;?>"><?php echo $cate->name?></a></div>
			<?php
				$filter_array = array();
				switch($i){
					case 1:
						array_push($filter_array,'享受生活');
						array_push($filter_array,'职场生活');
						array_push($filter_array,'全职妈妈');
						break;
					case 2:
						array_push($filter_array,'坐月子');
						array_push($filter_array,'产后恢复');
						array_push($filter_array,'漂亮妈妈');
						array_push($filter_array,'回归职场');
						break;
					case 3:
						array_push($filter_array,'坐月子');
						array_push($filter_array,'产后恢复');
						array_push($filter_array,'漂亮妈妈');
						array_push($filter_array,'回归职场');
						break;
				}
				foreach($childrens as $child){
					if(!in_array($child->name,$filter_array)){
			?>
			<div class="second_title"><a href="list.php?category_id=<?php echo $child->id;?>&age=<?php echo $i;?>"><?php echo $child->name;?></a></div>
			<?php }}?>
		</div>
		
		<?php }?>
	</div>
	<?php include_once('./_assistant_right.php'); ?>
</div>
<script type="text/javascript">
function filter_age(age){
	var url = window.location.href;
	var exp = /age=\d+/;
	url = url.replace(exp, '');
	if(url.indexOf('?')<=0){
		url = url + '?';
	}
	url = url + '&age=' + age;
	window.location.href=url;
}
</script>
</body>
</html>