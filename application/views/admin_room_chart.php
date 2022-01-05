<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
					<br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;Room 통계</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
						
						<div class="col-xl-5 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">room별 예약 횟수 통계</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style="text-align : center;">
                                    <div style="height : 42vh; width : 32vw;">
										<canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        
						
						<!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-lg-4">
							<div class="card border-left-danger shadow h-10 py-2 " style="margin-top : 5px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Family room</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['room_stc'][0]->count?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bed fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
							
							<div class="card border-left-info shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Standard Room</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['room_stc'][1]->count?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bed fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
							
                            <div class="card border-left-warning shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                VIP room</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['room_stc'][2]->count?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bed fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<br>
							
							<div class="card border-left-success shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Deluxe Suite room</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['room_stc'][3]->count?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bed fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						<div class="col-xl-4 col-lg-5">
							<div class="card border-left-danger shadow h-10 py-2 " style="margin-top : 5px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Family room 총 수익</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=number_format($data['room_stc'][0]->total_price)?> &#8361;</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-won-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
							
							<div class="card border-left-info shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Standard Room 총 수익</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=number_format($data['room_stc'][1]->total_price)?> &#8361;</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-won-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
							
                            <div class="card border-left-warning shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                VIP room 총 수익</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=number_format($data['room_stc'][2]->total_price)?> &#8361;</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-won-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<br>
							
							<div class="card border-left-success shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Deluxe Suite room 총 수익</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=number_format($data['room_stc'][3]->total_price)?> &#8361;</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-won-sign fa-2x text-gray-300"></i>
                                        </div>
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
	var ctx = document.getElementById('myChart');
	
	var config = {
		type: 'pie',
		data: {
			labels: [ // Date Objects
			<?php
				foreach ($data['room_stc'] as $room_stc) {
					echo "'".$room_stc->room_name."',";
				}
			?>
			],
			datasets: [{
				
				backgroundColor: [
					//색상
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(28, 200, 138, 0.2)',
                ],
				borderColor: [
					//경계선 색상
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(28, 200, 138, 1)',
				],
				borderWidth: 1,//경계선 굵기
				fill: false,
				data: [
				<?php
					foreach ($data['room_stc'] as $room_stc) {
						echo "'".$room_stc->count."',";
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
            xAxes: [{
				gridLines: {
					display:false
				}
			}],
			yAxes: [{
				gridLines: {
					display:false
				}   
			}]
        }
	};
	 
	//차트 그리기
	var myChart = new Chart(ctx, config);
</script>

	