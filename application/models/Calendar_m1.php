<?
class Calendar_m1 extends CI_Model     // 모델 클래스 선언
	{
	
	function all(){
		$this->db->select("*");
		$this->db->from('user_calendar');
		return $this->db->get()->result_array();
	}
		
    }
?>
