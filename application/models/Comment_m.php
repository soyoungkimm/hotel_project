<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Comment_m extends CI_Model {
		
		function __construct() {
				parent::__construct();
		}
		
		
		function getCommentByReviewId($id) {
			$sql = "select * from comment where review_id=".$id." order by writeday asc";
			return $this->db->query($sql)->result();
		}
		
		
		function getCommentIdContent() {
			$sql = "select id, content from comment";
			return $this->db->query($sql)->result();
		}
		
		
		function add($review_id, $content, $user_id) {
			$this->db->set('writeday', 'now()', false);
            $arr = array(
                'review_id'=>$review_id,
                'user_id'=>$user_id, // 임시로 1 넣어둠
                'content'=>$content
            );
            $this->db->insert('comment', $arr);
		}
		
		
		function admin_add($data) {
            $arr = array(
				'user_id'=>$data['user_id'],
                'review_id'=>$data['review_id'],
                'writeday'=>$data['writeday'],
                'content'=>$data['content']
            );
            $this->db->insert('comment', $arr);
			
			return $this->db->insert_id();
		}
		
		
		function edit($comment_id, $content) {
			$sql = "update comment set content='".$content."'where id=".$comment_id;
			
			$this->db->query($sql);
			
		}
		
		
		function admin_edit($data) {
			$sql = "update comment set user_id=".$data['user_id'].", content='".$data['content']."', review_id=".$data['review_id'].
			", writeday='".$data['writeday']."' where id=".$data['comment_id'];
			
			$this->db->query($sql);
		}
		
		function getCommentById($id) {
			$sql = "select * from comment where id=".$id;
			
			return $this->db->query($sql)->row();
		}
		
		
		function deleteComment($id) {
			$sql = "delete from comment where id=".$id;
			
			return $this->db->query($sql);
		}
		
		function getCommentCount($id) {
			$sql = "select * from comment where review_id=".$id;
			
			return $this->db->query($sql)->num_rows();
		}
		
		function getCommentAll() {
			$sql = "select * from comment order by id";
			
			return $this->db->query($sql)->result();
		}


		function deleteCommentByReviewId($review_id) {
			$sql = "delete from comment where review_id=".$review_id;
			
			$this->db->query($sql);
		}

		function getCommentIdByReviewId($id) {
			$sql = "select id from comment where review_id=".$id;
			return $this->db->query($sql)->result();
		}
	}
	
?>