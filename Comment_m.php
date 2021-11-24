<?php
	class Comment_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
			
        }
		
		
		function getCommentByReviewId($id) {
			$sql = "select * from comment where review_id=".$id." order by writeday asc";
			return $this->db->query($sql)->result();
		}
		
		function add($review_id, $content) {
			$this->db->set('writeday', 'now()', false);
            $arr = array(
                'review_id'=>$review_id,
                'user_id'=>1, // 임시로 1 넣어둠
                'content'=>$content
            );
            $this->db->insert('comment', $arr);
		}
		
		function edit($comment_id, $content) {
			$sql = "update comment set content='".$content."'where id=".$comment_id;
			
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
	}
	
?>