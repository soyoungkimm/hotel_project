
                <!-- Begin Page Content -->
                <div class="container-fluid">
					
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">&nbsp;Comment</h1>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right;">
							<a href="/~team2/admin_comment/add" class="btn btn-info btn-icon-split">
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
                                            <th>Review_id</th>
                                            <th>Recomment</th>
											<th>Recomment 추가</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Id</th>
											<th>Content</th>
                                            <th>Writer</th>
                                            <th>Review_id</th>
                                            <th>Recomment</th>
											<th>Recomment 추가</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
									<?php
										foreach ($data['comments'] as $comment) {
									?>
										<tr>
											<td><a href="/~team2/admin_comment/detail/<?=$comment->id?>"><?=$comment->id?><a></td>	
                                            <td><?=$comment->content?></td>
										<?php
											foreach($data['users'] as $user) {
												if($user->id == $comment->user_id) {
											?>		
													<td><a href="/~team2/admin_user/detail/<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></a></td>
										<?php
												}
											}
										?>	
										<?php
											foreach($data['reviews'] as $review) {
												if($review->id == $comment->review_id) {
											?>		
													<td><a href="/~team2/admin_review/detail/<?=$review->id?>">[<?=$review->id?>] <?=$review->title?></a></td>
										<?php
												}
											}
										?>
											
											<td>
										<?php
											foreach ($data['recomments'] as $recomment) {
												if($recomment->comment_id == $comment->id) {
										?>		
													<a href="/~team2/admin_recomment/list/<?=$comment->id?>">go -></a>
										<?php
													break;
												}		
											}	
										?>
											</td>
											
											<td><a href="/~team2/admin_recomment/add/<?=$comment->id?>">추가<a></td>	
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

