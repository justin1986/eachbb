<?php
	include_once('../frame.php');
	$user = User::current_user();
	if(!$user){
		alert("请您先登录！");?>
		<script>window.location.href="/login/";</script>
		<?php 
		}
		$nike_name=$_POST["nike_name"];
		$email=$_POST["email"];
		$address=$_POST["address"];
		$sql;
		if($nike_name  || $email || $address){
			$sql="SELECT id,name,avatar FROM eachbb_member.member where 1=1";
		}
		if($address)
		$sql .=" and address like '%$address%'";
		if($email)
		$sql .=" and email='$email'";
		if($nike_name)
		$sql .=" and name='$nike_name'";
		$db = get_db();
		$list = $db->query($sql);
?>
<div class="friend_result_title">搜索列表</div>
<?php
	if($list){
foreach($list as $list){?>
<div class="friend_result_banner">
	<div class="friend_img">
		<img src="<?php echo $list->avatar ? $list->avatar :"/images/yard_info_img/1.jpg";?>" />
	</div>
	<div class="friend_nike_name">用户名:<?php echo $list->name;?><a href="home.php?id=<?php echo $list->id;?>">查看主页</a></div>
</div>
<?php }}else{
	echo "<div style='width:800px; height:100px; line-height:100px; text-align:center; font-size:20px; font-weight:bold;'>对不起，查询结果为空！</div>";	
}?>