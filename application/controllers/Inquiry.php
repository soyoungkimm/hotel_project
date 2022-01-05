<?
	class Inquiry extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();  
			$this->load->model("inquiry_m");  
			$this->load->helper(array("url","date"));
			date_default_timezone_set("Asia/Seoul");      
        }

		public function index()
        {
            $this->add();
        }
		
		public function add() 
		{	
			$this->load->library("form_validation");
			$this->form_validation->set_rules("type",'��������',"required");
			$this->form_validation->set_rules("title",'����',"required");
			$this->form_validation->set_rules("content",'����',"required");
			$this->form_validation->set_rules("name",'����',"required");
			$this->form_validation->set_rules("email",'�̸���',"required");
			$this->form_validation->set_rules("tel1",'��ȭ��ȣ',"required");
			$this->form_validation->set_rules("tel2",'��ȭ��ȣ',"required");
			$this->form_validation->set_rules("tel3",'��ȭ��ȣ',"required");


			if($this->form_validation->run()==FALSE)
			{
				$data["list"] = $this->inquiry_m->getlist_type();
				
				// , array('active'=>"inquiry")���� ���� : ��� �޴����� Q&A �ؿ� �Ķ� ���� ������� �־����ϴ�
				$this->load->view("header", array('active'=>"inquiry"));
				$this->load->view("inquiry.php",$data);    // �Է�ȭ�� ǥ��
				$this->load->view("footer");
			}
			else              // �Է�ȭ���� �����ư Ŭ���� ���
			{
				$tel1=$this->input->post("tel1",TRUE);
				$tel2=$this->input->post("tel2",TRUE);
				$tel3=$this->input->post("tel3",TRUE);
				$tel=sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);

				$data=array(
					"detail_id" => $this->input->post("type",TRUE),
					"user_id" => $this->input->post("user_id",TRUE),
					"title" => $this->input->post("title",TRUE),
					"content" => $this->input->post("content",TRUE),
					"name" => $this->input->post("name",TRUE),
					"email" => $this->input->post("email",TRUE),
					"phone" => $tel,
					"state" => 0,
					"writeday" => $this->input->post("writeday",TRUE)
				);

				$result = $this->inquiry_m->insertrow($data);
				
				// , array('active'=>"inquiry")���� ���� : ��� �޴����� Q&A �ؿ� �Ķ� ���� ������� �־����ϴ�
				$this->load->view("header.php", array('active'=>"inquiry"));
				$this->load->view("inquiry_complete.php");
				$this->load->view("footer.php");	
			}
		}

		public function lists()
        {
            $data["list"]=$this->inquiry_m->getlist();
			$this->load->view("header");                 
            $this->load->view("inquiry_list",$data);		
            $this->load->view("footer");                
        }


		public function answer()
        {
			$this->load->library("form_validation");
			$this->form_validation->set_rules("answer_title",'����',"required");
			$this->form_validation->set_rules("answer_content",'����',"required");

			$uri_array=$this->uri->uri_to_assoc(3);
			$id = array_key_exists("id",$uri_array) ? $uri_array["id"] : "" ;
			$state = array_key_exists("state",$uri_array) ? $uri_array["state"] : "" ;	
			

			if($state==0) {
				if($this->form_validation->run()==FALSE)
				{
					$data["row"] = $this->inquiry_m->getrow($id);   

					$this->load->view("header");                 
					$this->load->view("inquiry_non_answer",$data);         
					$this->load->view("footer");     

				}
				else              // ���� ��ư Ŭ���� ���
				{
					$data=array(
						"inquiry_id" => $this->input->post("inquiry_id",TRUE),
						"title" => $this->input->post("answer_title",TRUE),
						"content" => $this->input->post("answer_content",TRUE),
						"writeday" => $this->input->post("writeday",TRUE)
					);
					
					$result = $this->inquiry_m->insertrow_answer($data);
					
					redirect('/~team2/inquiry/answer_complete/'.$id);
				}	
			}
			else {
				if($this->form_validation->run()==FALSE)
				{
					$data["row"] = $this->inquiry_m->getrow($id);   
					$data["row1"] = $this->inquiry_m->getrow_answer($id);
					$this->load->view("header");                 
					$this->load->view("inquiry_answer",$data);         
					$this->load->view("footer");     

				}
				else              // ���� ��ư Ŭ���� ���
				{
					$data=array(
						"inquiry_id" => $this->input->post("inquiry_id",TRUE),
						"title" => $this->input->post("answer_title",TRUE),
						"content" => $this->input->post("answer_content",TRUE),
						"writeday" => $this->input->post("writeday",TRUE)
					);
					
					$result = $this->inquiry_m->updaterow_answer($data, $id);
					redirect('/~team2/inquiry/answer_complete/'.$id);
				}
			}
		}
			
		public function answer_complete($id)
        {
			// $uri_array=$this->uri->uri_to_assoc(3);
			// $id = array_key_exists("id",$uri_array) ? $uri_array["id"] : "" ;
			echo $id;
			$result = $this->inquiry_m->answer_complete($id);

			redirect("/~team2/inquiry/lists");
		}

		public function check()
		{
			$id = $this->session->userdata("id");
			$data["list"]=$this->inquiry_m->getMemberInquiry($id);
			$this->load->view("header");                 
            $this->load->view("inquiry_check_list",$data);		
            $this->load->view("footer");
		}

		public function check_inquiry($id)
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$id = array_key_exists("id",$uri_array) ? $uri_array["id"] : "" ;
			$state = array_key_exists("state",$uri_array) ? $uri_array["state"] : "" ;	

			if($state==0) {
				$data["row"] = $this->inquiry_m->getrow($id);   
				$this->load->view("header");                 
				$this->load->view("inquiry_check_non_answer",$data);         
				$this->load->view("footer");     
			}

			else {
				$data["row"] = $this->inquiry_m->getrow($id);   
				$data["row1"] = $this->inquiry_m->getrow_answer($id);
				$this->load->view("header");                 
				$this->load->view("inquiry_check",$data);         
				$this->load->view("footer");     
			}
		}
	}
?>