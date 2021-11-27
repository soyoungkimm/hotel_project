<?php
	class Admin_comment extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
        }	
	
	
	
		function index() {
			
			$this->load->model('Comment_m');
			$this->load->model('Recomment_m');
			$this->load->model('User_m');
			$this->load->model('Review_m');
			
			$data['comments'] = $this->Comment_m->getCommentAll();
			$data['users'] = $this->User_m->getCommentWriterByComment($data['comments']);
			$data['recomments'] = $this->Recomment_m->getRecommentByComment($data['comments']);
			$data['reviews'] = $this->Review_m->getReviewByComment($data['comments']);
			
			
			$this->load->view("admin_header");
			$this->load->view('admin_comment_list', array('data'=>$data));
			$this->load->view("admin_footer");
		}
		
		
		function detail($id) {
			$this->load->model('Comment_m');
			$this->load->model('Review_m');
			$this->load->model('User_m');
			$this->load->model('Recomment_m');
			
			$data['comment'] = $this->Comment_m->getCommentById($id);
			$data['user'] = $this->User_m->getUserByUserId($data['comment']->user_id);
			$data['review'] = $this->Review_m->getReviewById($data['comment']->review_id);
			
			$this->load->view("admin_header");
			$this->load->view('admin_comment_detail', array('data'=>$data));
			$this->load->view("admin_footer");
		}
		
		
		function edit($id) {
			
			$this->load->model('Comment_m');
			$this->load->model('Review_m');
			$this->load->model('User_m');
			
			$this->load->view("admin_header");
			
			$data['comment'] = $this->Comment_m->getCommentById($id);
			$data['users'] = $this->User_m->getUserIdName();
			$data['reviews'] = $this->Review_m->getReviewIdTitle();
			
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('content', '내용', 'required');
			


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_comment_edit', array('data'=>$data));
            }
            else { 
			
				$comment = array(
					'user_id'=>$this->input->post('user_id'),
					'review_id'=>$this->input->post('review_id'),
					'content'=>$this->input->post('content'),
					'writeday'=>$this->input->post('writeday'),
					'comment_id'=>$id
				);
				$this->Comment_m->admin_edit($comment); 
					
                redirect('/~team2/admin_comment/detail/'.$id);
            }
			
			
			
			$this->load->view("admin_footer");
		}
		
		
		function add() {
			
			$this->load->model('Comment_m');
			$this->load->model('Review_m');
			$this->load->model('User_m');
			
			$this->load->view("admin_header");
			
			$data['users'] = $this->User_m->getUserIdName();
			$data['reviews'] = $this->Review_m->getReviewIdTitle();
			
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('content', '내용', 'required');
			
			

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_comment_add', array('data'=>$data));
            }
            else { 
			
				$comment = array(
					'user_id'=>$this->input->post('user_id'),
					'review_id'=>$this->input->post('review_id'),
					'content'=>$this->input->post('content'),
					'writeday'=>$this->input->post('writeday')
				);
				$id = $this->Comment_m->admin_add($comment); 
					
                redirect('/~team2/admin_comment/detail/'.$id);
            }
			
			
			
			$this->load->view("admin_footer");
		}
	}
	
?>