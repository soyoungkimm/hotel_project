<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Login_m extends CI_Model{// 모델 클래스 선언

	function __construct() {
		parent::__construct();
	}
	
	function getrow($uid,$pwd)
	{
		$sql = "select * from user where uid='".$uid."' and pwd='".$pwd."'";
		return $this->db->query($sql)->row();
	}
}
?>