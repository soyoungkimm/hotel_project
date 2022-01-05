	<style>
	.form-select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 300px;
    }

	#gd_sel {
	
		border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 100px;

	}
	</style>
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
							<a onclick="document.addForm.submit();" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-check"></i>
								</span>
								<span class="text">확인</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<form method="post" action="/~team2/admin_book/add" name="addForm">
									<div style="color : red;"><?php echo validation_errors(); ?></div>
									<table class="table table-bordered">
									  <tbody>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">user_id <font color="red">*</font></th>
										  <td width="80%">

											<select class="form-select" aria-label="Default select example" name="user_id">
												<option value="0">없음(비회원 예매)</option>
											<?php
											// 유효성 검사 걸렸을 때
												if (set_value('user_id') != '') {
													foreach ($data['users'] as $user) {
														if (set_value('user_id') == $user->id) {
											?>		
														<option value="<?=$user->id?>" selected>[<?=$user->id?>] <?=$user->name?></option>
											<?php
														}
														else {
											?>
														<option value="<?=$user->id?>" selected>[<?=$user->id?>] <?=$user->name?></option>
											<?php
														}
													}
												}
												else {
													foreach ($data['users'] as $user) {
											?>		
														<option value="<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></option>
											<?php
													}
												}
											?>
											</select>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">room_id <font color="red">*</font></th>
										  <td width="80%">
											
											<select class="form-select" aria-label="Default select example" name="room_id">
											<?php
											// 유효성 검사 걸렸을 때
												if (set_value('room_id') != '') {
													foreach ($data['rooms'] as $room) {
														if (set_value('room_id') == $room->id) {
											?>		
														<option value="<?=$room->id?>" selected>[<?=$room->id?>] <?=$room->name?></option>
											<?php
														}
														else {
											?>
														<option value="<?=$room->id?>" selected>[<?=$room->id?>] <?=$room->name?></option>
											<?php
														}
													}
												}
												else {
													foreach ($data['rooms'] as $room) {
											?>		
														<option value="<?=$room->id?>">[<?=$room->id?>] <?=$room->name?></option>
											<?php
													}
												}
											?>
											</select>

										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">checkin <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" id="datepicker" class="form-control" name="checkin" value="<?php echo set_value('checkin'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">checkout <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control datepicker" name="checkout" value="<?php echo set_value('checkout'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">people_num <font color="red">*</font></th>
										  <td width="80%">
											<select class="form-select" aria-label="Default select example" name="people_num" id="user_select">
											<?php
												if(set_value('people_num') != '') {
													if (set_value('people_num') == 0) {
														echo "<option value='0' selected>1 ~ 2 people</option>";
														echo "<option value='1'>3 ~ 4 people</option>";
														echo "<option value='2'>5 ~ more people</option>";
													}
													else if (set_value('people_num') == 1) {
														echo "<option value='0'>1 ~ 2 people</option>";
														echo "<option value='1' selected>3 ~ 4 people</option>";
														echo "<option value='2'>5 ~ more people</option>";
													}
													else {
														echo "<option value='0'>1 ~ 2 people</option>";
														echo "<option value='1'>3 ~ 4 people</option>";
														echo "<option value='2' selected>5 ~ more people</option>";
													}
												} 
												else {
													echo "<option value='0'>1 ~ 2 people</option>";
													echo "<option value='1'>3 ~ 4 people</option>";
													echo "<option value='2'>5 ~ more people</option>";
												}
											?>
											</select>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">breakfast <font color="red">*</font></th>
										  <td width="80%">
											<?php 
										// 유효성 검사에서 걸리면
										if (set_value('breakfast') != '') {
											if (set_value('breakfast') == 0) {
									?>	
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="breakfast" id="breakfast_select" value="0" checked>
											  <label class="form-check-label" for="breakfast_select">
												선택안함
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="breakfast" id="breakfast_not_select"  value="1">
											  <label class="form-check-label" for="breakfast_not_select">
												선택함
											  </label>
											</div>
									<?php
											}
											else {
									?>		
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="breakfast" id="breakfast_select" value="0">
											  <label class="form-check-label" for="breakfast_select">
												선택안함
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="breakfast" id="breakfast_not_select"  value="1" checked>
											  <label class="form-check-label" for="breakfast_not_select">
												선택함
											  </label>
											</div>
									<?php		
											}
										}
										// 처음 들어왔을 때
										else {
									?>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="breakfast" id="breakfast_select" value="0" checked>
											  <label class="form-check-label" for="breakfast_select">
												선택안함
											  </label>
											</div>
											<div class="form-check">
											  <input class="form-check-input" type="radio" name="breakfast" id="breakfast_not_select"  value="1">
											  <label class="form-check-label" for="breakfast_not_select">
												선택함
											  </label>
											</div>
									<?php
										}
									?>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">book_name <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="book_name" value="<?php echo set_value('book_name'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">book_phone <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="book_phone" value="<?php echo set_value('book_phone'); ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">price <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="price" value="<?php echo set_value('price'); ?>">
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
<script>
	
	$(function() {
		$( "#datepicker" ).datepicker();
		$( ".datepicker" ).datepicker();
	});
</script>