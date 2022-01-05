
<style>
	.room-details-item .rd-text .rd-title .rdt-right a {
		background:#38b6ff;
		cursor : pointer;
	}
	
	#selectBookTypeInRoom {
	  position: fixed;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -10%);
	}
</style>




<!-- 비회원 예매, 회원 예매 선택 모달 창 시작 -->
<div class="modal fade" id="selectBookTypeInRoom" tabindex="-2" role="dialog" aria-labelledby="myModalLabel5"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content form-elegant">
	  <div class="modal-header text-center" style="border-bottom: none">
		<h3 style="font-family: 'Cabin';font-weight: 400; font-size : 15pt;" class="modal-title w-100 dark-grey-text my-1" id="myModalLabel5">예약</h3>
		
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body mx-4" style="margin-top : -10px;">
		<div class="text-center mb-3" style="float : left; margin-right : 50px; margin-left : 35px;" >
			<button type="button" style="width : 150px; height : 50px;"class="btn blue-gradient btn-block btn-rounded z-depth-1a" onclick="loginCheckInRoom();">회원 예약</button>
		</div>
		<div class="text-center mb-3" style="float : left;">
			<button type="button" style="width : 150px; height : 50px;" class="btn blue-gradient btn-block btn-rounded z-depth-1a" onclick="location.href='/~team2/book/direct_book_room/<?=$data['room']->id?>'">비회원 예약</button>
		</div>
	  </div>
	</div>
  </div>
</div>
<!-- 비회원 예매, 회원 예매 선택 모달 창 끝 -->




    <div class="breadcrumb-section" id="pic_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="/~team2">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
				<div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="room-details-item">
						<div class="zoom_image" style="text-align: center;  float : center">
							<img src="/~team2/my/img/room/<?=$data['room']->image2?>" alt="" style="width : 945px">
						</div>
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3><?=$data['room']->name?></h3>
                                <div class="rdt-right">
                                    <a  data-toggle='modal' href="#selectBookTypeInRoom">Booking Now</a>
                                </div>
                            </div>
                            <h2><a style="color : #38b6ff;"><?=number_format($data['room']->price)?>&#8361;</a><span>/하루</span></h2>
							<?php
								$content_arr = explode("^", $data['room']->content);
							?>
							<?=$content_arr[0]?>
							<br><br>
							<hr>
							<br>
							<p style="font-size : 18pt;color : #000; float : left; margin-right : 20px; margin-top : 10px;"><b>객실 개요</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">크기</td>
                                        <td><a><?=$data['room']->size?></a> m<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">투숙 인원</td>
                                        <td><a><?=$data['room']->people_num?> 명</a></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">침대</td>
                                        <td><a><?=$data['room']->bed_name?></a></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">시설</td>
                                        <td><a><?=$data['room']->service?></a></td>
                                    </tr>
                                </tbody>
                            </table>
							<hr>
							
							
							
							<?=$content_arr[1]?>
							
							
							
                        </div>
                    </div>
				</div>
				<div class="col-lg-1"></div>
			</div>
		</div>
	</section>
	<script>
	function loginCheckInRoom() {
		var user = '<?=$this->session->userdata('id')?>'
		if (user == '') {
			alert('로그인 후 이용 가능합니다.');
			return;
		}
		
		location.href='/~team2/book/direct_book_room/<?=$data['room']->id?>';
	}
	
	</script>
	
