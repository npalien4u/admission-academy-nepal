<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model  extends CI_Model{

	var $table_name;

	function __construct(){
		parent::__construct();
	}

	function insert($data){
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	function get_where($where){		
		$result = $this->db->get_where($this->table_name, $where)->result();		
		return $result;
	}

	function update($where, $data){		
		$this->db->update($this->table_name, $data, $where);
	}

	function delete($where){		
		$this->db->delete($this->table_name, $where);
	}

	

}
