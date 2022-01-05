	<style>
	.form-select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 200px;
    }
	</style>
			<!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_inquiry" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Q&A</h1></a>
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
								<form method="post" action="/~team2/admin_inquiry/edit/<?=$data['inquiry']->id?>" name="editForm">
									<div style="color : red;"><?php echo validation_errors(); ?></div>
									<table class="table table-bordered">
									  <tbody>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">id</th>
										  <td width="80%">
											<input type="text" class="form-control" name="id" value="<?=$data['inquiry']->id;?>" readonly>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">detail_id <font color="red">*</font></th>
										  <td width="80%">
											
											<select class="form-select" aria-label="Default select example" name="detail_id">
												<?php
												// 유효성 검사 걸렸을 때
												if (set_value('detail_id') != '') {
													foreach($data['inquiry_details'] as $inquiry_detail) {
														if (set_value('detail_id') == $inquiry_detail->id) {
												?>		
														<option value="<?=$inquiry_detail->id?>" selected>[<?=$inquiry_detail->id?>] <?=$inquiry_detail->name?></option>
												<?php
														}
														else {
												?>
														<option value="<?=$inquiry_detail->id?>">[<?=$inquiry_detail->id?>] <?=$inquiry_detail->name?></option>
												<?php			
														}
													}
												}
												// 처음 들어왔을 때
												else {
													foreach($data['inquiry_details'] as $inquiry_detail) {
														if ($data['inquiry']->detail_id == $inquiry_detail->id) {
												?>		
														<option value="<?=$inquiry_detail->id?>" selected>[<?=$inquiry_detail->id?>] <?=$inquiry_detail->name?></option>
												<?php
														}
														else {
												?>
														<option value="<?=$inquiry_detail->id?>">[<?=$inquiry_detail->id?>] <?=$inquiry_detail->name?></option>
												<?php			
														}
													}
												}
												?>
											</select>
											</td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">name <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="name" value="<?php if(set_value('name') != '') {echo set_value('name');} else {echo $data['inquiry']->name;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">email <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="email" value="<?php if(set_value('email') != '') {echo set_value('email');} else {echo $data['inquiry']->email;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">phone <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="phone" value="<?php if(set_value('phone') != '') {echo set_value('phone');} else {echo $data['inquiry']->phone;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">title <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="title" value="<?php if(set_value('title') != '') {echo set_value('title');} else {echo $data['inquiry']->title;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">content</th>
										  <td width="80%">
											<textarea class="form-control" name="content"  rows="15"><?php if(set_value('content') != '') {echo set_value('content');} else {echo $data['inquiry']->content;}?></textarea>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">state</th>
										  <td width="80%">
											<?php 
										// 유효성 검사에서 걸리면
										if (set_value('state') != '') {
											if (set_value('state') == 0) {
									?>	
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_select" value="0" checked>
											  <label class="form-check-label" for="breakfast_select">
												답변 전
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_not_select"  value="1">
											  <label class="form-check-label" for="breakfast_not_select">
												답변 완료
											  </label>
											</div>
									<?php
											}
											else {
									?>		
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_select" value="0">
											  <label class="form-check-label" for="breakfast_select">
												답변 전
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_not_select"  value="1" checked>
											  <label class="form-check-label" for="breakfast_not_select">
												답변 완료
											  </label>
											</div>
									<?php		
											}
										}
										// 처음 들어왔을 때
										else {
											if ($data['inquiry']->state == 0) {
									?>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_select" value="0" checked>
											  <label class="form-check-label" for="breakfast_select">
												답변 전
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_not_select"  value="1">
											  <label class="form-check-label" for="breakfast_not_select">
												답변 완료
											  </label>
											</div>
									<?php
											}
											else {
									?>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_select" value="0">
											  <label class="form-check-label" for="breakfast_select">
												답변 전
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="state" id="breakfast_not_select"  value="1" checked>
											  <label class="form-check-label" for="breakfast_not_select">
												답변 완료
											  </label>
											</div>
									<?php
											}
										}
									?>
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
