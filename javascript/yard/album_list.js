$(function(){
		$('#post_photo').click(function(){
				window.location.href='/yard/upload_photo.php';
			});
		$('#btn_b_res').click(function(){
			$('#ii_body').css("display","none");
		});
		$('#btn_b_save').click(function(){
			var photo_b=$('#upload_title').val();
			var upload_description=$('#upload_description').val();
			if(photo_b.length == 0){
				alert('请输入相册的名称！');
				return false;
			}else if(photo_b.length >= 50){
				alert('相册的名称必须小于50字！');
				return false;
			}else if(upload_description.length == 0){
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
		$('#btn_b_res').live("click",function(){
			//window.back();
			window.location.href="/yard/album_list.php";
		});
		$(function(){
			$('#add_album').click(function(){
				$('#ii_body').css("display","inline");
				});
			});
		$(function(){
			$('.al_num img').hover(function(){
				if($(this).attr('src') == '/images/yard/delete.jpg')
					$(this).attr('src','/images/yard/delete1.jpg');
				else
					$(this).attr('src','/images/yard/delete.jpg');
				
			});
			$('.al_num img').click(function(){
				if(confirm("是否要删除该相册？")){
					var selected = $('.al_num img').index($(this));
					var id = $('#number_'+selected).val();
					$.post('album_list.del.php',{'id':id},function(data){
						alert(data);
						window.location.href="/yard/album_list.php";
					});
				}
			});
		});
});
