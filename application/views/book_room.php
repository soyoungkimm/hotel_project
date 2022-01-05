    <style>
	#room {
		color : #fff; 
		cursor : pointer;
	}

	.icon_calendar:before {
		color: #38b6ff;
	}

	.booking-form form .select-option .nice-select:after {
		border-bottom: 2px solid #38b6ff;
		border-right: 2px solid #38b6ff;
	}
	
	
	.room_service {
		
		height: 30px; 
		overflow: hidden;
		text-overflow: ellipsis;
		word-break: break-all;
		white-space: normal; 
		text-align: left;
		display: -webkit-box; 
		-webkit-line-clamp: 1; 
		-webkit-box-orient: vertical;
	}
	
	.layer {
		background-color: rgba(0, 0, 0, 0.3);
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 80%;
	}
	
	.hp-room-items .hp-room-item:hover .hr-text {
		bottom: 90px;
	}
	</style>
	
	<!-- Hero Section Begin -->
	<br><br><br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col" style="text-align : center;">
                        <h2><span class="sona-title1" style="opacity : 0">INDUK HOTEL</span> 
						<p><span class="sona-title2" style="opacity : 0"><?php if($this->session->userdata("uid")) echo "회원"; else echo "비회원";?> 예약 2단계 : room 선택</span></p>                       
                </div>
            </div>
        </div>
        <!--<div class="hero-slider">

        </div>-->
    </section>
    <!-- Hero Section End -->

	<section>
		<div class="container">
			<br><br>
			<div class="row">
				<div class="col sona-booking" style=" border-style : solid; border-width : 1.5px; border-color : #e5e5e5; padding-bottom : 10px; opacity : 0;">
					<div class="booking-form">
						<h3 style="float : left; margin-left:50px;">Room<br>Reservation</h3>
						<form name="form1" method="post" action="/~team2/book/book_room">
							<div class="check-date" style="float : left; margin-left : 30px;">
								<label for="date-in">Check In:</label>
								<input type="text" class="date-input" name="date-in" value="<?=$date_in?>" readonly>
								<i class="icon_calendar"></i>
							</div>
							<div class="check-date" style="float : left; margin-left : 30px;">
								<label for="date-out">Check Out:</label>
								<input type="text" class="date-input" name="date-out" value="<?=$date_out?>" readonly>
								<i class="icon_calendar"></i>
							</div>
							<div class="select-option" id="pic_area" style="float : left; margin-left : 30px; width : 160px">
								<label for="guest">Guests:</label>
								<select name="guest">
								<?
									if($guest==0) {
										echo("
										<option value='0' selected>1~2 people</option>
										<option value='1'>3~4 people</option>
										<option value='2'>5 or more people</option>");
									}

									else if($guest==1) {
										echo("
										<option value='0'>1~2 people</option>
										<option value='1' selected>3~4 people</option>
										<option value='2'>5 or more people</option>");									
									}

									else {
										echo("
										<option value='0'>1~2 people</option>
										<option value='1'>3~4 people</option>
										<option value='2' selected>5 or more people</option>");		
									}
                                ?>
								</select>
							</div>
							<div class="select-option" id="pic_area" style="float : left;  margin-left : 30px;">
								<div class="form-inline">
									<label for="breakfast">Breakfast:</label>
									<?
										if($breakfast==1){
											echo("<input type='checkbox' class='book-checkbox' name='breakfast' value='1' checked >");
										}
										else {
											echo("<input type='checkbox' class='book-checkbox' name='breakfast' value='1' >");
										}
									?>
									
									<!-- 로그인 여부
									<?
										if($this->session->userdata('division')==0) {
										}
										else {
										}
									?>
									-->
								</div>
							</div>
							
							<!-- room 부분 시작-->
							<input type="hidden" name="room" id="room" value="" />
							<input type="hidden" name="price" id="price" value="" />
							<!-- room 부분 끝-->
						</form>	
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>
	
<div class="container">
	<br><br>
	<div class="booking-form">
		<h2 style="text-align:center; margin-bottom:0px;">Choose a room</h2>
	</div>
</div>			
					
					
    <!-- Home Room Section Begin -->
	
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
					<div class="col-lg-2"></div>
                    <?php
						foreach($rooms as $room) {
					?>
                    <div class="col-lg-2 col-md-3" style="height : 450px;">
                        <div class="hp-room-item set-bg" data-setbg="/~team2/my/img/room/<?=$room->image?>">
							<div class="layer">
								<div class="hr-text">
									<h3><?=$room->name?></h3>
									<h2><?=number_format($room->price)?>&#8361;<span>/&nbsp;하루</span></h2>
									<table>
										<tbody>
											<tr>
												<td class="r-o">크기:</td>
												<td><?=$room->size?> m<sup>2</sup></td>
											</tr>
											<tr>
												<td class="r-o">최대 인원:</td>
												<td><?=$room->people_num?>명</td>
											</tr>
											<tr>
												<td class="r-o">침대:</td>
												
														<td><?=$room->bed_name?></td>
												
												
											</tr>
											<tr>
												<td class="r-o">서비스:</td>
												<td id="bed_service" class="room_service"><?=$room->service?></td>
											</tr>
										</tbody>
									</table>
									<a href="#" onclick="clickRoom(<?=$room->id?>, <?=$room->price?>);" class="primary-btn" name="room" id="room">Room 선택</a>
								</div>
							</div>
                        </div>
                    </div>
					<?php
						}
					?>
					<div class="col-lg-2"></div>
                </div>
            </div>
        </div>
	
    </section>
	
	
<br><br><br>
    <!-- Home Room Section End -->   
	<script>	
		// input hidden type으로 된거
		var room = document.getElementById('room');
		var price = document.getElementById('price');
		var form = document.form1;
		
		// Room 선택을 누르면 hidden type으로 된거 value에 room_id값이 들어감
		function clickRoom(room_id, price_id) {
			room.value = room_id;
			price.value = price_id;
			form.submit();
			// console.log(document.getElementById('room').value); 테스트용
		}
	</script>