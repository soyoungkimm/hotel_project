<?php
	class Admin_recomment extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
        }
		
		
		function list($comment_id) {
			
			$this->load->model('Recomment_m');
			$this->load->model('User_m');
			
			$data['comment_id'] = $comment_id;
			$data['recomments'] = $this->Recomment_m->getRecommentByCommentId($comment_id);
			$data['users'] = $this->User_m->getRecommentWriterByRecomment($data['recomments']);
			
			
			$this->load->view("admin_header");
			$this->load->view('admin_recomment_list', array('data'=>$data));
			$this->load->view("admin_footer");
			
		}
		
		
		
		function detail($id) {
			$this->load->model('Comment_m');
			$this->load->model('User_m');
			$this->load->model('Recomment_m');
			
			$data['recomment'] = $this->Recomment_m->getRecommentById($id);
			$data['comment'] = $this->Comment_m->getCommentById($data['recomment']->comment_id);
			$data['user'] = $this->User_m->getUserByUserId($data['recomment']->user_id);
			
			
			$this->load->view("admin_header");
			$this->load->view('admin_recomment_detail', array('data'=>$data));
			$this->load->view("admin_footer");
		}
		
		
		function add($comment_id) {
			
			$this->load->model('Recomment_m');
			$this->load->model('User_m');
			$this->load->view("admin_header");
			
			$data['comment_id'] = $comment_id;
			$data['users'] = $this->User_m->getUserIdName();
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('content', '내용', 'required');
			
			
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_recomment_add', array('data'=>$data));
            }
            else { 
			
				$recomment = array(
					'comment_id'=>$comment_id,
					'user_id'=>$this->input->post('user_id'),
					'content'=>$this->input->post('content'),
					'writeday'=>$this->input->post('writeday')
				);
				$new_id = $this->Recomment_m->admin_add($recomment); 
				
				
                redirect('/~team2/admin_recomment/detail/'.$new_id);
            }
			
			
			$this->load->view("admin_footer");
		}
		
		
		
		function edit($id) {
			$this->load->model('Recomment_m');
			$this->load->model('Comment_m');
			$this->load->model('Review_m');
			$this->load->model('User_m');
			
			$this->load->view("admin_header");
			
			$data['recomment'] = $this->Recomment_m->getRecommentById($id);
			$data['comments'] = $this->Comment_m->getCommentIdContent();
			$data['users'] = $this->User_m->getUserIdName();
			
			
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('content', '내용', 'required');
			


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin_recomment_edit', array('data'=>$data));
            }
            else { 
			
				$recomment = array(
					'comment_id'=>$this->input->post('comment_id'),
					'user_id'=>$this->input->post('user_id'),
					'content'=>$this->input->post('content'),
					'writeday'=>$this->input->post('writeday'),
					'recomment_id'=>$id
				);
				$this->Recomment_m->admin_edit($recomment); 
					
					
                redirect('/~team2/admin_recomment/detail/'.$id);
            }
			
			
			$this->load->view("admin_footer");
		}
		
		
		function delete($id) {
			$this->load->model('Recomment_m');
            $this->Recomment_m->deleteRecomment($id);

            redirect('/~team2/admin_comment');
		}
		
		
		
		
	}		
		
?>