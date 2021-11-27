<?php
	class Admin_review extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
        }	
		
		function index() {
			
			$this->load->model('Review_m');
			$this->load->model('User_m');
			$this->load->model('Review_category_m');
			
			$data['reviews'] = $this->Review_m->getReviewAll();
			$data['users'] = $this->User_m->getUserByReview($data['reviews']);
			$data['categorys'] = $this->Review_category_m->getCategory();
			
			$this->load->view("admin_header");
			$this->load->view('admin_review_list', array('data'=>$data));
			$this->load->view("admin_footer");
		}
		
		
		function detail($id) {
			$this->load->model('Review_m');
			$this->load->model('User_m');
			$this->load->model('Review_category_m');
			
			$data['review'] = $this->Review_m->getReviewById($id);
			$data['user'] = $this->User_m->getUserByUserId($data['review']->user_id);
			$data['category'] = $this->Review_category_m->getCategory();
			
			$this->load->view("admin_header");
			$this->load->view('admin_review_detail', array('data'=>$data));
			$this->load->view("admin_footer");
		}
		
		
		function edit($id) {
			$this->load->view("admin_header");
			
			$this->load->model('Review_m');
			$this->load->model('User_m');
			$this->load->model('Review_category_m');
			
			
			$data['review'] = $this->Review_m->getReviewById($id);
			$data['users'] = $this->User_m->getUser();
			$data['category'] = $this->Review_category_m->getCategory();
			
			
			
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('title', '제목', 'required|max_length[100]');
			$this->form_validation->set_rules('review_content', '내용', 'required');
			


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_review_edit', array('data'=>$data));
            }
            else {  
				
				// image가 변경됬을 때
                if ($this->input->post('upload_file_name') != null  && $this->input->post('upload_file_name') != 'undefined') {
                    
                    // 파일을 저장할 경로
                    $config['upload_path'] = 'my/img/review'; 
                    // 확장자가 .gif, .jpg, .png인 파일만 업로드 허용
                    $config['allowed_types'] = 'gif|jpg|png';
                    // 허용되는 파일의 최대 사이즈
                    $config['max_size'] = '10000';
                    // 허용되는 최대 가로 길이
                    $config['max_width']  = '1024';
                    // 허용되는 최대 세로 길이(높이)
                    $config['max_height']  = '1024';
                    // 같은 이름의 파일이 있으면 덮어쓰기를 할건지
                    $config['overwrite'] = FALSE;
                    // upload 라이브러리 로드
                    $this->load->library('upload', $config);
					
					
					// 업로드에 성공하면
                    if($this->upload->do_upload("upload_file")) { 
						
                        // image file 이름 겹치는 것 방지
                        $upload_data = $this->upload->data();
                        $arr = explode('/', $upload_data['full_path']);
                        $upload_file_name = $arr[count($arr) - 1];
                

                        $review = array(
                            'title'=>$this->input->post('title'),
							'user_id'=>$this->input->post('user_id'),
                            'content'=>$this->input->post('review_content'),
                            'image'=>$upload_file_name, 
                            'category_id'=>$this->input->post('category'),
							'review_id'=>$id,
							'writeday'=>$this->input->post('writeday'),
							'star'=>$this->input->post('star')
                        );
                        $this->Review_m->admin_edit($review); // 방금 작성한 후기 아이디 리턴

                        // 변경한 페이지로 옮기기
                        redirect('/~team2/admin_review/detail/'.$id);
                    }
					// 업로드에 실패하면
                    else { 
                        //$error = array('error' =>  $this->upload->display_errors());
                        //var_dump($error);
                        $this->load->view("review_edit", array('data'=>$data));
                    }
                }
                // image 변경되지 않았을 때
                else { 
                    $review = array(
                            'title'=>$this->input->post('title'),
							'user_id'=>$this->input->post('user_id'),
                            'content'=>$this->input->post('review_content'),
                            'image'=>null, 
                            'category_id'=>$this->input->post('category'),
							'review_id'=>$id,
							'writeday'=>$this->input->post('writeday'),
							'star'=>$this->input->post('star')
                    );
					$this->Review_m->admin_edit($review); 

                    
					
                    // 사용자가 변경한 후기 페이지로 옮기기
                    redirect('/~team2/admin_review/detail/'.$id);
                }
                
            }
			
			
			
			$this->load->view("admin_footer");
		}
		
		
		
		
		function add() {
			$this->load->view("admin_header");
			
			$this->load->model('User_m');
			$this->load->model('Review_category_m');
			$this->load->model('Review_m');
			
			
			$data['category'] = $this->Review_category_m->getCategory();
			$data['users'] = $this->User_m->getUser();
			
			
			
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('title', '제목', 'required|max_length[100]');
			$this->form_validation->set_rules('review_content', '내용', 'required');
			
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_review_add', array('data'=>$data));
            }
            else {  
				
				// image가 변경됬을 때
                if ($this->input->post('upload_file_name') != null  && $this->input->post('upload_file_name') != 'undefined') {
                    
                    // 파일을 저장할 경로
                    $config['upload_path'] = 'my/img/review'; 
                    // 확장자가 .gif, .jpg, .png인 파일만 업로드 허용
                    $config['allowed_types'] = 'gif|jpg|png';
                    // 허용되는 파일의 최대 사이즈
                    $config['max_size'] = '10000';
                    // 허용되는 최대 가로 길이
                    $config['max_width']  = '1024';
                    // 허용되는 최대 세로 길이(높이)
                    $config['max_height']  = '1024';
                    // 같은 이름의 파일이 있으면 덮어쓰기를 할건지
                    $config['overwrite'] = FALSE;
                    // upload 라이브러리 로드
                    $this->load->library('upload', $config);
					
					
					// 업로드에 성공하면
                    if($this->upload->do_upload("upload_file")) { 
						
                        // image file 이름 겹치는 것 방지
                        $upload_data = $this->upload->data();
                        $arr = explode('/', $upload_data['full_path']);
                        $upload_file_name = $arr[count($arr) - 1];
                

                        $review = array(
							'user_id'=>$this->input->post('user_id'),
                            'title'=>$this->input->post('title'),
                            'content'=>$this->input->post('review_content'),
                            'image'=>$upload_file_name, 
                            'category_id'=>$this->input->post('category'),
							'writeday'=>$this->input->post('writeday'),
							'star'=>$this->input->post('star')
                        );
                        $id = $this->Review_m->admin_add($review); // 방금 작성한 후기 아이디 리턴

                        // 변경한 페이지로 옮기기
                        redirect('/~team2/admin_review/detail/'.$id);
                    }
					// 업로드에 실패하면
                    else { 
                        //$error = array('error' =>  $this->upload->display_errors());
                        //var_dump($error);
                        $this->load->view("admin_review_add", array('data'=>$data));
                    }
                }
                // image 변경되지 않았을 때
                else { 
                    $review = array(
							'user_id'=>$this->input->post('user_id'),
                            'title'=>$this->input->post('title'),
                            'content'=>$this->input->post('review_content'),
                            'image'=>null, 
                            'category_id'=>$this->input->post('category'),
							'writeday'=>$this->input->post('writeday'),
							'star'=>$this->input->post('star')
                    );
					$id = $this->Review_m->admin_add($review); 

                    
					
                    // 사용자가 변경한 후기 페이지로 옮기기
                    redirect('/~team2/admin_review/detail/'.$id);
                }
                
            }
			
			
			
			$this->load->view("admin_footer");
		}
		
		
		
		
		function delete($id) {
			$this->load->model('Review_m');
            $this->Review_m->deleteReview($id);

            redirect('/~team2/admin_review');
		}
	}
?>