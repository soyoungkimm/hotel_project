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
	<link href="/~team2/my/css/my.css" rel="stylesheet">
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

	<!--header css-->
	<link rel="stylesheet" href="/~team2/my/css/header_css.css" type="text/css">
</head>

<body>
	
	
	<!-- 예약확인 모달 창 시작 -->
	<div class="modal fade" id="bookConfirmForm" tabindex="-3" role="dialog" aria-labelledby="myModalLabel3" 
	aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content form-elegant">
		  <div class="modal-header text-center"  style="border-bottom : none;">
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
		  <div class="modal-header text-center" style="border-bottom : none;">
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

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
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
								echo"<a class='top_menu_item'><font color=#38b6ff>";
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
		<div class="menu-item"  id="navi">
			<div class="container">
				<div class="row">
					<div class="col-lg-2">
						<div class="logo" style=" padding : 15px 0px;">
							<a href="/~team2/">
								<img src="/~team2/my/img/hotel/Induk_hotel_logo_black.png" alt="" style=" max-width: auto; height: 45px;">
							</a>
						</div>
					</div>
					<div class="col-lg-10" >
						<div class="nav-menu">
							<nav class="mainmenu">
								<ul>
									<li><a href="/~team2">Home</a></li>
									<li class="<?php if (isset($active) && $active == 'room') echo 'active';?>"><a href="/~team2/room">Rooms</a></li>
									<li class="<?php if (isset($active) && $active == 'aboutus') echo 'active';?>"><a href="/~team2/aboutus">About Us</a></li>
									<li class="<?php if (isset($active) && $active == 'event') echo 'active';?>"><a href="/~team2/fullcalendar">Event</a></li>
									<li class="<?php if (isset($active) && $active == 'review') echo 'active';?>"><a href="/~team2/review">Review</a></li>
									<li  class="<?php if (isset($active) && $active == 'inquiry') echo 'active';?>"><a href="/~team2/inquiry">Q&A</a></li>
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
    <!-- Header End -->
	
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
				