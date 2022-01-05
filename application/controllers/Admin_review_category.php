<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_review_category extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Review_category_m');
        }
		
		
		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$categorys = $this->Review_category_m->getCategory();
			
			$this->_header();
			$this->load->view("admin_review_category_list", array('categorys'=>$categorys));
			$this->_footer();
		}


		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$category = $this->Review_category_m->getCategoryByCategoryId($id);
			
			$this->_header();
			$this->load->view('admin_review_category_detail', array('category'=>$category));
			$this->_footer();
		}
		
		
		
		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$category = $this->Review_category_m->getCategoryByCategoryId($id);
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '이름', 'required|max_length[255]');
			
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_review_category_edit', array('category'=>$category));
            }
            else {  
				$category = array(
					'name'=>$this->input->post('name'),
					'id'=>$id
				);
				$this->Review_category_m->edit($category); 
			
				redirect('/~team2/admin_review_category/detail/'.$id);
            }
			
			$this->_footer();
		}
		
		
		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}

            $this->Review_category_m->delete($id);

            redirect('/~team2/admin_review_category');
		}
		
		
		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '이름', 'required|max_length[255]');
			
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_review_category_add');
            }
            else {  
				$category = array(
					'name'=>$this->input->post('name')
				);
				$id = $this->Review_category_m->add($category);  

				
				redirect('/~team2/admin_review_category/detail/'.$id);
            }
			
			$this->_footer();
		}
	}
?>