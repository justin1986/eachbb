<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title></title>
		<?php
			include 'frame.php';
			use_jquery();
		?>
	</head>
	<body>
		<form action="test.post.php" method="post">
			<p>
			title:<input type="text" name="title" value="<?php echo $_POST['post']; ?>"; />
			</p>
			<p>
			content:<textarea rows="" cols="20" name="content"></textarea>
			</p>
			<input type="submit" value="ok" />
		</form>
		<div>
			<?php
				$db = get_db();
				$result = $db->query("select * from test");
				if($result === false) die("query fail");
				
				
			?>
			title:<?php echo $result[0]->title ?>
		</div>
	</body>
	
	<script type="text/javascript">
		
		//alert($('#test').html());
		//alert($('#test').text());
		//$('#test').attr('class','changed_class_name');
		$(function(){
			$('#test').hover(function(){
				$(this).html('in');
			},function(){
				$(this).html('out');
			});
			
			$('#a').click(function(e){
				e.preventDefault();
			});
		});
	</script>
</html>

