<style>
.star {
		position: relative;
		font-size: 3.5rem;
		color: #b1b1b1;
	  }
	  
	  .star input {
		width: 100%;
		height: 100%;
		position: absolute;
		left: 0;
		opacity: 0;
		cursor: pointer;
	  }
	  
	  .star span {
		width: 0;
		position: absolute; 
		left: 0;
		color: #ffe000;
		overflow: hidden;
		pointer-events: none;
	  }
	  
	  .card {
		  word-wrap: normal;
	  }
</style>
<!-- Begin Page Content -->

<?php
	$star_count = array();
	$count = 1;
	for ($i = 0; $i < 11; $i++) {
		foreach ($data['star_stc'] as $star_stc) {
			if ($star_stc->star == $i) {
				array_push($star_count, $star_stc->count);
				$count++;
				break;
			}
			else {
				// 끝까지 못찾았을 때
				if($count == count($data['star_stc'])) array_push($star_count, '0');
				$count++;
			}
		}
		$count = 1;
		
	}
?>
                <div class="container-fluid">

                    <!-- Page Heading -->
					<br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;Review 통계</h1>
                    </div>
                    <!-- Content Row -->

					<div class="row">
						<div class="col-xl-5 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">별점 평균</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style="text-align : center;">
                                    <div style="text-align : left;">
										<span class="star">
											★★★★★
											<span style=" width : <?=$data['avg']->avg * 20?>%">
												★★★★★
											</span>
										</span>
										<h2 style="float : right; margin-top : 32px"><?=$data['avg']->avg?> 점</h2>
									</div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-3 col-lg-4">
							<div class="card border-left-primary shadow h-10 py-2 " style="margin-top : 75px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											후기 총 개수</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['total_count']?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pencil-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
						
					</div>

                    <div class="row">
						
						<div class="col-xl-5 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">별점 분포</h6>
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
                        <div class="col-xl-7 col-lg-8">
							<div class="card border-left-info shadow h-10 py-2 " style="margin-top : 5px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                별점 별 후기 개수</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<br>
												<div class="row">
													<div class="col-xl-6">
														0점 : <?=$star_count[0]?><br><br><br>
														0.5점 : <?=$star_count[1]?><br><br><br>
														1점 : <?=$star_count[2]?><br><br><br>
														1.5점 : <?=$star_count[3]?><br><br><br>
														2점 : <?=$star_count[4]?><br><br><br>
														2.5점 : <?=$star_count[5]?><br>
													</div>
													<div class="col-xl-6">
														3점 : <?=$star_count[6]?><br><br><br>
														3.5점 : <?=$star_count[7]?><br><br><br>
														4점 : <?=$star_count[8]?><br><br><br>
														4.5점 : <?=$star_count[9]?><br><br><br>
														5점 : <?=$star_count[10]?><br><br><br>
													</div>
												</div>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <!--<i class="fas fa-bed fa-2x text-gray-300"></i>-->
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
		type: 'radar',
		data: {
			labels: [ // Date Objects
				'0점',
				'0.5점',
				'1점',
				'1.5점',
				'2점',
				'2.5점',
				'3점',
				'3.5점',
				'4점',
				'4.5점',
				'5점'
			],
			datasets: [{
				label: '후기 개수',
				backgroundColor: [
					//색상
					'rgba(255, 99, 132, 0.2)',
                ],
				borderColor: [
					//경계선 색상
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(255, 99, 132, 1)',
				],
				data: [
				<?php
					for ($i = 0; $i < 11; $i++) {
						echo $star_count[$i].",";	
					}
				?>
				],
				borderWidth: 2,//경계선 굵기
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

	