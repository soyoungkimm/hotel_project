<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_auth extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
        }
		
		
		function login() {

			$this->load->model('User_m');
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('uid', 'ID', 'required|max_length[100]');
			$this->form_validation->set_rules('pwd', '비밀번호', 'required|max_length[100]');
			
			if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_login');
            }
			else {
				
				$id = $this->input->post('uid');
				$pwd = $this->input->post('pwd');
				$admin = $this->User_m->getAdmin($id, $pwd);
					
				if (isset($admin)) {
					
					$data = array(
						'admin_id' => $admin->id,
						'admin_name' => $admin->name
					);
					// session 정보 저장
					$this->session->set_userdata($data);

					redirect('/~team2/admin/main');
				}
				else {
					$this->load->view('admin_login', array('loginFailed'=>"아이디나 패스워드가 일치하지 않습니다."));
				}
			}
			
			

		}
		
		
		function logout() {
			
			$data = array('admin_id', 'admin_name');
			$this->session->unset_userdata($data);
			
			redirect('/~team2/admin');
			
		}
	}
?>