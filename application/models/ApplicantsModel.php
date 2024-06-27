<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantsModel extends MY_Model {

	function __construct(){
		parent::__construct();
		$this->table_name = "applications";
	}

	function create_applicant($data){
		$new_id= $this->insert($this->table_name, $data);
		return $new_id;
	}

	// function get_applicant_info($id){
	// 	$applicant = $this->get_where($this->table_name, $id);
	// 	return $applicant;
	// }

	function Authenticate($data){		
		$data["password"]=md5($data["password"]);
		$query= $this->get_where($data);
		return $query;
	}

}

	