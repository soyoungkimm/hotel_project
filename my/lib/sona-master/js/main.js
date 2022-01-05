/*  ---------------------------------------------------
    Template Name: Sona
    Description: Sona Hotel Html Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Offcanvas Menu
    $(".canvas-open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".canvas-close, .offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    // Search model
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
   $(".hero-slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        mouseDrag: false
    });

    /*------------------------
		Testimonial Slider
    ----------------------- */
    $(".testimonial-slider").owlCarousel({
        items: 1,
        dots: false,
        autoplay: true,
        loop: true,
        smartSpeed: 1200,
        nav: true,
        navText: ["<i class='arrow_left'></i>", "<i class='arrow_right'></i>"]
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*------------------
		Date Picker
	--------------------*/
    $(".date-input").datepicker({
        minDate: 0,
        dateFormat: 'yy-mm-dd'
    });

    /*------------------
		Nice Select
	--------------------*/
    $("select").niceSelect();
	
		// 애니메이션 문제 생겨서 잠시 없앰
		// 네비게이션 바 애니메이션 코드
		$(window).resize(function(){
			navigo();
		});
		
		function navigo(){
			
			if (window.innerWidth > 991){ 
				const header = document.getElementById('pic_area'); // div
				const headerheight = header.clientHeight;// 높이
				document.addEventListener('scroll', onScroll, { passive: true });//스크롤 이벤트
				function onScroll () {
					const scrollposition = pageYOffset;//스크롤 위치
					const nav = document.getElementById('navi');// 네비게이션
					
					if (headerheight<=scrollposition && window.innerWidth > 991){//만약 헤더높이<=스크롤위치라면
						nav.classList.add('fix');//fix클래스를 네비에 추가
						$('.a').css('color', 'black');
						$("#logo").attr("src", "/~team2/my/img/hotel/Induk_hotel_logo_black.png");
					}
					else {//그 외의 경우
						nav.classList.remove('fix');//fix클래스를 네비에서 제거
						$('.a').css('color', 'white');
						$("#logo").attr("src", "/~team2/my/img/hotel/Induk_hotel_logo.png");
					}
				}
			}
		}
		
		
		$(document).ready(function() {
			 
			navigo();
			var Delay = 400;
			
			$('.sona-title1').delay(800).animate({
				opacity: '1'
			}, Delay, function() {
				$( '.sona-title2' ).animate( {
					opacity: '1'
				}, Delay , function() {
					$( '.sona-booking' ).animate( {
						opacity: '1'
					}, Delay);
				});			
			});
			
			$(window).scroll( function(){
			/* 2 */
			
			
				$('#book_div').each( function(i){
					var bottom_of_element = $(this).offset().top + $(this).outerHeight();
					var bottom_of_window = $(window).scrollTop() + $(window).height();
					
					if( bottom_of_window > bottom_of_element ){
						$(this).animate({'opacity':'1'},700);
					}
				}); 
				
				
				$('#hide1').each( function(i){
					var bottom_of_element = $(this).offset().top + $(this).outerHeight();
					var bottom_of_window = $(window).scrollTop() + $(window).height();
					
					if( bottom_of_window > bottom_of_element ){
						$(this).animate({'opacity':'1','margin-left':'0px'},700);
					}
				}); 
				


				$('#hide2').each( function(i){
					var bottom_of_element = $(this).offset().top + $(this).outerHeight();
					var bottom_of_window = $(window).scrollTop() + $(window).height();
					
					if( bottom_of_window > bottom_of_element ){
						$(this).animate({'opacity':'1','margin-left':'0px'},900);
					}
				}); 
				
			});
		});

})(jQuery);