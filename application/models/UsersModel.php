<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends MY_Model {

	function __construct(){
		parent::__construct();
		$this->table_name = "users";
	}

	function Authenticate($data){		
		$data["password"]=md5($data["password"]);
		$query= $this->get_where($data);
		return $query;
	}

	function ChangePassword($data){
		$this->update(array("id"=>$this->session->userdata("user")->id, "institution_id"=>$this->session->userdata("tenant")->id), $data);		
	}
	
}

	