<?php
	class Memo_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
        }
		
		function add($content) {
			$arr = array(
				'content'=>$content
            );
            $this->db->insert('memo', $arr);
		}
		
		function getAll() {
			$sql = 'select * from memo order by id';
			
			return $this->db->query($sql)->result();
		}
		
		function edit($data) {
			
            $sql = "update memo set content='".$data['content']."' where id=".$data['id'];
            
            $this->db->query($sql);
		}
		
		function delete($id) {
			$sql = "delete from memo where id=".$id;
			
            $this->db->query($sql);
		}
	}
?>