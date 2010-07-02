<?php
class PagePos {
	static public $s_fields = array("id","page","name","title","description","href","static_href","image1","image2","reserve1","reserve2");
	static protected $s_table = "eb_page_pos";
	static public function load($page){
		$result = array();
		$db = get_db();
		$items = $db->query("select * from " .self::$s_table ." where page='$page'");
		$items || $items = array();
		foreach ($items as $item){
			$page_pos = new self();
			foreach (self::$s_fields as $field){
				$page_pos->$field = $item->$field;
			}
			$result[$page_pos->name]=$page_pos;
		}
		return $result;
	}
}