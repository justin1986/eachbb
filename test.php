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
		<form action="test.php" method="post">
			<input type="text" value="<?php echo $_POST['post']; ?>"; />
			<input type="submit" name="post" value="ok" />
		</form>
		<div id="test" class="test_class" style="color:red; float:left">test</div>
		<a href="www.sohu.com" id="a">test</a>
		<select>
			<option>1</option>
			<option>2</option>
		</select>
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

