<?
class Fullcalender_m extends CI_Model     // 모델 클래스 선언
	{

		public function insertscheule($calender_title,$calender_start_date, $calender_end_date)
		{
			$sql = "insert into calender_event(title,start,end)values(?,?,?)";
			return $this->db->query($sql,array($calender_title,$calender_start_date, $calender_end_date));
		}
    }
?>
