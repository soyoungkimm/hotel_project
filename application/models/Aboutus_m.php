<?
    class Aboutus_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
        }
		
		function getAboutAll() {
			
			$sql = "select * from aboutus order by id";
			
			return $this->db->query($sql)->result();
		}
	}
?>