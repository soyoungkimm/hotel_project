<?php
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	class Admin_book_chart extends MY_Controller {
		
		function __construct() {
            parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('Book_m');
			$this->load->model('User_m');
			$this->load->model('Room_m');
        }
		
		
		
		function _get_month_chart_info($start_date, $end_date) {
			
			$data['books'] = $this->Book_m->getBookByCheckIn($start_date, $end_date);
			
			if($data['books'] != null) {
				$data['users'] = $this->User_m->getUserByBooks($data['books']);
				$data['rooms'] = $this->Room_m->getRoomAll();
			}
			
			
			//data에 들어갈 값 구하기
			$data['datas'] = $this->Book_m->getBookMonthStatistic($start_date, $end_date);
			
			
			// 총 예약 수 구하기
			$tcount = 0;
			foreach ($data['datas'] as $datas) {
				$tcount += $datas->count;
			}
			$data['total_book_count'] = $tcount;
			
			
			// 총 수입 구하기
			$income = 0;
			foreach ($data['books'] as $book) {
				$income += $book->price;
			}
			$data['total_book_income'] = $income;
			
			
			//start_date와 end_date 사이에 있는 달의 개수 구하기
			$d1 = strtotime($start_date);
			$d2 = strtotime($end_date);
			$i = 0;
			while (($d1 = strtotime("+1 MONTH", $d1)) <= $d2) {
				$i++;
			}
			$between_month = $i;
			
			
			// text에 찍힐 date
			$start_arr = explode('-', $start_date);
			$end_arr = explode('-', $end_date);
			$data['start_date'] = $start_arr[0]."-".$start_arr[1];
			$data['end_date'] = $end_arr[0]."-".$end_arr[1];
			
			
			// labels에 들어갈 값 구하기
			$data['labels'] = array();
			$start_timestamp = strtotime($start_date);
			array_push($data['labels'], $data['start_date']);
			if($data['start_date'] != $data['end_date']) {
				for ($i = 0; $i < $between_month; $i++) {
					$start_dd = date("Y-m", strtotime("+1 month", $start_timestamp));
					array_push($data['labels'], $start_dd); 
					$start_timestamp = strtotime($start_dd."-01");
				}
			}
			
			return $data;
		}
		
		
		
		function _get_year_chart_info($start_date, $end_date) {
			
			$data['books'] = $this->Book_m->getBookByCheckIn_year($start_date, $end_date);
			if($data['books'] != null) {
				$data['users'] = $this->User_m->getUserByBooks($data['books']);
				$data['rooms'] = $this->Room_m->getRoomAll();
			}
			
			
			//data에 들어갈 값 구하기
			$data['datas'] = $this->Book_m->getBookYearStatistic($start_date, $end_date);
			
			
			// 총 예약 수 구하기
			$tcount = 0;
			foreach ($data['datas'] as $datas) {
				$tcount += $datas->count;
			}
			$data['total_book_count'] = $tcount;
			
			
			// 총 수입 구하기
			$income = 0;
			foreach ($data['books'] as $book) {
				$income += $book->price;
			}
			$data['total_book_income'] = $income;
			
			
			//start_date와 end_date 사이에 있는 연도의 개수 구하기
			$between_year = $end_date - $start_date;
			
			
			
			// labels에 들어갈 값 구하기
			$data['labels'] = array();
			array_push($data['labels'], $start_date);
			for ($i = 0; $i < $between_year; $i++) {
				$start_date++;
				array_push($data['labels'], $start_date); 
			}
		
			return $data;
		}
		
		
		
		function _get_period_chart_info($start_date, $end_date) {
			
			$data['books'] = $this->Book_m->getBookByCheckIn($start_date, $end_date);
			if($data['books'] != null) {
				$data['users'] = $this->User_m->getUserByBooks($data['books']);
				$data['rooms'] = $this->Room_m->getRoomAll();
			}
			
			
			// 총 예약 수 구하기
			$data['total_book_count'] = count($data['books']);
			
			
			// 총 수입 구하기
			$income = 0;
			foreach ($data['books'] as $book) {
				$income += $book->price;
			}
			$data['total_book_income'] = $income;
			
			
			return $data;
		}
		
		
		
		function month_chart() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			
			// 날짜를 새로 지정했을 때
			if(isset($_POST['start_date']) && isset($_POST['end_date'])) {
				
				$start_date = $_POST['start_date'];
				$end_date = $_POST['end_date'];
				
				$data = $this->_get_month_chart_info($start_date, $end_date);
				
				// 차트 타입
				$data['chart_type'] = $_POST['chart_type'];
				
			}
			// 처음 들어왔을 때
			else {
				
				// 날짜 구하기
				$start_date = date("Y-m", strtotime("-10 month", time()));
				$start_date .= "-01";
				$end_date = date("Y-m-d", time());
				$end_date = new DateTime( $end_date ); 
				$end_date = $end_date->format( 'Y-m-t' );
				
				
				$data = $this->_get_month_chart_info($start_date, $end_date);
				
				
				// text에 찍힐 date
				$data['start_date'] = null;
				$data['end_date'] = null;
				
				// 차트 타입
				$data['chart_type'] = 'bar';
			}
			
			
			$this->_header();
			$this->load->view("admin_book_chart_month", array('data'=>$data));
			$this->_footer();
		}
		
		
		
		function year_chart() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			
			if(isset($_POST['start_date']) && isset($_POST['end_date'])) {
				
				$start_date = $_POST['start_date'];
				$end_date = $_POST['end_date'];
				
				$data = $this->_get_year_chart_info($start_date, $end_date);
				
				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;
				
				// 차트 타입
				$data['chart_type'] = $_POST['chart_type'];
				
			}
			else {
				
				$start_date = date("Y", strtotime("-10 year", time()));
				$end_date = date("Y", time());
				
				$data = $this->_get_year_chart_info($start_date, $end_date);
				
				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;
				
				// 차트 타입
				$data['chart_type'] = 'line';
			}
			
			
			$this->_header();
			$this->load->view("admin_book_chart_year", array('data'=>$data));
			$this->_footer();
		}
		
		
		
		function period_chart() {
			
			// 로그인 체크
			if(!$this->_checkAdminLogin()){
				return;
			}
			
			
			if(isset($_POST['start_date']) && isset($_POST['end_date'])) {
				
				$start_date = $_POST['start_date'];
				$end_date = $_POST['end_date'];
				
				$data = $this->_get_period_chart_info($start_date, $end_date);
				
				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;
			}
			else {
				// 날짜 구하기
				$start_date = date("Y-m-d", strtotime("-10 month", time()));
				$end_date = date("Y-m-d", time());
				
				$data = $this->_get_period_chart_info($start_date, $end_date);
				
				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;
			}
			
			$this->_header();
			$this->load->view("admin_book_chart_period", array('data'=>$data));
			$this->_footer();
		}
	}
?>