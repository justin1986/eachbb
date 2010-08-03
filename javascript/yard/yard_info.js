$(function(){
	$('.pichr_menu').click(function(){
		var selected=$('.pichr_menu').index($(this));
		if(selected == 0){
			if($("#file_name").val()!=''){
				var upfile1 = $("#file_name").val();
				var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){
					alert("上传图片类型错误");
					return false;
				}
			}else if($("#file_name").val()==''){
				alert("请上传一个图片!");
				return false;
			}else{
				
			}
		}else{
			
		}
	});
});
