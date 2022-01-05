<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Bed_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
			
        }
		
		
		function getAll() {
			$sql = "select * from bed order by id asc";
			
			return $this->db->query($sql)->result();
		}
		
		
		function getBedById($id) {
			$sql = "select * from bed where id=".$id;
			
			return $this->db->query($sql)->row();
		}
		
		
		function edit($data) {
			$sql = "update bed set name='".$data['name']."' where id=".$data['id'];
            
            $this->db->query($sql);
		}
		
		
		function add($data) {
			$arr = array(
				'name'=>$data['name']
            );
            $this->db->insert('bed', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
		
		function delete($id) {
			$sql = "delete from bed where id=".$id;
			
            $this->db->query($sql);
		}
		
		
	}	
	
?>