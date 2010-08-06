$(function(){
			$('#push').click(function(){
				var b_words=$('#b_words').val();
				if(b_words.length == '0'){
							alert("留言不能为空！");
				}else{
							$('#b_bord').submit();
				}
				});
			});