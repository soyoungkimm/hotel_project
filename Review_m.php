<?php
	class Review_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
        }
		
		function getReview($number) {
			$sql = "select * from review order by writeday desc limit 0, ".$number;
			
			return $this->db->query($sql)->result();
		}
		
		function getReviewAll() {
			$sql = "select * from review order by id";
			
			return $this->db->query($sql)->result();
		}
		
		
		function getReviewIdTitle() {
			$sql = "select id, title from review order by id";
			
			return $this->db->query($sql)->result();
		}
		

		function getReviewById($review_id) {
			$sql = "select * from review where id=".$review_id;
			return $this->db->query($sql)->row();
		}
		
		
		function getReviewByComment($comments) {
			$sql = "select * from review where ";
			$count = 0;
			foreach ($comments as $comment) {
				$sql .= " id=".$comment->review_id;
				if (count($comments) - 1 != $count) {
				  $sql .= " or ";
				}
				$count++;
			}
			
			return $this->db->query($sql)->result();
		}
		
		
		function add($data) {
			$this->db->set('writeday', 'now()', false);
            $arr = array(
				'user_id'=>$data['user_id'], // 임시로 1로 해놓음
				'title'=>$data['title'],
				'content'=>$data['content'],
				'image'=>$data['image'], 
				'category_id'=>$data['category_id'],
				'star'=>$data['star']
            );
            $this->db->insert('review', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
		
		function admin_add($data) {
            $arr = array(
				'user_id'=>$data['user_id'], 
				'title'=>$data['title'],
				'content'=>$data['content'],
				'image'=>$data['image'], 
				'category_id'=>$data['category_id'],
				'writeday' => $data['writeday'],
				'star'=>$data['star']
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
				", star=".$data['star']." where id=".$data['review_id'];
            }
            else {
                $sql = "update review set title='".$data['title']."', content='".$data['content']."', category_id=".$data['category_id'].
				", image='".$data['image']."', star=".$data['star']." where id=".$data['review_id'];
            }
            
            $this->db->query($sql);
		}
		
		
		
		function admin_edit($data) {
			if($data['image'] == null) {
                $sql = "update review set title='".$data['title']."', content='".$data['content']."', category_id=".$data['category_id'].
				", writeday='".$data['writeday']."', user_id=".$data['user_id'].", star=".$data['star']." where id=".$data['review_id'];
            }
            else {
                $sql = "update review set title='".$data['title']."', content='".$data['content']."', category_id=".$data['category_id'].
				", image='".$data['image']."', writeday='".$data['writeday']."', user_id=".$data['user_id'].", star=".$data['star']." where id=".$data['review_id'];
            }
            
            $this->db->query($sql);
		}
		
		
		function getBestReview() {
			$sql = "select * from review where id=1 or id=2 order by id";
			
			return $this->db->query($sql)->result();
		}
	}
	
?>