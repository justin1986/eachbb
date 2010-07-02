<?php
/*
class Paginate{
	static public $page_var = 'page';
	static public $type = 'normal';//可选类型：normal(普通类型，即动态页面翻页）；fake_static（伪静态，即在url后加/page/1）static（静态方式）
	static public $spliter = "_";//当type=static时，用于分隔页面的分隔符，必须指定次参数。
	static public $url = null;
	static public $txt_first = "首页";
	static public $txt_prev = "上页";
	static public $txt_next = "下页";
	static public $txt_last = "尾页";
	static public $ajax = null;
	
	static private $current_page =0;
	static public function paginate(){
		
	}
	//获得当前显示的页码
	static private function _current_page(){
		if(self::$current_page) return self::$current_page;
		self::$current_page =  intval($_GET[self::$page_var]) > 0 ? intval($_GET[self::$page_var]) : 1;
		return self::$current_page;
	}
	
	//返回第$page页的代码
	static private function _page_display($page){
		if($page == self::_current_page()){
			return "<span>$page</span>";
		}else{
			return self::_page_href($page);
		}
	}
	static private function _page_href($page){
		$url = self::$url ? self::$url : $_SERVER['PHP_SELF'];		
		switch (self::$type){
			case 'normal':
				strpos($url, '?') === false && $url .= "?";
				$query = $_SERVER['QUERY_STRING'];
				$pattern = '/(&?' .self::$page_var.'=\d*)/';
				$query = preg_replace($pattern, '', $query);
				$query .= "&".self::$page_var ."={$page}";
				return $url ."?{$query}";				
				break;
			case 'fake_static': //伪静态方式，在url后添加/page/2方式；
				$pattern = '/\/'.self::$page_var .'\d*\/?$/';
				$url = preg_replace($pattern, '',$url);
				return $url ."/".self::$page_var ."/{$page}";
				break;
			case 'static': //静态方式，类似00213_2.shtml,必须指定url和spliter;
				$pattern = '/(\.[^\/])$/';
				return preg_replace($pattern, self::$spliter .$page ."$1", $url);
				break;
			default:
				break;
		}
	}
}
*/