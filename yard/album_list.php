<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>小院子</title>
	<?php 
		include_once('../frame.php');
		use_jquery();
		css_include_tag('yard','album_list');
		js_include_tag('yard/album_list','yard/yard');
		$user = User::current_user();
		$db = get_db();
		$id =$_GET['id'];
		$id =intval($id);
		if($info = $db->query("select * from eachbb_member.member where id=$id")){
		}else{
			alert('非法操作！');
			redirect("/");
		}
	?>
</head>
<body>
<div id="ii_body">
		<div id="upload_banner">
			<div id="upload_box">
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
		</div>
	</div>
	<script>
	$(function(){
		$('#btn_b_res').click(function(){
			$('#ii_body').css("display","none");
		});
		$('#btn_b_save').click(function(){
			var photo_b=$('#upload_title').val();
			var upload_description=$('#upload_description').val();
			var photo_b=$('#upload_text').val();
			if(photo_b.length == 0){
				alert('请输入相册的名称！');
				return false;
			}else if(photo_b.length >= 50){
				alert('相册的名称必须小于50字！');
				return false;
			}else if(upload_description.length = 0){
				alert('请输入相册的描述！');
				return false;
			}else if($("#ulee").val() == ''){
				alert("请上传相册的封面！");
				return false;
			}else if($("#ulee").val() != ''){
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
	});
	</script>
<div id="ibody">
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
		<div id="myalbum">
			<div id="log_t">
				<img src="/images/yard/log_t.jpg" />
			</div>
			<?php $member=$db->query("select name from `eachbb_member`.member where id = '$id'");?>
			<div id="al_p1">
			<div id="whosealbum">
			<a href="/yard/home.php?id=<?php echo $id;?>" style="font-weight:bold; color:#416298;"><?php echo $member[0]->name;?></a>的相册
			</div>
			<div id = "p1_buttonbox" style="<?php if($user->id != $id){echo 'display:none;';}?>">
						<div class="p1_but">
							<div class="but_nl"></div>
							<div class="but_name" id="post_photo">上传照片</div>
							<div class="but_nr"></div>
						</div>
						<div class="p1_but" id="add_album">
							<div class="but_nl"></div>
							<div class="but_name">新建相册</div>
							<div class="but_nr"></div>
						</div>
					</div>
			</div>
			<script>
			$(function(){
				$('#add_album').click(function(){
					$('#ii_body').css("display","inline");
					});
				});
			</script>
	  <?php $master=$db->query("select id,name,front_cover,description from `eachbb_member`.album where u_id = '$id'");
			$num = $db->record_count;
		?>
			<div id="al_p2">
				<div id="al_test"></div>
			<?php if($num == 0){ ?>
				<div class="album">
				<div class="al_box">
					<div class="al_name"><a href="/">网趣宝贝</a></div>
						<div class="al_face">
							<img src="/images/yard/noface.jpg" border=0 />
						</div>
				<div class="al_words">真遗憾！这里没有任何照片可供查阅。</div>
				<div class="al_num">0张</div>
				</div>
			<?php }?>
			<?php for($i=0;$i<$num;$i++){?>
				<div class="album">
					<div class="al_box">
						<div class="al_name"><a href="#"><?php echo $master[$i]->name;?></a></div>
						<div class="al_face">
							<a href="#"><img src="
							<?php 
								if($master[$i]->front_cover != null){
									echo $master[$i]->front_cover;
								}else{
									echo '/images/yard/noface.jpg';
								}
							?>
							" border=0/></a>
						</div>
						<div class="al_words"><?php echo $master[$i]->description;?></div>
				<?php 	
						$master_id= $master[$i]->id;
						$db->query("select id from `eachbb_member`.photo where album_id = '$master_id'");
						$n = $db->record_count;
				?>
						<div class="al_num"><?php echo $n;?>张</div>
					</div>
				</div>
			<?php }?>
			</div>
			<div id="cc_bottom">
				<div id="copyright">版权</div>
			</div>
		</div>
	</div>
	</div>
	</body>
	</html>