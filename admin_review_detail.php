
                <!-- Begin Page Content -->
                <div class="container-fluid">
					
                    <!-- Page Heading -->
                    <a href="/~team2/admin_review" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Review</h1></a>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right">
							<a onclick="window.history.back();" class="btn btn-secondary btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-arrow-right"></i>
								</span>
								<span class="text">뒤로가기</span>
							</a>
							&nbsp;&nbsp;
							<a href="/~team2/admin_review/edit/<?=$data['review']->id?>" class="btn btn-primary btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-pen"></i>
								</span>
								<span class="text">수정</span>
							</a>
							&nbsp;&nbsp;
							<a onclick="pressDeleteReview();" class="btn btn-danger btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-trash"></i>
								</span>
								<span class="text">삭제</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<table class="table table-bordered">
								  <tbody>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">id</th>
									  <td width="80%">
										<input type="text" class="form-control" name="id" value="<?=$data['review']->id?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">writer</th>
									  <td width="80%">
										<input type="text" class="form-control" name="user_id" value="<?=$data['user']->name?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">star</th>
									  <td width="80%">
										<input type="text" class="form-control" name="star" value="<?=$data['review']->star?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">title</th>
									  <td width="80%">
										<input type="text" class="form-control" name="title" value="<?=$data['review']->title?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">writeday</th>
									  <td width="80%">
										<input type="text" class="form-control" name="writeday" value="<?=$data['review']->writeday?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">category</th>
									  <td width="80%">
										<?php
											foreach ($data['category'] as $category) {
												if($category->id == $data['review']->category_id) {
										?>		
											<input type="text" class="form-control" name="category" value="<?=$category->name?>" readonly>
										<?php
												}
											}
										?>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">image</th>
									  <td width="80%">
										<?php
											if($data['review']->image == null) {
										?>		
												없음
										<?php
											}
											else {
										?>
												<img src="/~team2/my/img/review/<?=$data['review']->image?>" name="image" readonly>
										<?php
											}
										?>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">content</th>
									  <td width="80%">
										<textarea rows="10" class="form-control" name="content" readonly><?=$data['review']->content?></textarea>
									  </td>
									</tr>
								  </tbody>
								</table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<script>
		function pressDeleteReview() {
			var answer = confirm('정말로 삭제하시겠습니까?');
			if (answer) {
			  window.location.href = "/~team2/admin_review/delete/<?=$data['review']->id?>";
			}
		}
</script>