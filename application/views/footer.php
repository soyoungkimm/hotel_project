<!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="/~team2/aboutus">
									<img src="/~team2/my/img/hotel/Induk_hotel_logo.png" alt="" width="300px" height="86px">
                                    <!--<img src="/~team2/my/lib/sona-master/img/footer-logo.png" alt="">-->
                                </a>
                            </div>
                            <p>인덕대학교 2021년 2학년 2학기 PHP Framework 실무 team2 팀 프로젝트</p>
                            <div class="fa-social">
                                <a><i class="fa fa-facebook"></i></a>
                                <a><i class="fa fa-twitter"></i></a>
                                <a><i class="fa fa-tripadvisor"></i></a>
                                <a><i class="fa fa-instagram"></i></a>
                                <a><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>developer</h6>
                            <ul>
								<li>김소영, 심두용, 양근모, 하재은</li>
							</ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->
	
	
    <script src="/~team2/my/lib/sona-master/js/jquery-3.3.1.min.js"></script>
    <script src="/~team2/my/lib/sona-master/js/bootstrap.min.js"></script>
    <script src="/~team2/my/lib/sona-master/js/jquery.magnific-popup.min.js"></script>
    <script src="/~team2/my/lib/sona-master/js/jquery.nice-select.min.js"></script>
    <script src="/~team2/my/lib/sona-master/js/jquery-ui.min.js"></script>
    <script src="/~team2/my/lib/sona-master/js/jquery.slicknav.js"></script>
    <script src="/~team2/my/lib/sona-master/js/owl.carousel.min.js"></script>
    <script src="/~team2/my/lib/sona-master/js/main.js"></script>
	<!--  fullcalendar 코드 시작 -->
	<!--<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/lib/jquery.min.js"></script>-->
	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/lib/jquery-ui.min.js"></script>
	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/lib/moment.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
	<!-- fullcalendar -->
	<link rel="stylesheet" href="/~team2/my/assets/plugins/fullcalendar-3.9.0/fullcalendar.print.min.css" media="print"/>
	<link rel="stylesheet" href="/~team2/my/assets/plugins/fullcalendar-3.9.0/fullcalendar.min.css">
	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/fullcalendar.min.js"></script>
	<!-- fullcalendar 한글적용 -->
	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/locale/ko.js"></script>
	<!-- bootstrap -->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
	<script>
		// 로그인 error검사
      $(document).ready(function () 
      {
        var search = location.search;
        var param = new URLSearchParams(search);

        if (param.has('loginerror')) {
          $("#elegantModalForm").modal();
        }
		
		if (param.has('search_book_error1') || param.has('search_book_error2')){
			$("#search_non_member_book").modal();
		}
      });
	  
	  
	  function clickBookSearch() {
		var user = '<?=$this->session->userdata('id')?>'
		if (user == '') {
			alert('로그인 후 이용 가능합니다.');
			return;
		}
		else {
			location.href='/~team2/book/search_member_book';
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
	  //fullcalendar

	</script>
	
</body>

</html>