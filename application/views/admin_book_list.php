
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">&nbsp;Book</h1>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_book/add" class="btn btn-info btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-plus"></i>
								</span>
								<span class="text">추가</span>
							</a>
                        </div>
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
                                    <tbody>
                                        
									<?php
										foreach ($data['books'] as $book) {
									?>
										<tr>
											<td><a href="/~team2/admin_book/detail/<?=$book->id?>"><?=$book->id?><a></td>	
										<?php
											foreach($data['users'] as $user) {
												if($book->user_id == 0) {
													echo "<td>없음(비회원 예매)</td>";
													break;
												}
												if($user->id == $book->user_id) {
											?>		
													<td><a href="/~team2/admin_user/detail/<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></a></td>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

