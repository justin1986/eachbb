<?php
	include "frame.php";
	set_charset();
	use_jquery(); 
	js_include_tag('jquery.colorbox-min');
	css_include_tag('colorbox');
?>
<body>
	<a href="http://localhost:82" id="test">test</a>
	<div id="div" style="color:green; font-size:14px;">this is a <span style="color:red;">div</span></div>
	<input type="text" value="abc" id="input" />
	<?php
		var_dump( refresh_course_xml());
	?>
</body>

<script>
	//document.getElemetById('test');
	$(function(){
		$('#test').colorbox({
			href:'/'
		});
	});
</script>