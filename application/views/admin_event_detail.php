
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_event" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Event</h1></a>
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
							<a href="/~team2/admin_event/edit/<?=$event->id?>" class="btn btn-primary btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-pen"></i>
								</span>
								<span class="text">수정</span>
							</a>
							&nbsp;&nbsp;
							<a onclick="pressDelete();" class="btn btn-danger btn-icon-split">
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
										<input type="text" class="form-control" name="id" value="<?=$event->id?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">title</th>
									  <td width="80%">
										<input type="text" class="form-control" name="title" value="<?=$event->title?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">color</th>
									  <td width="80%">
										<input type="text" class="form-control" name="color" value="<?=$event->color?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">start</th>
									  <td width="80%">
										<input type="text" class="form-control" name="content" value="<?=$event->start?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">end</th>
									  <td width="80%">
										<input type="text" class="form-control" name="end" value="<?=$event->end?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">content</th>
									  <td width="80%">
										<input type="text" class="form-control" name="writeday" value="<?=$event->content?>" readonly>
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
	function pressDelete() {
		var answer = confirm('정말로 삭제하시겠습니까?');
		if (answer) {
		  window.location.href = "/~team2/admin_event/delete/<?=$event->id?>";
		}
	}
</script>