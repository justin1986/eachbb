$(function(){
	$('#friend_btn').click(function(){
		var nike_name = $('#nike_name').val();
		var email = $('#email').val();
		var address = $('#address').val();
		if(!nike_name && !email && !address)
		{
			alert("请输入查询条件！");
		}else{
			$.get('_query_friend_ajax_post.php',{"nike_name":nike_name,"email":email,"address":address},function(data){
				$('#friend_value').html(data);
				$.fn.colorbox.resize();
			});
		}
	});
});
		
