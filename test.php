<?php
	include "frame.php";
	set_charset();
	use_jquery(); 
?>
<body>
	<a href="http://localhost:82" id="test">test</a>
	<div id="div" style="color:green; font-size:14px;">this is a <span style="color:red;">div</span></div>
	<input type="text" value="abc" id="input" />
	<?php
		echo "http://" .$_SERVER[HTTP_HOST];
	?>
</body>

<script>
	//document.getElemetById('test');
	$(function(){
	});
</script>