
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_book" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Book</h1></a>
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
							<a href="/~team2/admin_book/edit/<?=$data['book']->id?>" class="btn btn-primary btn-icon-split">
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
										<input type="text" class="form-control" value="<?=$data['book']->id?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">user_id</th>
									  <td width="80%">
										<input type="text" class="form-control" value="<?php if($data['book']->user_id == 0) { echo "없음(비회원 예약)"; } else { echo "[".$data['user']->id."] ".$data['user']->name; }?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">room_id</th>
									  <td width="80%">
										<input type="text" class="form-control" value="[<?=$data['room']->id?>] <?=$data['room']->name?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">checkin</th>
									  <td width="80%">
										<input type="text" class="form-control" value="<?=$data['book']->checkin?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">checkout</th>
									  <td width="80%">
										<input type="text" class="form-control" value="<?=$data['book']->checkout?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">people_num</th>
									  <td width="80%">
										<input type="text" class="form-control" value="<?php
												if ($data['book']->people_num == 0) {
													echo "1 ~ 2 people";
												}
												else if ($data['book']->people_num == 1) {
													echo "3 ~ 4 people";
												}
												else {
													echo "5 ~ more people";
												}
											?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">breakfast</th>
									  <td width="80%">
										<?php
										
											if ($data['book']->breakfast == 0) {
										?>
											<input type="text" class="form-control" value="선택 안함" readonly>
										<?php
											}
											else {
										?>
											<input type="text" class="form-control" value="선택함" readonly>
										<?php
											}
										?>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">book_name</th>
									  <td width="80%">
										<input type="text" class="form-control" value="<?=$data['book']->book_name?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">book_phone</th>
									  <td width="80%">
										<input type="text" class="form-control" value="<?=$data['book']->book_phone?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">price</th>
									  <td width="80%">
										<input type="text" class="form-control" value="<?=number_format($data['book']->price)?>" readonly>
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
		  window.location.href = "/~team2/admin_book/delete/<?=$data['book']->id?>";
		}
	}
</script>