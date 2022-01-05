<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
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
		
		
		function edit($data) {
			$sql = "update review_category set name='".$data['name']."' where id=".$data['id'];
            
            $this->db->query($sql);
		}
		
		
		function add($data) {
			$arr = array(
				'name'=>$data['name']
            );
            $this->db->insert('review_category', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
		
		function delete($id) {
			$sql = "delete from review_category where id=".$id;
			
            $this->db->query($sql);
		}
		
		
	}	
	
?>