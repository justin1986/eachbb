<?php
	include "frame.php";
	set_charset();
	use_jquery(); 
?>
<body>
	<a href="#" id="test">test</a>

</body>

<script>
	var a = "http://www.localhost/a.php?age=12&a=3";
	var exp = /age=\d+/;
	alert(a.replace(exp, ''));
</script>