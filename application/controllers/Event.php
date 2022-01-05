<?
   class Event extends CI_Controller 
	{       // EventŬ���� ����
        function __construct()                 // Ŭ���������� �� �ʱ⼳��
        {
            parent::__construct();
            $this->load->database();           // �����ͺ��̽� ����
            $this->load->model("Event_m");    // �� Event_m ����
			$this->load->helper(array("url", "date"));    //  helper ����
			$this->load->library("pagination");
			date_default_timezone_set("Asia/Seoul");         // ��������
		}

        public function index()                            // ���� ���� ����Ǵ� �Լ�
        {
            $this->lists();                                // list �Լ� ȣ��
        }

        public function lists()
        {
			// , array('active'=>"event")���� ���� : ��� �޴����� event �ؿ� �Ķ� ���� ������� �־����ϴ�
           $this->load->view("header", array('active'=>"event"));					 // ������(�޴�)
		   $this->load->view("event_list");	
           $this->load->view("footer");					 // �ϴ� ��� 
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

		public function del() //���� �Լ�
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ?"/text1/".urldecode($uri_array["text1"]) : "" ;
			$id = array_key_exists("id",$uri_array) ? urldecode($uri_array["id"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;


			$this->Event_m->deleterow($id);
			redirect("/~team2/event/lists/".$text1.$page);           // ���ȭ������ ���ư���
		}
		
		public function add()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ?"/text1/".urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

				
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","�̸�","required|max_length[20]");
			
			if ( $this->form_validation->run()==FALSE )
				{
					$this->load->view("header");
					$this->load->view("event_add");    // �Է�ȭ�� ǥ��
					$this->load->view("footer");
				}
			else              // �Է�ȭ���� �����ư Ŭ���� ���
				{
			
					$data=array( 
						"title"=> $this->input->post("title",TRUE),
						"color"=> $this->input->post("color",TRUE),
						"start"=> $this->input->post("start",TRUE),
						"end"=> $this->input->post("end",TRUE)
					);
					$this->Event_m->insertrow($data); 

					redirect("/~team2/event/lists/".$text1.$page);           // ���ȭ������ ���ư���
				}
		}

		public function edit() //����
		{	
			$uri_array=$this->uri->uri_to_assoc(3);
			$text1 = array_key_exists("text1",$uri_array) ?"/text1/".urldecode($uri_array["text1"]) : "" ;
			$id = array_key_exists("id",$uri_array) ? urldecode($uri_array["id"]) : "" ;
			$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","�̸�","required|max_length[20]");
			
			if ( $this->form_validation->run()==FALSE )
				{
					$this->load->view("header");
					$data["row"] = $this->Event_m->getrow($id);
					$this->load->view("event_edit",$data);    // �Է�ȭ�� ǥ��
					$this->load->view("footer");
				}
			else              // �Է�ȭ���� �����ư Ŭ���� ���
				{
			

					$data=array( 
						"title"=> $this->input->post("title",TRUE),
						"color"=> $this->input->post("color",TRUE),
						"start"=> $this->input->post("start",TRUE),
						"end"=> $this->input->post("end",TRUE)
				
					);
					$result = $this->Event_m->updaterow($data,$id); 
					redirect("/~team2/event/lists/".$text1.$page);           // ���ȭ������ ���ư���
				}
		}
    }
?>
