<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Main extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
        }
		
		public function index() {
			
			$this->load->model('Review_m');
			$this->load->model('User_m');
			$this->load->model('Room_m');
			$this->load->model('Bed_m');
			
			$data['rooms'] = $this->Room_m->getRoomAll();
			$data['best_reviews'] = $this->Review_m->getBestReview();
			$data['users'] = $this->User_m->getUserByReview($data['best_reviews']);
			$data['beds'] = $this->Bed_m->getAll();
			
			$this->load->view("main" , array('data' => $data));
			$this->load->view("footer");
		}
	
	}

?>