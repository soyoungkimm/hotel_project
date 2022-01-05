<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_user extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('User_m');
        }	
		
		
		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['user'] = $this->User_m->getUser();
			
			$this->_header();
			$this->load->view('admin_user_list', array('data'=>$data));
			$this->_footer();
		}
		
		
		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$user = $this->User_m->getUserByUserId($id);
			
			$this->_header();
			$this->load->view('admin_user_detail', array('user'=>$user));
			$this->_footer();
		}
		
		
		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['user'] = $this->User_m->getUserByUserId($id);
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '이름', 'required|max_length[100]');
			$this->form_validation->set_rules('uid', 'UID', 'required|max_length[100]');
			$this->form_validation->set_rules('password', '비밀번호', 'required|max_length[100]');
			$this->form_validation->set_rules('phone', '전화번호', 'required|max_length[11]');
			$this->form_validation->set_rules('email', 'email', 'required|max_length[100]');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_user_edit', array('data'=>$data));
            }
            else {  
				$user = array(
					'name'=>$this->input->post('name'),
					'uid'=>$this->input->post('uid'),
					'password'=>$this->input->post('password'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'division'=>$this->input->post('division'),
					'grade'=>$this->input->post('grade'),
					'user_id'=>$id
				);
				$this->User_m->admin_edit($user); 
			
				redirect('/~team2/admin_user/detail/'.$id);
            }
			
			$this->_footer();
		}
		
		
		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}

            $this->User_m->deleteUser($id);

            redirect('/~team2/admin_user');
		}
		
		
		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->_header();
			
			$data['user'] = $this->User_m->getUser();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '이름', 'required|max_length[100]');
			$this->form_validation->set_rules('uid', 'UID', 'required|max_length[100]');
			$this->form_validation->set_rules('password', '비밀번호', 'required|max_length[100]');
			$this->form_validation->set_rules('phone', '전화번호', 'required|max_length[11]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[100]');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_user_add', array('data'=>$data));
            }
            else {  
				$user = array(
					'name'=>$this->input->post('name'),
					'uid'=>$this->input->post('uid'),
					'password'=>$this->input->post('password'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'division'=>$this->input->post('division'),
					'grade'=>$this->input->post('grade')
				);
				$id = $this->User_m->admin_add($user);  

				
				redirect('/~team2/admin_user/detail/'.$id);
            }
			
			$this->_footer();
		}
	}
?>