<?php
	class Hotel extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
        }
		
		public function index() {
			$this->load->model('Review_m');
			$this->load->model('User_m');
			
			$data['best_reviews'] = $this->Review_m->getBestReview();
			$data['users'] = $this->User_m->getUserByReview($data['best_reviews']);
			
			//$this->load->view("header");
			$this->load->view("main" , array('data' => $data));
			$this->load->view("footer");
		}
	
	}

?>