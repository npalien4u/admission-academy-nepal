<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	if ( ! function_exists('tenant_identifier'))
	{
		/**
		 * Element
		 *
		 * Lets you determine whether an array index is set and whether it has a value.
		 * If the element is empty it returns NULL (or whatever you specify as the default value.)
		 *
		 * @param	string
		 * @param	array
		 * @param	mixed
		 * @return	mixed	depends on what the array contains
		 */
		function tenant_identifier()
		{
			$domain_name = $_SERVER["SERVER_NAME"];

			echo "domain name". $domain_name;
			exit;

			if($domain = "xbs.servehttp.com"){
				//development
				$domain_name = "dev.formsnepal.com";
			}
			return $domain_name;
		}
	}
	