<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
        }
		
		function index() {
			// 로그인 화면 
			$this->load->library('form_validation');
			$this->load->view("admin_login");
		}
		
		function main() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			$this->load->model('Memo_m');
			
			$memos = $this->Memo_m->getAll();

			$this->_header();
			$this->load->view('admin_main', array('memos'=>$memos));
			$this->_footer();
		}
		

		function ajax_calendar_load() {
			
			$this->_ajax_header();

            $this->load->model('Calendar_m');

			$data = $this->Calendar_m->getAll();
		
            $result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}



		function ajax_calendar_add() {
			
			$this->_ajax_header();

            $this->load->model('Calendar_m');
			
			$arr = array(
				'title'=>$_POST['title'],
				'start'=>$_POST['start'],
				'end'=>$_POST['end']
            );
			
			$data = $this->Calendar_m->add($arr);
		}
		
		
		function ajax_calendar_delete() {
			
			$this->_ajax_header();

            $this->load->model('Calendar_m');
			
			$title = $_POST['title'];
			
			$data = $this->Calendar_m->delete($title);
		}
		
		function ajax_calendar_edit() {
			
			$this->_ajax_header();

            $this->load->model('Calendar_m');
			
			$data['title'] = $_POST['title'];
			$data['start'] = $_POST['start'];
			$data['end'] = $_POST['end'];
			
			$data = $this->Calendar_m->edit($data);
		}
		
		
		function _get_memo() {
			
			$data['memo'] = $this->Memo_m->getAll();
			
			return $data;
		}
		
		
		function ajax_memo_add() {
			
			$this->_ajax_header();
			
			$content = $_POST['content'];
			
            $this->load->model('Memo_m');
			$this->Memo_m->add($content);
			
			$data = $this->_get_memo();
			
			$result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		function ajax_memo_edit() {
			
			$this->_ajax_header();
			
			$data['content'] = $_POST['content'];
			$data['id'] = $_POST['memo_id'];
			
            $this->load->model('Memo_m');
			$this->Memo_m->edit($data);
			
			$data = $this->_get_memo();
			
			$result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
		
		
		function ajax_memo_delete() {
			
			$this->_ajax_header();
			
			$id = $_POST['memo_id'];
			
            $this->load->model('Memo_m');
			$this->Memo_m->delete($id);
			
			$data = $this->_get_memo();
			
			$result = json_encode($data, JSON_UNESCAPED_UNICODE);
            echo $result;
		}
	}
?>	