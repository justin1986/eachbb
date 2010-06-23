<?php
/*
 * 载入开发者环境配置，如果上面的变量需要重载，在apache配置文件中添加开发者姓名，并在config目录下添加配置文件
 * eg：在apache 配置文件中添加SetEnv env_dev sauger
 * 然后在config目录中添加sauger_config.php
 * 在sauger_config.php中，重新设置以上变量的值即可
 * 
 * 
 * 配置变量定义
 */
global $debug_tag; //是否打开调试开关
global $db_type;//数据库类型，一般未为mysql
global $db_server_name;//数据库地址
global $db_user_name;//数据库用户名
global $db_database_name;//数据库名
global $db_password;//数据库密码
global $db_code;//数据库编码，一般为utf8
global $table_prex;//表前缀名

/*
 * 表名定义
 */
global $tb_menu;
global $tb_user;
global $tb_category;
global $tb_images;
global $tb_video;
global $tb_news;

/*
 * ucenter相关配置
 */
global $g_ucenter_ip;//ucenter地址，不同环境需要重载
global $bbs_uc_key;//bbs application key
global $app_uc_key;//应用application key
global $app_uc_id;//应用application id

/*
 * 其他设置
 */
global $g_log_dir;//日志目录，需要可写权限
global $site_name;//网站后台显示名称
global $site_domain;//网站域名，不同环境需要重载

/*
 * 变量赋值
 */

$db_type = 'mysql';
$db_database_name = 'eachbb';
$db_code = 'utf8';
$table_prex = 'eb_';

$tb_menu = $table_prex . 'admin_menu';
$tb_user = $table_prex . 'user';
$tb_category = $table_prex . 'category';
$tb_images = $table_prex . 'images';
$tb_video = $table_prex.'video';
$tb_news = $table_prex.'news';

$g_log_dir = dirname(__FILE__)."/../data/";
$site_name = '网趣宝贝';
$bbs_uc_key = 'qboa97C9i0k1Ja6657W5083132r9Mb20i7y1e4BeL5q9Z3C2K8X3t7EbMdq9IdSe';
$app_uc_key = 'fac1cJPngd5eHQyvQgA5xCQx3xDoL6XW1QlifoQ';
$app_uc_id = '2';

/////////////////////////////////////////////////////////////////////////
//*****************************一般需要重载的变量*************************//
////////////////////////////////////////////////////////////////////////
$debug_tag = true;
$db_server_name = '192.168.1.2';
$db_user_name = 'eachbb'; 
$db_password = 'xunao';
$g_ucenter_ip = 'http://210.51.52.158';
$site_domain = 'http://210.51.52.158';

/*
 * load developer environment
 */

$developer = getenv('env_dev');
if($developer){
	$file_name = dirname(__FILE__)."/{$developer}_config.php";
	if(file_exists($file_name)){
		require_once $file_name;
	}
}

//ucenter configuration
define('UC_CONNECT', 'mysql');
define('UC_DBHOST', $db_server_name);
define('UC_DBUSER', $db_user_name);
define('UC_DBPW', $db_password);
define('UC_DBNAME', $db_database_name);
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`eachbb`.uc_');
define('UC_DBCONNECT', '0');

define('UC_API', $site_domain .'/ucenter');
define('UC_CHARSET', 'utf-8');
define('UC_PPP', '20');
