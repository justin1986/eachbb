<?php
include_once "../frame.php";
$channel = $_GET['channel'];
$banner = $_GET['banner'];
if(!is_ajax()) die();
$banners = array('test_rightr','qin_right','index_middle_banner','index_center_banner_2','cre','pg_a','pg_ab','bg_pg','couser_a','hl_b','bl_img','br_f','br_g');
$channels = array('index','test','course','assistant','bbs.php');
if(!in_array($_GET['channel'],$channels) || !in_array($_GET['banner'],$banners)){
	die();
}
if ($channel == 'review') $channel = 'news';
$db = get_db();
$db->query("select id from eachbb_ad.eb_channel where parttern='$channel'");
if($db->record_count <= 0) die('2');
$db->move_first();
$channel_id = $db->field_by_name('id');
$db->query("select id from eachbb_ad.eb_banner where code='$banner'");
if($db->record_count <= 0) die();
$db->move_first();
$banner_id = $db->field_by_name('id');
$ads = $db->query("select a.*,b.ad_size from eachbb_ad.eb_ad a left join eachbb_ad.eb_banner b on a.banner_id = b.id where is_adopt=1 and channel_id={$channel_id} and banner_id={$banner_id} and (start_date=0 or start_date is null or start_date < now()) and (end_date is null or end_date=0 or end_date > now())");
if ($db->record_count <= 0) die();
function generate_ad($ad){
	$ad->code = $ad->id;
	$size = explode('*',$ad->ad_size);
	switch ($ad->ad_type) {
		case 'flash':
			$str = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"{$size[0]}\" height=\"{$size[1]}\">
				        <param name=\"movie\" value=\"{$ad->flash}\">
				        <param name=\"quality\" value=\"high\">
				        <PARAM NAME=\"WMode\" VALUE=\"transparent\">
				        <embed src=\"{$ad->flash}\" quality=\"high\" WMode=\"transparent\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"{$size[0]}\" height=\"{$size[1]}\"></embed>
				     </object>";
			$str .= "<a href=\"/ajax/ad_bridge.php?code={$ad->code}\" target='_blank' style=\"left:0; top:0; width:{$size[0]}px; height:{$size[1]}px; border:1px solid; z-index:100; background:#ffffff; filter: alpha(opacity=0);-moz-opacity: 0;opacity: 0;  position:absolute; float:left;\"></a>"; 
		break;
		case 'image':
			$str = "<a href='/ajax/ad_bridge.php?code={$ad->code}' target='_blank'>";
			$str .= "<img width='{$size[0]}' height='{$size[1]}' border=0 src='{$ad->image}' />";
			$str .= "</a>";
		break;
		case 'video':
		;
		break;
		
		default:
			;
		break;
	}
	$str .= "<input type='hidden' value='{$ad->id}' />";
	return $str;
	
}

$hour = getdate();
$hour = intval($hour['hours']);
foreach ($ads as $ad) {
	$start_hour = intval($ad->start_hour);
	$end_hour = intval($ad->end_hour);
	
	if($start_hour < $end_hour){
		if($hour < $start_hour || $hour > $end_hour){
			continue;
		}
	}else if($start_hour > $end_hour){
		if(($hour < $start_hour && $hour > $end_hour)){
			continue;
		}
	}
	$valid_ads[]=$ad;
}
$len = count($valid_ads);
$index = mt_rand(0,$len-1);
insert_ad_record($valid_ads[$index]);
echo generate_ad($valid_ads[$index]);
?>
