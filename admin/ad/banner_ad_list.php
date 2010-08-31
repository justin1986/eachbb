<?php 
	session_start();
	include_once('../../frame.php');
	judge_role();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		$id = intval($_GET['id']);
		if(!$id){
			die('invalid param');
		}
		$db = get_ad_db();
		$items = $db->query("select * from publish_ad where banner_id=$id");
	?>
</head>
<body>
<div id=icaption>
    <div id=title>广告位管理</div>
	<a href="banner_list.php" id=btn_back></a>
	<a href="ad_edit.php?cid=<?php echo $cid;?>&bid=<?php echo $bid;?>&url=list" id="btn_add"></a>
</div>
<div id=isearch>
		<input id="key" type="text" value="<?php echo $key?>"><span id="span_category"></span>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class=itable_title>
			<td width="30%">广告</td><td width="25%">有效频道</td><td width="25%">状态</td><td width="20%">操作</td>
		</tr>
		<?php
			$db = get_ad_db();
			$sql = "select * from banner";
			if($key){
				$sql .= " where name like '%$key%'";
			}
			$banners = $db->paginate($sql);
			$count = $db->record_count;
			for($i=0;$i<$count;$i++){
		?>
		<tr class=tr3 id="<?php echo $banners[$i]->id;?>">
			<td><?php echo $banners[$i]->name;?></td>
			<td><?php echo $banners[$i]->description?></td>
			<td><?php echo $banners[$i]->ad_count?></td>
			<td><?php echo $banners[$i]->width?></td>
			<td><?php echo $banners[$i]->height?></td>
			<td>
				<a href="publish_ad_edit.php?id=<?php echo $banners[$i]->id;?>" class="edit" title="编辑" style="cursor:pointer"><img src="/images/admin/btn_edit.png" border="0"></a>
			</td>
		</tr>
		<?php }?>
		<tr class="btools">
			<td colspan=10><?php paginate("",null,"page",true);?></td>
		</tr>
	</table>
	</div>
</body>
<script>
	$("#search_button").click(function(){
		search();
	});
	$("#key").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	function search(){
		window.location.href = "ad_list.php?key="+encodeURI($("#key").val())+"&bid=<?php echo $bid;?>&cid=<?php echo $cid;?>";
	}
</script>
</html>