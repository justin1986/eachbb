<?php 
include("../frame.php");

$province = $_POST['province'];

$db = get_db();
$city = $db->query("select city from phpcms_city where province='$province' group by city order by cityid");
?>
<option value=''>请选择</option>
<?php 
foreach($city as $v){
?>
<option value='<?php echo $v->city;?>'><?php echo $v->city;?></option>
<?php }?>