<?php
 class Login extends CI_Controller 
	{       // Login클래스 선언
        function __construct()                   // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();			 // 데이터베이스 연결	
			$this->load->helper('url');
		}

  

        public function check()
        {
			
			$this->load->model("Login_m");		 // 모델Login_m 연결
				
			$uid=$this->input->post("uid",TRUE);
			$pwd=$this->input->post("pwd",TRUE);

			$row=$this->Login_m->getrow($uid,$pwd);
			if($row)
			{
				$data=array(
					"id" =>$row->id,
					"division" =>$row->division,
					"uid" =>$row->uid,
					"name"=>$row->name
				);
				$this->session->set_userdata($data);				 // 하단 출력 
			    redirect("/~team2/");
			}	
			// 로그인 실패			
			else {
				// 로그인에 실패하면 메인화면으로 돌아가서 다시 모달창을 띄움
				redirect("/~team2/main?loginerror");
			}
		}	
		
		
		
		public function logout()
		{
			$data = array('uid', 'id', 'name', 'division');
			$this->session->unset_userdata($data);
			redirect("/~team2/");
			$this->load->view("header");					 // 상단출력(메뉴)
			$this->load->view("footer");					 // 하단 출력 

		}
	}
?>			