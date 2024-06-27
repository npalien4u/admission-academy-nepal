<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant_identifier {
	var $CI;
	public function __construct()
	{
		$this->CI = & get_instance();
		// Do something with $params
		$this->CI->load->helper("domain");
		
	}

	public function GetTenant(){
		$domain_name = $_SERVER["SERVER_NAME"];
		
		// echo "domain name".$domain_name;
		//exit;
		
		if($domain_name=="xbs.servehttp.com"){
		
			$tmp_arr = explode("/",$_SERVER["SCRIPT_NAME"]);
			$domain_prefix = $tmp_arr[sizeof($tmp_arr)-2];
			$tenant = $this->CI->db->like("domain", $domain_prefix, "after")->get("institution")->row();
		}else{	
			$tenant = $this->CI->db->where("domain", $domain_name)->get("institution")->row();
		}
		
		// echo $tenant;
		// exit;
	//var_dump( $tenant); exit;
		return $tenant;
		// exit;
	}
}
