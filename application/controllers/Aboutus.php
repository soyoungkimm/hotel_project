<?
    class Aboutus extends CI_Controller { // room 클래스 선언
	
		function __construct()
        {
            parent::__construct();
        }
		
		
		public function index()
		{
			// , array('active'=>"aboutus")넣은 이유 : 상단 메뉴에서 aboutus 밑에 파란 밑줄 만들려고 넣었습니다
			$this->load->view("header", array('active'=>"aboutus"));
			$this->load->view("aboutus.php");
            $this->load->view("footer"); 
		}
		
		
		public function rooftop_park() {
			
			$this->load->view("header", array('active'=>"aboutus"));
			$this->load->view("rooftop_park");
            $this->load->view("footer"); 
			
		}
		
		public function swimming_pool() {
			
			$this->load->view("header", array('active'=>"aboutus"));
			$this->load->view("swimming_pool");
            $this->load->view("footer"); 
			
		}
		
		public function restaurant() {
			
			$this->load->view("header", array('active'=>"aboutus"));
			$this->load->view("restaurant");
            $this->load->view("footer"); 
			
		}
		
		
		public function playground() {
			
			$this->load->view("header", array('active'=>"aboutus"));
			$this->load->view("playground");
            $this->load->view("footer"); 
			
		}
		
		public function lobby() {
			
			$this->load->view("header", array('active'=>"aboutus"));
			$this->load->view("lobby");
            $this->load->view("footer"); 
			
		}
	}
?>