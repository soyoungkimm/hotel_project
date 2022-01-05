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
	<style>
	
	.fix {
	  position:fixed;
	  animation: down 0.5s ease;
	  background : #fff;
	  opacity:0.8;
	  width : 100%;
	  
	}
	
	

	@keyframes down {
	  0%{
		transform: translateY(-50px)
	  }
	  100%{
		transform: translateY(0px)
	  }
	}
	
	#hide1{
		opacity:0;
		margin-left:-300px;    
		max-width:100%;
	}
	
	#hide2{
		opacity:0;
		margin-left:600px;    
		max-width:100%;
	}
	
	/*#box-1, #box-2, #box-3, #box-4, #box-5, #box-6 {
		opacity:0;  
	}*/
	
	<!--애니메이션에 문제 생겨서 없앰-->
	<!--#room-box1, #room-box2, #room-box3, #room-box4, #room-box5, #room-box6 {
		opacity:0;
	}-->
	
	.zoom_image img {
		transform:scale(1);
		transition:all 0.5s;
	}
	
	.zoom_image:hover img {
		transform:scale(1.15);
	}
	
	.zoom_image_in { overflow:hidden; }
	
	.zoom_image_in img {
		transform:scale(1);
		transition:all 0.5s;
	}
	
	.zoom_image_in:hover img {
		transform:scale(1.2);
	}
	
	
	<!--애니메이션에 문제 생겨서 없앰-->
	<!--#blog-box1, #blog-box2, #blog-box3, #blog-box4, #blog-box5, #blog-box6, #blog-box7, #blog-box8, #blog-box9 {
		opacity:0;
	}-->
	  
	  
	  
	  .menu-item .nav-menu .mainmenu li a:after {
		  background : #38b6ff;
	  }
	  
	  .booking-form form button {
		  border: 1px solid #38b6ff;
		  color : #38b6ff;
	  }
	  
	  .primary-btn:after {
		  background : #38b6ff;
	  }
	  
	  .section-title span {
		  color : #38b6ff;
	  }
	  
	  .hp-room-items .hp-room-item .hr-text h2 {
		  color: #38b6ff;
	  }
	  
	  .blog-item .bi-text .b-tag {
		  background: #38b6ff;
	  }
	  
	  .footer-section .footer-text .ft-contact h6 {
		  color: #38b6ff;
	  }
	  
	  .service-item:hover {
		  background : #78cdff;
	  }
	  
	  .footer-section .footer-text .ft-newslatter h6 {
		  color : #38b6ff;
	  }
	  
	  
	  .footer-section .footer-text .ft-newslatter .fn-form button {
		  background: #38b6ff;
	  }
	
		.bd-hero-text span {
			
			background : #38b6ff;
		} 
		
	.bd-hero-text ul li {
		color : #38b6ff;
	}
	
	.blog-details-text .leave-comment .comment-form button {
		background: #38b6ff;
	}
	
	.footer-section .footer-text .ft-about .fa-social a:hover {
		background: #38b6ff;
		border-color: #38b6ff;
	}
	
	
	.icon_calendar:before {
		color: #38b6ff;
	}
	
	.service-item h4{
		font-family: "Cabin", sans-serif;
	}
	
	
	.service-item i{
		color: #38b6ff;
	}
	
	
	.booking-form form .select-option .nice-select:after {
		border-bottom: 2px solid #38b6ff;
		border-right: 2px solid #38b6ff;
	}
	
	
	
	.star {
		position: relative;
		font-size: 1.5rem;
		color: #ddd;
	  }
	  
	  .star input {
		width: 100%;
		height: 100%;
		position: absolute;
		left: 0;
		opacity: 0;
		cursor: pointer;
	  }
	  
	  .star span {
		width: 0;
		position: absolute; 
		left: 0;
		color: #ffe000;
		overflow: hidden;
		pointer-events: none;
	  }
	  
	  .testimonial-slider .ts-item .ti-author h5 {
		  font-family: "Cabin", sans-serif;
	  }
	  
	   .menu-item .nav-menu .mainmenu li a {
		  color : #fff;
	  }
	  
	  
		#best_review_content {
			height: 100px; 
			overflow: hidden;
			text-overflow: ellipsis;
			word-break: break-all;
			white-space: normal; 
			text-align: left;
			display: -webkit-box; 
			-webkit-line-clamp: 4; 
			-webkit-box-orient: vertical;
			color : #707079;
		}
		
		#bed_service {
			
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
		
		
	.zoom_image {
	transform:scale(1);
	transition:all 0.5s;
	}
	
	.zoom_image:hover {
		transform:scale(1.23);
	}
	
	#book_div {
		opacity : 0;
	}
	
	.layer {
		background-color: rgba(0, 0, 0, 0.3);
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
	
	.menu-item .nav-menu .mainmenu .mini li:hover>a:after {
		opacity: 0;
	}
	
	#selectBookTypeForm, #bookConfirmForm {
	  position: fixed;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -10%);
	}
	
	#search_non_member_book {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -30%);
	}
	
	
	input::placeholder {
		color: #fff;
	}
	</style>
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
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="/~team2/my/lib/sona-master/img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="/~team2">Home</a></li>
                <li><a href="/~team2/room">Rooms</a></li>
                <li><a href="/~team2/aboutus">About Us</a></li>
                
                <li><a href="/~team2/aboutus.html">Event</a></li>
				<li><a href="/~team2/review">Review</a></li>
				<li><a href="/~team2/aboutus.html">Q&A</a></li>
				<li> <a href="#elegantModalForm" class="btn btn-default btn-rounded" data-toggle="modal">Login</a></li>
				<li><a href="#">SignUp</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->
<!--헤더 끝-->









  <!-- Hero Section Begin -->
<!-- 네비 시작 -->
    <section class="hero-section">
		<div class="menu-item" id="navi" style="margin-top : -60px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/~team2/">
                                <img id="logo" src="/~team2/my/img/hotel/Induk_hotel_logo.png" alt="" style="margin-bottom : -60px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
								<ul style="float : top" class="mini">
									<?
										if($this->session->userdata("division")==1)
											echo("<li><a class='a' style='padding: 0px;font-weight:lighter; font-size : 8pt;' href='#'>문의내역</a></li>");
									?>

									<li><a class='a' href='#bookConfirmForm' style='padding: 0px;font-weight:lighter; font-size : 8pt;' data-toggle='modal'>예약확인</a></li>
									<?
										if(!$this->session->userdata("uid"))
											echo("<li> <a class='a' href='#elegantModalForm' style='padding: 0px; font-weight:lighter;  font-size : 9pt;' class='btn btn-default btn-rounded' data-toggle='modal'>Login</a></li>");
										else 
											echo("<li> <a class='a' href='/~team2/Login/logout' style='padding: 0px; font-weight:lighter;  font-size : 9pt;' class='btn btn-default btn-rounded'>Logout</a></li>");
									?>
									<li><a class='a' style='padding: 0px;font-weight:lighter;  font-size : 9pt;' href="/~team2/register">SignUp</a></li>
									<!-- 로그인 이름 표시 시작-->
									<?
										if($this->session->userdata("uid"))
										{
											echo"<li><a class='a' style='padding: 0px; font-weight:lighter;  font-size : 9pt;'><font color=#a7dfff>";
											echo $this->session->userdata('name');
											echo("님");
											echo "</font></a></li>";
										}
									?>
									<!-- 로그인 이름 표시 끝-->
								</ul>
                                <ul>
                                    <li class="active"><a href="/~team2" class="a">Home</a></li>
                                    <li><a href="/~team2/room" class="a">Rooms</a></li>
                                    <li><a href="/~team2/aboutus" class="a">About Us</a></li>
									<li><a href="/~team2/Event" class="a">Event</a></li>
                                    <!--<li><a href="./pages.html">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details.html">Room Details</a></li>
                                            <li><a href="./blog-details.html">Blog Details</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li>-->
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
						<h3 style="float : left">Room<br>Reservation</h3>
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
									<input type="checkbox" class="book-checkbox" name="breakfast" value="1">
								</div>
							</div>
							<div style="float : left; margin-left : 20px; margin-top : -20px;">
								<a href='#selectBookTypeForm' data-toggle='modal'>
									<button>Check Availability</button>
								</a>
								<!--원래코드
								if($this->session->userdata('id')) {
									echo("<button type='submit'>Check Availability</button>");
								}
								else {
									echo("<button onclick='alert(\"로그인 후 이용 가능합니다.\")'>Check Availability</button>");
								}-->
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
                        <p>B1층에 있는 바에서 다양한 음료를 즐기실 수 있습니다.<br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

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
												<td class="r-o">최대 인원:</td>
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

    <!-- Blog Section Begin -->
    <section class="blog-section spad" id="hide3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Hotel News</span>
                        <h2>OUR EVENT</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" id="event-box1">
                    <div class="blog-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="#">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" id="event-box2">
                    <div class="blog-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="#">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" id="event-box3">
                    <div class="blog-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" id="event-box4">
                    <div class="blog-item small-size set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-wide.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Trip To Iqaluit In Nunavut A Canadian Arctic City</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" id="event-box5">
                    <div class="blog-item small-size set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-10.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel</span>
                            <h4><a href="#">Traveling To Barcelona</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 12th April, 2019</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
	
<script>
	function clickBookSearch() {
		var user = '<?=$this->session->userdata('id')?>'
		if (user == '') {
			alert('로그인 후 이용 가능합니다.');
			return;
		}
	}
	
	function loginCheck() {
		var user = '<?=$this->session->userdata('id')?>'
		if (user == '') {
			alert('로그인 후 이용 가능합니다.');
			return;
		}
		
		// 체크인 날짜, 체크아웃 날짜 정했는지 확인
		if ($("input[name=date-in]").val() == '') {
			alert('Check In 날짜를 정해주세요.');
			return;
		}
		if ($("input[name=date-out]").val() == '') {
			alert('Check Out 날짜를 정해주세요.');
			return;
		}
		
		document.form1.submit();
	
	}
	
	
	function clickNonLoginBook() {
		
		// 체크인 날짜, 체크아웃 날짜 정했는지 확인
		if ($("input[name=date-in]").val() == '') {
			alert('Check In 날짜를 정해주세요.');
			return;
		}
		if ($("input[name=date-out]").val() == '') {
			alert('Check Out 날짜를 정해주세요.');
			return;
		}
		
		document.form1.submit();
	
	}
	
	
	function open_search_form() {
		$('#bookConfirmForm').modal('hide');
		$("#search_non_member_book").modal();
		
	}
	
</script>
				