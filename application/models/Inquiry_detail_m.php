<?php
    class Inquiry_detail_m extends CI_Model     // 모델 클래스 선언
    {
		
		function getAll() {
		
			$sql="select * from inquiry_detail order by id";

			return $this->db->query($sql)->result();
		}
		
		
		function getInquiryDetailById($id) {
			$sql="select * from inquiry_detail where id=".$id;

			return $this->db->query($sql)->row();
		}
		
		
		function admin_edit($data) {
			$sql = "update inquiry_detail set name='".$data['name']."' where id=".$data['id'];
            
			$this->db->query($sql);
		}
		
		
		function deleteInquiryDetail($id) {
			$sql = "delete from inquiry_detail where id=".$id;
			
            $this->db->query($sql);
		}
		
		
		function admin_add($data) {
			$arr = array(
				'name'=>$data['name']
            );
            $this->db->insert('inquiry_detail', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}

    }
?>