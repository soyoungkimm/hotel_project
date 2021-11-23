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
		
	}
	
?>