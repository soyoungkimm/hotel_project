
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">&nbsp;Room</h1>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_room/add" class="btn btn-info btn-icon-split">
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
                                            <th>Name</th>
                                            <th>Bed</th>
											<th>Price</th>
											<th>Number</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Id</th>
                                            <th>Name</th>
                                            <th>Bed</th>
											<th>Price</th>
											<th>Number</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
										foreach ($data['rooms'] as $room) {
									?>
										<tr>
											<td><a href="/~team2/admin_room/detail/<?=$room->id?>"><?=$room->id?><a></td>
                                            <td><?=$room->name?></td>
											<?php
											foreach ($data['beds'] as $bed) {
												if ($room->bed_id == $bed->id) {
											?>
												<td><?=$bed->name?></td>
											<?php
												}
											}
											?>
                                            <td><?=number_format($room->price)?></td>
											<td><?=$room->number?></td>
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

