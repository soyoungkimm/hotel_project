<style>
	#room_service {
		
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
	

	.carousel-control-next-icon {
		background-image: url(/~team2/my/img/room/right-arrow.png);
		margin-right : 170px;
		margin-top : 300px;
	}
	
	.carousel-control-prev-icon {
		background-image: url(/~team2/my/img/room/left-arrow.png);
		
		margin-left : 170px;
		margin-top : 300px;
	}
	

</style>
<!--머리쪽 Our Rooms
Home > Rooms 부분-->

    <!-- 제목부분 -->
    <div class="breadcrumb-section" id="pic_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="/~team2/">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
		
		
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
				<!--첫 번째 슬리이드-->
				<div class="carousel-item active">
					<div class="row">
								
						<?php
							$count = 0;
							foreach ($data['rooms'] as $room) {
							$count++;
						?>
							<!--양식-->
							
							<div class="col-lg-4 col-md-6" id="test">
								<div class="room-item">
									<!--이미지 사진 넣기-->
									<div class="zoom_image_in">
										<a href="/~team2/room/detail/<?=$room->id?>"><img src="/~team2/my/img/room/<?=$room->image?>" alt=""></a>
									</div>
									
									<div class="ri-text">
										<h4><a><?=$room->name?></a></h4>
										<h3><a style="color : #38b6ff;"><?=number_format($room->price)?>&#8361;</a><span>/하루</span></h3>
										<table>
											<tbody>
												<tr>
													<td class="r-o">크기:</td>
													<td><?=$room->size?> m<sup>2</sup></td>
												</tr>
												<tr>
													<td class="r-o">투숙 인원:</td>
													<td><?=$room->people_num?> 명</td>
												</tr>
												<tr>
													<td class="r-o">침대:</td>
													<td><?=$room->bed_name?></td>
												</tr>
												<tr>
													<td class="r-o">시설:</td>
													<td id="room_service"><?=$room->service?></td>
												</tr>
											</tbody>
										</table>
										<a href="/~team2/room/detail/<?=$room->id?>" class="primary-btn">More Details</a>
									</div>
								</div>
							</div>
						<?php
								if($count == 3) { break; }
							}
						?>
					</div>
				</div>
				<!--첫 번째 슬라이드 끝-->
				
				<!--두 번째 슬리이드-->
				<div class="carousel-item">
					
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="room-item">
								<!--이미지 사진 넣기-->
								<div class="zoom_image_in">
									<a href="/~team2/room/detail/<?=$data['rooms'][3]->id?>"><img src="/~team2/my/img/room/<?=$data['rooms'][3]->image?>" alt=""></a>
								</div>
								<div class="ri-text">
									<h4><a><?=$data['rooms'][3]->name?></a></h4>
									<h3><a style="color : #38b6ff;"><?=number_format($data['rooms'][3]->price)?>&#8361;</a><span>/하루</span></h3>
									<table>
										<tbody>
											<tr>
												<td class="r-o">크기:</td>
												<td><?=$data['rooms'][3]->size?> m<sup>2</sup></td>
											</tr>
											<tr>
												<td class="r-o">투숙 인원:</td>
												<td><?=$data['rooms'][3]->people_num?> 명</td>
											</tr>
											<tr>
												<td class="r-o">침대:</td>
												<td><?=$data['rooms'][3]->bed_name?></td>
											</tr>
											<tr>
												<td class="r-o">시설:</td>
												<td id="room_service"><?=$data['rooms'][3]->service?></td>
											</tr>
										</tbody>
									</table>
									<a href="/~team2/room/detail/<?=$data['rooms'][3]->id?>" class="primary-btn">More Details</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!--두 번째 슬리이드 끝-->
			  </div>  
			  
			</div>
			
			<br>
        </div>
		
	  <!--prev 슬라이드 버튼 -->
	  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Prev</span>
	  </a>
	  <!--next 슬라이드 버튼 -->
	  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
    </section>
	


