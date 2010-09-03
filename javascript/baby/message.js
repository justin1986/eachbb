$(function(){
	$('.message_btn').click(function(){
	 var result=$('.message_banner textarea').val().trim();
	 var id=$('#message_id').val();
	 if(!result){
	 alert('请输入留言内容');
	 }
	$.post('_message_post_ajax.php',{"id":id,"result":result},function(data){
		alert(data);
		window.location.href = "message_index.php?id="+id;
	});
	},function(){});
});
