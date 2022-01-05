<?
    class Book_m extends CI_Model     // 모델 클래스 선언
    {
		function insertrow($row)
		{
			return $this->db->insert("book",$row);
		}

		function getrow($id)  {
			$sql="select * from user where id=$id";
			return  $this->db->query($sql)->row();
		}


		function getAll() {
			$sql="select * from book order by id";

			return $this->db->query($sql)->result();		
		}

		function getBookById($id) {
			$sql="select * from book where id=".$id;

			return $this->db->query($sql)->row();		
		}
		
		function getBookByCheckIn($start_date, $end_date) {
			$sql="select * from book where checkin between '".$start_date."' and '".$end_date."'";
			
			return $this->db->query($sql)->result();
		}
		
		
		function getBookByCheckIn_year($start_year, $end_year) {
			$sql="select * from book where year(checkin) between '".$start_year."' and '".$end_year."'";
			
			return $this->db->query($sql)->result();
		}
		
				
		function getBookMonthStatistic($start_date, $end_date) {
			// month 형식 : '연도-월'
			// count는 그 달의 예약 수
			$sql="select replace(STR_TO_DATE(checkin, '%Y-%m'), '-00', '') as month, count(STR_TO_DATE(checkin, '%Y-%m')) as count 
			from book where checkin between '".$start_date."' and '".$end_date."' group by month order by checkin desc";
			
			return $this->db->query($sql)->result();
		}
		
		function getBookYearStatistic($start_year, $end_year) {
			// month 형식 : '연도'
			// count는 그 연도의 예약 수
			$sql="select year(checkin) as year, count(year(checkin)) as count from book where year(checkin) 
			between '".$start_year."' and '".$end_year."' group by year order by checkin desc";
			
			return $this->db->query($sql)->result();
		}

		function admin_edit($data) {

			$sql = "update book set user_id=".$data['user_id'].", room_id=".$data['room_id'].", checkin='".$data['checkin'].
			"', checkout='".$data['checkout']."', people_num=".$data['people_num'].", breakfast=".$data['breakfast'].
			", book_name='".$data['book_name']."', book_phone='".$data['book_phone']."', price=".$data['price'].
			" where id=".$data['id'];
            
            $this->db->query($sql);
		}

		function admin_add($data) {
		
			$arr = array(
				'user_id'=>$data['user_id'],
				'room_id'=>$data['room_id'],
				'checkin'=>$data['checkin'],
				'checkout'=>$data['checkout'],
				'people_num'=>$data['people_num'],
				'breakfast'=>$data['breakfast'],
				'book_name'=>$data['book_name'],
				'book_phone'=>$data['book_phone'],
				'price'=>$data['price']
            );
            $this->db->insert('book', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납

		}


		function deleteBook($id) {
			$sql = "delete from book where id=".$id;
			
            $this->db->query($sql);
		}
		
		
		function getNonMemberBook($data) {
			$sql = "select book.*, room.name as room_name from book 
			left join room on room.id=book.room_id 
			where book.user_id=0 and book.book_name='".$data['name']."' and book.book_phone='".$data['phone']."'";
			
            return $this->db->query($sql)->result();
		}

		function getMemberBook($id) {
			$sql = "select book.*, room.name as room_name from book
			left join room on room.id=book.room_id
			where book.user_id=".$id." and book.user_id not in (0)";
            return $this->db->query($sql)->result();
		}
    }
?>