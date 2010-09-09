$(function(){
			$('#friend_btn').click(function(){
				var nike_name = $('#nike_name').val().trim();
				var email = $('#email').val().trim();
				var address = $('#address').val().trim();
				if(!nike_name && !email && !address)
				{
					alert("请输入查询条件！");
				}else{
					$.post('_query_friend_ajax_post.php',{"nike_name":nike_name,"email":email,"address":address},function(data){
						$('#friend_value').html(data);
					});
				}
			});
});
		
