<?
    class Aboutus extends CI_Controller { // room Ŭ���� ����
	
		function __construct()
        {
            parent::__construct();
        }
		
		
		public function index()
		{
			// , array('active'=>"aboutus")���� ���� : ��� �޴����� aboutus �ؿ� �Ķ� ���� ������� �־����ϴ�
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