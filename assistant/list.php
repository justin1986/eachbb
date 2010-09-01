<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>网趣宝贝-妈妈助手</title>
	<?php
		include_once('../frame.php');
		css_include_tag('top_inc/assistant_top','assistant_list','assistant/assistant_content','assistant/assistant_question','right_inc/assistant_right','left_inc/assistant_left'); 
		use_jquery();
		js_include_tag('assistant/list');
		
		$db = get_db();
		$age = intval($_GET['age']);
		$category_id = intval($_GET['category_id']);
		if(!$category_id){
			die('invalid param');
			exit;
		}
		$category = new category_class('assistant');
		$current_cate = $category->find($category_id);
		$level = $current_cate->level;
		if($level == 1){
			$sub_cates  = $category->find_sub_category($category_id);
			$breads[0] = $current_cate;
		}else{
			$breads[0] = $category->find($current_cate->parent_id);
			$breads[1] = $current_cate;
		}
		
		function convert_age($age){
			switch ($age) {
				case -2: return '准备怀孕';break;
				case -1:return '怀孕中';break;
				case 1:return '0~1岁';break;
				case 2:return '1~2岁';break;
				case 3:return '2~3岁';break;
				default:return '';
			}
		}
	?>
</head>
<body>
	<div id="ibody">
		<div id="container">
			<div id="container_result">
				<div id="breadbrum">
					<a href="/assistant/_index.php">助手首页</a>
					<?php foreach ($breads as $item){
						echo " >> <a href='list.php?category_id={$item->id}'>{$item->name}</a>";
					}?>
					<?php if(in_array($_GET['age'], array(-2,-1,1,2,3))){
						echo " >> ",convert_age($_GET['age']);
					}?>
				</div>
				<?php
					if($level == 1){
						include "_level1.php";
					}elseif ($level==2 && !$age){
						include "_level2.php";
					}elseif($level==2 && $age){
						include "_final_list.php";
					}
				?>
				<?php include_once('./_assistant_content.php'); ?>
			
			</div>
			<?php include_once('./_assistant_right.php'); ?>
		</div>
		
	</div>
</body>
<script type="text/javascript">
	function filter_age(age){
		var url = window.location.href;
		var exp = /age=\d+/;
		url = url.replace(exp, '');
		url = url + '&age=' + age;
		window.location.href=url;
	}
</script>
</html>
