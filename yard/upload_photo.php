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
	<form  enctype="multipart/form-data" action="/yard/upload_photo_image.post.php" method="post">
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
						<div>上传头片</div>
					</div>
						<div id="pic_log">
							<table width="754" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td width="13%" height="49" align="right" valign="middle">&nbsp;</td>
									<td width="50%" align="right" valign="middle">&nbsp;</td>
									<td width="37%" align="left" valign="middle">&nbsp;</td>
								</tr>
								<tr>
									<td height="46" align="right" valign="middle">图片名称：</td>
									<td align="middle" valign="middle"><input type="text" id="name_photo" name="name_photo" size="40"/></td>
									<td align="left" valign="middle"></td>
								</tr>
								<tr>
									<td height="46" align="right" valign="middle">上传到相册：</td>
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
									<td height="46" align="right" valign="middle">上传头片：</td>
									<td align="middle" valign="middle"><input type="file" name="src" id="upfile" size="40"/></td>
									<td align="left" valign="middle">支持JPG、JPEG、GIF和PNG文件，最大2M。</td>
								</tr>
								<tr>
									<td height="66" align="right" valign="middle">图片描述：</td>
									<td align="middle" valign="middle"  colspan="2"><textarea id="text_photo" name="text_photo"></textarea></td>
								</tr>
								<tr height="69px">
									<td  valign="middle" colspan="3" id="rig_sub"><input id="ssubmit" type="submit" value=""/></td>
								</tr>
							</table>
							
						</div>
				
				</div>
			</div>
			<div id="cc_b"></div>
		</div>
		<?php include_once(dirname(__FILE__).'/../inc/bottom.php');?>
	</div>
	<div id="ii_body">
		<div id="upload_banner">
				<div id="upload_top">创建新相册</div>
				<div class="upload_bannerr">
					<div class="upload_size">相册名称:</div>
					<input type="text" name="upload_title" id="upload_title"/>
				</div>
				<div class="upload_bannerr" style="height: 36px;">
					<div class="upload_size">相册描述:</div>
					<textarea id="upload_description" name="upload_description"></textarea>
				</div>
				<div class="upload_bannerr">
					<div class="upload_size">相册封面:</div>
					<input type="file" name="src2" id="ulee" size="40"/>
				</div>
				<div id="upload_btn_banner"  style="margin-top:30px;">
					<input type="submit" id="btn_b_save" value="保存" />
					<input type="button" id="btn_b_res" value="取消"/>
				</div>
				
		</div>
	</div></form>
</div>
</body>
<script>
	$(function(){
		$('#btn_b_res').click(function(){
			$('#ii_body').css("display","none");
		});
		$('#photo_book').click(function(){
			$('#ii_body').css("display","inline");
		});
		$('#btn_b_save').click(function(){
			var photo_b=$('#upload_title').val().trim();
			var upload_description=$('#upload_description').val().trim();
			var photo_b=$('#upload_text').val().trim();
			if(photo_b.length <= 0){
				alert('请输入相册的名称！');
				return false;
			}else if(upload_description.length <= 0){
				alert('请输入相册的描述！');
				return false;
			}else if($("#ulee").val()==''){
				alert("请上传相册的封面！");
				return false;
			}else if($("#ulee").val()!=''){
				var upfile1 = $("#ulee").val();
				var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
					alert("上传图片类型错误");
					return false;
				}
			}else{
				$('#btn_b_save').attr("disabled",true);
				$.post('_upload_photo_ajax_post.php',{"photo":photo_b},function(data){
					alert("添加成功！");
					$('#btn_b_save').attr("disabled",false);
					$('#ii_body').css("display","none");
					window.location.href="/yard/upload_photo.php";
				});
			}
		});
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
			}else if($("#text_photo").val() == ''){
				alert("请输入评论内容！");
				return false;
			}else{
				alert("请上传一个图片!");
				return false;
			}
		});
	});
</script>
</html>
