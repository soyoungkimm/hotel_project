<?php
	class Review_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
        }
		
		function getReview() {
			$sql = "select * from review";
			return $this->db->query($sql)->result();
		}

		function getReviewById($review_id) {
			$sql = "select * from review where id=".$review_id;
			return $this->db->query($sql)->row();
		}
	}
	
?>