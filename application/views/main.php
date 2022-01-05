 <!--헤더 시작--> 

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Induk Hotel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
	<link   href="/~team2/my/css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/~team2/my/lib/sona-master/css/style.css" type="text/css">
	<!-- modal Css-->
	<link rel="stylesheet" href="/~team2/my/css/loginmodal.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!--header css-->
	<link rel="stylesheet" href="/~team2/my/css/main_header_css.css" type="text/css">
</head>

<body>

<!-- 비회원 예매, 회원 예매 선택 모달 창 시작 -->
	<div class="modal fade" id="selectBookTypeForm" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2"
	  aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content form-elegant">
		  <div class="modal-header text-center">
			<h3 style="font-family: 'Cabin';font-weight: 400; font-size : 15pt;" class="modal-title w-100 dark-grey-text my-1" id="myModalLabel2">예약</h3>
			
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body mx-4" style="margin-top : -10px;">
			<div class="text-center mb-3" style="float : left; margin-right : 50px; margin-left : 35px;" >
				<button type="button" style="width : 150px; height : 50px;"class="btn blue-gradient btn-block btn-rounded z-depth-1a" onclick="loginCheck();">회원 예약</button>
			</div>
			<div class="text-center mb-3" style="float : left;">
				<button type="button" style="width : 150px; height : 50px;" class="btn blue-gradient btn-block btn-rounded z-depth-1a" onclick="clickNonLoginBook();">비회원 예약</button>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<!-- 비회원 예매, 회원 예매 선택 모달 창 끝 -->



<!-- 예약확인 모달 창 시작 -->
	<div class="modal fade" id="bookConfirmForm" tabindex="-3" role="dialog" aria-labelledby="myModalLabel3" 
	aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content form-elegant">
		  <div class="modal-header text-center">
			<h3 style="font-family: 'Cabin';font-weight: 400; font-size : 15pt;" class="modal-title w-100 dark-grey-text my-1" id="myModalLabel3">예약 확인</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body mx-4" style="margin-top : -10px;">
			<div class="text-center mb-3" style="float : left; margin-right : 50px; margin-left : 35px;" >
				<button type="button" style="width : 150px; height : 50px;"class="btn blue-gradient btn-block btn-rounded z-depth-1a" onclick="clickBookSearch()">회원 예약</button>
			</div>
			<div class="text-center mb-3" style="float : left;">
				<button type="button" style="width : 150px; height : 50px;" class="btn blue-gradient btn-block btn-rounded z-depth-1a" onclick="open_search_form()">비회원 예약</button>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<!-- 예약확인 모달 창 끝 -->


<!-- 비회원 예약 조회 모달 창 시작 -->
	<div class="modal fade" id="search_non_member_book" tabindex="-4" role="dialog" aria-labelledby="myModalLabel4" 
	aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content form-elegant">
		  <div class="modal-header text-center">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div style="text-align : center;">
		  <h3 style="font-family: 'Cabin';font-weight: 400; font-size : 12pt;" class="modal-title w-100 dark-grey-text my-1" id="myModalLabel4">예약 정보를 입력해주세요</h3>
		  </div>
		  <br>
		  <form method="post" action="/~team2/book/search_non_member_book">
			  <div class="modal-body mx-4" style="margin-top : -10px;">
				<div class="md-form mb-5">
				 <label data-error="wrong" data-success="right" for="Form-email1" style="font-size : 10pt;">예약자 성명</label>
				  <input type="text" name= "name" value="" class="form-control validate" placeholder="ex) 홍길동">
				</div>
				<div class="md-form pb-3">
					<label data-error="wrong" data-success="right" for="Form-pass1" style="font-size : 10pt;">예약자 전화번호</label>
					<input type="text"  name= "phone" value="" class="form-control validate" placeholder="ex) 01022223333">
				</div>
				<br>
				<?php
					// 유효성 검사 걸렸을 떼
					if ($_SERVER['QUERY_STRING'] == 'search_book_error1') {
						echo "<div class='text-center mb-3'><font color=red>예약자 성명과 전화번호를 입력해주세요.</font></div>";
					} 
					// 전화번호나 예약자 성명이 올바르지 않을 때
					if ($_SERVER['QUERY_STRING'] == 'search_book_error2') {
						echo "<div class='text-center mb-3'><font color=red>찾으시는 예약이 존재하지 않습니다.</font></div>";
					} 
				?>
				<div class="text-center mb-3" style="text-align : center;" >
					<button type="submit" style="width : 150px; height : 50px; margin-left : 130px;"class="btn blue-gradient btn-block btn-rounded z-depth-1a">확인</button>
				</div>
			  </div>
		  </form>
		</div>
	  </div>
	</div>
<!-- 비회원 예약 조회 모달 창 끝 -->




    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

	<!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <nav class="mainmenu mobile-menu">
			<?php
				//로그인 이름 표시 시작
				if($this->session->userdata("uid"))
				{
					echo"<h6 class='mini_tab_menu_title'><font color=#38b6ff>";
					echo $this->session->userdata('name');
					echo("님");
					echo "</font></h6><br>";
				}
				//로그인 이름 표시 끝
				
				
				if(!$this->session->userdata("uid"))
					echo("<button class='moblie_menu_button'><a href='#elegantModalForm' data-toggle='modal'>Login</a></button>");
				else 
					echo("<button class='moblie_menu_button'><a href='/~team2/Login/logout'>Logout</a></button>");
				
				if(!$this->session->userdata("uid")) {
					echo("<br><br><button class='moblie_menu_button'><a href='/~team2/register'>SignUp</a></button>");
				}
			?>
			<br><br><br><br>
			<h6 class="mini_tab_menu_title">Menu</h6><br>
            <ul>
                <li class="active"><a href="/~team2">Home</a></li>
                <li><a href="/~team2/room">Rooms</a></li>
                <li><a href="/~team2/aboutus">About Us</a></li>
                <li><a href="/~team2/fullcalendar">Event</a></li>
                <li><a href="/~team2/review">Review</a></li>
            </ul>
			<br><br><br>
			<h6 class="mini_tab_menu_title">User</h6><br>
			<ul>
			<?
				if($this->session->userdata("division")==1) {
					echo("<li><a class='top_menu_item' href='/~team2/inquiry/lists'>문의내역</a></li>");
				}
				else {
					echo("<li><a class='top_menu_item' href='#bookConfirmForm' data-toggle='modal'>예약확인</a></li>");
				}
				if($this->session->userdata("division")=="0") {
					echo("<li><a class='top_menu_item' href='/~team2/inquiry/check'>문의확인</a></li>");
				}
			
				
				?>
			</ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
		<br><br><br>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> 02-345-67890</li>
            <li><i class="fa fa-envelope"></i> indukHotel@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->
	
  <!-- Hero Section Begin -->
<!-- 네비 시작 -->
    <section class="hero-section">
		<header class=""  style="margin-top : -60px">
		
		<div class="top-nav" style="border : none; padding-top : 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                        <div style="text-align : right; margin-right : 20px;">
                        <?
							if($this->session->userdata("division")==1) {
								echo("<a class='top_menu_item' href='/~team2/inquiry/lists'>문의내역</a>");
							}
							else {
								echo("<a class='top_menu_item' href='#bookConfirmForm' data-toggle='modal'>예약확인</a>");
							}
							if($this->session->userdata("division")=="0") {
								echo("<a class='top_menu_item' href='/~team2/inquiry/check'>문의확인</a>");
							}
							if(!$this->session->userdata("uid"))
								echo("<a class='top_menu_item' href='#elegantModalForm' data-toggle='modal'>Login</a>");
							else 
								echo("<a class='top_menu_item' href='/~team2/Login/logout'>Logout</a>");
						
						
							if(!$this->session->userdata("uid")) {
								echo("<a class='top_menu_item' href='/~team2/register'>SignUp</a>");
							}
							
							
							//로그인 이름 표시 시작
							if($this->session->userdata("uid"))
							{
								echo"<a class='top_menu_item'><font color=#a7dfff>";
								echo $this->session->userdata('name');
								echo("님");
								echo "</font></a>";
							}
							//로그인 이름 표시 끝
						?>
						</div>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="menu-item" id="navi">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo" style=" padding : 15px 0px;">
                            <a href="/~team2/">
                                <img id="logo" src="/~team2/my/img/hotel/Induk_hotel_logo.png" alt="" style="max-width: auto; height: 47px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="/~team2" class="a">Home</a></li>
                                    <li><a href="/~team2/room" class="a">Rooms</a></li>
                                    <li><a href="/~team2/aboutus" class="a">About Us</a></li>
									<li><a href="/~team2/fullcalendar" class="a">Event</a></li>
                                    <li><a href="/~team2/review" class="a">Review</a></li>
									<li><a href="/~team2/inquiry" class="a">Q&A</a></li>
                                </ul>
                            </nav>
                            <!--<div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>-->
                        </div>
                    </div>
                </div>
				
			
				
            </div>
		
        </div>
		</header>
        <div class="container">
            <div class="row" style="text-align : center;">
                <div class="col" style="text-align : center;"> 
                    <div class="hero-text" style="height : 600px; text-align : center; margin-top : 100px;">
                        <h1 id="pic_area" style="color : #fff; font-size : 50px;"><span>INDUK HOTEL</span></h1>
						<h3 class="sona-title1" style="color : #fff; margin-top : -20px;opacity : 0;">IN JEJU</h3></span>
						<br>
						<!--<div class="sona-title1 hr-sect" style="width : 500px; opacity : 0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;computer software&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>-->
                        <p><span class="sona-title2" style="opacity : 0;">JEJU INDUK HOTEL 예약 사이트</span></p>
                        <!--<a href="#" class="primary-btn">Discover Now</a>-->
						<!--Here are the best hotel booking sites, including recommendations for booking rooms.-->
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="/~team2/my/img/hotel/hotel_view2_plus.jpg"></div>
			<div class="hs-item set-bg" data-setbg="/~team2/my/img/hotel/hotel_view3_plus.jpg"></div>
			<div class="hs-item set-bg" data-setbg="/~team2/my/img/hotel/hotel_view_plus.jpg"></div>
        </div>
    </section>
									<!-- 네비 끝 -->
									<!-- Hero Section End -->
										<!-- Modal start -->
											<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
											  aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<!--Content-->
												<div class="modal-content form-elegant">
												  <!--Header-->
												  <div class="modal-header text-center">
													<h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <!--Body-->
												  <div class="modal-body mx-4">
													<!--Body-->
													<form name="form_Login" method="post" action="/~team2/Login/check">
													<div class="md-form mb-5">
													 <label data-error="wrong" data-success="right" for="Form-email1">Your id</label>
													  <input type="text" name= "uid" value="" class="form-control validate">
													</div>

													<div class="md-form pb-3">
														  <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
															  <input type="password"  name= "pwd" value="" class="form-control validate">
															
												
													  <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="/~team2/register" class="blue-text ml-1">
															Register?</a></p>
														</form>	  
													</div>
													<?php
														// 아이디나 비밀번호가 올바르지 않을 때
														if ($_SERVER['QUERY_STRING'] == 'loginerror') {
															echo "<div class='text-center mb-3'><font color=red>아이디나 비밀번호가 올바르지 않습니다.</font></div>";
														} 
													?>
													<div class="text-center mb-3">
													  <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a" onclick="javascript:form_Login.submit();">Login</button>
													</div>
														 
													<div class="text-center mb-3">
													  <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a" data-dismiss="modal">Close</button>
													</div>
													
												  </div>
												  <!--Footer-->
												 
												</div>
												<!--/.Content-->
											  </div>
											 
											</div>
											<!-- Modal -->

											
											 
											</div>
											<!-- Modal end -->
	
	
	<section id="book_div">
		<div class="container">
			<br><br>
			<div class="row">
				<div class="col" style=" border-style : solid; border-width : 1.5px; border-color : #e5e5e5; padding-bottom : 10px;">
					<div class="booking-form">
						<h3 style="float : left; ">Room<br>Reservation</h3>
						<form name="form1" method="post" action="/~team2/book/book_hotel">
							<div class="check-date" style="float : left; margin-left : 20px;">
								<label for="date-in">Check In:</label>
								<input type="text" class="date-input" name="date-in">
								<i class="icon_calendar"></i>
							</div>
							<div class="check-date" style="float : left; margin-left : 20px;">
								<label for="date-out">Check Out:</label>
								<input type="text" class="date-input" name="date-out">
								<i class="icon_calendar"></i>
							</div>
							<div class="select-option" style="float : left; margin-left : 20px; width : 160px">
								<label for="guest">Guests:</label>
								<select name="guest">
									<option value="0">1~2 people</option>
									<option value="1">3~4 people</option>
									<option value="2">5 or more people</option>
								</select>
							</div>
							<div class="select-option" style="float : left;  margin-left : 20px;">
								<div class="form-inline">
									<label for="breakfast">Breakfast:</label>
									<input style="margin-bottom : 10px; margin-left : 5px"type="checkbox" class="book-checkbox" name="breakfast" value="1">
								</div>
							</div>
							<div style="float : left; margin-top : -15px; margin-left : 6px">
								<a href='#selectBookTypeForm' data-toggle='modal'>
									<button>Check Availability</button>
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	
	

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad" id="hide1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>JEJU INDUK<br />HOTEL</h2>
                        </div>
                        <p class="f-para">제주 인덕 호텔은 제주의 아름다운 풍광을 담은 호텔입니다.</p>
                        <p class="s-para">개관 이후부터 지금까지 품격과 문화가 있는 휴식지로서 수많은 행사를 성공적으로 치러왔습니다. 아름다운 분위기와 수준높은 시설을 선보이며 고객에게 먼저 다가가는 호텔에 특화된 서비스로 호텔에 다녀간 많은 사람들에게 크나큰 찬사를 받아 왔습니다.</p>
                        <a href="/~team2/aboutus" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="/~team2/my/img/hotel/jejudo.JPG" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="/~team2/my/img/hotel/sungsan.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad" id="hide2">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>OUR SERVICES</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 zoom_image" id="box-1">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>관광지 안내 서비스</h4>
                        <p>전문 관광 안내원에게 무료로 제주 인덕 호텔 주변에 있는 다양한 관광지를 안내 받을 수 있습니다.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 zoom_image" id="box-2">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>레스토랑 할인 서비스</h4>
                        <p>호텔에 예약한 손님은 레스토랑을 할인받아 이용할 수 있습니다.<br><br></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 zoom_image" id="box-3">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>아이 돌봄 서비스</h4>
                        <p>스페셜 키즈존에서 아이가 신나는 하루를 보낼 동안 부모는 육아의 스트레스를 잠시 잊고 휴식을 취할 수 있습니다.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 zoom_image" id="box-4" >
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>세탁 서비스</h4>
                        <p>세탁할 옷을 위생 비닐 백에 넣고 원하는 세탁법을 양식에 체크하여 세탁 서비스를 이용할 수 있습니다.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 zoom_image" id="box-5">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>무료 주차 서비스</h4>
                        <p>호텔에 예약한 손님은 호텔에서 지내는 기간동안 무료로 주차를 할 수 있습니다.<br><br></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 zoom_image" id="box-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>바와 음료 서비스</h4>
                        <p>9층에 있는 바에서 다양한 음료를 즐기실 수 있습니다.<br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->
	<br>

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
					<?php
						foreach($data['rooms'] as $room) {
					?>
                    <div class="col-lg-3 col-md-6">
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
												<td class="r-o">투숙 인원:</td>
												<td><?=$room->people_num?>명</td>
											</tr>
											<tr>
												<td class="r-o">침대:</td>
												<?php
													foreach($data['beds'] as $bed) {
														if ($bed->id == $room->bed_id) {
												?>
														<td><?=$bed->name?></td>
												<?php
														}
													}
												?>
												
											</tr>
											<tr>
												<td class="r-o">서비스:</td>
												<td id="bed_service"><?=$room->service?></td>
											</tr>
										</tbody>
									</table>
									<a href="/~team2/room/detail/<?=$room->id?>" class="primary-btn">More Details</a>
								</div>
							</div>
                        </div>
                    </div>
					<?php
						}
					?>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>evaluations</span>
                        <h2>BEST REVIEWS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
					<?php
						foreach ($data['best_reviews'] as $review) {
					?>
						<a href="/~team2/review/detail/<?=$review->id?>">
						<div class="ts-item">
							<p><?=$review->title?></p>
                            <span id="best_review_content"><?=strip_tags($review->content)?></span>
							<br>
                            <div class="ti-author">
                                <span class="star">
									★★★★★
									<span style=" width : <?=$review->star * 9.6?>%">
										★★★★★
									</span>
								</span>
					<?php
							foreach($data['users'] as $user){
								if ($user->id == $review->user_id) {
					?>
								<h5> - <?=$user->name?></h5>
					<?php			
								}
							}
					?>
                                
                            </div>
                        </div>
						</a>
					<?php
						}
					?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <br><br><br><br><br>

				