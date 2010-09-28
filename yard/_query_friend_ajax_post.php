<?php
	include_once('../frame.php');
	$user = User::current_user();
	if(!is_ajax()){
		die();
	}
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
		}
		$nike_name=$_GET["nike_name"];
		$email=$_GET["email"];
		$address=$_GET["address"];
		$sql;
		if($nike_name  || $email || $address){
			$sql="SELECT id,name,avatar FROM eachbb_member.member where 1=1";
		}
		if($address)
		$sql .=" and address like '%$address%'";
		if($email)
		$sql .=" and email like '%$email%'";
		if($nike_name)
		$sql .=" and name like '%$nike_name%'";
		$db = get_db();
		$list = $db->paginate($sql,3);
?>
<div class="friend_result_title">搜索列表</div>
<?php
	if($list){
foreach($list as $list){?>
<div class="friend_result_banner">
	<div class="friend_img">
		<img src="<?php echo $list->avatar ? thumb_name($list->avatar,'small') :"/images/yard_info_img/1.jpg";?>" />
	</div>
	<div class="friend_nike_name">用户名:<?php echo $list->name;?></div>
	<div class="friend_a"><a href="home.php?id=<?php echo $list->id;?>">查看主页</a></div>
</div>
<?php }}else{
	echo "<div style='width:800px; height:100px; line-height:100px; text-align:center; font-size:20px; font-weight:bold;'>对不起，查询结果为空！</div>";	
}?>
<div style="width:100%; text-align:center; margin-top:10px;"><?php paginate('','friend_value');?></div>
<style>
.friend_result_banner div{float:left; display:inline;}
</style>