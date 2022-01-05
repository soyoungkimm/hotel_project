<?
    class Inquiry_m extends CI_Model     // 모델 클래스 선언
    {
		function getlist_type()
		{
			$sql="select * from inquiry_detail order by name";
			return $this->db->query($sql)->result();
		}

		function insertrow($row)
		{
			return $this->db->insert("inquiry",$row);
		}

		function insertrow_answer($row)
		{
			return $this->db->insert("inquiry_answer",$row);
		}

		function updaterow_answer($row, $id)
		{
			$where=array( "id"=>$id );
			return $this->db->update("inquiry_answer",$row,$where);
		}
		
		function getrow_answer($id)
		{
			$sql="select * from inquiry_answer where inquiry_id=".$id;
			return $this->db->query($sql)->row();
		}

		function answer_complete($id)
		{
			$state=array(
				"state" => 1
			);
			$where=array( "id"=>$id );
			return $this->db->update("inquiry",$state,$where);
		}

		function getlist()
		{
			$sql="select inquiry.*, inquiry_detail.name as detail_name from inquiry 
			left join inquiry_detail on inquiry.detail_id=inquiry_detail.id order by inquiry.id";
			return $this->db->query($sql)->result();
		}

		function getMemberInquiry($id)
		{
			$sql="select inquiry.*, inquiry_detail.name as detail_name from inquiry 
			left join inquiry_detail on inquiry.detail_id=inquiry_detail.id where inquiry.user_id=".$id." order by inquiry.id";
			return $this->db->query($sql)->result();
		}

		function getrow($id) {
			$sql="select inquiry.*, inquiry_detail.name as detail_name from inquiry
			left join inquiry_detail on inquiry.detail_id=inquiry_detail.id
			where inquiry.id=".$id;
			return  $this->db->query($sql)->row();
		}

		function getAll() {
		
			$sql="select inquiry.*, inquiry_detail.name as detail_name, inquiry_detail.id as detail_id from inquiry 
			left join inquiry_detail on inquiry.detail_id=inquiry_detail.id order by inquiry.id";

			return $this->db->query($sql)->result();
		}
		
		function getInquiryById($id) {
			$sql="select inquiry.*, inquiry_detail.name as detail_name, inquiry_detail.id as detail_id from inquiry 
			left join inquiry_detail on inquiry.detail_id=inquiry_detail.id where inquiry.id=".$id." order by inquiry.id";

			return $this->db->query($sql)->row();
		}
		
		function admin_edit($data) {
			$sql = "update inquiry set detail_id=".$data['detail_id'].", name='".$data['name']."', email='".$data['email'].
			"', phone='".$data['phone']."', title='".$data['title']."', content='".$data['content'].
			"', state=".$data['state']." where id=".$data['id'];
            
			$this->db->query($sql);
		}
		
		function deleteInquiry($id) {
			$sql = "delete from inquiry where id=".$id;
			
            $this->db->query($sql);
		}
		
		
		function admin_add($data) {
			$arr = array(
				'detail_id'=>$data['detail_id'],
				'name'=>$data['name'],
				'email'=>$data['email'],
				'phone'=>$data['phone'],
				'title'=>$data['title'],
				'content'=>$data['content'],
				'state'=>$data['state']
            );
            $this->db->insert('inquiry', $arr);

            return $this->db->insert_id(); // 방금 insert된 id를 반납
		}
		
    }
?>