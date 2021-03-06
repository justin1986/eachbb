<?php
/*
 * public function
 */
if (!function_exists('linux_path')){
	function linux_path($path){
		return str_replace("\\","/",$path);
	} 
}

define("LIB_PATH", linux_path(dirname(__FILE__)) .'/');

function debug_info($msg,$type='php') {
	if(get_config('debug_tag') === false){
		return;
	};
	if($type == 'php'){
		echo '<font style="color:red;">' .$msg .'</font>';
	}else
	{
		alert($msg);
	}
}
/*
function send_mail($smtp_server,$smtp_user,$smtp_pwd,$from,$to,$title,$content){
	$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
				<HTML><HEAD>
				<META content="text/html; charset=utf-8" http-equiv=Content-Type>
				<META name=GENERATOR content="MSHTML 8.00.6001.18854"><LINK rel=stylesheet 
				href="BLOCKQUOTE{margin-Top: 0px; margin-Bottom: 0px; margin-Left: 2em}"></HEAD>
				<BODY style="MARGIN: 10px; FONT-FAMILY: verdana; FONT-SIZE: 10pt">';
	$body = $body.addslashes($content);;
	$body = $body.'</BODY></HTML>';
	$email = new table_class('eachbb_email.eb_email');
	$email->email_to = $to;
	$email->email_status  = '0';
	$email->email_subject = "=?UTF-8?B?".base64_encode($title)."?=";
	$email->email_content = $body;
	$email->save();
}
*/
function send_mail($smtp_server,$smtp_user,$smtp_pwd,$from,$to,$title,$content){
		$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
				<HTML><HEAD>
				<META content="text/html; charset=utf-8" http-equiv=Content-Type>
				<META name=GENERATOR content="MSHTML 8.00.6001.18854"><LINK rel=stylesheet 
				href="BLOCKQUOTE{margin-Top: 0px; margin-Bottom: 0px; margin-Left: 2em}"></HEAD>
				<BODY style="MARGIN: 10px; FONT-FAMILY: verdana; FONT-SIZE: 10pt">';
		$body = $body.$content;
		$body = $body.'</BODY></HTML>';
		$subject = "=?UTF-8?B?".base64_encode($title)."?=";
		$loc_host = "mail.server"; //发信计算机名，可随意  
		$smtp_acc = $smtp_user; //Smtp认证的用户名  
		$smtp_pass=$smtp_pwd; //Smtp认证的密码，一般等同pop3密码  
		$smtp_host=$smtp_server; //SMTP服务器地址，类似 smtp.tom.com  
		$from=$from; //发信人Email地址，你的发信信箱地址  
		$deliver=$from; //回复到指定邮箱  
		$headers = "Content-Type: text/html; charset=\"utf-8\"\r\nContent-Transfer-Encoding: base64";  
		$lb="\r\n"; //linebreak   
		$hdr = explode($lb,$headers); //解析后的hdr  
		if($body) {$bdy = preg_replace("/^\./","..",explode($lb,$body));}//解析后的Body  
		$smtp = array(  
		//1、EHLO，期待返回220或者250  
		array("EHLO ".$loc_host.$lb,"220,250","HELO error: "),  
		//2、发送Auth Login，期待返回334  
		array("AUTH LOGIN".$lb,"334","AUTH error:"),  
		//3、发送经过Base64编码的用户名，期待返回334  
		array(base64_encode($smtp_acc).$lb,"334","AUTHENTIFICATION error : "),  
		//4、发送经过Base64编码的密码，期待返回235  
		array(base64_encode($smtp_pass).$lb,"235","AUTHENTIFICATION error : "));  
		//5、发送Mail From，期待返回250  
		$smtp[] = array("MAIL FROM: <".$from.">".$lb,"250","MAIL FROM error: ");  
		//6、发送Rcpt To。期待返回250  
		$smtp[] = array("RCPT TO: <".$to.">".$lb,"250","RCPT TO error: ");  
		//7、发送DATA，期待返回354  
		$smtp[] = array("DATA".$lb,"354","DATA error: ");  
		//8.0、发送From  
		$smtp[] = array("From: =?UTF-8?B?572R6Laj5a6d6LSd?= <".$deliver.">".$lb,"","");  
		//8.2、发送To  
		$smtp[] = array("To: ".$to.$lb,"","");  
		//8.1、发送标题  
		$smtp[] = array("Subject: ".$subject.$lb,"","");  
		//8.3、发送其他Header内容  
		foreach($hdr as $h) {$smtp[] = array($h.$lb,"","");}  
		//8.4、发送一个空行，结束Header发送  
		$smtp[] = array($lb,"","");  
		//8.5、发送信件主体  
		if($bdy) {foreach($bdy as $b) {$smtp[] = array(base64_encode($b.$lb).$lb,"","");}}  
		//9、发送“.”表示信件结束，期待返回250  
		$smtp[] = array(".".$lb,"250","DATA(end)error: ");  
		//10、发送Quit，退出，期待返回221  
		$smtp[] = array("QUIT".$lb,"221","QUIT error: ");  
		 
		//打开smtp服务器端口  
		$fp = @fsockopen($smtp_host, 25);
		if (!$fp) echo "<b>Error:</b> Cannot conect to ".$smtp_host."<br>";  
		while($result = @fgets($fp, 1024)){if(substr($result,3,1) == " ") { break; }}  
		 
		$result_str="";  
		//发送smtp数组中的命令/数据  
		foreach($smtp as $req){  
			//发送信息
			@fputs($fp, $req[0]);  
			//如果需要接收服务器返回信息，则  
			if($req[1]){  
				//接收信息  
				while($result = @fgets($fp, 1024)){  
					if(substr($result,3,1) == " ") { break; }  
				};  
				if (!strstr($req[1],substr($result,0,3))){  
					$result_str.=$req[2].$result."<br>";  
				}  
			}  
		}  
		//关闭连接  
		@fclose($fp); 
		return true;
}


function display_error($msg) {
	echo '<font style="color:red;">' .$msg .'</font>';;
}


function dir_files($path){
	function DateCmp($a, $b)
	{
	  return ($a[1] < $b[1]) ? -1: 1;
	}
	$dir = opendir(ROOT_DIR .$path);
	if(substr($path,-1)!='/') $path .= '/';
	if($dir === false) return false;
	$result = array();
	while (($file = readdir($dir)) !== false)
	{
		if ($file == '.' || $file == '..') continue;
		$LastModified = filectime(ROOT_DIR.$path . $file);
    	$Files[] = array($file, $LastModified);
	}
	closedir($dir);
	usort($Files, 'DateCmp');
	foreach ($Files as $file) {
		$result[] = $file[0];
	}
	return $result;
}
	
define("ROOT_PATH", "/");
function redirect($url, $type='js')
{
  if($type == 'js'){
	 echo "<script LANGUAGE=\"Javascript\">"; 
	 echo "location.href='$url';"; 
	 echo "</script>"; 		
  }elseif($type== 'header'){
  	header("Location: " . $url); 
  }
  
}

function get_current_url()
{
	return  "http://" .$_SERVER[HTTP_HOST] .$_SERVER[REQUEST_URI];
}

function get_microtime(){ 
   list($usec, $sec) = explode(" ",microtime()); 
   return ((float)$usec + (float)$sec); 
} 

function now(){
	return date("Y-m-d H:i:s");
}

function alert($msg)
{
  $msg = str_replace("'", "\'", $msg);
  echo "<script LANGUAGE=\"Javascript\">"; 
  echo "alert('$msg');"; 
  echo "</script>"; 		
}

function rand_str($len=10){
  	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ";
  	$ret = "";
  	for($i=0;$i < $len; $i++){
  		$ret .= $str{mt_rand(0,61)};
  	}
  	return $ret;
  }

function is_ajax(){
	return strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=="xmlhttprequest";
}

function is_post(){
	return strtolower($_SERVER['REQUEST_METHOD'] ) == 'post';
}

function is_get(){
	return strtolower($_SERVER['REQUEST_METHOD'] ) == 'get';
}

function write_to_file($filename,$content,$mode='a'){
	$fp = fopen($filename, $mode);
	if(false === $fp) return false;
	$r = fwrite($fp,$content);
	fclose($fp);
	if(false === $r) return false;
	return true;
}

//work only with jquery frame work


function check_db($server_name,$user_name,$password,$db_type='mysql'){
	if($db_type == 'mysql'){
		$ret = @mysql_connect($server_name,$user_name,$password);			
	}else if($db_type == 'mssql'){
		$param = array('UID' => $user_name,'PWD' => $password);
		$ret = sqlsrv_connect($this->servername,$param);
	}
	if(is_resource($ret)){
		mysql_close($ret);
		return true;
	}else{
		return false;
	}	

}

function format_sql($sql){
	$tran = array("'" => "''");	
	return strtr($sql,$tran);
}

function show_video_player($width,$height,$image='',$file,$autostart = "false")
	{
		if (strtoupper(substr($file,-3)) == "MP3" || strtoupper(substr($file,-3)) == "WMV" || strtoupper(substr($file,-3)) == "WMA"  || strtoupper(substr($file,-3)) == "AVI" || strtoupper(substr($file,-3)) == "VYF")
		{
		?>
<OBJECT id=MediaPlayer1
	codeBase=http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701standby=Loading
	type=application/x-oleobject height=<?php echo $height;?>
	width=<?php echo $width;?>
	classid=CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6 VIEWASTEXT>
	<PARAM NAME="URL" VALUE="<?php echo $file;?>">
	<PARAM NAME="playCount" VALUE="1">
	<PARAM NAME="autoStart" VALUE="<? echo $autostart;?>">
	<PARAM NAME="invokeURLs" VALUE="false">
	<PARAM NAME="EnableContextMenu" VALUE="false">
	<embed src="<?php echo $file;?>" align="baseline" border="0"
		width="<?php echo $width;?>" height="<?php echo $height;?>"
		type="application/x-mplayer2" pluginspage="" name="MediaPlayer1"
		showcontrols="1" showpositioncontrols="0" showaudiocontrols="1"
		showtracker="1" showdisplay="0" showstatusbar="1" autosize="0"
		showgotobar="0" showcaptioning="0" autostart="<? echo $autostart;?>"
		autorewind="0" animationatstart="0" transparentatstart="0"
		allowscan="1" enablecontextmenu="1" clicktoplay="0"
		defaultframe="datawindow" invokeurls="0"></embed> </OBJECT>
<?php
			}else 
			{
			?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
	codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
	width="<?php echo $width;?>" height="<?php echo $height;?>"
	id="FLVPlayer">
	<param name="movie" value="/flash/mediaplayer.swf" />
	<param name="salign" value="lt" />
	<param name="quality" value="high" />
	<param name="wmode" value="opaque" />
	<param name="scale" value="noscale" />
	<param name="FlashVars"
		value="&image=<?php echo $image;?>&file=<?php echo $file;?>&displayheight=<?php echo $height-15;?>&autostart=<? echo $autostart;?>" />
	<embed src="/flash/mediaplayer.swf"
		flashvars="&image=<?php echo $image;?>&file=<?php echo $file;?>&displayheight=<?php echo $height - 15;?>&autostart=<? echo $autostart;?>"
		quality="high" scale="noscale" width="<?php echo $width;?>"
		height="<?php echo $height;?>" name="FLVPlayer" wmode="opaque"
		salign="LT" type="application/x-shockwave-flash"
		pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>
<?php
			}
	}
	
function strfck($str)
{
	$str=str_replace('\"','"',$str);
	$str=str_replace('"font-size','"mso-bidi-font-size',$str);
	$str=str_replace('FONT-SIZE','mso-bidi-font-size',$str);
	return $str;
}

//获取FCK字符串内容
function get_fck_content($str,$symbol='fck_pageindex')
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

function get_fck_page_count($content){
	return substr_count($content,'<div style="page-break-after') + 1;
}

function print_news_static_page($content,$symbol='fck_pageindex'){
	$page_count = get_fck_page_count($content);
	if ($page_count <= 1) return ;	
	$page_index = intval($_REQUEST[$symbol]);
	$page_index = $page_index >= 1 ? $page_index : 1;
	$page_prev = $page_index - 1;
	$page_next = $page_index + 1;
	if($_GET['page_type'] != 'static'){
		function static_url($index){
			$url = $_SERVER['PHP_SELF'];
			$pattern = '/(.+)\/page\/(\d+)/';
			if(preg_match($pattern,$url)){
				$url = preg_replace($pattern,'$1',$url);
			}
			return $url . "/page/{$index}";
		};
	}else{
		function static_url($index){
			global $news;
			return get_news_url($news,'static',$index);
		}
	}
	$page_str = "";
	if($page_prev <= 0){
		$page_str .= "<span class='paginate_botton'>上页</span>";
	}else{
		$url = static_url($page_prev);
		$page_str .= "<span class='paginate_botton'><a href='{$url}'>上页</a></span>";
	}
	for($i=1;$i<=$page_count;$i++){
		$url = static_url($i);
		$page_str .= "<span class='page_span";
		if($i == $page_index) $page_str .= "2";
		$page_str .= "'><a href='{$url}'>{$i}</a></span>";
	}
	
	if($page_next > $page_count){
		$page_str .= "<span class='paginate_botton'>下页</span>";
	}else{
		$url = static_url($page_next);
		$page_str .= "<span class='paginate_botton'><a href='{$url}'>下页</a></span>";
	}
	echo $page_str;
}

function print_fck_pages2($str,$url="",$symbol='fck_pageindex'){
	global $page_type;
	!$page_type && $_REQUEST['page_type'] && $page_type = $_REQUEST['page_type']; 
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
	if(empty($url))$url = 'news.php?id='.$_REQUEST['id'];
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
			if($_REQUEST[$symbol]==($i+1))$page.='2';
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

function print_fck_pages($str,$url="",$symbol='fck_pageindex'){
	paginate($url,null,$symbol);
};

function print_fck_pages1($str,$url="",$symbol='fck_pageindex')
{
	$ies = '<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span>';	
	$ffs = '<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>';
	$pagecount = substr_count($str,$ies);
	$pagecount = $pagecount <=0 ? substr_count($str,$ffs) : $pagecount;
	$pagecount++;
	$pageindex = isset($_REQUEST[$symbol]) ? $_REQUEST[$symbol] : 1;
	
	if ($pagecount <= 1) return;
	if ($url == "") {
		parse_str($_SERVER['QUERY_STRING'], $urlparams);
		$params = array();
		foreach ($urlparams as $k => $v) {
			if ($k == $symbol || $k == $pagecounttoken) {
				continue;				
			}
			$params[$k] = $v;
		}
		$url = $_SERVER['PHP_SELF'] ."?";
		foreach ($params as $k => $v) {
			$url .= "&" .$k . "=" . $v;
		}
	}	
	if (!strpos($url,'?'))
	{
		$url .= '?';
	}
	$symbol = "&" .$symbol ."=";
	$pagefirst = $url .$symbol ."1";
	$pagenext = $url .$symbol .($pageindex + 1);
	$pageprev = $url .$symbol .($pageindex-1);
	$pagelast = $url .$symbol .($pagecount);
	if ($pageindex == 1 || $pageindex ==null || $pageindex == "")
	{ ?>
<span><a href="<?php echo $pagenext; ?>">[下页]</a></span>
<span><a href="<?php echo $pagelast; ?>">[尾页]</a></span>
<?php	
	}
	if ($pageindex < $pagecount && $pageindex > 1 )
	{?>
<span><a href="<?php echo $pagefirst; ?>">[首页]</a></span>
<span><a href="<?php echo $pageprev; ?>">[上页]</a></span>
<span><a href="<?php echo $pagenext; ?>">[下页]</a></span>
<span><a href="<?php echo $pagelast; ?>">[尾页]</a></span>
<?php
	}
	if ($pageindex == $pagecount)
	{?>
<span><a href="<?php echo $pagefirst; ?>">[首页]</a></span>
<span><a href="<?php echo $pageprev; ?>">[上页]</a></span>
<?php	
	}
	?>
  当前第
<select name="pageselect" id="pageselect"
	onChange="jumppage('<?php echo $url.$symbol; ?>',this.options[this.options.selectedIndex].value);">
	<?php	
	//产生所有页面链接
	for($i=1;$i<=$pagecount;$i++)
	{  
		
		?>
		<option <?php if($pageindex== $i) echo 'selected="selected"';?>
		value="<?php echo $i;?>"><?php echo $i;?></option>
	 <?php	
	}
	?>
	</select>
页
<script>
			function jumppage(urlprex,pageindex)
			{
				var surl=urlprex+pageindex;
				window.location.href=surl;
			} 
	</script>

<?php	
	
}

function dt_increase($interval, $type, $time=null){
	if(is_string($time)){
		$time = strtotime($time);
	}
	if(empty($time)){
		$time = time();
	}
	
	switch($type){
		case 'y':
			$op = "{$interval} years";
			break;
		case 'm':
			$op = "{$interval} months";
			break;
		case 'd':
			$op = "{$interval} days";
			break;
		case 'h':
			$op = "{$interval} hours";
			break;
		case 'n':
			$op = "{$interval} minutes";
			break;
		case 's':
			$op = "{$interval} seconds";
			break;
		default:
			return $time;
	}
	return date('Y-m-d H:i:s',strtotime($op, $time));
};

function navigation($name)
{
		
}
function &read_csv($file,$limit=0,$out_charset='utf-8')
{
	if(!file_exists($file)){
		return false;
	}
	#setlocale(LC_ALL, 'zh_CN.gbk'); 
	$fhandle = fopen($file,'r');
	if(!$fhandle) return false;
	$count = 0;
	while (!feof($fhandle) ) {
		$line_of_text = fgetcsv_reg($fhandle);
		if(!$line_of_text) continue;
		$result[] = $line_of_text;
		$count++;
		if($limit > 0 && $limit <= $count) break;
	}
	
	foreach ($result as &$line){
		foreach ($line as &$v){
			$v = iconv('gbk',$out_charset,$v);
		}
	}
	
	fclose($fhandle);
	return $result;
}
function fgetcsv_reg(& $handle, $length = null, $d = ',', $e = '"') {
	$d = preg_quote($d);
	$e = preg_quote($e);
	$_line = "";
	$eof=false;
	while ($eof != true) {
		$_line .= (empty ($length) ? fgets($handle) : fgets($handle, $length));
		$itemcnt = preg_match_all('/' . $e . '/', $_line, $dummy);
		if ($itemcnt % 2 == 0)$eof = true;
	}
	$_csv_line = preg_replace('/(?: |[ ])?$/', $d, trim($_line));
	$_csv_pattern = '/(' . $e . '[^' . $e . ']*(?:' . $e . $e . '[^' . $e . ']*)*' . $e . '|[^' . $d . ']*)' . $d . '/';
	preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
	$_csv_data = $_csv_matches[1];
	for ($_csv_i = 0; $_csv_i < count($_csv_data); $_csv_i++) {
		$_csv_data[$_csv_i] = preg_replace('/^' . $e . '(.*)' . $e . '$/s', '$1', $_csv_data[$_csv_i]);
		$_csv_data[$_csv_i] = str_replace($e . $e, $e, $_csv_data[$_csv_i]);
	}
	return empty ($_line) ? false : $_csv_data;
}

function set_charset($charset='UTF-8'){
	@header("Content-type: text/html;charset={$charset}");
}
function die_not_found(){
		die("您访问的页面不存在!");
}
function client_ip(){
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
		$onlineip = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
		$onlineip = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
		$onlineip = getenv('REMOTE_ADDR');
	} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	return $onlineip;
}

function check_email($email){
	return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
}

function echo_href($title,$href,$max_len=0,$html_params=null){
	$out = "<a href='{$href}' title='{$title}'";
	if(func_num_args()==3){
		$third = func_get_arg(2);
		if(is_array($third)){
			$html_params = $third;
		}
	}
	if($html_params){
		foreach ($html_params as $key => $val){
			$out .= " $key='$val'";
		}
	}
	if($max_len > 0){
		$len = mb_strlen($title,'utf-8');
		if($len > $max_len){
			$display = mb_substr($title,0,$max_len-1,'utf-8')  ."...";
		}else{
			$display = $title;
		}
	}else{
		$display = $title;
	}
	$out .=">$display</a>";
	echo $out;
}

function month_between($time1,$time2=null){
	$time2 || $time2 = time();
	if(is_string($time1)){
		$time1 = strtotime($time1);
	}
	if($time1 === false) return null;
	if(is_string($time2)){
		$time2 = strtotime($time2);
	}
	if($time2 === false) return null;
	if($time1 >= $time2){
		$plus = 1;
	}else{
		$time = $time1;
		$time1 = $time2;
		$time2 = $time;
		$plus = -1;
	}
	
	$year = date('Y',$time1) - date('Y',$time2);
	$mounth = date('m',$time1) - date('m',$time2);
	if(date('d',$time1) >= date('d',$time2)){
		return $plus*($year*12 + $mounth + 1);
	}else{
		return $plus*($year*12 + $mounth);
	}
	
	
}

function get_week_day(){
	$w = date('N');
	switch ($w) {
		case 1:
			return "星期一";
		break;
		case 2:
			return "星期二";
		break;
		case 3:
			return "星期三";
		break;
		case 4:
			return "星期四";
		break;
		case 5:
			return "星期五";
		break;
		case 6:
			return "星期六";
		break;
		case 7:
			return "星期天";
		break;
		default:
			;
		break;
	}
	
}