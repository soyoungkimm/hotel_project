<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_event extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Event_m');
        }


		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['events'] = $this->Event_m->getEventAll();
		
			$this->_header();
			$this->load->view("admin_event_list", array('data'=>$data));
			$this->_footer();
		}


		
		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$event = $this->Event_m->getEventById($id);
			
			$this->_header();
			$this->load->view('admin_event_detail', array('event'=>$event));
			$this->_footer();
		}
		


		
		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['event'] = $this->Event_m->getEventById($id);
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('title', '이벤트 제목', 'required|max_length[50]');
			$this->form_validation->set_rules('color', '색', 'required|max_length[50]');
			$this->form_validation->set_rules('start', '시작 날짜', 'required');
			$this->form_validation->set_rules('end', '끝 날짜', 'required');
			$this->form_validation->set_rules('content', '내용', 'required');
			
			
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_event_edit', array('data'=>$data));
            }
            else {  
				$event = array(
					'title'=>$this->input->post('title'),
					'color'=>$this->input->post('color'),
					'start'=>$this->input->post('start'),
					'end'=>$this->input->post('end'),
					'content'=>$this->input->post('content'),
					'id'=>$id
				);
				$this->Event_m->admin_edit($event); 
			
				redirect('/~team2/admin_event/detail/'.$id);
            }
			
			
			$this->_footer();
		}
		
		
		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}

            $this->Event_m->deleteEvent($id);

            redirect('/~team2/admin_event');
		}
		
		
		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('title', '이벤트 제목', 'required|max_length[50]');
			$this->form_validation->set_rules('color', '색', 'required|max_length[50]');
			$this->form_validation->set_rules('start', '시작 날짜', 'required');
			$this->form_validation->set_rules('end', '끝 날짜', 'required');
			$this->form_validation->set_rules('content', '내용', 'required');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_event_add');
            }
            else {  
				$event = array(
					'title'=>$this->input->post('title'),
					'color'=>$this->input->post('color'),
					'start'=>$this->input->post('start'),
					'end'=>$this->input->post('end'),
					'content'=>$this->input->post('content')
				);
				$id = $this->Event_m->admin_add($event);  

				
				redirect('/~team2/admin_event/detail/'.$id);
            }
			
			$this->_footer();
		}


	}
?>