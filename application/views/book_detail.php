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
						<p><span class="sona-title2" style="opacity : 0"><?php if($this->session->userdata("uid")) echo "회원"; else echo "비회원";?> 예약 3단계(마지막) : 예약 상세</span></p>                       
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
						<form name="form1" method="post" action="/~team2/book/book_add">
							<div class="check-date" style="float : left; margin-left : 20px;">
								<label for="date-in">Check In:</label>
								<input type="text" class="date-input" name="date-in" value="<?=$date_in?>" readonly>
								<i class="icon_calendar"></i>
							</div>
							<div class="check-date" style="float : left; margin-left : 20px;">
								<label for="date-out">Check Out:</label>
								<input type="text" class="date-input" name="date-out" value="<?=$date_out?>" readonly>
								<i class="icon_calendar"></i>
							</div>
							<div class="select-option" id="pic_area" style="float : left; margin-left : 20px; width : 160px">
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
							<div class="select-option" id="pic_area" style="float : left;  margin-left : 20px;">
								<div class="form-inline">
									<label for="breakfast">Breakfast:</label>
									<?
										if($breakfast==1){
											echo("<input type='checkbox' class='book-checkbox' name='breakfast' value='1' checked readonly>");
										}
										else {
											echo("<input type='checkbox' class='book-checkbox' name='breakfast' value='1' readonly>");
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
							<input type="hidden" name="room" id="room" value="<?=$room->id?>" />
							<input type="hidden" name="price" id="price" value="<?=$price?>" />
							<!-- room 부분 끝-->
							<br><br><br><br><br>
							<div style="margin-left :170px;">
								<div>
									객실 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input style="border: none;" class="dont_edit" type="text" value="<?=$room->name?>" id="txt" readonly>
								</div>
								<br>
								<div>
									가격 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input style="border: none;" class="dont_edit" type="text" value="<?=number_format($price)?>&#8361;" id="txt" readonly>
								</div>
								<br>
								<div style="margin-left : -53px"> 
									예약자 성명 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input style="width : 66%" type="text" name="name" size="20" maxlength="20" value="<?php if(isset($row->name)) $row->name?>" id="txt" value="<?=set_value("name");?>" placeholder="ex) 홍길동">
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
										<input id="txt_tel" type="text" name="tel1" size="3" maxlength="3" value="<?php if(isset($tel1)) $tel1?>"  placeholder="ex) 010">&nbsp; - &nbsp;
										<input id="txt_tel" type="text" name="tel2" size="4" maxlength="4" value="<?php if(isset($tel2)) $tel2?>"  placeholder="ex) 1111">&nbsp; - &nbsp;
										<input id="txt_tel" type="text" name="tel3" size="4" maxlength="4" value="<?php if(isset($tel3)) $tel3?>"  placeholder="ex) 1111">
									</div>
								</div>
							</div>
							<!-- 원래 코드
							<table class="table table-bordered table-sm mymargin5">
								<tr>
									<td width="20%" style="vertical-align:middle; text-aglin:center;">
										객실
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<?=$room->name?>
										</div>
									</td>
								</tr>	
								<tr>
									<td width="20%" style="vertical-align:middle; text-aglin:center;">
										가격
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<?=number_format($price)?>&#8361;
										</div>
									</td>
								</tr>	
								<tr>
									<td width="20%" style="vertical-align:middle; text-aglin:center;">
										예약자 성명
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<input  type="text" name="name" size="20" maxlength="20" value="<?=set_value("name");?>">		
										</div>
									</td>
								</tr>		
								<tr>
									<td width="20%" style="vertical-align:middle; text-aglin:center;">
										전화번호
									</td>
									<td width="80%" align="left">
										<div class="form-inline">
											<input  type="text" name="tel1" size="3" maxlength="3" value="" > - 
											<input  type="text" name="tel2" size="4" maxlength="4" value="" > - 
											<input  type="text" name="tel3" size="4" maxlength="4" value="" >
										</div>
									</td>
								</tr>
							</table>-->
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
