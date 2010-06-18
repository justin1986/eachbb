parent.$("#admin_iframe").attr("height","1300px");

$(function(){
	
	$("#a_select_all").click(function(e){
		e.preventDefault();
		if($(this).data('selected')){
			$('input.checkbox_select_all').attr('checked',false);
			$(this).data('selected',false);
		}else{
			$('input.checkbox_select_all').attr('checked',true);
			$(this).data('selected',true);
		}
	});
	
	$(function(){
		$('#btn_delete2').click(function(e){
			e.preventDefault();
			var selected = $('input.checkbox_select_all:checked');
			if(selected.length <= 0){
				alert('请选择您要删除的项');
				return;
			}
			var ids = new Array();
			selected.each(function(){
				ids.push($(this).val());
			});
			if(!confirm('您确定要删除选择项吗?删除后将无法恢复!')){
				return;
			}
			var tbname = $('#db_table').val();
			$.post("/pub/pub.post.php",{'post_type':'del_all','ids':ids.join(','),'tbname':tbname},function(data){
				window.location.reload();
			});
		});
		$('#btn_delete3').click(function(e){
			e.preventDefault();
			if(!confirm('您确定要删除所有项吗?删除后将无法恢复!')){
				return;
			}
			var tbname = $('#db_table').val();
			$.post("/pub/pub.post.php",{'post_type':'del_total','tbname':tbname},function(data){
				window.location.reload();
			});
		});	
	});
	$(".tr3").mouseover(function(e){
		 $(".tr3").css("background","#ffffff");
		 $(this).css("background","#f9f9f9");
	});	

	$(".tr3").mouseout(function(e){
		 $(".tr3").css("background","#ffffff");
	});		


	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else
		{
			if($("#relation").val()!=undefined){
				$.post("/pub/pub.post.php",{'del_id':$(this).attr('name'),'db_table':$('#db_table').attr('value'),'post_type':'del','rela':$("#ratetion").val()},function(data){
					$("#"+data).remove();
				});
			}else{
				$.post("/pub/pub.post.php",{'del_id':$(this).attr('name'),'db_table':$('#db_table').attr('value'),'post_type':'del'},function(data){
					$("#"+data).remove();
				});
			}
			
		}
	});
	
	$(".del_new").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else
		{
			$.post("/pub/pub.post.php",{'del_id':$(this).attr('name'),'db_table':$('#db_table').attr('value'),'post_type':'del_new'},function(data){
			});
			$(this).parent().parent().remove();
		}
	});
	
	$(".revocation").click(function(){
		$.post("/pub/pub.post.php",{id:$(this).attr('name'),'db_table':$('#db_table').attr('value'),'post_type':"revocation",'is_dept_list':$('#is_dept_list').attr('value')},function(data){
			window.location.reload();
		});
	});
	
	$(".publish").click(function(){
		$.post("/pub/pub.post.php",{id:$(this).attr('name'),'db_table':$('#db_table').attr('value'),'post_type':"publish",'is_dept_list':$('#is_dept_list').attr('value')},function(data){
			window.location.reload();
		});
	});
	$(".set_down").click(function(){
		$.post("/pub/pub.post.php",{id:$(this).attr('name'),'db_table':$('#db_table').attr('value'),'post_type':"set_down",'is_dept_list':$('#is_dept_list').attr('value')},function(data){
			window.location.reload();
		});
	});
	
	$(".set_up").click(function(){
		$.post("/pub/pub.post.php",{id:$(this).attr('name'),'db_table':$('#db_table').attr('value'),'post_type':"set_up",'is_dept_list':$('#is_dept_list').attr('value')},function(data){
			window.location.reload();
		});
	});
	

	
	
	$("#edit_priority").click(function(){
		if(!window.confirm("编辑优先级")){return false;}
		var id_str="";
		var priority_str="";
		
		$(".priority").each(function(){
			id_str=id_str+$(this).attr("name")+"|";
			priority_str=priority_str+$(this).attr("value")+"|";
		});
		$.post("/pub/pub.post.php",{'id_str':id_str,'priority_str':priority_str,'db_table':$('#db_table').attr('value'),'post_type':'edit_priority','is_dept_list':$('#is_dept_list').attr('value')},function(data){
			window.location.reload();
		});		
		
	});
	
	
	$("#clear_priority").click(function(){
		if(!window.confirm("清空优先级")){return false;}
		$(".priority").attr("value","");
		var id_str="";
		var priority_str="";
		$(".priority").each(function(){
			id_str=id_str+$(this).attr("name")+"|";
			priority_str=priority_str+$(this).attr("value")+"|";
		});
		$.post("/pub/pub.post.php",{'id_str':id_str,'priority_str':priority_str,'db_table':$('#db_table').attr('value'),'post_type':'edit_priority','is_dept_list':$('#is_dept_list').attr('value')},function(data){
			window.location.reload();
		});		
		
	});
	
	$(".return").click(function(){
		if(!window.confirm("确定要退回吗"))
		{
			return false;
		}
		else
		{
			$.post("/admin/pub/pub.post.php",{'return_id':$(this).attr('name'),'db_table':$('#db_talbe').attr('value'),'post_type':'return'},function(data){					
				$("#"+data).remove();
			});
		}
	});

})
