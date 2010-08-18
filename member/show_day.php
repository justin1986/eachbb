<?php 
include("../frame.php");

$month = $_POST['month'];
$year = $_POST['year'];
?>
<option value=''>请选择</option>
<?php
for($i=1;$i<29;$i++){
?>
<option value='<?php echo $i;?>'><?php echo $i;?>日</option>
<?php }
if($year%4==0){
?>
<option value='29'>29日</option>
<?php }
$month1 = array(1,3,5,7,8,10,12);
$month2 = array(4,6,9,11);
if(in_array($month,$month2)){
?>
<option value='30'>30日</option>
<?php }?>
<?php 
if(in_array($month,$month1)){
?>
<option value='31'>31日</option>
<?php }?>
