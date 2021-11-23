<?php
	class User_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
			
        }
		
		function getUserByReview($reviews) {

			$count = 0;
			$sql = "select * from user where ";
			foreach($reviews as $review) {
				$sql .= "id=".$review->user_id;
				if (count($reviews) - 1 != $count) {
					$sql .= " or ";
				}
				$count++;
			}
			
			return $this->db->query($sql)->result();
		}

		function getUserByUserId($user_id) {

			$sql = "select * from user where id=".$user_id;
			
			
			return $this->db->query($sql)->row();
		}
		
		
		
		function getCommentWriterByComment($comments) {
			$sql = "select * from user where ";
			$count = 0;
			foreach ($comments as $comment) {
				$sql .= " id=".$comment->user_id;
				if (count($comments) - 1 != $count) {
				  $sql .= " or ";
				}
				$count++;
			}
          
          return $this->db->query($sql)->result();
		}
		
		
		function getRecommentWriterByRecomment($recomments) {
			$sql = "select * from user where ";
			$count = 0;
			foreach ($recomments as $recomment) {
				$sql .= " id=".$recomment->user_id;
				if (count($recomments) - 1 != $count) {
					$sql .= " or ";
				}
				$count++;
			}
          
          return $this->db->query($sql)->result();
		}
	}
	
?>