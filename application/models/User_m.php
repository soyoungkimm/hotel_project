<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class User_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
			
        }
		
		
		function getUser() {
			$sql = "select * from user order by id";
			
			return $this->db->query($sql)->result();
		}
		
		
		function getUserIdName() {
			$sql = "select id, name from user order by id";
			
			return $this->db->query($sql)->result();
		}
		
		
		function getUserByUserId($user_id) {

			$sql = "select * from user where id=".$user_id;
			
			
			return $this->db->query($sql)->row();
		}
		
		function getAdmin($id, $pwd) {
			$sql = "select * from user where division=1 and uid='".$id."' and pwd='".$pwd."'";
			
			return $this->db->query($sql)->row();
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


		function getUserByBooks($books) {

			$count = 0;
			$sql = "select * from user where ";
			foreach($books as $book) {
				$sql .= "id=".$book->user_id;
				if (count($books) - 1 != $count) {
					$sql .= " or ";
				}
				$count++;
			}
			
			return $this->db->query($sql)->result();
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
		
		
		function admin_add($data) {
			$arr = array(
				'name'=>$data['name'],
				'uid'=>$data['uid'],
				'pwd'=>$data['password'],
				'phone'=>$data['phone'],
				'email'=>$data['email'],
				'division'=>$data['division'],
				'grade'=>$data['grade']
            );
            $this->db->insert('user', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
		
		function admin_edit($data) {
			
			$sql = "update user set name='".$data['name']."', uid='".$data['uid']."', pwd='".$data['password'].
			"', phone='".$data['phone']."', email='".$data['email']."', division=".$data['division'].", grade=".$data['grade'].
			" where id=".$data['user_id'];
            
            
            $this->db->query($sql);
		}
		
		
		function deleteUser($id) {
			$sql = "delete from user where id=".$id;
			
            $this->db->query($sql);
		}
		
		
	}
	
?>