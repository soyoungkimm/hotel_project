<style>
	#calendar_icon {
		position: absolute; 
		left: 328px; 
		top: 27px; 
		color: gray;
	}
	
	#calendar_icon2 {
		position: absolute; 
		left: 535px; 
		top: 27px; 
		color: gray;
	}
	
	.datepicker {
		width : 180px;
	}
	
	.ui-datepicker-calendar {
		display: none;
    }​
</style>
				
				
				<div class="container-fluid">

                    <!-- Page Heading -->
					<br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;Book 통계</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
						
						<div class="col-xl-9 col-lg-8">
							<div class="card shadow mb-4">
								<form action="/~team2/admin_book_chart/month_chart" method="post" name="dateForm">
									<div class="card-header py-3 d-flex flex-row align-items-center">
										<input type="hidden" name="chart_type" id="chart_type" value="" />
										<h6 class="m-0 font-weight-bold text-primary">월별 예약 통계</h6>
										<input type="text" class="form-control datepicker" id="date1" name="start_date" value="<?php if($data['start_date'] != null) {echo $data['start_date'];} else {echo date("Y-m", strtotime("-10 month", time()));}?>" style="margin-left : 50px"/>
										<i class="fas fa-calendar-alt" id="calendar_icon"></i>
										&nbsp;&nbsp;~&nbsp;&nbsp;
										<input type="text" class="form-control datepicker" id="date2" name="end_date" value="<?php if($data['end_date'] != null) {echo $data['end_date'];} else {echo date("Y-m", time());}?>" />
										<i class="fas fa-calendar-alt" id="calendar_icon2"></i>
									</div>
								</form>
								<div class="card-body">
									<div class="chart-bar">
										<canvas id="myBarChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						
                        
						
						<!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-lg-4">
							<br><br>
							<button type="button" class="btn btn-info" onclick="select_chart_type('bar');">막대 그래프</button>
							<br><br>
							<button type="button" class="btn btn-info" onclick="select_chart_type('line');">선 그래프</button>
							<br><br><br>
							<div class="card border-left-primary shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">총 예약 수(<?php if($data['start_date'] != null) {echo $data['start_date'];} else {echo date("Y-m", strtotime("-10 month", time()));}?> ~ <?php if($data['end_date'] != null) {echo $data['end_date'];} else {echo date("Y-m", time());}?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['total_book_count']?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-bookmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
							<div class="card border-left-success shadow h-10 py-2 " style="margin-top : 5px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">총 수입(<?php if($data['start_date'] != null) {echo $data['start_date'];} else {echo date("Y-m", strtotime("-10 month", time()));}?> ~ <?php if($data['end_date'] != null) {echo $data['end_date'];} else {echo date("Y-m", time());}?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=number_format($data['total_book_income'])?> &#8361;</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-won-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>	
					
					
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="card shadow mb-4">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>Id</th>
													<th>Booker</th>
													<th>Room</th>
													<th>Checkin</th>
													<th>Checkout</th>
													<th>People_num</th>
													<th>Price</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Id</th>
													<th>Booker</th>
													<th>Room</th>
													<th>Checkin</th>
													<th>Checkout</th>
													<th>People_num</th>
													<th>Price</th>
												</tr>
											</tfoot>
											<tbody id="book_area">
											<?php
												foreach ($data['books'] as $book) {
											?>
			
												<tr>
													<td><a href="/~team2/admin_book/detail/<?=$book->id?>"><?=$book->id?></a></td>	
												<?php
													foreach($data['users'] as $user) {
														if($book->user_id == 0) {
															echo "<td>없음(비회원 예매)</td>";
															break;
														}
														if($user->id == $book->user_id) {
												?>		
														<td>
															<a href="/~team2/admin_user/detail/<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></a>
														</td>
												<?php
														}
													}

													foreach ($data['rooms'] as $room) {
														if ($room->id == $book->room_id) {
												?>
														<td><a href="/~team2/admin_room/detail/<?=$room->id?>">[<?=$room->id?>] <?=$room->name?></a></td>
												<?php
														}
													}
												?>
													<td><?=$book->checkin?></td>
													<td><?=$book->checkout?></td>
													<td>
													<?php
														if ($book->people_num == 0) {
															echo "1 ~ 2 people";
														}
														else if ($book->people_num == 1) {
															echo "3 ~ 4 people";
														}
														else {
															echo "5 ~ more people";
														}
													?>
													</td>
													<td><?=number_format($book->price)?></td>
												</tr>
											<?php
												}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
						</div>
						
                    </div>
				</div>
<!-- chart.js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>		

<script>

	$( function() {
		$( ".datepicker" ).datepicker({  
			
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			closeText: '확인',
			dateFormat: 'yy-mm',
			onClose: function(dateText, inst) { 
				var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
				var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
				$(this).datepicker('setDate', new Date(year, month, 1));
				
				submitForm();
			}
		});
	});
	
	
	
	$(document).ready(function() {
        
		document.getElementById('chart_type').value = '<?=$data['chart_type']?>';
    });
	
	
	
	function select_chart_type(type) {
		document.getElementById('chart_type').value = type;
		submitForm();
	}
	
	
	function submitForm() {
		
		// end_date에 월의 마지막 날짜 붙이기
		var end_date = document.getElementById('date2').value;
		var arr = end_date.split("-");
		arr[1] = arr[1].replace("0","")
		var lastDate = new Date(arr[0], arr[1], 0).getDate();
		end_date += "-" + lastDate;
		
		
		var form = document.dateForm;
				
		
		document.getElementById('date1').value = document.getElementById('date1').value + "-01";
		document.getElementById('date2').value = end_date;
		
		if(document.getElementById('chart_type').value == "") {
			document.getElementById('chart_type').value = 'bar';
		}
		
		
		form.submit();
	}
		
		
	


	var ctx = document.getElementById('myBarChart');
	
	var config = {
		type: '<?=$data['chart_type']?>',
		data: {
			labels: [ // Date Objects
				<?php
				foreach ($data['labels'] as $label) {
					echo "'".$label."',";
				}
				?>
			],
			datasets: [{
				label: '예약 수',
				<?php 
				// 막대 그래프일 때
				if($data['chart_type'] == 'bar') {
					echo "backgroundColor:  'rgba(75, 192, 192, 0.2)',";
					echo "borderColor: 'rgba(75, 192, 192, 1)',";
					echo "borderWidth: 1,//경계선 굵기";
				}
				// 선 그래프 일 때
				else {
					echo "backgroundColor:  'rgba(255, 99, 132, 0.2)',";
					echo "borderColor:  'rgba(255, 99, 132, 1)',";
				}
				?>
				fill: true,
				data: [
				<?php
					$count = 1;
					
					foreach ($data['labels'] as $label) {
						foreach ($data['datas'] as $val) {
							if ($val->month == $label) {
								echo "'".$val->count."',";
								$count++;
								break;
							}
							else {
								// 끝까지 못찾았을 때
								if($count == count($data['datas'])) echo "0, ";
								$count++;
							}
						}
						$count = 1;
						
					}
				?>
				],
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				text: 'Chart.js Time Scale'
			},
			scales: {
				yAxes: [{
					scaleLabel: {
						display: true,
						beginAtZero: true
					}
				}]
			},
		}
	};
	 
	//차트 그리기
	var myChart = new Chart(ctx, config);
</script>

	
	
	