<?php
	function str_news_fck($str)
	{
		$str=str_replace('\"','"',$str);
		$str=str_replace('"font-size','"mso-bidi-font-size',$str);
		$str=str_replace('FONT-SIZE','mso-bidi-font-size',$str);
		return $str;
	}
	//获取FCK字符串内容
	function get__news_fck_content($str,$symbol='fck_pageindex')
	{
		$start = strpos($str, '<div style="page-break-after');
		if($start===false){
			return $str;
		}
		$end = strpos($str,"</div>",$start);
		$length = $end-$start+6;
		$page_flag = substr($str, $start, $length);
		$contents = explode($page_flag,$str);
		$record_count_token = $symbol . "_record_count";	
		$pagecounttoken = $symbol . "_count";
		global $$pagecounttoken;
		global $$record_count_token;
		$$record_count_token = count($contents);
		$$pagecounttoken = $$record_count_token;
		$index = isset($_REQUEST[$symbol]) ? $_REQUEST[$symbol] : 1;
		return strfck($contents[$index-1]);
	}
	function print_news_fck_pages2($str,$url="",$symbol='fck_pageindex'){
		global $page_type;
		if($page_type=='static'){
			print_news_static_page($str, $symbol);
			return;
		}else if($page_type=='static1'){
			print_news_static_page($str, $symbol,'static1');
			return;
		}
		$start = strpos($str, '<div style="page-break-after');
		if($start===false){
			return;
		}
		if(empty($url))$url = 'article.php?id='.$_REQUEST['id'];
		$str = $symbol."_count";
		global $$str;
		$count = $$str;
		if(empty($_REQUEST[$symbol])||$_REQUEST[$symbol]==1){
			$prev = '<span class="paginate_botton">上页</span>';
		}else{
			$prev = '<span class="paginate_botton"><a href="'.$url.'&'.$symbol.'='.($_REQUEST[$symbol]-1).'">上页</a></span>';
		}
		for($i=0;$i<$count;$i++){
			if(empty($_REQUEST[$symbol])){
				$page .= '<span class="page_span';
				if($i==0)$page.='2';
				$page.='"><a href="'.$url.'&'.$symbol.'='.($i+1).'">'.($i+1).'</a></span>';
			}else{
				$page .= '<span class="page_span';
				if($_REQUEST[$symbol]==($i+1)	)$page.='2';
				$page .= '"><a href="'.$url.'&'.$symbol.'='.($i+1).'">'.($i+1).'</a></span>';
			}
		}
		if($_REQUEST[$symbol]==$count){
			$next = '<span class="paginate_botton">下页</span>';
		}else{
			$next = '<span class="paginate_botton"><a href="'.$url.'&'.$symbol.'=';
			if(empty($_REQUEST[$symbol])){
				$next .=2;
			}else{
				$next .=($_REQUEST[$symbol]+1);
			}
			$next .='">下页</a></span>';
		}
		if($count==1){
		}else{
			echo $prev.$page.$next;
		}
	}
?>