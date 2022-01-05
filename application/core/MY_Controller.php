<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class MY_Controller extends CI_Controller {
	
		function __construct() {
            parent::__construct();
        }
		
		function _checkAdminLogin() {
			// admin이 login 되었는지 확인
			if(!$this->session->userdata('admin_id')) {
				$this->load->view("admin_warning");
				return false;
			}
			else {
				return true;
			}
		}
		
		function _ajax_header() {
			header("Content-Type: text/html; charset=KS_C_5601-1987");
            header("Cache-Control:no-cache");
            header("Pragma:no-cache");
            header("Content-Type:application/json");
		}
		
		function _header() {
			$this->load->view("admin_header");
		}
		
		function _footer() {
			$this->load->view("admin_footer");
		}
	}
?>