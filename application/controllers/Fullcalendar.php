<?
    class Fullcalendar extends CI_Controller 
	{       // calendar클래스 선언
        function __construct()                 // 클래스생성할 때 초기설정
        {
            parent::__construct();
            $this->load->database();           // 데이터베이스 연결
            $this->load->model("Fullcalendar_m1");    // 모델 calendar_m 연결
			$this->load->helper(array("url", "date"));    //  helper 선언
		

		}

        public function index()                            // 제일 먼저 실행되는 함수
        {
            $this->lists();                                // list 함수 호출
        }

         public function lists()
        {
			$this->load->view("header");					 // 상단출력(메뉴)
			
         	// 상단출력(메뉴)
            $this->load->view("fullcalender_view");				 // calendar_list에 자료전달
          $this->load->view("footer"); // 하단 출력 
        }

		
		public function events()
		{
		// $events = array(
		//  		array(
		//  			'id' => 1 ,
		//  			'title' => 'Titulo uno',
		//  			'color' => '#FF5B33',
		//  			'start' => '2018-03-10T10:30:00',
		//  			'end' => '2018-03-10T11:30:00'
		//  		 ),
		//  		array(
		//  			'id' => 1 ,
		//  			'title' => 'Titulo dos',
		//  			'color' => '#FF5B33',
		//  			'start' => '2018-03-10T11:30:00',
		//  			'end' => '2018-03-10T12:00:00'
		//  		 )
		// 	);

		$events = $this->Fullcalendar_m1->all();
		echo json_encode($events);
	}
		

		
    }
?>
