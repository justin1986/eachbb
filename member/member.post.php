<?php 
include_once dirname(__FILE__).'/../frame.php';
if(!is_ajax()){
	die('非法访问');
}

$member = new table_class('eb_member');
$member->find($_POST['id']);
////////////////////////////////////////////////////
$gender = intval($_POST['gender']);
if($gender==1||$gender==2){
	$member->gender = $gender;
}
////////////////////////////////////////////////////
$fix_phone = $_POST['fix_phone'];
if(strlen($fix_phone)>13){
	die('电话格式有误');
}else{
	$member->fix_phone = $fix_phone;
}
////////////////////////////////////////////////////
$phone = $_POST['phone'];
if((strlen($phone)!=11||!is_numeric($phone))&&!empty($phone)){
	die('手机格式有误,请认真填写');
}else{
	$member->phone = $phone;
}
////////////////////////////////////////////////////
$id_num = $_POST['id_num'];
if((strlen($id_num)!=15&&strlen($id_num)!=18)&&!empty($id_num)){
	die('身份证格式有误,请认真填写');
}else{
	if(!is_numeric(substr($id_num,0,15))){
		die('身份证格式有误,请认真填写');
	}
	$member->id_num = $id_num;
}
////////////////////////////////////////////////////
$education = $_POST['education'];
$education_array = array('高中/中专','大学本科/大学专科','硕士','博士');
if(!in_array($education,$education_array)&&!empty($education)){
	die('非法访问！');
}else{
	$member->education = $education;
}
////////////////////////////////////////////////////
$industry = $_POST['industry'];
if(strlen($industry)>46){
	die('非法访问！');
}else{
	$member->industry = $industry;
}
////////////////////////////////////////////////////
$income = $_POST['income'];
$income_array = array('1000元以下','1000-3000元','3000-5000元','5000-8000元','8000-10000元','10000元以上');
if(!in_array($income,$income_array)&&!empty($income)){
	die('非法访问！');
}else{
	$member->income = $income;
}
////////////////////////////////////////////////////
$true_name = $_POST['true_name'];
if(strlen($true_name)>18){
	die('请输入真实姓名');
}else{
	$member->true_name = $true_name;
}
////////////////////////////////////////////////////
$province = $_POST['province'];
$city = $_POST['city'];
$address = $_POST['address'];
if(strlen($province)>18){
	die('非法访问！');
}
if(strlen($city)>30){
	die('非法访问！');
}
if(strlen($address)>90){
	die('非法访问！');
}
$address = $province.'-'.$city.'-'.$address;
$member->address = $address;
////////////////////////////////////////////////////
$zip = $_POST['zip'];
if((strlen($zip)!=6||!is_numeric($zip))&&!empty($zip)){
	die('邮编格式有误，请认真填写');
}else{
	$member->zip = $zip;
}
////////////////////////////////////////////////////
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
if(empty($year)||empty($month)||empty($day)){
	die('请输入完整的生日');
}
if(strlen($year)!=4||$month>12||$day>31){
	die('非法访问！');
}
$member->birthday = $year.'-'.$month.'-'.$day;

$nowstate = $_POST['nowstate'];
if($nowstate!=1&&$nowstate!=2&&$nowstate!=3){
	die('请选择生育状态');
}else{
	$member->baby_status = $nowstate;
}
////////////////////////////////////////////////////
$year = $_POST['bb_year'];
$month = $_POST['bb_month'];
$day = $_POST['bb_day'];
if((empty($year)||empty($month)||empty($day))&&$nowstate==1){
	die('请输入完整的宝宝生日');
}
if(strlen($year)!=4||$month>12||$day>31){
	die('非法访问！');
}
if(!(empty($year)||empty($month)||empty($day))){
	$member->baby_birthday = $year.'-'.$month.'-'.$day;
}
////////////////////////////////////////////////////
$baby_name = $_POST['baby_name'];
if(strlen("baby_name")>18){
	die('请输入宝宝姓名');
}else{
	$member->baby_name = $baby_name;
}
////////////////////////////////////////////////////
$babysex = $_POST['babysex'];
if($babysex!=1&&$babysex!=2&&$babysex!=''){
	die('非法访问');
}else{
	$member->baby_gender = $babysex;
}
////////////////////////////////////////////////////
$member->save();
?>