<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_room_chart extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Room_m');
        }
		
		
		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['room_stc'] = $this->Room_m->getRoomStatistic();
			
			$this->_header();
			$this->load->view("admin_room_chart", array('data'=>$data));
			$this->_footer();
		}
	}
?>