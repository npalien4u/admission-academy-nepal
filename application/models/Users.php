<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Model{

	function __construct(){
		parent::__construct();
		$this->table_name = "users";
	}	
	
	function get_by_field($field, $value){
		$result = $this->db->where(array("$field"=>$value))->from("users")->get()->row();
		return $result;
	}
}

	