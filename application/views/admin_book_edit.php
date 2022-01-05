<style>
	#user_select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 200px;
    }
	
	#review_select {
		border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width :  200px;
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
							<a onclick="document.editForm.submit();" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-check"></i>
								</span>
								<span class="text">확인</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<form method="post" action="/~team2/admin_book/edit/<?=$data['book']->id?>" name="editForm">
								<div style="color : red;"><?php echo validation_errors(); ?></div>
								<table class="table table-bordered">
								  <tbody>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">id</th>
									  <td width="80%">
										<input type="text" class="form-control" name="id" value="<?=$data['book']->id?>" readonly>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">user_id</th>
									  <td width="80%">
										<select class="form-select" aria-label="Default select example" name="user_id" id="user_select">
											<option value="0">없음(비회원 예매)</option>
										<?php
											// 유효성 검사에서 안걸리면
											if (set_value('user_id') == '') {
												foreach ($data['users'] as $user) {
													if ($user->id == $data['book']->user_id) {
											?>		
													<option value="<?=$user->id?>" selected>[<?=$user->id?>] <?=$user->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></option>
											<?php
													}
												}
											}	
											// 유효성 검사에서 걸리면
											else {
												foreach ($data['users'] as $user) {
													if($user->id == set_value('user_id')) {
											?>
													<option value="<?=$user->id?>" selected>[<?=$user->id?>] <?=$user->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></option>
											<?php
													}
												}
											}
											?>
										</select>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">room_id</th>
									  <td width="80%">
										<select class="form-select" aria-label="Default select example" name="room_id" id="review_select">
										<?php
											// 유효성 검사에서 걸리면
											if (set_value('room_id') != '') {
												foreach ($data['rooms'] as $room) {
													if (set_value('room_id') == $room->id) {
											?>		
													<option value="<?=$room->id?>" selected>[<?=$room->id?>] <?=$room->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$room->id?>">[<?=$room->id?>] <?=$room->title?></option>
											<?php
													}
												}
											}	
											// 처음 들어올 때
											else {
												foreach ($data['rooms'] as $room) {
													if($room->id == $data['book']->room_id) {
											?>
													<option value="<?=$room->id?>" selected>[<?=$room->id?>] <?=$room->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$room->id?>">[<?=$room->id?>] <?=$room->name?></option>
											<?php
													}
												}
											}
											?>
										</select>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">checkin</th>
									  <td width="80%">
										<input type="text" id="datepicker" class="form-control" name="checkin" value="<?php if(set_value('checkin') != '') {echo set_value('checkin');} else {echo $data['book']->checkin;} ?>">
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">checkout</th>
									  <td width="80%">
										<input type="text" class="form-control datepicker" name="checkout" value="<?php if(set_value('checkout') != '') {echo set_value('checkout');} else {echo $data['book']->checkout;} ?>">
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">people_num</th>
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
											} else {
												if ($data['book']->people_num == 0) {
													echo "<option value='0' selected>1 ~ 2 people</option>";
													echo "<option value='1'>3 ~ 4 people</option>";
													echo "<option value='2'>5 ~ more people</option>";
												}
												else if ($data['book']->people_num == 1) {
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
										?>
										</select>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">breakfast</th>
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
											if ($data['book']->breakfast == 0) {
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
									?>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">book_name</th>
									  <td width="80%">
										<input type="text" class="form-control" name="book_name" value="<?php if(set_value('book_name') != '') {echo set_value('book_name');} else {echo $data['book']->book_name;} ?>">
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">book_phone</th>
									  <td width="80%">
										<input type="text" class="form-control" name="book_phone" value="<?php if(set_value('book_phone') != '') {echo set_value('book_phone');} else {echo $data['book']->book_phone;} ?>">
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">price</th>
									  <td width="80%">
										<input type="text" class="form-control" name="price" value="<?php if(set_value('price') != '') {echo set_value('price');} else {echo $data['book']->price;} ?>">
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
	
	$(function() {
		$( "#datepicker" ).datepicker();
		$( ".datepicker" ).datepicker();
	});
</script>