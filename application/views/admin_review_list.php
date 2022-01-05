
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">&nbsp;Review</h1>
                    <br>
					
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_review/add" class="btn btn-info btn-icon-split">
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
                                            <th>Writeday</th>
                                            <th>Writer</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Id</th>
											<th>Title</th>
                                            <th>Writeday</th>
                                            <th>Writer</th>
                                            <th>Category</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
									<?php
										foreach ($data['reviews'] as $review) {
									?>
										<tr>
											<td><a href="/~team2/admin_review/detail/<?=$review->id?>"><?=$review->id?></a></td>
											<td><?=$review->title?></td>
											<td><?=$review->writeday?></td>
									<?php
											foreach($data['users'] as $user) {
												if($review->user_id == $user->id) {
									?>
                                            <td><a href="/~team2/admin_user/detail/<?=$user->id?>">[<?=$user->id?>]&nbsp;<?=$user->name?></a></td>
									<?php
												}
											}
											
											foreach($data['categorys'] as $category) {
												if($review->category_id == $category->id) {
									?>
											<td><?=$category->name?></td>
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

