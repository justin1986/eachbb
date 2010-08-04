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
		<?php 
			$db = get_db();
			$result = $db->query("select * from test");
			$db->record_count;
			$db->execute("insert into test(field1,field2,field3) values ().");
		?>
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



////////////随便放置  
 <div id="head">
			<div id="head_b">
			<div id="head_t">
			<font size="5" >更新头像</font>
			<div style="margin-top:5px;"><img src="/images/avatar/cc_h_u.png" ></img></div>
			</div>
			</div>
			
		    <font size="2" style="margin-left:80px;">[更新头像    </font><font size="2" style="border-bottom:1px #000000 solid;">照片]</font>
			<div><font size="3" style="margin-left:100px;">我的头像库（0张）</font>
			<font size="2" color="red" style="margin-left:50px;">[选择头像][上传头像][更多头像]</font>
			</div>
			<div style="width:560px; height:1px;background-color:#A3C1CD"></div>
			        <img src="/images/avatar/photo.png" style="margin-left:10px;"></img>
			        <img src="/images/avatar/photo.png" class="head_i"></img>
					<img src="/images/avatar/photo.png" class="head_i"></img>
					<img src="/images/avatar/photo.png" class="head_i"></img>
			</div>
#head{width:401pxpx; height:813px; margin-left:8px;  display:inline;}
#head_b{width:401px;height:308px;margin:auto auto;background:url(/images/avatar/cc_h.png) ;}
#head_t{padding-top:120px;padding-left:160px;}
.head_i{margin-left:5px;}




overflow:hidden;