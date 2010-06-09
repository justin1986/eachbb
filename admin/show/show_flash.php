<?php
	include_once('../../frame.php');
	
	$flash = $_GET['flash'];
?>

<div id="myContent">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="410px" height="120px">
  <param name=movie value="<?php echo $flash;?>">
  <param name=quality value=high>
  <param name="wmode" value="transparent">
  <embed src="<?php echo $flash;?>" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="410" height="120" wmode="transparent"></embed>
</object></div>
