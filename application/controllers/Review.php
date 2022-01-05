<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Review extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
            $this->load->model('Review_m');
        }

        function _footer() {
            $this->load->view("footer");
        }

        function _header() {
            $this->load->model('Review_category_m');
            $this->load->view("header", array('active'=>"review"));
        }

        function _ajax_header() {
            header("Content-Type: text/html; charset=KS_C_5601-1987");
            header("Cache-Control:no-cache");
            header("Pragma:no-cache");
            header("Content-Type:application/json");
        }

        function _get_comments_and_users($review_id) {

            $data['comments'] = $this->Comment_m->getCommentByReviewId($review_id);
            if($data['comments'] != null) {
                $data['comment_users'] = $this->User_m->getCommentWriterByComment($data['comments']);
                $data['recomments'] = $this->Recomment_m->getRecommentByComment($data['comments']);
                if ($data['recomments'] != null) {
                    $data['recomment_users'] = $this->User_m->getRecommentWriterByRecomment($data['recomments']);
                }
            }

            return $data;
        }

        function _upload_config() {
            // 파일을 저장할 경로
            $config['upload_path'] = 'my/img/review'; 
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

        function _get_comments_num($review_id) {

            $data['comments_num'] = $this->Comment_m->getCommentCount($review_id);
            if($data['comments_num'] != 0) {
				$comments = $this->Comment_m->getCommentByReviewId($review_id);
                $data['recomments_num'] = $this->Recomment_m->getRecommentCount($comments);
            }

            return $data;
        }
		
		public function index() { 
			
			$this->_header();
			
			// 페이지에서 보일 후기 개수
			$number = 9; 
			
			// 처음엔 최신순으로 정렬
			$data['reviews'] = $this->Review_m->getReview($number, "recent"); 
			
			$data['categorys'] = $this->Review_category_m->getCategory();
			$data['reviews_num'] = $this->Review_m->getReviewAllCount();
			
			
			$this->load->view("review", array('data'=>$data));
			$this->_footer();
		}


		public function detail($id) {
			
            $this->_header();
			$this->load->model('User_m');
			$this->load->model('Comment_m');
			$this->load->model('Recomment_m');
			

            $data = $this->_get_comments_and_users($id);
			$data['review'] = $this->Review_m->getReviewById($id);
			$data['user'] = $this->User_m->getUserByUserId($data['review']->user_id);
			$data['category'] = $this->Review_category_m->getCategoryByCategoryId($data['review']->category_id);
			
			
			$this->load->view("review_detail", array('data' => $data));
			$this->_footer();
		}
		
		
		function ajax_comment() {

			$this->_ajax_header();


            $this->load->model('Comment_m');
            $this->load->model('User_m');
            $this->load->model('Recomment_m');


            $review_id = $_POST['review_id'];
            $content = $_POST['content'];
			$user_id = $this->session->userdata('id');
            

            $this->Comment_m->add($review_id, $content, $user_id);

            $data = $this->_get_comments_and_users($review_id);

            $result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		function ajax_recomment() {

			$this->_ajax_header();

            $this->load->model('User_m');
            $this->load->model('Recomment_m');
            $this->load->model('Comment_m');


            $review_id = $_POST['review_id'];
            $comment_id = $_POST['comment_id'];
            $content = $_POST['content'];
			$user_id = $this->session->userdata('id');
			

            $this->Recomment_m->add($content, $comment_id, $user_id);
			
            $data = $this->_get_comments_and_users($review_id);
			
            $result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		function add() {

			$this->_header();
			$user_id = $this->session->userdata('id');
            
            $data['categorys'] = $this->Review_category_m->getCategory();
			
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', '제목', 'required|max_length[100]');
			$this->form_validation->set_rules('content', '내용', 'required');
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view("review_add", array('data'=>$data));
            }
            else {  
                if ($this->input->post('upload_file_name') != null  && $this->input->post('upload_file_name') != 'undefined') {
                    
                    $this->_upload_config();
					
					// 업로드에 성공하면
                    if($this->upload->do_upload("upload_file")) { 
					
                        // image file 이름 겹치는 것 방지
                        $upload_data = $this->upload->data();
                        $arr = explode('/', $upload_data['full_path']);
                        $upload_file_name = $arr[count($arr) - 1];
                
                    }
					// 업로드에 실패하면
                    else { 
                        $this->load->view("review_add", array('data'=>$data));
                    }
                }
                // image 없을 때
                else { 
                    $upload_file_name = null;
                }


                $review = array(
                    'user_id'=>$user_id,
                    'title'=>$this->input->post('title'),
                    'content'=>$this->input->post('content'),
                    'image'=>$upload_file_name, 
                    'category_id'=>$this->input->post('category_id'),
                    'star' => $this->input->post('star')
                );
                
                $review_id = $this->Review_m->add($review); // 방금 작성한 후기 아이디 리턴

                // 사용자가 작성한 후기 페이지로 옮기기
                redirect('/~team2/review/detail/'.$review_id);
                
            }
            
			$this->_footer();
		}
		
		
		function delete($id) {

            $this->load->model('Comment_m');
            $this->load->model('Recomment_m');

            // 후기 삭제
            $this->Review_m->deleteReview($id);

            // 댓글도 삭제
            $this->Comment_m->deleteCommentByReviewId($id);

            // 대댓글도 삭제
            $comments = $this->Comment_m->getCommentIdByReviewId($id);
            if ($comments != null) {
                $this->Recomment_m->deleteRecommentByCommentId($comments);
            }

            redirect('/~team2/review');
		}
		
		
		function edit($id) {

			$this->_header();
			
            $data['review'] = $this->Review_m->getReviewById($id);
            $data['categorys'] = $this->Review_category_m->getCategory();
			

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', '제목', 'required|max_length[100]');
			$this->form_validation->set_rules('content', '내용', 'required');
		

            if ($this->form_validation->run() == FALSE) {
                $this->load->view("review_edit", array('data'=>$data));
            }
            else {  
			
				// image가 변경됬을 때
                if ($this->input->post('upload_file_name') != null  && $this->input->post('upload_file_name') != 'undefined') {
                    
                    $this->_upload_config();
					
					
					// 업로드에 성공하면
                    if($this->upload->do_upload("upload_file")) { 
					
                        // image file 이름 겹치는 것 방지
                        $upload_data = $this->upload->data();
                        $arr = explode('/', $upload_data['full_path']);
                        $upload_file_name = $arr[count($arr) - 1];
                
                    }
					// 업로드에 실패하면
                    else { 
                        $this->load->view("review_edit", array('data'=>$data));
                    }
                }
                // image 변경되지 않았을 때
                else { 
                    $upload_file_name = null;
                }

                $review = array(
                    'title'=>$this->input->post('title'),
                    'content'=>$this->input->post('content'),
                    'image'=>$upload_file_name, 
                    'category_id'=>$this->input->post('category_id'),
                    'review_id'=>$id,
                    'star' => $this->input->post('star')
                );
                $this->Review_m->edit($review);

                // 사용자가 변경한 후기 페이지로 옮기기
                redirect('/~team2/review/detail/'.$id);
                
            }
            
			$this->_footer();
		}
		
		
		public function ck_upload_run() {

            $this->_upload_config();

            if($this->upload->do_upload("upload")) { // 업로드에 성공하면

                $upload_file = $this->upload->data();
                $file_name = $upload_file['file_name'];
                $file_location = "/~team2/my/img/review/".$file_name;
                
                echo '{"filename" : "'.$file_name.'", "uploaded" : 1, "url":"'.$file_location.'"}';
            }
            else { // 업로드에 실패하면
                echo '{"uploaded": 0, "error": {"message": "파일 업로드에 실패했습니다.'.$this->upload->display_errors('','').'"}}';
            }

        }
		
		
		public function ajax_edit_comment() {

			$this->_ajax_header();

            $this->load->model('Comment_m');
            $this->load->model('User_m');
            

            $comment_id = $_POST['comment_id'];
            $content = $_POST['content'];

            $this->Comment_m->edit($comment_id, $content);
			
			$data['comment'] = $this->Comment_m->getCommentById($comment_id);
			$data['comment_user'] = $this->User_m->getUserByUserId($data['comment']->user_id);
			
			
            $result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		public function ajax_edit_recomment() {

			$this->_ajax_header();

            $this->load->model('Recomment_m');
            $this->load->model('User_m');
            

            $recomment_id = $_POST['recomment_id'];
            $content = $_POST['content'];
            
            $this->Recomment_m->edit($recomment_id, $content);
			
			$data['recomment'] = $this->Recomment_m->getRecommentById($recomment_id);
			$data['recomment_user'] = $this->User_m->getUserByUserId($data['recomment']->user_id);
			
			
            $result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		public function ajax_delete_comment() {

			$this->_ajax_header();

            $this->load->model('Comment_m');
			$this->load->model('Recomment_m');


            $comment_id = $_POST['comment_id'];
			$review_id = $_POST['review_id'];
			
			
            $this->Comment_m->deleteComment($comment_id);
			
            $data = $this->_get_comments_num($review_id);
			
			$result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		public function ajax_delete_recomment() {

			$this->_ajax_header();

            $this->load->model('Comment_m');
			$this->load->model('Recomment_m');

            $recomment_id = $_POST['recomment_id'];
			$review_id = $_POST['review_id'];
			
			
            $this->Recomment_m->deleteRecomment($recomment_id);
			
            $data = $this->_get_comments_num($review_id);
			
			$result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		public function ajax_review() {

			$this->_ajax_header();
			$this->load->model('Review_category_m');
			
			
			// 페이지에서 보일 후기 개수
			$number = $_POST['number'];
			$sort = $_POST['sort'];
			
			
			$data['reviews'] = $this->Review_m->getReview($number, $sort);
			$data['categorys'] = $this->Review_category_m->getCategory();
			$data['total_review_num'] = $this->Review_m->getReviewCount($number);
			
			
			$result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
	}

?>