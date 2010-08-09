<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','member','yard_photo');
		js_include_tag('yard/yard','member','yard/upload_photo');
		$user = User::current_user();
		if(!$user){
			alert("请您先登录！");
			redirect('/login/');
			exit();
		}
		$db = get_db();
	?>
</head>
<body>
<div id="ibody" style=" position:relative; z-index: 0;">
	<?php include_once(dirname(__FILE__).'/../inc/_yard_top.php'); ?>
	<div id="menu">
		<div id="yard_day">
			<div id="yard_day_time"><?php echo date('Y年m月d日'); ?></div>
			<div id="yard_day_ct"><?php echo get_week_day(); ?></div>
		</div>
		<div id="menu_a" class="menu_pic"style="background:url(../images/yard/m_a.jpg) no-repeat;"></div>
		<div id="menu_b" class="menu_pic" style="background:url(../images/yard/m_1.jpg) no-repeat;"></div>
		<div id="menu_c" class="menu_pic"></div>
		<div id="menu_d" class="menu_pic"></div>
		<div id="menu_e" class="menu_pic"></div>
		<div id="menu_f" class="menu_pic"></div>
	</div>
	<div id="content">
		<div id="c_l">
			<?php include(dirname(__FILE__).'/../yard/_yard_left.php');?>
		</div>
		<div id="c_ll">
			<div id="cl_t"></div>
			<div id="cl_c"></div>
			<div id="cl_r"></div>
		</div>
		<div id="c_c">
			<div id="cc_t"></div>
			<div id="cc_c" >
				<div id="cc_pg">
					<div class=r_title id="r_log"><a><?php if($member->true_name) echo $member->true_name.'的账户管理'; else echo '暂无信息';?></a></div>
					<div id="r_log_hr">
						<div>上传头像</div>
					</div>
					<form  enctype="multipart/form-data" action="/yard/upload_photo_image.post.php" method="post">
						<div id="pic_log">
							<table width="754" height="109" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="13%" height="49" align="right" valign="middle">&nbsp;</td>
									<td width="50%" align="right" valign="middle">&nbsp;</td>
									<td width="37%" align="left" valign="middle">&nbsp;</td>
								</tr>
								<tr>
									<td height="36" align="right" valign="middle">头像名称：</td>
									<td align="middle" valign="middle"><input type="text" id="name_photo" name="name_photo" size="40"/></td>
									<td align="left" valign="middle"></td>
								</tr>
								<tr>
									<td height="36" align="right" valign="middle">上传到相册：</td>
									<td align="middle" id="select_photo" valign="middle">
									<?php 
										$alpum =$db->query("SELECT id,name FROM eachbb_member.album a where u_id={$user->id} order by last_update_time,visit_count,comment_count desc;");
									?>
										<select id="upload_select_id" name="upload_select_id">
											<?php
											foreach ($alpum as $al){ 
											?>
											<option value="<?php echo $al->id;?>"><?php echo $al->name;?></option>
											<?php }?>
										</select>
									</td>
									<td align="left" valign="middle"><a href="#" id="photo_book">添加相册</a></td>
								</tr>
								<tr>
									<td height="36" align="right" valign="middle">上传头像：</td>
									<td align="middle" valign="middle"><input type="file" name="src" id="upfile" size="40"/></td>
									<td align="left" valign="middle">支持JPG、JPEG、GIF和PNG文件，最大2M。</td>
								</tr>
								<tr height="69px">
									<td  valign="middle" colspan="3" id="rig_sub"><input id="ssubmit" type="submit" value=""/></td>
								</tr>
							</table>
							
						</div>
					</form>
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
	<div id="ii_body">
		<div id="upload_banner">
			<div id="upload_top">创建新相册</div>
			<div id="upload_bannerr">
				<div id="upload_size">相册名称:</div>
				<input type="text" id="upload_text"/>
			</div>
			<div id="upload_btn_banner">
				<input type="button" id="btn_b_save" value="保存"/>
				<input type="button" id="btn_b_res" value="取消"/>
			</div>
		</div>
	</div>
</div>
</body>
<script>
	$(function(){
		$('#ssubmit').click(function(){
			if($('#name_photo').val() == ''){
				alert("请输入图片名称！");
				return false;
			}else if($("#upfile").val()!=''){
				var upfile1 = $("#upfile").val();
				var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
					alert("上传图片类型错误");
					return false;
				}
			}else if($("#upload_select_id").val()==''){
				alert("请选择相册");
				return false;
			}else{
				alert("请上传一个图片!");
				return false;
			}
		});
	});
</script>
</html>
