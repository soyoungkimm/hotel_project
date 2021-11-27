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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<style>
	<!--애니메이션에 문제 생겨서 없앰-->
	<!--.fix {
	  position:fixed;
	  animation: down 0.5s ease;
	  background : white;
	  opacity:0.8;
	  width : 100%;
	}-->

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
	
	#box-1, #box-2, #box-3, #box-4, #box-5, #box-6 {
		opacity:0;  
	}
	
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



	  <!--.hr-sect {
        display: flex;
        flex-basis: 100%;
        align-items: center;
        color: #fff;
        font-size: 20px;
        margin: 30px 0px;
		margin-left : 320px
      }
      .hr-sect::before,
      .hr-sect::after {
        content: "";
        flex-grow: 1;
        background: #dfa974;
        height: 1px;
        font-size: 0px;
        line-height: 0px;
        margin: 0px 16px;
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
	</style>
</head>



<body>
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
                <li class="active"><a href="/~team2/hotel">Home</a></li>
                <li><a href="/~team2/room">Rooms</a></li>
                <li><a href="/~team2/aboutus.html">About Us</a></li>
                <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">News</a></li>
                <li><a href="./contact.html">Contact</a></li>
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
		<div class="menu-item" id="navi" style="margin-top : -50px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/~team2/hotel">
                                <!--<img src="/~team2/my/lib/sona-master/img/logo.png" alt="">-->
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="/~team2/hotel">Home</a></li>
                                    <li><a href="/~team2/room">Rooms</a></li>
                                    <li><a href="/~team2/aboutus.html">About Us</a></li>
									<li><a href="/~team2/aboutus.html">Event</a></li>
                                    <!--<li><a href="./pages.html">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details.html">Room Details</a></li>
                                            <li><a href="./blog-details.html">Blog Details</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li>-->
                                    <li><a href="/~team2/review">Review</a></li>
                                    <!--<li><a href="./contact.html">Contact</a></li>-->
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
				
			
				
            </div>
		
        </div>
        <div class="container">
            <div class="row" style="text-align : center;">
                <div class="col" style="text-align : center;"> 
                    <div class="hero-text" style="height : 650px; text-align : center; margin-top : 100px;">
                        <h1 style="color : #fff; font-size : 50px;"><span>INDUK HOTEL</span></h1>
						<span class="sona-title1"><h3 style="color : #fff; margin-top : -20px;">FROM JEJU</h3></span>
						<br>
						<!--<div class="sona-title1 hr-sect" style="width : 500px; opacity : 0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;computer software&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>-->
                        <p><span class="sona-title2" style="opacity : 0;">Here are the best hotel booking sites, including recommendations for booking rooms.</span></p>
                        <!--<a href="#" class="primary-btn">Discover Now</a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="/~team2/my/img/hotel/hotel_view2.jpg"></div>
			<div class="hs-item set-bg" data-setbg="/~team2/my/img/hotel/hotel_view3.jpg"></div>
			 <div class="hs-item set-bg" data-setbg="/~team2/my/img/hotel/hotel_view.jpg"></div>
        </div>
    </section>
	<!-- 네비 끝 -->
    <!-- Hero Section End -->
	
	
	
	<section>
		<div class="container">
			<br><br>
			<div class="row">
				<div class="col sona-booking" style=" border-style : solid; border-width : 1.5px; border-color : #e5e5e5; padding-bottom : 10px; opacity : 0;">
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
							<div class="select-option" id="pic_area" style="float : left; margin-left : 20px; width : 160px">
								<label for="guest">Guests:</label>
								<select name="guest">
									<option value="0">1~2 people</option>
									<option value="1">3~4 people</option>
									<option value="2">5 or more people</option>
								</select>
							</div>
							<div class="select-option" id="pic_area" style="float : left;  margin-left : 20px;">
								<div class="form-inline">
									<label for="breakfast">Breakfast:</label>
									<input type="checkbox" class="book-checkbox" name="breakfast" value="1">
								</div>
							</div>
							<div style="float : left; margin-left : 20px; margin-top : -20px;">
								<button type="submit">Check Availability</button>
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
                        <p class="f-para">JEJU INDUK HOTEL은 최고의 서비스를 자랑하는 호텔입니다.</p>
                        <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                        <a href="#" class="primary-btn about-btn">Read More</a>
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
                <div class="col-lg-4 col-sm-6" id="box-1">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>관광지 안내 서비스</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" id="box-2">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>조식 서비스</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" id="box-3">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>아이 돌봄 서비스</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" id="box-4">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>세탁 서비스</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" id="box-5">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>무료 주차 서비스</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" id="box-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>바와 음료 서비스</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
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
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/room/room-b1.jpg">
                            <div class="hr-text">
                                <h3>Double Room</h3>
                                <h2>199&#8361;<span>/&nbsp;하루</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/room/room-b2.jpg">
                            <div class="hr-text">
                                <h3>Premium King Room</h3>
                                <h2>159&#8361;<span>/&nbsp;하루</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/room/room-b3.jpg">
                            <div class="hr-text">
                                <h3>Deluxe Room</h3>
                                <h2>198&#8361;<span>/&nbsp;하루</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/room/room-b4.jpg">
                            <div class="hr-text">
                                <h3>Family Room</h3>
                                <h2>299&#8361;<span>/&nbsp;하루</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
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
                            <p><?=$review->content?></p>
                            <div class="ti-author">
                                <span class="star">
									★★★★★
									<span style=" width : <?=$review->star * 10?>%">
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

    