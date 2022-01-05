
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">&nbsp;Event</h1>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_event/add" class="btn btn-info btn-icon-split">
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
											<th>Title</th>
                                            <th>Start</th>
                                            <th>End</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Id</th>
											<th>Title</th>
                                            <th>Start</th>
                                            <th>End</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
									<?php
										foreach ($data['events'] as $event) {
									?>
										<tr>
											<td><a href="/~team2/admin_event/detail/<?=$event->id?>"><?=$event->id?><a></td>	
											<td><?=$event->title?></td>
											<td><?=$event->start?></td>
											<td><?=$event->end?></td>	
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

