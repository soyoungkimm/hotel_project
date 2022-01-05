
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">&nbsp;Q&A</h1>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_inquiry/add" class="btn btn-info btn-icon-split">
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
											<th>Inquiry Type</th>
                                            <th>Title</th>
                                            <th>Writer Name</th>
											<th>State</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Id</th>
											<th>Inquiry Type</th>
                                            <th>Title</th>
                                            <th>Writer Name</th>
											<th>State</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
									<?php
										foreach ($data['inquirys'] as $inquiry) {
									?>
										<tr>
											<td><a href="/~team2/admin_inquiry/detail/<?=$inquiry->id?>"><?=$inquiry->id?></a></td>	
											<td><a href="/~team2/admin_inquiry_detail/detail/<?=$inquiry->detail_id?>">[<?=$inquiry->detail_id?>] <?=$inquiry->detail_name?></a></td>
											<td><?=$inquiry->title?></td>
											<td><?=$inquiry->name?></td>
									<?php
										// 답변 전
										if ($inquiry->state == 0) {
									?>
											<td>답변 전(0)</td>
									<?php
										}
										else {
									?>
											<td>답변 완료(1)</td>
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

