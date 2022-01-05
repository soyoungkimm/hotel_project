<?
    class Room extends CI_Controller { // room 클래스 선언
		function __construct()
        {
            parent::__construct();
			$this->load->database();		// 데이터베이스 연결
            $this->load->model("Room_m");	// 모델 Room_m 연결
        }
		
		public function index()
		{
			$this->load->model('Room_m');
			$this->load->model('Bed_m');
			
			$data['rooms'] = $this->Room_m->getRoomAll();
			//$data['beds'] = $this->Bed_m->getAll();
			
			
			// , array('active'=>"room")넣은 이유 : 상단 메뉴에서 room 밑에 파란 밑줄 만들려고 넣었습니다
			$this->load->view("header", array('active'=>"room"));
			$this->load->view('room', array('data'=>$data));
			$this->load->view("footer");
		}

		public function lists()
        {
			$data["list"] = $this->room_m->getlist();

			// , array('active'=>"room")넣은 이유 : 상단 메뉴에서 room 밑에 파란 밑줄 만들려고 넣었습니다
			$this->load->view("header", array('active'=>"room"));
			$this->load->view("room.php");
            $this->load->view("footer"); 
        }
		
		public function view()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$id	= array_key_exists("id",$uri_array) ? $uri_array["id"] : "" ;

			$data["row"]=$this->room_m->getrow($no);

			// , array('active'=>"room")넣은 이유 : 상단 메뉴에서 room 밑에 파란 밑줄 만들려고 넣었습니다
			$this->load->view("header", array('active'=>"room"));
            $this->load->view("room.php",$data);
            $this->load->view("footer");
		}

		function detail($id) {
			$this->load->model('Room_m');
			$this->load->model('Bed_m');
			
			$data['room'] = $this->Room_m->getRoomById($id);
			//$data['beds'] = $this->Bed_m->getAll();
			
			
			// , array('active'=>"room")넣은 이유 : 상단 메뉴에서 room 밑에 파란 밑줄 만들려고 넣었습니다
			$this->load->view("header", array('active'=>"room"));
			$this->load->view('room_detail', array('data'=>$data));
			$this->load->view("footer");
		}
	}
?>