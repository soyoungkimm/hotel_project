 <?php
 defined('BASEPATH') OR exit('No direct script access allowed'); 
 class Register extends CI_Controller 
	{       // Event클래스 선언
        function __construct()                 // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
			$this->load->model("Register_m");    // 모델 Event_m 연결
			$this->load->helper('url');
		}

        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->register();                                // list 함수 호출
        }

        public function register()
        {
			$this->load->library("form_validation");

			$this->form_validation->set_rules("uid","아이디","required|max_length[20]");
			$this->form_validation->set_rules("pwd","비밀번호","required|max_length[20]");
			$this->form_validation->set_rules("phone","전화번호","required|max_length[11]");
			$this->form_validation->set_rules("email","이메일","required|max_length[20]|valid_email");
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			$this->form_validation->set_rules("check1","개인정보 수집 동의","required");
			$this->form_validation->set_rules("check2","개인정보 제3자 제공 동의","required");
			
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view("header");					 // 상단출력(메뉴)
				$this->load->view("register_view");				 // Event_list에 자료전달
				$this->load->view("footer");					 // 하단 출력 
			}
			else
			{
				$data = array(
					'uid'	=> $this->input->post("uid",TRUE),	
					'pwd'	=> $this->input->post("pwd",TRUE),	
					'name'	=> $this->input->post("name",TRUE),	
					'phone'	=> $this->input->post("phone",TRUE),	
					'email'	=> $this->input->post("email",TRUE)
				);
				$result = $this->Register_m->insertrow($data);
				redirect("/~team2/");  
			}

			
        }

		

    }
?>