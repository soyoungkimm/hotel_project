<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_room extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Room_m');
			$this->load->model('Bed_m');
        }	
		
		
		function _upload_config() {
            // 파일을 저장할 경로
            $config['upload_path'] = 'my/img/room'; 
            // 확장자가 .gif, .jpg, .png인 파일만 업로드 허용
            $config['allowed_types'] = 'gif|jpg|png';
            // 허용되는 파일의 최대 사이즈
            $config['max_size'] = '100000';
            // 허용되는 최대 가로 길이
            $config['max_width']  = '10240';
            // 허용되는 최대 세로 길이(높이)
            $config['max_height']  = '10240';
            // 같은 이름의 파일이 있으면 덮어쓰기를 할건지
            $config['overwrite'] = FALSE;
            // upload 라이브러리 로드
            $this->load->library('upload', $config);
        }
		
		
		function index() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['rooms'] = $this->Room_m->getRoomAll();
			$data['beds'] = $this->Bed_m->getAll();
			
			$this->_header();
			$this->load->view('admin_room_list', array('data'=>$data));
			$this->_footer();
		}
		
		function detail($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$data['room'] = $this->Room_m->getRoomById($id);
			$data['beds'] = $this->Bed_m->getAll();
			
			
			$this->_header();
			$this->load->view('admin_room_detail', array('data'=>$data));
			$this->_footer();
		}
		
		
		function edit($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->_header();
			
			$data['room'] = $this->Room_m->getRoomById($id);
			$data['beds'] = $this->Bed_m->getAll();
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', '이름', 'required|max_length[50]');
			$this->form_validation->set_rules('price', '가격', 'required');
			$this->form_validation->set_rules('size', '크기', 'required');
			$this->form_validation->set_rules('number', '방개수', 'required');
			$this->form_validation->set_rules('service', '서비스', 'required|max_length[255]');
			$this->form_validation->set_rules('content', '내용', 'required');
			$this->form_validation->set_rules('people_num', '투숙인원', 'required');
			
			
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_room_edit', array('data'=>$data));
            }
            else {  
			
				$this->_upload_config();
				
				$upload_file_name = '';
				$upload_file_name2 = '';
				
				// image 변경됐을 때
				if($this->input->post('upload_file_name') != 'undefined') {
					// image 업로드
					if($this->upload->do_upload("upload_file")) { 
						// image file 이름 겹치는 것 방지
						$upload_data = $this->upload->data();
						$arr = explode('/', $upload_data['full_path']);
						$upload_file_name = $arr[count($arr) - 1];
					}
				}
				// image2 변경됐을 때
				if ($this->input->post('upload_file_name2') != 'undefined') {
					// image2 업로드
					if($this->upload->do_upload("upload_file2")) { 
						// image file 이름 겹치는 것 방지
						$upload_data = $this->upload->data();
						$arr = explode('/', $upload_data['full_path']);
						$upload_file_name2 = $arr[count($arr) - 1];
					}
				}
				
				// image가 변경되지 않았을 때
				if($upload_file_name == '') {
					$upload_file_name = null;
				}
				if($upload_file_name2 == '') {
					$upload_file_name2 = null;
				}
				
				
				$room = array(
					'name'=>$this->input->post('name'),
					'price'=>$this->input->post('price'),
					'size'=>$this->input->post('size'),
					'image'=>$upload_file_name, 
					'image2'=>$upload_file_name2,
					'number'=>$this->input->post('number'),
					'bed_id'=>$this->input->post('bed_id'),
					'service'=>$this->input->post('service'),
					'content'=>$this->input->post('content'),
					'people_num' => $this->input->post('people_num'),
					'id'=>$id
				);
				$this->Room_m->edit($room);
				
				// 변경한 페이지로 옮기기
				redirect('/~team2/admin_room/detail/'.$id);
            }
			
			$this->_footer();
		}
		
		
		
		
		function add() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->_header();
			
			$data['beds'] =  $this->Bed_m->getAll();
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', '이름', 'required|max_length[50]');
			$this->form_validation->set_rules('price', '가격', 'required');
			$this->form_validation->set_rules('size', '방 크기', 'required');
			if ($this->input->post('upload_file_name') == null || $this->input->post('upload_file_name') == 'undefined')
			{
				$this->form_validation->set_rules('upload_file', '이미지', 'required');
			}
			if ($this->input->post('upload_file_name2') == null || $this->input->post('upload_file_name2') == 'undefined')
			{
				$this->form_validation->set_rules('upload_file2', 'room detail 이미지', 'required');
			}
			$this->form_validation->set_rules('number', '방 개수', 'required');
			$this->form_validation->set_rules('service', '서비스', 'required|max_length[255]');
			$this->form_validation->set_rules('content', '내용', 'required');
			$this->form_validation->set_rules('people_num', '투숙인원', 'required');
			
			
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_room_add', array('data'=>$data));
            }
            else {
				
				$this->_upload_config();
				
				// 업로드에 성공하면
				if($this->upload->do_upload("upload_file")) { 
					
					// image file 이름 겹치는 것 방지
					$upload_data = $this->upload->data();
					$arr = explode('/', $upload_data['full_path']);
					$upload_file_name = $arr[count($arr) - 1];
					
					
					if ($this->upload->do_upload("upload_file2")) {
						
						// image file 이름 겹치는 것 방지
						$upload_data = $this->upload->data();
						$arr = explode('/', $upload_data['full_path']);
						$upload_file_name2 = $arr[count($arr) - 1];
						
						
						$room = array(
							'name'=>$this->input->post('name'),
							'price'=>$this->input->post('price'),
							'size'=>$this->input->post('size'),
							'image'=>$upload_file_name, 
							'image2'=>$upload_file_name2, 
							'number'=>$this->input->post('number'),
							'bed_id'=>$this->input->post('bed_id'),
							'service'=>$this->input->post('service'),
							'content'=>$this->input->post('content'),
							'people_num' => $this->input->post('people_num')
						);
						$id = $this->Room_m->add($room); // 방금 작성한 후기 아이디 리턴
						
						// 변경한 페이지로 옮기기
						redirect('/~team2/admin_room/detail/'.$id);
					}
					
				}
				// 업로드에 실패하면
				else { 
					$this->load->view("admin_room_add", array('data'=>$data));
				}
                
            }
			
			$this->_footer();
		}
		
		
		
		function delete($id) {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
            $this->Room_m->delete($id);

            redirect('/~team2/admin_room');
		}
		
	}
?>