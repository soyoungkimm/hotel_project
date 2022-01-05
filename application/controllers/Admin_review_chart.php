<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_review_chart extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Review_m');
        }
		
		
		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['star_stc'] = $this->Review_m->getStarStatistic();
			$data['avg'] = $this->Review_m->getStarAvg();
			$data['total_count'] = $this->Review_m->getReviewAllCount();
			
			$this->_header();
			$this->load->view("admin_review_chart", array('data'=>$data));
			$this->_footer();
		}
	}
?>