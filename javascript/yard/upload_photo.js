$(function(){
	$('#btn_b_res').click(function(){
		$('#ii_body').css("display","none");
	});
	$('#photo_book').click(function(){
		$('#ii_body').css("display","inline");
	});
	$('#btn_b_save').click(function(){
		var photo_b=$('#upload_text').val().trim();
		if(photo_b.length <= 0){
			alert('请输入相册的名称！');
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
