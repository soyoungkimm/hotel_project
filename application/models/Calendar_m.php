<?php
	class Calendar_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
			
        }


		function getAll() {
			$sql = "SELECT if (DATE_FORMAT(start,'%T') = '00:00:00', 
			DATE_FORMAT(start,'%Y-%m-%d'), start) as start, if (DATE_FORMAT(end,'%T') = '00:00:00', 
			DATE_FORMAT(end,'%Y-%m-%d'), end) as end, title FROM calendar";
			
			return $this->db->query($sql)->result();
		}

		function add($data) {
			$arr = array(
				'title'=>$data['title'],
				'start'=>$data['start'],
				'end'=>$data['end']
            );
            $this->db->insert('calendar', $arr);
		}
		
		function edit($data) {
			$sql = "update calendar set start='".$data['start']."', end='".$data['end']."' where title='".$data['title']."'";
            
            $this->db->query($sql);
		}
		
		function delete($title) {
			$sql = "delete from calendar where title='".$title."'";
			
            $this->db->query($sql);	
		}
	}
?>