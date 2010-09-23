<?php
if(!defined("FRAME_VERSION")) die('invalid request!');
class DataBase {
	public $server = 'localhost';
	public $database = 'mysql';
	public $user = 'root';
	public $password = '';
	public $code = 'utf8';
	
	//private variables;
	protected $_dblink = null;
	protected $_result = array();
	protected $record_count = 0;
	protected $affect_count = 0;
	protected $last_insert_id = 0;
	private   $_index = 0;
	
	//construction
	function __construct(){
		$num = func_num_args();
		if($num == 1){
			$param = func_get_arg(0);
			if(is_array($param)){
				foreach ($param as $key => $value){
					$this->$key = $value;
				}
				return ;
			}
		}
		$num >=1 && $this->server = func_get_arg(0);
		$num >=2 && $this->database = func_get_arg(1);
		$num >=3 && $this->user = func_get_arg(2);
		$num >=4 && $this->password = func_get_arg(3);
	}
	
	public function connect(){
		$num = func_num_args();
		if($num == 1){
			$param = func_get_arg(0);
			if(is_array($param)){
				foreach ($param as $key => $value){
					$this->$key = $value;
				}
				return ;
			}
		}
		$num >=1 && $this->server = func_get_arg(0);
		$num >=2 && $this->database = func_get_arg(1);
		$num >=3 && $this->user = func_get_arg(2);
		$num >=4 && $this->password = func_get_arg(3);
		$num >=5 && $this->code = func_get_arg(4);
		return $this->_connect();
	}
	
	public function close(){
		mysql_close($this->_dblink);	
		$this->_reset();
	}
	
	public function &query($sql){
		$this->_reset();
		if($this->connected === false){
			write_log('fail to execute sql!;query string =' .$sql  ."; reason: database not connected");
			return false;
		}
		$qresult = mysql_query($sql,$this->_dblink);
		if($qresult === false){
			write_log('fail to execute sql!;query string =' .$sql  ."; reason:" .mysql_error());
			return false;
		} 
		$this->record_count = mysql_num_rows($qresult);
		for($i=0;$i<$this->record_count;$i++){
			mysql_data_seek($qresult, $i);
			$this->_result[$i] = new DataBaseRow(mysql_fetch_array($qresult));
		}
		return $this->_result;
	}
	
	function paginate($sql, $per_page=null,$page_var=null) {
		empty($per_page) && $per_page = 10;
		empty($page_var) && $page_var = 'page';
		$page_count_var  = $page_var ."_page_count";
		$record_count_var = $page_var ."_record_count";
		global $$page_count_var;
		global $$record_count_var;
		$page = isset($_REQUEST[$page_var]) ? $_REQUEST[$page_var] : 1;
		$select = substr($sql,0,6);
		if(strtoupper($select) != 'SELECT'){
			$this->_debug_info('sql in function painate must be started with SELECT; sql=' .$sql);
			return false;			
		}

		$sql = substr_replace($sql," SQL_CALC_FOUND_ROWS ",6, 0) ." limit " .($per_page * ($page - 1)) . "," .$per_page;
		$ret = $this->query($sql);
		if($ret === false){
			return false;
		}
		$ret = mysql_query('select FOUND_ROWS()');
		mysql_data_seek($ret,0); 
		$ret = mysql_fetch_array($ret);
		$$page_count_var = ceil($ret[0] / $per_page);
		$$record_count_var = $ret[0];
		
		return $this->_result;
	}
	
	public function execute($sql){
		$this->_reset();
		if($this->connected === false){
			write_log('fail to execute sql!;query string =' .$sql  ."; reason: database not connected");
			return false;
		}
		$qresult = mysql_query($sql,$this->_dblink);
		if($qresult === false){
			write_log('fail to execute sql!;query string =' .$sql  ."; reason:" .mysql_error());
			return false;
		} 
		$this->affect_count = mysql_affected_rows($this->_dblink);
		$this->last_insert_id = mysql_insert_id($this->_dblink);
		return true;
	}
	
	public function move_first(){
		if($this->record_count <= 0) return false;
		$this->_index = 0;
		return true;
	}
	
	public function move_next(){
		if($this->_index >= $this->record_count -1) return false;
		$this->_index = $this->_index + 1;
		return true;
	}
	
	public function field_by_name($name){
		return $this->_result[$this->_index]->$name;
	}
	
	public function field_by_index($index){
		return $this->_result[$this->_index]->field_by_index($index);
	}
	
	private function _connect(){
		$this->_reset();
		$this->_dblink = mysql_connect($this->server, $this->user, $this->password);
  		if ($this->_dblink === FALSE)
  		{
  			$this->_debug_info('fail to establish db connection,' .mysql_error());
  			return FALSE;
  		}
  		else
  		{
  			mysql_query('SET NAMES ' .$this->code);
  		  	mysql_select_db($this->database, $this->_dblink);  		  
  		  	return true;
  	  	} 
	}
	
	private function _reset(){
		$this->_result = array();
		$this->_index = 0;
		$this->record_count = 0;
		$this->affect_count = 0;
		$this->last_insert_id = 0;
	}
	
	private function _debug_info($msg){
  		global $debug_tag;
  		if ($debug_tag === true) {
  			if(function_exists('debug_info')){
  				debug_info($msg);	
  			}  			
  		}
  	}
	
	//magic functions 
	public function __get($name){
		switch ($name) {
			case 'connected':
				return is_resource($this->_dblink);
			break;
			case 'record_count':
				return $this->record_count;
			break;
			case 'affect_count':
				return $this->affect_count;
			break;
			case 'last_insert_id':
				return $this->last_insert_id;
			break;
			default:
				;
			break;
		}
	}
}