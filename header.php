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

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="menu-item" id="navi">
		
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
    </header>
    <!-- Header End -->