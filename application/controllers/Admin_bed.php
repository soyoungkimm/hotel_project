<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_bed extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Bed_m');
        }
		

		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$beds = $this->Bed_m->getAll();
			
			$this->_header();
			$this->load->view("admin_bed_list", array('beds'=>$beds));
			$this->_footer();
		}


		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$bed = $this->Bed_m->getBedById($id);
			
			$this->_header();
			$this->load->view('admin_bed_detail', array('bed'=>$bed));
			$this->_footer();
		}
		
		
		
		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$bed = $this->Bed_m->getBedById($id);
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '이름', 'required|max_length[50]');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_bed_edit', array('bed'=>$bed));
            }
            else {  
				$bed = array(
					'name'=>$this->input->post('name'),
					'id'=>$id
				);
				$this->Bed_m->edit($bed); 
				
				redirect('/~team2/admin_bed/detail/'.$id);
            }
			
			$this->_footer();
		}
		
		
		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}

            $this->Bed_m->delete($id);

            redirect('/~team2/admin_bed');
		}
		
		
		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->_header();
			
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '이름', 'required|max_length[50]');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_bed_add');
            }
            else {  
				$bed = array(
					'name'=>$this->input->post('name')
				);
				$id = $this->Bed_m->add($bed);  
				
				redirect('/~team2/admin_bed/detail/'.$id);
            }
			
			$this->_footer();
		}
		
		
	}
?>