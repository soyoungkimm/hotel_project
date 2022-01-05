<?
   class Event extends CI_Controller 
	{       // Event클래스 선언
        function __construct()                 // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
            $this->load->model("Event_m");    // 모델 Event_m 연결
			$this->load->helper(array("url", "date"));    //  helper 선언
			$this->load->library("pagination");
			date_default_timezone_set("Asia/Seoul");         // 지역설정
		}

        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                // list 함수 호출
        }

        public function lists()
        {
			// , array('active'=>"event")넣은 이유 : 상단 메뉴에서 event 밑에 파란 밑줄 만들려고 넣었습니다
           $this->load->view("header", array('active'=>"event"));					 // 상단출력(메뉴)
		   $this->load->view("event_list");	
           $this->load->view("footer");					 // 하단 출력 
        }

		public function view()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			$id = array_key_exists("id",$uri_array) ? urldecode($uri_array["id"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;

			$data["page"] = $page;
			$data["text1"]=$text1;	
			$data["row"] = $this->Event_m->getrow($id);
			$this->load->view("header");                    
			$this->load->view("event_view",$data);           
			$this->load->view("footer");                     
		}

		public function del() //삭제 함수
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ?"/text1/".urldecode($uri_array["text1"]) : "" ;
			$id = array_key_exists("id",$uri_array) ? urldecode($uri_array["id"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;


			$this->Event_m->deleterow($id);
			redirect("/~team2/event/lists/".$text1.$page);           // 목록화면으로 돌아가기
		}
		
		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ?"/text1/".urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

				
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			
			if ( $this->form_validation->run()==FALSE )
				{
					$this->load->view("header");
					$this->load->view("event_add");    // 입력화면 표시
					$this->load->view("footer");
				}
			else              // 입력화면의 저장버튼 클릭한 경우
				{
			
					$data=array( 
						"title"=> $this->input->post("title",TRUE),
						"color"=> $this->input->post("color",TRUE),
						"start"=> $this->input->post("start",TRUE),
						"end"=> $this->input->post("end",TRUE)
					);
					$this->Event_m->insertrow($data); 

					redirect("/~team2/event/lists/".$text1.$page);           // 목록화면으로 돌아가기
				}
		}

		public function edit() //수정
		{	
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ?"/text1/".urldecode($uri_array["text1"]) : "" ;
			$id = array_key_exists("id",$uri_array) ? urldecode($uri_array["id"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","이름","required|max_length[20]");
			
			if ( $this->form_validation->run()==FALSE )
				{
					$this->load->view("header");
					$data["row"] = $this->Event_m->getrow($id);
					$this->load->view("event_edit",$data);    // 입력화면 표시
					$this->load->view("footer");
				}
			else              // 입력화면의 저장버튼 클릭한 경우
				{
			

					$data=array( 
						"title"=> $this->input->post("title",TRUE),
						"color"=> $this->input->post("color",TRUE),
						"start"=> $this->input->post("start",TRUE),
						"end"=> $this->input->post("end",TRUE)
				
					);
					$result = $this->Event_m->updaterow($data,$id); 
					redirect("/~team2/event/lists/".$text1.$page);           // 목록화면으로 돌아가기
				}
		}
    }
?>
