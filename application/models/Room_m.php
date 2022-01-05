<?
    class Room_m extends CI_Model {
		
		function __construct() {
            parent::__construct();
        }


		function getlist_bed()
		{
			$sql="select * from bed order by name";
			return $this->db->query($sql)->result();
		}
		function getrow($id)  
		{ 
			$sql="select room.*, bed.name as bed_name
              from room left join bed on room.bed_no=bed.id
              where room.id=$id";
			return  $this->db->query($sql)->row();
		}
		
		function getRoomNameById($id) {
			$sql="select id, name from room where id=".$id;
			return $this->db->query($sql)->row();
		}
		
		function getRoomPriceById($id) {
			$sql="select price from room where id=".$id;
			return $this->db->query($sql)->row();
		}



		function getRoomStatistic() {
			// room 이름 별로 예약된 횟수와 총 수익을 구한다.
			$sql = "select room.name as room_name, count(book.room_id) as count, sum(book.price) as total_price 
			from book, room where room.id=book.room_id group by book.room_id order by room_id asc";
			
			return $this->db->query($sql)->result();
		}
		
		

		function getRoomAll() {
			
			$sql = "select room.*, bed.name as bed_name
              from room left join bed on room.bed_id=bed.id order by room.id";
			
			return $this->db->query($sql)->result();
		}
		
		
		function getRoomById($id) {
			
			$sql = "select room.*, bed.name as bed_name
              from room left join bed on room.bed_id=bed.id where room.id=".$id;
			
			return $this->db->query($sql)->row();
		}
		
		
		function edit($data) {
			
			$sql = "update room set name='".$data['name']."', price=".$data['price'].", size=".$data['size'].", number=".$data['number'].
				", bed_id=".$data['bed_id'].", service='".$data['service']."', content='".$data['content']."', people_num=".$data['people_num'];
			
			if($data['image'] != null) {
				$sql .= ", image='".$data['image']."'";
            }
			if($data['image2'] != null) {
				$sql .= ", image2='".$data['image2']."'";
            }
			
			$sql .= " where id=".$data['id'];
            
            $this->db->query($sql);
		}
		
		function add($data) {
			$arr = array(
				'name'=>$data['name'],
				'price'=>$data['price'],
				'size'=>$data['size'],
				'image'=>$data['image'], 
				'number'=>$data['number'],
				'bed_id'=>$data['bed_id'],
				'service'=>$data['service'],
				'content'=>$data['content'],
				'people_num' =>$data['people_num']
            );
            $this->db->insert('room', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
		function delete($id) {
			$sql = "delete from room where id=".$id;
			
            $this->db->query($sql);
		}
	}
?>