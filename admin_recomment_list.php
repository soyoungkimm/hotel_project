
                <!-- Begin Page Content -->
                <div class="container-fluid">
					
                    <!-- Page Heading -->
                    <a href="/~team2/admin_comment" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Recomment</h1></a>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_recomment/add/<?=$data['comment_id']?>" class="btn btn-info btn-icon-split">
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
											<th>Content</th>
                                            <th>Writer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Id</th>
											<th>Content</th>
                                            <th>Writer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php
										foreach ($data['recomments'] as $recomment) {
									?>
										<tr>
											<td><a href="/~team2/admin_recomment/detail/<?=$recomment->id?>"><?=$recomment->id?><a></td>	
                                            <td><?=$recomment->content?></td>
										<?php
											foreach($data['users'] as $user) {
												if($user->id == $recomment->user_id) {
											?>		
													<td><a href="/~team2/admin_user/detail/<?=$user->id?>"><?=$user->name?></a></td>
										<?php
												}
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

