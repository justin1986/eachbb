<?php
if(!defined("FRAME_VERSION")) die('invalid request!');
class DataBaseRow {
	private $_data = array();
	function __construct($data) {
		$this->_data = $data;
	}
	
	public function __get($name){
		if(array_key_exists($name, $this->_data)){
			return $this->_data[$name];
		}
	}
	
	public function field_by_index($index){
		return $this->_data[$index];
	}
}