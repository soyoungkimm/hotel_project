<?
	class Book extends CI_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();  
			$this->load->model("book_m"); 
			$this->load->helper('url');			
        }

		public function index()
        {
            $this->book_hotel();
        }
		
		public function book_hotel() {
			$this->load->model('Room_m');
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("date-in","Check In","required");
			$this->form_validation->set_rules("date-out","Check Out","required");
			
			if($this->form_validation->run()==FALSE)
			{
				//$this->load->view("main.php");
				//$this->load->view("footer.php");
				redirect('/~team2/');
			}
			else
			{
				$data=array(
					"date_in" => $this->input->post("date-in",TRUE),
					"date_out" => $this->input->post("date-out",TRUE),
					"guest" => $this->input->post("guest",TRUE),
					"breakfast" => $this->input->post("breakfast",TRUE),
					// room 정보 가져오기
					"rooms" => $this->Room_m->getRoomAll(),
				);


				$this->load->view("header.php");
				$this->load->view("book_room.php", $data);
				$this->load->view("footer.php");
			}
		}


		public function book_room() {
			$this->load->model('Room_m');
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("date-in","Check In","required");
			$this->form_validation->set_rules("date-out","Check Out","required");

			if($this->form_validation->run()==FALSE)
			{
				$data=array(
					"date_in" => $this->input->post("date-in",TRUE),
					"date_out" => $this->input->post("date-out",TRUE),
					"guest" => $this->input->post("guest",TRUE),
					"breakfast" => $this->input->post("breakfast",TRUE)
				);
				
				

				$this->load->view("header.php");
				$this->load->view("book_room.php", $data);
				$this->load->view("footer.php");
			}
			else
			{
				$room_name = $this->Room_m->getRoomNameById($this->input->post("room",TRUE));
				
				$data=array(
					"date_in" => $this->input->post("date-in",TRUE),
					"date_out" => $this->input->post("date-out",TRUE),
					"guest" => $this->input->post("guest",TRUE),
					"breakfast" => $this->input->post("breakfast",TRUE),
					"room" => $room_name,
					"price" => $this->input->post("price",TRUE)
				);

				if($this->session->userdata("uid")) {
					$id = $this->session->userdata('id');
					$data["row"] = $this->book_m->getrow($id); // 회원 정보 getrow
				}
					
				$this->load->view("header.php");
				$this->load->view("book_detail.php", $data);
				$this->load->view("footer.php");
				
			}
		}



		public function book_add() {
			
			$this->load->model('Room_m');
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("date-in","Check In","required");
			$this->form_validation->set_rules("date-out","Check Out","required");
			$this->form_validation->set_rules("name",'name',"required");
			$this->form_validation->set_rules("tel1","tel1","required");
			$this->form_validation->set_rules("tel2","tel2","required");
			$this->form_validation->set_rules("tel3","tel3","required");
			
			// 개인정보 필수 입력
			if($this->form_validation->run()==FALSE)
			{
				
				$room_name = $this->Room_m->getRoomNameById($this->input->post("room",TRUE));
				
				$data=array(
					"date_in" => $this->input->post("date-in",TRUE),
					"date_out" => $this->input->post("date-out",TRUE),
					"guest" => $this->input->post("guest",TRUE),
					"breakfast" => $this->input->post("breakfast",TRUE),
					"room" => $room_name,
					"price" => $this->input->post("price",TRUE)
				);
				
				if($this->session->userdata("uid")) {
					$id = $this->session->userdata('id');
					$data["row"] = $this->book_m->getrow($id); // 회원 정보 getrow
				}
				
				$this->load->view("header.php");
				$this->load->view("book_detail.php", $data); 
				$this->load->view("footer.php");
			}
			else
			{
				$tel1=$this->input->post("tel1",TRUE);
				$tel2=$this->input->post("tel2",TRUE);
				$tel3=$this->input->post("tel3",TRUE);
				$tel=sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
				$user_id=$this->session->userdata('id');
				if ($user_id == null) $user_id = '0';

				if($this->input->post("breakfast",TRUE)==1){
					$breakfast = 1;
				}
				else {
					$breakfast = 0;
				}

				$data=array(
					"user_id" => $user_id,
					"room_id" => $this->input->post("room",TRUE),	
					"checkin" => $this->input->post("date-in",TRUE),
					"checkout" => $this->input->post("date-out",TRUE),
					"people_num" => $this->input->post("guest",TRUE),
					"breakfast" => $breakfast,
					"book_name" => $this->input->post("name",TRUE),
					"book_phone" => $tel,
					"price" => $this->input->post("price",TRUE)
				);

				$result = $this->book_m->insertrow($data);
				$this->load->view("header.php");
				$data['room_name'] =  $this->Room_m->getRoomNameById($data['room_id']);
				$this->load->view("book_complete.php", $data);
				$this->load->view("footer.php");	
			}
		}
		
		
		function search_non_member_book() {
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","예약자 성명","required");
			$this->form_validation->set_rules("phone","전화번호","required");
			
			if($this->form_validation->run()==FALSE){
				// 유효성 검사 걸리면
				redirect("/~team2/main?search_book_error1");
			}
			else {
				
				$val=array(
					"name" => $this->input->post("name"),
					"phone" => $this->input->post("phone"),
				);
				
				$data['books'] = $this->book_m->getNonMemberBook($val);
				
				// 예약이 없으면
				if ($data['books'] == null) {
					redirect("/~team2/main?search_book_error2");
				}
				else {
					$this->load->view("header");
					$this->load->view("search_non_member_book", array('data'=>$data)); 
					$this->load->view("footer");
				}
			}
			
		}

		function search_member_book() {
			$id = $this->session->userdata("id");
			$data['books'] = $this->book_m->getMemberBook($id);
			
			$this->load->view("header");
			$this->load->view("search_memeber_book", array('data'=>$data)); 
			$this->load->view("footer");
		}
		
		
		
		
		
		function direct_book_room($room_id) {
			
			$this->load->model('Room_m');
			
			$this->load->library("form_validation");
			$this->form_validation->set_rules("date-in","Check In","required");
			$this->form_validation->set_rules("date-out","Check Out","required");
			$this->form_validation->set_rules("name",'name',"required");
			$this->form_validation->set_rules("tel1","tel1","required");
			$this->form_validation->set_rules("tel2","tel2","required");
			$this->form_validation->set_rules("tel3","tel3","required");
			
			// 개인정보 필수 입력
			if($this->form_validation->run()==FALSE)
			{
				$room_name = $this->Room_m->getRoomNameById($room_id);
				$room_price = $this->Room_m->getRoomPriceById($room_id);
				
				$data=array(
					"room_name" => $room_name,
					"room_id" => $room_id,
					"room_price" => $room_price
				);
				
				if($this->session->userdata("uid")) {
					$id = $this->session->userdata('id');
					$data["row"] = $this->book_m->getrow($id); // 회원 정보 getrow
				}
				
				$this->load->view("header");
				$this->load->view("book_direct_room", $data); 
				$this->load->view("footer");
			}
			else
			{
				$tel1=$this->input->post("tel1",TRUE);
				$tel2=$this->input->post("tel2",TRUE);
				$tel3=$this->input->post("tel3",TRUE);
				$tel=sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
				$user_id=$this->session->userdata('id');
				if ($user_id == null) $user_id = '0';

				if($this->input->post("breakfast",TRUE)==1){
					$breakfast = 1;
				}
				else {
					$breakfast = 0;
				}

				$data=array(
					"user_id" => $user_id,
					"room_id" => $this->input->post("room",TRUE),	
					"checkin" => $this->input->post("date-in",TRUE),
					"checkout" => $this->input->post("date-out",TRUE),
					"people_num" => $this->input->post("guest",TRUE),
					"breakfast" => $breakfast,
					"book_name" => $this->input->post("name",TRUE),
					"book_phone" => $tel,
					"price" => $this->input->post("price",TRUE)
				);

				$result = $this->book_m->insertrow($data);
				$this->load->view("header");
				$data['room_name'] =  $this->Room_m->getRoomNameById($data['room_id']);
				$this->load->view("book_complete", $data);
				$this->load->view("footer.php");	
			}
			
		}
	}

?>