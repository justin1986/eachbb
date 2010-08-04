$(function(){
	$('#diary_content img').click(function(){
		
		var value=$('#diary_content select option:selected').val().trim();
		
			$.post('_diary_ajax_select.php',{"type":"insert"},function(data){
				$('#diary_content').html(data);
			});
	});
	
	$('#category_button').live('click',function(){
		alert($('#category_name').val());
		
	});
//		if(selected === 1){
//			var sel=$('.def img').attr('src');
//			if($('.def img').attr('src') != ""){
//				$.getScript('/yard/_yard_info_ajax_post.php?photo=' + sel,function(result){
//					$("#pic_left").attr('src',result);
//				});
//			}else{
//				alert('请选择一张图片！');
//			}
//		}

});
