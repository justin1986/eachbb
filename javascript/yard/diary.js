$(function(){
	$.post('_diary_select_ajax_post.php',function(data){
		$('#diary_content').html(data);
	});
	$('#sub').click(function(){
		var title=$('#diary_title').val().trim();
		var editor = CKEDITOR.instances['news[content]'] ;
		var content = editor.getData();
		var created_id = $('#diary_content select option:selected').val().trim();
		if(title == ""){
			alert("请输入日志标题！");
		}else if(created_id == 0){
			alert("请选择分类！");
		}else{
			$('#sub').attr('disabled',"disabled")
			$.post('_diary_sub_ajax_post.php',{"title":title,"content":content,"created_id":created_id},function(data){
				alert(data);
			});
		}
	});
	$('#category_button').live('click',function(){
		var value = $('#category_name').val().trim();
		if(value != ""){
			$.post('_diary_ajax_post.php',{"type":$('#category_name').val()},function(data){
				alert(data);
				$.post('_diary_select_ajax_post.php',function(data){
					$('#diary_content').html(data);
				});
			});
		}else{
			alert("操作有误！");
		}
	});
	$('#diary_content img').live('click',function(){
		var value = $('#diary_content select option:selected').val().trim();
		
			$.post('_diary_ajax_select.php',{"type":"insert"},function(data){
				$('#diary_content').html(data);
			});
	});
});
