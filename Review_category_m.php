<?php
	class Review_category_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
			
        }
		
		function getCategoryByCategoryId($category_id) {
			$sql = "select * from review_category where id=".$category_id;
			
			return $this->db->query($sql)->row();
		}
		
		
		
		function getCategory() {
			$sql = "select * from review_category order by id asc";
			
			return $this->db->query($sql)->result();
		}
		
		
	}	
	
?>