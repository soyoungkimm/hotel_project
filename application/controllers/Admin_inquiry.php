<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_inquiry extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Inquiry_m');
        }

		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['inquirys'] = $this->Inquiry_m->getAll();
			
			$this->_header();
			$this->load->view("admin_inquiry_list", array('data'=>$data));
			$this->_footer();
		}


		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$inquiry = $this->Inquiry_m->getInquiryById($id);
			
			$this->_header();
			$this->load->view('admin_inquiry_detail', array('inquiry'=>$inquiry));
			$this->_footer();
		}
		


		
		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->load->model('Inquiry_detail_m');
			
			$data['inquiry'] = $this->Inquiry_m->getInquiryById($id);
			$data['inquiry_details'] = $this->Inquiry_detail_m->getAll();
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '문의 작성자 명', 'required|max_length[30]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[100]');
			$this->form_validation->set_rules('phone', '전화번호', 'required|max_length[11]');
			$this->form_validation->set_rules('title', '제목', 'required|max_length[60]');
			$this->form_validation->set_rules('content', '내용', 'required');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_inquiry_edit', array('data'=>$data));
            }
            else {  
				$inquiry = array(
					'detail_id'=>$this->input->post('detail_id'),
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'phone'=>$this->input->post('phone'),
					'title'=>$this->input->post('title'),
					'content'=>$this->input->post('content'),
					'state'=>$this->input->post('state'),
					'id'=>$id
				);
				$this->Inquiry_m->admin_edit($inquiry); 
			
				redirect('/~team2/admin_inquiry/detail/'.$id);
            }
			
			
			$this->_footer();
		}
		
		
		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}

            $this->Inquiry_m->deleteInquiry($id);

            redirect('/~team2/admin_inquiry');
		}
		
		
		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->load->model('Inquiry_detail_m');
			
			$data['inquiry_details'] = $this->Inquiry_detail_m->getAll();
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '문의 작성자 명', 'required|max_length[30]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[100]');
			$this->form_validation->set_rules('phone', '전화번호', 'required|max_length[11]');
			$this->form_validation->set_rules('title', '제목', 'required|max_length[60]');
			$this->form_validation->set_rules('content', '내용', 'required');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_inquiry_add', array('data'=>$data));
            }
            else {  
				$inquiry = array(
					'detail_id'=>$this->input->post('detail_id'),
					'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'phone'=>$this->input->post('phone'),
					'title'=>$this->input->post('title'),
					'content'=>$this->input->post('content'),
					'state'=>$this->input->post('state')
				);
				$id = $this->Inquiry_m->admin_add($inquiry);  

				
				redirect('/~team2/admin_inquiry/detail/'.$id);
            }
			
			$this->_footer();
		}
	}
?>