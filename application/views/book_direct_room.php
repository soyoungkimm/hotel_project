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

	.book-button {
		position: absolute;
		top: 60%;
		left: 50%;
		transform: translate(-50%, 230%);
	}
	
	#txt {
		width: 70%;
		height: 50px;
		border: 1px solid #ebebeb;
		border-radius: 2px;
		font-size: 16px;
		color: #19191a;
		
		font-weight: 500;
		padding-left: 20px;
	}
	
	
	#txt_tel {
		width: 10%;
		height: 50px;
		border: 1px solid #ebebeb;
		border-radius: 2px;
		font-size: 16px;
		color: #19191a;
		font-weight: 500;
		padding-left: 20px;
	}
	
	input::placeholder {
		color: #cbcbcb;
	}
	
	.dont_edit {
		background-color : #edf8ff;
		border: none;
	}
	
	
	</style>
	<meta charset=utf-8>
	<!-- Hero Section Begin -->
	<br><br><br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col" style="text-align : center;">
                        <h2><span class="sona-title1" style="opacity : 0">INDUK HOTEL</span> 
						<p><span class="sona-title2" style="opacity : 0"><?php if($this->session->userdata("uid")) echo "room 회원"; else echo "room 비회원";?> 예약 </span></p>                       
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
						<form name="form1" method="post" action="/~team2/book/direct_book_room/<?=$room_id?>">
							<div class="check-date" style="float : left; margin-left : 20px;">
								<label for="date-in">Check In:</label>
								<input type="text" class="date-input" name="date-in" value="<?=set_value('date-in')?>" readonly>
								<i class="icon_calendar"></i>
							</div>
							<div class="check-date" style="float : left; margin-left : 20px;">
								<label for="date-out">Check Out:</label>
								<input type="text" class="date-input" name="date-out" value="<?=set_value('date-out')?>" readonly>
								<i class="icon_calendar"></i>
							</div>
							<div class="select-option" id="pic_area" style="float : left; margin-left : 20px; width : 160px">
								<label for="guest">Guests:</label>
								<select name="guest">
								<?php
									// 유효성 검사 걸렸을 때
									if(set_value('guest') != '') {
										if(set_value('guest')==0) {
											echo("
											<option value='0' selected>1~2 people</option>
											<option value='1'>3~4 people</option>
											<option value='2'>5 or more people</option>");
										}
										else if(set_value('guest')==1) {
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
									}
									// 유효성 검사 안걸리면
									else {
										echo("
											<option value='0' selected>1~2 people</option>
											<option value='1'>3~4 people</option>
											<option value='2'>5 or more people</option>");
									}
                                ?>
								</select>
							</div>
							<div class="select-option" id="pic_area" style="float : left;  margin-left : 20px;">
								<div class="form-inline">
									<label for="breakfast">Breakfast:</label>
									<?	
										if(set_value('breakfast') != '') {
											if(set_value('breakfast')==1){
												echo("<input type='checkbox' class='book-checkbox' value='' checked readonly>");
											}
											else {
												echo("<input type='checkbox' class='book-checkbox' value='' readonly>");
											}
										}
										else {
											echo("<input type='checkbox' class='book-checkbox' value='' readonly>");
										}
									?>
									<input type="hidden" name="breakfast" value="0" />
								</div>
							</div>

							<!-- room 부분 시작-->
							<input type="hidden" name="room" id="room" value="<?=$room_id?>" />
							<input type="hidden" name="price" id="price" value="<?=$room_price->price?>" />
							<!-- room 부분 끝-->
							<br><br><br><br><br>
							<div style="margin-left :170px;">
								<div>
									객실 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input style="border: none;" class="dont_edit" type="text" value="<?=$room_name->name?>" id="txt" readonly>
								</div>
								<br>
								<div>
									가격 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input style="border: none;" class="dont_edit" type="text" value="<?=number_format($room_price->price)?>&#8361;" id="txt" readonly>
								</div>
								<br>
								<div style="margin-left : -53px"> 
									예약자 성명 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input style="width : 66%" type="text" name="name" size="20" maxlength="20" value="<?php if(isset($row->name)) echo $row->name; else { echo set_value("name");}?>" id="txt" placeholder="ex) 홍길동">
								</div>
								<br>
								<?
									if (isset($row->phone)) {
										$tel1 = trim(substr($row->phone,0,3));
										$tel2 = trim(substr($row->phone,3,4));
										$tel3 = trim(substr($row->phone,7,4));
									}
								?>
								<div style="margin-left : -34px"> 
									<div class="form-inline">
										전화번호 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input id="txt_tel" type="text" name="tel1" size="3" maxlength="3" value="<?php if(isset($tel1)) echo $tel1; else {set_value("tel1");}?>"  placeholder="ex) 010">&nbsp; - &nbsp;
										<input id="txt_tel" type="text" name="tel2" size="4" maxlength="4" value="<?php if(isset($tel2)) echo $tel2; else {set_value("tel2");}?>"  placeholder="ex) 1111">&nbsp; - &nbsp;
										<input id="txt_tel" type="text" name="tel3" size="4" maxlength="4" value="<?php if(isset($tel3)) echo $tel3; else {set_value("tel3");}?>"  placeholder="ex) 1111">
									</div>
								</div>
								<div style="color : red;"><?php echo validation_errors(); ?></div>
							</div>
							<br><br><br><br>
							<div>
								<button class="book-button" style="width:214px" type="submit">Check Availability</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>


<br><br><br>
<script>
	$('input[type="checkbox"]').on('change', function(e){
        if($(this).prop('checked'))
        {
            $(this).next().val(1);
        } else {
            $(this).next().val(0);
        }
	});
</script>