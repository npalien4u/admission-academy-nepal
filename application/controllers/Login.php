<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends Web_Controller {
		
		function __construct(){
			parent::__construct();
		}

		function index(){
			print_r($this->session->userdata());
			echo "login_form";
		}
	}
