<style>

	header {
  text-align: center;
}

#calendar {
  width: 100%;  
}

#calendar a {
  color: #8e352e;
  text-decoration: none;
}

#calendar ul {
  list-style: none;
  padding: 0;
  margin: 0;
  width: 100%;
}

#calendar li {
  display: block;
  float: left;
  width:14.4%;
  padding: 5px;
  box-sizing:border-box;
  border: 1px solid #ccc;
  margin-right: -1px;
  margin-bottom: -1px;
}

#calendar ul.weekdays {
  height: 40px;
  background: #4273df;
}

#calendar ul.weekdays li {
  text-align: center;
  text-transform: uppercase;
  line-height: 20px;
  border: none !important;
  padding: 10px 6px;
  color: #fff;
  font-size: 13px;
}

#calendar .days li {
  height: 100px;
}

#calendar .days li:hover {
  background: #d3d3d3;
}

#calendar .date {
  text-align: center;
  margin-bottom: 5px;
  padding: 4px;
  
  color: #000;
  width: 40px;
  
  float: right;
}

#calendar .event {
  clear: both;
  display: block;
  font-size: 13px;
  border-radius: 4px;
  padding: 5px;
  margin-top: 40px;
  margin-bottom: 5px;
  line-height: 14px;
  background: #cbe2ff;
  border: none;
  color: #1472ff;
  text-decoration: none;
}

#calendar .event-desc {
  color: #666;
  margin: 3px 0 7px 0;
  text-decoration: none;  
}

#calendar .other-month {
  background: #f5f5f5;
  color: #666;
}

/* ============================
        Mobile Responsiveness
   ============================*/


@media(max-width: 768px) {

  #calendar .weekdays, #calendar .other-month {
    display: none;
  }

  #calendar li {
    height: auto !important;
    border: 1px solid #ededed;
    width: 100%;
    padding: 10px;
    margin-bottom: -1px;
  }

  #calendar .date {
    float: none;
  }
}
	
</style>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
					<br>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;통계</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
						
						<div class="col-xl-8 col-lg-7">
							<div class="card shadow mb-4">
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">예약 현황 (연도)</h6>
								</div>
								<div class="card-body">
									<div class="chart-bar">
										<canvas id="myBarChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						
                        
						
						<!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-lg-5">
							<div class="card border-left-success shadow h-10 py-2 " style="margin-top : 5px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                수입 (총)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
							<br>
							<div class="card border-left-primary shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                수입 (월)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<br>
							<br>
                            <div class="card border-left-warning shadow h-10 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                뭐하지</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
                        </div>
						
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">room 예약 현황 (총)</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Family room
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> VIP room
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Premium room
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						
						<!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">예약 현황 (월)</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						
                    </div>

                    <!-- Content Row -->
                    <div class="row">
							
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
							
                            <!--행사 달력 시작 -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">이번 달 행사</h6>
                                </div>
								<div id="calendar-wrap">
									<!--<header>
									  <h1>2021 11월</h1>
									</header>-->
									<div id="calendar">
									  <ul class="weekdays">
										<li>Sun</li>
										<li>Mon</li>
										<li>Tue</li>
										<li>Wed</li>
										<li>Thu</li>
										<li>Fri</li>
										<li>Sat</li>
									  </ul>

									  <!-- Days from previous month -->

									  <ul class="days">
										<li class="day other-month">
										  <div class="date">27</div>              
										</li>
										<li class="day other-month">
										  <div class="date">28</div>              
										</li>
										<li class="day other-month">
										  <div class="date">29</div>              
										</li>
										<li class="day other-month">
										  <div class="date">30</div>              
										</li>
										<li class="day other-month">
										  <div class="date">31</div>              
										</li>

										<!-- Days in current month -->

										<li class="day">
										  <div class="date">1</div>             
										</li>
										<li class="day">
										  <div class="date">2</div>
										  <div class="event">
											<div class="event-desc">
											  할인 행사
											</div>
											
										  </div>              
										</li>
									  </ul>

										<!-- Row #2 -->

									  <ul class="days">
										<li class="day">
										  <div class="date">3</div>             
										</li>
										<li class="day">
										  <div class="date">4</div>             
										</li>
										<li class="day">
										  <div class="date">5</div>             
										</li>
										<li class="day">
										  <div class="date">6</div>             
										</li>
										<li class="day">
										  <div class="date">7</div>
														
										</li>
										<li class="day">
										  <div class="date">8</div>             
										</li>
										<li class="day">
										  <div class="date">9</div>             
										</li>
									  </ul>

										<!-- Row #3 -->

									  <ul class="days">
										<li class="day">
										  <div class="date">10</div>              
										</li>
										<li class="day">
										  <div class="date">11</div>              
										</li>
										<li class="day">
										  <div class="date">12</div>              
										</li>
										<li class="day">
										  <div class="date">13</div>              
										</li>
										<li class="day">
										  <div class="date">14</div>            
										</li>
										<li class="day">
										  <div class="date">15</div>              
										</li>
										<li class="day">
										  <div class="date">16</div>              
										</li>
									  </ul>

										<!-- Row #4 -->

									  <ul class="days">
										<li class="day">
										  <div class="date">17</div>              
										</li>
										<li class="day">
										  <div class="date">18</div>              
										</li>
										<li class="day">
										  <div class="date">19</div>              
										</li>
										<li class="day">
										  <div class="date">20</div>              
										</li>
										<li class="day">
										  <div class="date">21</div>              
										</li>
										<li class="day">
										  <div class="date">22</div>             
										</li>
										<li class="day">
										  <div class="date">23</div>              
										</li>
									  </ul>

										  <!-- Row #5 -->

									  <ul class="days">
										<li class="day">
										  <div class="date">24</div>              
										</li>
										<li class="day">
										  <div class="date">25</div>
										  <div class="event">
											<div class="event-desc">
											  Meeting
											</div>
											<div class="event-time">
											  1:00pm
											</div>
										  </div>              
										</li>
										<li class="day">
										  <div class="date">26</div>              
										</li>
										<li class="day">
										  <div class="date">27</div>              
										</li>
										<li class="day">
										  <div class="date">28</div>              
										</li>
										<li class="day">
										  <div class="date">29</div>              
										</li>
										<li class="day">
										  <div class="date">30</div>              
										</li>
									  </ul>

									  <!-- Row #6 -->

									  <ul class="days">
										<li class="day">
										  <div class="date">31</div>              
										</li>
										<li class="day other-month">
										  <div class="date">1</div> <!-- Next Month -->             
										</li>
										<li class="day other-month">
										  <div class="date">2</div>             
										</li>
										<li class="day other-month">
										  <div class="date">3</div>             
										</li>
										<li class="day other-month">
										  <div class="date">4</div>             
										</li>
										<li class="day other-month">
										  <div class="date">5</div>             
										</li>
										<li class="day other-month">
										  <div class="date">6</div>             
										</li>
									  </ul>

									</div><!-- /. calendar -->
								</div><!-- /. wrap -->
							</div>
							<!--행사 달력 끝-->
						
							
							
							


                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">메모</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="/~team2/my/lib/admin_template/img/undraw_posting_photo.svg" alt="">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                </div>
                            </div>
							<!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">메모</h6>
                                </div>
                                <div class="card-body">
                                    <p>Add some quality, svg illustrations to your project courtesy of, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
									<p>Add some quality, svg illustrations to your project courtesy of, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
									<p>Add some quality, svg illustrations to your project courtesy of, a
                                        constantly updated collection of beautiful</p>
                                </div>
                            </div>
                            

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
			<!-- Page level plugins -->
    <script src="/~team2/my/lib/admin_template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/~team2/my/lib/admin_template/js/demo/chart-area-demo.js"></script>
    <script src="/~team2/my/lib/admin_template/js/demo/chart-pie-demo.js"></script>
	<script src="/~team2/my/lib/admin_template/js/demo/chart-bar-demo.js"></script>
