	
			<!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_bed" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Bed</h1></a>
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
							<a onclick="document.editForm.submit();" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-check"></i>
								</span>
								<span class="text">확인</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<form method="post" action="/~team2/admin_bed/edit/<?=$bed->id?>" name="editForm">
									<div style="color : red;"><?php echo validation_errors(); ?></div>
									<table class="table table-bordered">
									  <tbody>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">id</th>
										  <td width="80%">
											<input type="text" class="form-control" name="id" value="<?=$bed->id;?>" readonly>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">name <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="name" value="<?php if(set_value('name') != '') {echo set_value('name');} else {echo $bed->name;} ?>">
										  </td>
										</tr>
									  </tbody>
									</table>
								</form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
