<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends MY_Model {

	function __construct(){
		parent::__construct();
		$this->table_name = "institution";
	}

	function Authenticate($data){		
		$data["password"]=md5($data["password"]);
		$query= $this->get_where($data);
		return $query;
	}

	function InstitutionProfile($id){
		$institution = $this->get_where(array("id"=>$id));
		return $institution[0];
	}

	function UpdateProfile($data){
		$this->update(array("id"=>$this->session->userdata("tenant")->id), $data);		
	}
}

	