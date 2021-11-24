<?php
	class Review_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
        }
		
		function getReview() {
			$sql = "select * from review";
			return $this->db->query($sql)->result();
		}

		function getReviewById($review_id) {
			$sql = "select * from review where id=".$review_id;
			return $this->db->query($sql)->row();
		}
		
		
		function add($data) {
			$this->db->set('writeday', 'now()', false);
            $arr = array(
				'user_id'=>$data['user_id'], // 임시로 1로 해놓음
				'title'=>$data['title'],
				'content'=>$data['content'],
				'image'=>$data['image'], 
				'category_id'=>$data['category_id']
            );
            $this->db->insert('review', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
		
		function deleteReview($review_id) {
			$sql = "delete from review where id=".$review_id;
			
            $this->db->query($sql);
		}
		
		
		function edit($data) {
			if($data['image'] == null) {
                $sql = "update review set title='".$data['title']."', content='".$data['content']."', category_id=".$data['category_id'].
				" where id=".$data['review_id'];
            }
            else {
                $sql = "update review set title='".$data['title']."', content='".$data['content']."', category_id=".$data['category_id'].
				", image='".$data['image']."' where id=".$data['review_id'];
            }
            
            $this->db->query($sql);
		}
	}
	
?>