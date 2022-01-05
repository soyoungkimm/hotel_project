<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Review_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
        }
		
		function getReview($number, $sort) {
			
			// 최신순 정렬
			if ($sort == "recent") {
				$sql = "select * from review order by writeday desc, id asc limit 0, ".$number;
			}
			// 별점순 정렬
			else {
				$sql = "select * from review order by star desc, id asc limit 0, ".$number;
			}
			
			return $this->db->query($sql)->result();
		}
		
		function getReviewCount($number) {
			$sql = "select * from review limit 0, ".$number;
			
			return $this->db->query($sql)->num_rows();
		}
		
		function getReviewAll() {
			$sql = "select * from review order by id";
			
			return $this->db->query($sql)->result();
		}
		
		function getReviewAllCount() {
			$sql = "select * from review";
			
			return $this->db->query($sql)->num_rows();
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
		
		
		function getStarStatistic() {
			// 별점 별 개수를 구한다.
			$sql = "select star, count(star) as count from review group by star order by star asc";
			
			return $this->db->query($sql)->result();
		}
		
		function getStarAvg() {
			// 별점 평균
			$sql = "select TRUNCATE(round(avg(star)) / 2.0, 1) as avg from review";
			
			return $this->db->query($sql)->row();
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