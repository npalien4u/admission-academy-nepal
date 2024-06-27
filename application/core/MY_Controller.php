<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller{
	var $tenant;

	function __construct(){
		parent::__construct();
		$this->load->library("Tenant_identifier");
		$this->tenant = $this->tenant_identifier->GetTenant();
		$session["tenant"] = $this->tenant;
		$this->session->set_userdata($session);
	}
}

class Admin_Controller  extends BaseController{

	function __construct(){
		parent::__construct();
		
	}

	public function check_login(){
		$logged_in = $this->session->userdata("logged_in");
		$is_admin = $this->session->userdata("usertype")=="admin"?true:false;
		if(!$logged_in || !$is_admin) redirect("admin");
	}

}

class Web_Controller  extends BaseController{

	var $tenant;
	function __construct(){
		parent::__construct();	
		
		if(!$this->tenant) {
			echo "Application not registered.";		
			// redirect("http://formsnepal.lab");
			exit;
		}
		
	}

}
