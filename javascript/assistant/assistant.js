var count=0;
var total=5;
var second=2000;
$(function(){
	$("#fr_tpimg1").show();
	var interval =setInterval('xh()',second);
	$.post('/assistant/get_comments.ajax.php?id=' + $('#newsid').val(),function(news){
		$("#res").html(news);
	});
	$('.a_comment_up').live('click',function(e){
		
		e.preventDefault();
		var comment_id = $(this).attr('href');
		comment_id = comment_id.substring(comment_id.lastIndexOf('/')+1,comment_id.length);
		var $this = $(this);
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"up"},function(comment){
			$this.attr('class','a_clicked');
			$this.find('.span_up_num').html(comment);
		});
	});
	$('.a_comment_down').live('click',function(e){
		e.preventDefault();
		var comment_id = $(this).attr('href');
		comment_id=comment_id.substring(comment_id.lastIndexOf('/')+1,comment_id.length);
		var down_num = $(this).find('.span_down_num').html();
		var $this = $(this);
		$.post('/news/ajax.post.php',{"id":comment_id,"type":"down","num":down_num},function(comment){
			$this.attr('class','a_clicked');
			$this.find('.span_down_num').html(comment);
		});
	});
	$('.ttc_a').hover(function(e){
	e.preventDefault();
	var selected = $('.ttc_a').index($(this));
	for(var i = 0; i < 5; i++){
		if(i == selected){
			continue;
		}
		$('.ttc_a').attr('style','background:#A9D780;');
	}
	$(this).attr('style','background:#95D171');
	},function(){});
	
	$(".num").click(function(){
		var num=$(this).html();
		$(".fr_tpimg").hide();
		$("#fr_tpimg"+num).show();
		$(".num").removeClass("selected");
		$(this).addClass("selected");
		clearInterval(interval);
		count=num;
		interval =setInterval('xh()',second);
	});
});

function xh()
{	
	count++;
	if(count>total){
		count=1;
	}
	imgtab(count);	
}

function imgtab(num)
{
	$(".fr_tpimg").hide();
	$("#fr_tpimg"+num).show();
	$(".num").removeClass("selected");
	$("#num"+num).addClass("selected");
}