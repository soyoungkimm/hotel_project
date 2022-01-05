<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
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
		
		
		function getRecommentByCommentId($comment_id) {
			$sql = "select * from recomment where comment_id=".$comment_id;
			
			return $this->db->query($sql)->result();
		}
		
		
		
		function add($content, $comment_id, $user_id) { 
			$this->db->set('writeday', 'now()', false);
			$arr = array(
				'content'=>$content,
				'comment_id'=>$comment_id,
				'user_id'=> $user_id
			);
			
	
			$this->db->insert('recomment', $arr);
		}
		
		
		
		function admin_add($data) {
			
			$arr = array(
				'comment_id'=>$data['comment_id'],
				'user_id'=>$data['user_id'],
				'content'=>$data['content'],
				'writeday'=>$data['writeday']
			);
			
			$this->db->insert('recomment', $arr);
			return $this->db->insert_id();
		}
		
		
		function edit($recomment_id, $content) {
			$sql = "update recomment set content='".$content."'where id=".$recomment_id;
			
			$this->db->query($sql);
		}
		
		
		function admin_edit($data) {
			$sql = "update recomment set comment_id=".$data['comment_id'].", user_id=".$data['user_id'].
			", content='".$data['content']."', writeday='".$data['writeday']."' where id=".$data['recomment_id'];
			
			$this->db->query($sql);
		}
		
		
		function getRecommentById($id) {
			$sql = "select * from recomment where id=".$id;
			
			return $this->db->query($sql)->row();
		}
		
		
		
		function deleteRecomment($id) {
			$sql = "delete from recomment where id=".$id;
			
			$this->db->query($sql);
		}
		
		function getRecommentCount($comments) {
			$sql = "select * from recomment where ";
			$count = 0;
			foreach ($comments as $comment) {
				$sql .= " comment_id=".$comment->id;
				if (count($comments) - 1 != $count) {
					$sql .= " or ";
				}
				$count++;
			}
			
			return $this->db->query($sql)->num_rows();
		}
		

		function deleteRecommentByCommentId($comments) {
			$sql = "delete * from recomment where ";
			$count = 0;
			foreach ($comments as $comment) {
				$sql .= " comment_id=".$comment->id;
				if (count($comments) - 1 != $count) {
					$sql .= " or ";
				}
				$count++;
			}
		}
	}
?>	