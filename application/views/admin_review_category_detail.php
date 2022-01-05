
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_review_category" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Review Category</h1></a>
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
							<a href="/~team2/admin_review_category/edit/<?=$category->id?>" class="btn btn-primary btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-pen"></i>
								</span>
								<span class="text">수정</span>
							</a>
							&nbsp;&nbsp;
							<a onclick="pressDeleteUser();" class="btn btn-danger btn-icon-split">
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
										<input type="text" class="form-control" name="id" value="<?=$category->id?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">name</th>
									  <td width="80%">
										<input type="text" class="form-control" name="name" value="<?=$category->name?>" readonly>
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
	function pressDeleteUser() {
		var answer = confirm('정말로 삭제하시겠습니까?');
		if (answer) {
		  window.location.href = "/~team2/admin_review_category/delete/<?=$category->id?>";
		}
	}
</script>