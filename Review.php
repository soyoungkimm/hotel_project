<?php
	class Review extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
        }
		
		public function index() { 
			$this->load->model('Review_m');
			$data['reviews'] = $this->Review_m->getReview();
			
			$this->load->view("header");
			$this->load->view("review", array('data'=>$data));
			$this->load->view("footer");
		}

		public function detail($id) {
			
			$this->load->model('Review_m');
			$this->load->model('User_m');
			$this->load->model('Comment_m');
			$this->load->model('Recomment_m');
			
			$data['review'] = $this->Review_m->getReviewById($id);
			
			
			$data['user'] = $this->User_m->getUserByUserId($data['review']->user_id);
			
			
			// 댓글
            $data['comments'] = $this->Comment_m->getCommentByReviewId($id);
            if ($data['comments'] != null) {
                $data['comment_users'] = $this->User_m->getCommentWriterByComment($data['comments']);
            }
            
			
            // 대댓글
            if ($data['comments'] != null) {
                $data['recomments'] = $this->Recomment_m->getRecommentByComment($data['comments']);
                if($data['recomments'] != null) {
					$data['recomment_users'] = $this->User_m->getRecommentWriterByRecomment($data['recomments']);
				}
            }
			
			
			
			$this->load->view("header");
			$this->load->view("review_detail", array('data' => $data));
			$this->load->view("footer");
		}
		
		
		
		
		function ajax_comment() {
			header("Content-Type: text/html; charset=KS_C_5601-1987");
            header("Cache-Control:no-cache");
            header("Pragma:no-cache");
            header("Content-Type:application/json");

            $this->load->model('Comment_m');
            $this->load->model('User_m');
            $this->load->model('Recomment_m');


            $review_id = $_POST['review_id'];
            $content = $_POST['content'];

            

            
            $this->Comment_m->add($review_id, $content);


            $data['comments'] = $this->Comment_m->getCommentByReviewId($review_id);
            if($data['comments'] != null) {
                $data['comment_users'] = $this->User_m->getCommentWriterByComment($data['comments']);
                $data['recomments'] = $this->Recomment_m->getRecommentByComment($data['comments']);
                if ($data['recomments'] != null) {
                    $data['recomment_users'] = $this->User_m->getRecommentWriterByRecomment($data['recomments']);
                }
                
            }



            $result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		function ajax_recomment() {
			//header("Content-Type: text/html; charset=KS_C_5601-1987");
            header("Cache-Control:no-cache");
            header("Pragma:no-cache");
            header("Content-Type:application/json");

            $this->load->model('User_m');
            $this->load->model('Recomment_m');
            $this->load->model('Comment_m');


            $review_id = $_POST['review_id'];
            $comment_id = $_POST['comment_id'];
            $content = $_POST['content'];
			
			

            
            $this->Recomment_m->add($content, $comment_id);


            
            $data['comments'] = $this->Comment_m->getCommentByReviewId($review_id);
            if($data['comments'] != null) {
                $data['comment_users'] = $this->User_m->getCommentWriterByComment($data['comments']);
                $data['recomments'] = $this->Recomment_m->getRecommentByComment($data['comments']);
                if ($data['recomments'] != null) {
                    $data['recomment_users'] = $this->User_m->getRecommentWriterByRecomment($data['recomments']);
                }
            }
			
			
			

            $result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
	}

?>