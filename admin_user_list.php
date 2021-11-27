
                <!-- Begin Page Content -->
                <div class="container-fluid">
					
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">&nbsp;User</h1>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_user/add" class="btn btn-info btn-icon-split">
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
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Divisoin</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Id</th>
                                            <th>Name</th>
                                            <th>Uid</th>
                                            <th>Email</th>
                                            <th>Divisoin</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
									<?php
										foreach ($data['user'] as $user) {
									?>
										<tr>
											<td><a href="/~team2/admin_user/detail/<?=$user->id?>"><?=$user->id?><a></td>
                                            <td><?=$user->name?></td>
                                            <td><?=$user->uid?></td>
                                            <td><?=$user->email?></td>
                                            <?php
											if($user->division == 0) {
											?>		
												<td>회원</td>
										<?php
											}
											else {
										?>
												<td>관리자</td>
										<?php
											}
										?>
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

