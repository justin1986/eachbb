<?php
if(!defined('FRAME_VERSION')){
	die('not in frame');
}

class Member{
	public $id;
	public $name;
	public $nick_name;
	public $avatar;
	public $gender;
	public $birthday;
	public $address;
	public $score;
	public $visit_count;
	public $level;
	public $last_login;
	
	function __construct($u_id){
		if($u_id){
			$member = new table_class('eachbb.member');
			$member->find($u_id);
			$this->id = $u_id;
			$this->name = $member->name;
			$this->password = $member->password;
			$this->email = $member->email;
			$this->birthday = $member->birthday;
			$this->address = $member->address;
			$this->nick_name = $member->ture_name;
			$db = get_db();
			$db->query("select * from member_status where uid=$u_id");
			if($db->record_count==0){
				$status = new table_class('member_status');
				$status->created_at = $member->created_at;
				$status->last_login = $member->last_login;
				$status->uid = $u_id;
				$status->save();
			}
			$this->score = $status->score;
			$this->visit_count = $status->visit_count;
			$this->level = $status->level;
			$this->last_login = $status->last_login;
		}
	}
	
	function get_friend(){
		
	}
	
	function get_visitor(){
		
	}
	
	function get_avatar(){
		
	}
	
	function get_news(){
		
	}
}