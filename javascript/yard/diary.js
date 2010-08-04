$(function(){
	$('#diary_content img').click(function(){
		
		var value=$('#diary_content select option:selected').val().trim();
		if(value === 0){
			alert("请现在日志");
		}
		alert(value);
		if(selected === 1){
			var sel=$('.def img').attr('src');
			if($('.def img').attr('src') != ""){
				$.getScript('/yard/_yard_info_ajax_post.php?photo=' + sel,function(result){
					$("#pic_left").attr('src',result);
				});
			}else{
				alert('请选择一张图片！');
			}
		}
	});
});
