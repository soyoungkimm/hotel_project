    <style>
	#btn {
	  background-color : #38b6ff;
	  border : none;
	}
	</style>
	
	<meta charset=utf-8>
	<br><br><br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col" style="text-align : center;">
                        <h2><span class="sona-title1" style="opacity : 0">INDUK HOTEL</span> 
						<p><span class="sona-title2" style="opacity : 0">예약 완료</span></p>                       
                </div>
            </div>
        </div>
        <!--<div class="hero-slider">

        </div>-->
    </section>
    <!-- Hero Section End -->
	<br>
	<?php
		$tel1 = trim(substr($book_phone,0,3));
		$tel2 = trim(substr($book_phone,3,4));
		$tel3 = trim(substr($book_phone,7,4));
	?>
	<div class="container sona-booking" style="opacity : 0;">
		<div class="booking-form">
			<h5 style="text-align:center; margin-bottom:0px; font-family : 'Cabin';">예약이 성공적으로 완료되었습니다.</h5>
		</div>
		<div class="row">
			<div class="col-xl-3"></div>
            <div class="col-xl-6">
				<div class="booking-form" style="border: 1px solid ; border-color : rgb(229, 229, 229);">
					<form action="#">
						<div class="check-date">
							<label id="pic_area">예약자 성명:</label>
							<input type="text" value="<?=$book_name?>"  readonly>
						</div>
						<div class="check-date">
							<label for="date-out">전화번호:</label>
							<input type="text" value="<?=$tel1?>-<?=$tel2?>-<?=$tel3?>" id="date-out" readonly>
						</div>
						<div class="check-date" >
							<label for="date-in">Check In 날짜:</label>
							<input type="text" value="<?=$checkin?>" id="date-in" readonly>
						</div>
						<div class="check-date">
							<label for="date-out">Check Out 날짜:</label>
							<input type="text" value="<?=$checkout?>" id="date-out" readonly>
						</div>
						<div class="check-date">
							<label for="date-out">객실:</label>
							<input type="text" value="<?=$room_name->name?>" id="date-out" readonly>
						</div>
						
					
						<div class="check-date">
							<label for="date-out">인원:</label>
						<?php
							if ($people_num == 0) {
								echo '<input type="text" value="1 ~ 2 people" id="date-out" readonly>';
							}
							else if ($people_num == 1) {
								echo '<input type="text" value="3 ~ 4 people" id="date-out" readonly>';
							}
							else if ($people_num == 2) {
								echo '<input type="text" value="5 ~ more people" id="date-out" readonly>';
							}
						?>
						</div>
						<div class="check-date">
							<label for="date-out">조식:</label>
							<?php
							if ($breakfast == 0) {
								echo '<input type="text" value="선택안함" id="date-out" readonly>';
							}
							else {
								echo '<input type="text" value="선택함" id="date-out" readonly>';
							}
						?>
						</div>
						<div class="check-date">
							<label for="date-out">가격:</label>
							<input type="text" value="<?=number_format($price)?>&#8361;" id="date-out" readonly>
						</div>
					</form>
				</div>
			</div>
			<div class="col-xl-3"></div>
		</div>
	</div>		
	<br><br><br><br>
	<div style="text-align : center;">
		<button type='button' id='btn' class='btn btn-primary' onclick="location.href='/~team2/'">메인화면으로</button>
	</div>
		
	<br><br><br><br>

    <!-- Blog Section End -->

    