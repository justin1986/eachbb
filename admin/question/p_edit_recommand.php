<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<?php 
		include_once '../../frame.php';
		use_jquery();
		$recommand_id = intval($_GET['recommand_id']);
		$item = new table_class('eb_recommand');
		if($recommand_id){
			$item->find($recommand_id);
		}else{
			//create a new recommand,initial type
			$item->recommand_type= $_GET['recommand_type'];
			$item->result_id = $_GET['result_id'];
		}
	?>
	<style>
	<!--
		#outter_container{width:602px; height:200px;text-align:center;}
		#content_container{width:600px; padding:5px 0px 5px 0px; margin-top:10px;}
		#headline{width:600px; border:1px dotted #cdcdcd; background:#FBFBFB; color:#0B55C4; font-size:23px;}
		#headline_2{width:600px; background:#FBFBFB; font-size:16px; margin-top:5px; margin-bottom:5px;}
		table {
			width: 600px;
			border: none;
			text-align: center;
			background: #e7e7e7;
		}
		tr{ background:#ffffff;}
		td{ font-size:14px; line-height: 20px;}
		td.title{width:30%}
		td.content{text-align: left;}
	-->
	</style>
</head>
<body>
<div id="outter_container">
	<div id="headline">编辑测评推荐</div>
	<div id="content_container">
		<form id="question_form" method="POST" enctype="multipart/form-data" action="edit_recommand.post.php">
			<table cellspacing="1">
				<tr>
					<td class="title">文字显示</td>
					<td class="content"><input type="text" name="item[title]" value="<?php echo $item->title;?>"/></td>
				</tr>
				<tr>
					<td class="title">图片显示</td>
					<td class="content">
						<input type="file" name="item[image]"> 
					</td>
				</tr>
				<tr>
					<td class="title">链接地址</td>
					<td class="content"><input type="text" name="item[href]" value="<?php echo $item->href;?>"/></td>
				</tr>
				<tr>
					<td class="title">推荐类型</td>
					<td class="content">
						<select id="select_recommand_type" name="item[recommand_type]">
							<option value='assister'>妈妈助手</option>
							<option value='course'>课程推荐</option>
						</select>
						<script type="text/javascript">
							$('#select_recommand_type').val('<?php echo $item->recommand_type;?>');
						</script>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input id="question_submit" type="submit" value="提交">
						<input type="hidden" name="item[id]" value="<?php echo $item->id?>" />
						<input type="hidden" name="item[result_id]" value="<?php echo $item->result_id;?>" />
					</td>
				</tr>
			</table>
		</form>
	</div>
		
</div>
</body>
</html>