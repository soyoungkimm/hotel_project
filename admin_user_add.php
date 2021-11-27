	<style>
	.form-select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 100px;
    }
	</style>
			<!-- Begin Page Content -->
                <div class="container-fluid">
					
                    <!-- Page Heading -->
                    <a href="/~team2/admin_user" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;User</h1></a>
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
							<a onclick="document.addForm.submit();" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-check"></i>
								</span>
								<span class="text">확인</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<form method="post" action="/~team2/admin_user/add" name="addForm">
									<div style="color : red;"><?php echo validation_errors(); ?></div>
									<table class="table table-bordered">
									  <tbody>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">name <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">uid <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="uid" value="<?php echo set_value('uid'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">password <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="password" value="<?php echo set_value('password'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">phone <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">email <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">division <font color="red">*</font></th>
										  <td width="80%">
											<select class="form-select" aria-label="Default select example" name="division">
											<?php
											// 유효성 검사 걸렸을 때
											if (set_value('dision') != '') {
												if (set_value('dision') == 0) {
											?>		
													<option value="0" selected>회원</option>
													<option value="1">관리자</option>
											<?php
												}
												else {
											?>
													<option value="0" selected>회원</option>
													<option value="1" >관리자</option>
											<?php
												}
											}
											// 처음 들어왔을 때
											else {
											?>		
													<option value="0" selected>회원</option>
													<option value="1">관리자</option>
											<?php
											}
											?>
											</select>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">grade <font color="red">*</font></th>
										  <td width="80%">
											<select class="form-select" aria-label="Default select example" name="grade">
											<?php
											// 유효성 검사 걸렸을 때
											if (set_value('grade') != '') {
												if (set_value('grade') == 0) {
											?>		
												<option value="0" selected>일반</option>
												<option value="1">VIP</option>
											<?php
												}
												else {
											?>
												<option value="0">일반</option>
												<option value="1" selected>VIP</option>
											<?php
												}
											}
											// 처음 들어왔을 때
											else {
											?>		
												<option value="0" selected>일반</option>
												<option value="1">VIP</option>
											<?php
											}
											?>
											</select> 
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
