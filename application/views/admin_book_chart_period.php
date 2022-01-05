
<style>
	#calendar_icon {
		position: absolute; 
		left: 345px; 
		top: 27px; 
		color: gray;
	}
	
	#calendar_icon2 {
		position: absolute; 
		left: 551px; 
		top: 27px; 
		color: gray;
	}
	
	.datepicker{
		width : 180px;
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
						<!-- Pending Requests Card Example -->
						<div class="col-xl-3 col-lg-4">
							<div class="card border-left-primary shadow h-10 py-2">
                                <div class="card-body">
									<div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">총 예약 수(<?=$data['start_date']?> ~ <?=$data['end_date']?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['total_book_count']?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-bookmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-xl-3 col-lg-4">
							<div class="card border-left-success shadow h-10 py-2">
                                <div class="card-body">
									<div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">총 수입(<?=$data['start_date']?> ~ <?=$data['end_date']?>)</div>
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
					<br>
					
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="card shadow mb-4">
								<form action="/~team2/admin_book_chart/period_chart" method="post" name="dateForm">
									<div class="card-header py-3 d-flex flex-row align-items-center">
										<input type="hidden" name="chart_type" id="chart_type" value="" />
										<h6 class="m-0 font-weight-bold text-primary">기간별 예약 통계</h6>
										<input type="text" class="datepicker form-control" id="date1" name="start_date" value="<?=$data['start_date']?>" style="margin-left : 50px"/>
										<i class="fas fa-calendar-alt" id="calendar_icon"></i>
										&nbsp;&nbsp;~&nbsp;&nbsp;
										<input type="text" class="datepicker form-control" id="date2" name="end_date" value="<?=$data['end_date']?>" />
										<i class="fas fa-calendar-alt" id="calendar_icon2"></i>
									</div>
								</form>
								
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
				
				
<script>
	$( function() {
		$( ".datepicker" ).datepicker({
			dateFormat: 'yy-mm-dd',
			onSelect: function() {
				document.dateForm.submit();
			}
			
		});
			
	});
</script>
	