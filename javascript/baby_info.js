$(function(){
	//show_day();
	//show_baby_day();
	baby_status();
	$("#submit").click(function(){
		$.post('/baby/info.post.php',$("form").serializeArray(),function(data){
			if(data!=''){
				alert(data);
			}else{
				alert('保存成功！');
				$.post('info.php',function(data){
					$('#haha').html(data);
				});
			}
		});
		return false;
	});
	
	$("[name=province]").change(function(){
		show_city();
	});
	
	$("[name=month]").change(function(){
		show_day();
	});
	$("[name=year]").change(function(){
		show_day();
	});
	$("[name=bb_month]").change(function(){
		show_baby_day();
	});
	$("[name=bb_year]").change(function(){
		show_baby_day();
	});
	$("[name=nowstate]").change(function(){
		baby_status();
	});
});

function show_day(day){
	$.post('/yard/show_day.php',{'month':$("[name=month]").val(),'year':$("[name=year]").val()},function(data){
		$("[name=day]").html(data);
		if(day!=''){
			$("[name=day]").val(day);
		}
	});
}

function show_baby_day(day){
	$.post('/yard/show_day.php',{'month':$("[name=bb_month]").val(),'year':$("[name=bb_year]").val()},function(data){
		$("[name=bb_day]").html(data);
		if(day!=''){
			$("[name=bb_day]").val(day);
		}
	});
}

function show_city(city){
	$.post('/yard/show_city.php',{'province':$('[name=province]').val()},function(data){
		$("[name=city]").html(data);
		if(city!=''){
			$("[name=city]").val(city);
		}
	});
}

function baby_status(){
	if($("[name=nowstate]:checked").val()==1){
		$(".bbs").show();
	}else{
		$(".bbs").hide();
	}
}
