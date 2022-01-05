
                <!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_room" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Room</h1></a>
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
							<a href="/~team2/admin_room/edit/<?=$data['room']->id?>" class="btn btn-primary btn-icon-split">
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
										<input type="text" class="form-control" name="id" value="<?=$data['room']->id?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">name</th>
									  <td width="80%">
										<input type="text" class="form-control" name="name" value="<?=$data['room']->name?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">image</th>
									  <td width="80%">
										<input type="text" class="form-control" name="image" value="<?=$data['room']->image?>" readonly>
										<br>
										<img src="/~team2/my/img/room/<?=$data['room']->image?>" name="image" />
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">image2(room_detail_image)</th>
									  <td width="80%">
										<input type="text" class="form-control" name="image" value="<?=$data['room']->image2?>" readonly>
										<br>
										<img src="/~team2/my/img/room/<?=$data['room']->image2?>" name="image" />
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">price</th>
									  <td width="80%">
										<input type="text" class="form-control" name="price" value="<?=number_format($data['room']->price)?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">size</th>
									  <td width="80%">
										<input type="text" class="form-control" name="size" value="<?=$data['room']->size?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">bed</th>
									  <td width="80%">
										<?php
											foreach ($data['beds'] as $bed) {
												if($bed->id == $data['room']->bed_id) {
										?>		
											<input type="text" class="form-control" name="bed" value="<?=$bed->name?>" readonly>
										<?php
												}
											}
										?>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">number</th>
									  <td width="80%">
										<input type="text" class="form-control" name="number" value="<?=$data['room']->number?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">people_num</th>
									  <td width="80%">
										<input type="text" class="form-control" name="number" value="<?=$data['room']->people_num?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">service</th>
									  <td width="80%">
										<textarea rows="10" class="form-control" name="service" readonly><?=$data['room']->service?></textarea>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">content</th>
									  <td width="80%">
										<textarea rows="10" class="form-control" name="content" readonly><?=$data['room']->content?></textarea>
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
			  window.location.href = "/~team2/admin_room/delete/<?=$data['room']->id?>";
			}
		}
</script>