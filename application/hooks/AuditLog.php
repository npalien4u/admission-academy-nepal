<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AuditLog extends BaseController {

	var $CI;
	public function __construct(){
	
		$this->CI= & get_instance();
		$this->CI->load->library("session");
	}

	public function record_activity(){
		
		
		$controller_name = $this->CI->router->fetch_class();
		$action_name = $this->CI->router->fetch_method();

		

	}


}
