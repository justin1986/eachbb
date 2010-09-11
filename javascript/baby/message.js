$(function(){
	$('.message_btn').click(function(){
	 var result=$('.message_banner textarea').val().trim();
	 var id=$('#message_id').val();
	 if(!result){
	 alert('请输入留言内容');
	 }else{
		$.post('_message_post_ajax.php',{"id":id,"result":result},function(data){
			alert(data);
			window.location.href = "message_index.php?id="+id;
		});
	 }
	});
	$('#road_message').live('click',function(){
			window.location.href = "message_index.php";
	});
	$('#r_dele').click(function(){
			$.post('_message_del_ajax_post.php',function(data){
			$('#haha').html(data);
			});
	});
	$('#r_dele').live('click',function(){
			$.post('_message_del_ajax_post.php',function(data){
			$('#haha').html(data);
			});
	});
	$('.banner_del').live('click',function(){
		var selected=$('.banner_del').index($(this));
		var result=$('#banner_del_'+selected).val();
		if(confirm("确定要删除吗？如果删除将无法查看！")){
			$.post('_message_delete_post.php',{"result_id":result},function(data){
				alert(data);
				$.post('_message_del_ajax_post.php',function(data){
					$('#haha').html(data);
					});
			});
		}
	});
	$('.banner_dell').click(function(){
		var selected=$('.banner_dell').index($(this));
		var result=$('#banner_'+selected).val();
		if(confirm("确定要删除吗？")){
			$.post('_message_delete.php',{"id":result},function(data){
				alert(data);
				$.post('_message_del_ajax_post.php',function(data){
					$('#haha').html(data);
					});
			});
		}
	});
	$('.banner_dell').live('click',function(){
		var selected=$('.banner_dell').index($(this));
		var result=$('#banner_'+selected).val();
		if(confirm("确定要删除吗？")){
			$.post('message_delete.php',{"id":result},function(data){
				alert(data);
				$.post('_message_load_ajax_post.php',function(data){
					$('#haha').html(data);
					});
			});
		}
	});
	$('#ri_message').live('click',function(){
		$.post('_message_load_ajax_post.php',function(data){
			$('#haha').html(data);
			});
	});
	$('#r_load').click(function(){
		$.post('_message_load_ajax_post.php',function(data){
			$('#haha').html(data);
			});
	});
});
