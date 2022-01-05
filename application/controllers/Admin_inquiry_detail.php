<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_inquiry_detail extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Inquiry_detail_m');
        }

		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['inquiry_details'] = $this->Inquiry_detail_m->getAll();
		
			$this->_header();
			$this->load->view("admin_inquiry_detail_list", array('data'=>$data));
			$this->_footer();
		}
		
		
		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$inquiry_detail = $this->Inquiry_detail_m->getInquiryDetailById($id);
			
			$this->_header();
			$this->load->view('admin_inquiry_detail_detail', array('inquiry_detail'=>$inquiry_detail));
			$this->_footer();
		}
		


		
		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$inquiry_detail = $this->Inquiry_detail_m->getInquiryDetailById($id);
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '문의 detail 명', 'required|max_length[30]');
			
			
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_inquiry_detail_edit', array('inquiry_detail'=>$inquiry_detail));
            }
            else {  
				$inquiry_detail = array(
					'name'=>$this->input->post('name'),
					'id'=>$id
				);
				$this->Inquiry_detail_m->admin_edit($inquiry_detail); 
			
				redirect('/~team2/admin_inquiry_detail/detail/'.$id);
            }
			
			
			$this->_footer();
		}
		
		
		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}

            $this->Inquiry_detail_m->deleteInquiryDetail($id);

            redirect('/~team2/admin_inquiry_detail');
		}
		
		
		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '문의 detail 명', 'required|max_length[30]');
			
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_inquiry_detail_add');
            }
            else {  
				$inquiry = array(
					'name'=>$this->input->post('name')
				);
				$id = $this->Inquiry_detail_m->admin_add($inquiry);  

				
				redirect('/~team2/admin_inquiry_detail/detail/'.$id);
            }
			
			$this->_footer();
		}
	}
	
?>