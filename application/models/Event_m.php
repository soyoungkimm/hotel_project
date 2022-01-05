<?
class Event_m extends CI_Model     // 모델 클래스 선언
	{
		public function getlist($text1,$start,$limit )
        {
			if (!$text1)
				$sql="select * from event order by name limit $start,$limit";
			else
				$sql="select * from event where name like '%$text1%' order by name limit $start,$limit";

			return $this->db->query($sql)->result();
			}

		public function rowcount( $text1 ) 
		{
			if (!$text1)
				$sql="select * from event";
			else
				$sql="select * from event where name like '%$text1%' ";

			return $this->db->query($sql)->num_rows();
		}


		function getrow($id)  
			{
				$sql="select * from event where id=$id";
				return  $this->db->query($sql)->row();
			}

		function deleterow($id)  
			{
				 $sql="delete from event where id=$id";
				 return  $this->db->query($sql);
			}

		function insertrow($row)
			{
				 return $this->db->insert("event",$row);
			}

		function updaterow( $row, $id )
			{
				$where=array( "id"=>$id );
				return $this->db->update( "event", $row, $where );
			}
		
		
		
		
		
		function getAll() {
			$sql="select * from event order by id";

			return $this->db->query($sql)->result();
		}
		


		function admin_edit($data) {
					
			$sql = "update user_calendar set title='".$data['title']."', color='".$data['color']."', start='".$data['start']."', end='".$data['end'].
			"', content='".$data['content']."' where id=".$data['id'];
            
            $this->db->query($sql);
		}

		function deleteEvent($id) {
			$sql = "delete from user_calendar where id=".$id;
			
            $this->db->query($sql);
		}
	

		function admin_add($data) {
			$arr = array(
				'title'=>$data['title'],
				'color'=>$data['color'],
				'start'=>$data['start'],
				'end'=>$data['end'],
				'content'=>$data['content']
            );
            $this->db->insert('user_calendar', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
		
		function getEventAll() {
			$sql="select * from user_calendar order by id";
			return $this->db->query($sql)->result();
		}
		
		function getEventById($id) {
			$sql="select * from user_calendar where id=".$id;
			return $this->db->query($sql)->row();
		}
    }
?>
