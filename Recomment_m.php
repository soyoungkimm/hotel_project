<?php
	class Recomment_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
			
        }
		
		
		function getRecommentByComment($comments) {
			$sql = "select * from recomment where ";
			$count = 0;
			foreach ($comments as $comment) {
				$sql .= " comment_id=".$comment->id;
				if (count($comments) - 1 != $count) {
					$sql .= " or ";
				}
				$count++;
			}
			$sql .= " order by writeday asc";
			return $this->db->query($sql)->result();
		}
		
		
		
		function add($content, $comment_id) { 
			$this->db->set('writeday', 'now()', false);
			$arr = array(
				'comment_id'=>$comment_id,
				'user_id'=>1, 
				'content'=>$content
			);
			$this->db->insert('recomment', $arr);
		  
		}
	}
?>	