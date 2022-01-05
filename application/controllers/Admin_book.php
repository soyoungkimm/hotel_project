<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_book extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Book_m');
        }
		

		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->load->model('User_m');
			$this->load->model('Room_m');

			$data['books'] = $this->Book_m->getAll();
			$data['users'] = $this->User_m->getUserByBooks($data['books']);
			$data['rooms'] = $this->Room_m->getRoomAll();

			$this->_header();
			$this->load->view("admin_book_list", array('data'=>$data));
			$this->_footer();
		}
		
		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->load->model('User_m');
			$this->load->model('Room_m');

			$data['book'] = $this->Book_m->getBookById($id);
			$data['user'] = $this->User_m->getUserByUserId($data['book']->user_id);
			$data['room'] = $this->Room_m->getRoomById($data['book']->room_id);

			$this->_header();
			$this->load->view("admin_book_detail", array('data'=>$data));
			$this->_footer();
			
		}

		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->load->model('User_m');
			$this->load->model('Room_m');

			$data['book'] = $this->Book_m->getBookById($id);
			$data['users'] = $this->User_m->getUser();
			$data['rooms'] = $this->Room_m->getRoomAll();

			
			$this->_header();
			
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('checkin', '체크인 날짜', 'required');
			$this->form_validation->set_rules('checkout', '체크아웃 날짜', 'required');
			$this->form_validation->set_rules('people_num', '사람 수', 'required|integer');
			$this->form_validation->set_rules('book_name', '예약자 이름', 'required|max_length[20]');
			$this->form_validation->set_rules('book_phone', '예약자 연락처', 'required|max_length[11]');
			$this->form_validation->set_rules('price', '가격', 'required|integer');
			


            if ($this->form_validation->run() == FALSE) {
                $this->load->view("admin_book_edit", array('data'=>$data));
            }
            else {  
				$book = array(
					'user_id'=>$this->input->post('user_id'),
					'room_id'=>$this->input->post('room_id'),
					'checkin'=>$this->input->post('checkin'),
					'checkout'=>$this->input->post('checkout'),
					'people_num'=>$this->input->post('people_num'),
					'breakfast'=>$this->input->post('breakfast'),
					'book_name'=>$this->input->post('book_name'),
					'book_phone'=>$this->input->post('book_phone'),
					'price'=>$this->input->post('price'),
					'id'=>$id
				);
				$this->Book_m->admin_edit($book); 
			
				redirect('/~team2/admin_book/detail/'.$id);
            }
			
			
			$this->_footer();
		}


		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
		
			$this->load->model('User_m');
			$this->load->model('Room_m');

			$data['users'] = $this->User_m->getUser();
			$data['rooms'] = $this->Room_m->getRoomAll();
			
			$this->_header();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('checkin', '체크인 날짜', 'required');
			$this->form_validation->set_rules('checkout', '체크아웃 날짜', 'required');
			$this->form_validation->set_rules('people_num', '사람 수', 'required|integer');
			$this->form_validation->set_rules('book_name', '예약자 이름', 'required|max_length[20]');
			$this->form_validation->set_rules('book_phone', '예약자 연락처', 'required|max_length[11]');
			$this->form_validation->set_rules('price', '가격', 'required|integer');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_book_add', array('data'=>$data));
            }
            else {  
				$book = array(
					'user_id'=>$this->input->post('user_id'),
					'room_id'=>$this->input->post('room_id'),
					'checkin'=>$this->input->post('checkin'),
					'checkout'=>$this->input->post('checkout'),
					'people_num'=>$this->input->post('people_num'),
					'breakfast'=>$this->input->post('breakfast'),
					'book_name'=>$this->input->post('book_name'),
					'book_phone'=>$this->input->post('book_phone'),
					'price'=>$this->input->post('price')
				);
				$id = $this->Book_m->admin_add($book);  

				
				redirect('/~team2/admin_book/detail/'.$id);
            }
			
			$this->_footer();

		}

		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}

            $this->Book_m->deleteBook($id);

            redirect('/~team2/admin_book');
		}
	
	}
?>