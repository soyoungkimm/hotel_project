<?php
	class Admin_room extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
        }	
		
		function index() {
			$this->load->model('Room_m');
			
			$rooms = $this->Room_m->getRoomAll();
			
			$this->load->view("admin_header");
			$this->load->view('admin_room_list', array('rooms'=>$rooms));
			$this->load->view("admin_footer");
		}
	}
?>