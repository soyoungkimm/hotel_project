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
	
	#btn {
	  background-color : #38b6ff;
	  border : none;
	}
	
	
	</style>
	<!-- Hero Section Begin -->
	<br><br><br><br>
    <section>
        <div class="container">
            <div class="row">
                <div class="col" style="text-align : center;">
					<h5 style="font-family: 'Cabin';" id="pic_area">비회원 예약 확인</h5>                    
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
			<?php
				foreach ($data['books'] as $book) {
					$tel1 = trim(substr($book->book_phone,0,3));
					$tel2 = trim(substr($book->book_phone,3,4));
					$tel3 = trim(substr($book->book_phone,7,4));
			?>
			<div class="row">
				<div class="col-xl-3"></div>
                <div class="col-xl-6">
				
                    <div class="booking-form sona-booking" style="border: 1px solid ; border-color : rgb(229, 229, 229);">
                        <form action="#">
							<div class="check-date">
                                <label for="date-out">예약자 성명:</label>
                                <input type="text" value="<?=$book->book_name?>" id="date-out" readonly>
                            </div>
							<div class="check-date">
                                <label for="date-out">전화번호:</label>
                                <input type="text" value="<?=$tel1?>-<?=$tel2?>-<?=$tel3?>" id="date-out" readonly>
                            </div>
                            <div class="check-date" >
                                <label for="date-in">Check In 날짜:</label>
                                <input type="text" value="<?=$book->checkin?>" id="date-in" readonly>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out 날짜:</label>
                                <input type="text" value="<?=$book->checkout?>" id="date-out" readonly>
                            </div>
							<div class="check-date">
                                <label for="date-out">객실:</label>
                                <input type="text" value="<?=$book->room_name?>" id="date-out" readonly>
                            </div>
							<div class="check-date">
                                <label for="date-out">인원:</label>
							<?php
								if ($book->people_num == 0) {
									echo '<input type="text" value="1 ~ 2 people" id="date-out" readonly>';
								}
								else if ($book->people_num == 1) {
									echo '<input type="text" value="3 ~ 4 people" id="date-out" readonly>';
								}
								else if ($book->people_num == 2) {
									echo '<input type="text" value="5 ~ more people" id="date-out" readonly>';
								}
							?>
							</div>
							<div class="check-date">
                                <label for="date-out">조식:</label>
								<?php
								if ($book->breakfast == 0) {
									echo '<input type="text" value="선택안함" id="date-out" readonly>';
								}
								else {
									echo '<input type="text" value="선택함" id="date-out" readonly>';
								}
							?>
                            </div>
							<div class="check-date">
                                <label for="date-out">가격:</label>
                                <input type="text" value="<?=number_format($book->price)?>&#8361;" id="date-out" readonly>
                            </div>
                        </form>
                    </div>
                </div>
				
				<div class="col-xl-3"></div>
				
			</div>
			<br><br><br>
			<?php
				}
			?>
			
		</div>
	</section>
	<div style="text-align : center;">
		<button type='button' id='btn' class='btn btn-primary' onclick="location.href='/~team2/'">메인화면으로</button>
	</div>

<br><br><br><br><br>
