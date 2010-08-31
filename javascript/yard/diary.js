$(function(){
	var category_id=$('#category_id').val();
	$.post('_diary_select_ajax_post.php',{"category_id":category_id},function(data){
		$('#diary_content').html(data);
	});
	$('#sub').click(function(){
		var title=$('#diary_title').val();
		var editor = CKEDITOR.instances['news[content]'] ;
		var content = editor.getData();
		var created_id = $('#category_idd option:selected').val();
		if(title == ""){
			alert("请输入日志标题！");
		}else if(title.length >= 256){
			alert("输入的标题不能大于250字！");
		}else if(created_id == 0){
			alert("请选择分类！");
		}else{
			$('#sub').attr('disabled',true);
			var edit_id = $('#edit_id').val();
			$.post('_diary_sub_ajax_post.php',{"title":title,"edit_id":edit_id,"content":content,"created_id":created_id},function(data){
				$('#sub').attr('disabled',false);
				alert(data);
				window.location.href='/yard/diary_list.php';
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
