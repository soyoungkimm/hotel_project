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
		padding-left: 13px;
		vertical-align: middle;
	}

	.booking-form form .select-option .nice-select {
		background: #FAFAFA;
		padding-left: 13px;
		vertical-align: middle;
	}
	.book-button {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, 525%);
	}
	
	textarea {
		resize: none;
	}
	
	a {
		color:black;
	}
	
	a:hover, a:focus{
		color: #939393;
	}
	</style>

	<!-- Hero Section Begin -->
	<br>
    <section id="pic_area">
        <div class="container">
            <div class="row">
                <div class="col" style="text-align : center;">
                    <h2><span class="sona-title1" style="opacity : 0"></span> 
					<p><span class="sona-title2" style="opacity : 0"></span></p>
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
			<div class="row">
				<div class="col sona-booking" style="padding-bottom : 10px; opacity : 0;">
					<div class="booking-form" style="padding-top: 0px;">
						<h3 style="text-align:center; font-family: 'Noto Sans KR', sans-serif;">문의 내역</h3>

						<table class="table  table-bordered  table-sm  mymargin5">
							<tr class="mycolor2" style="text-align:center;">
								<td width="10%">번호</td>
								<td width="55%">제목</td>
								<td width="13%">작성자</td>
								<td width="12%">날짜</td>
								<td width="10%">상태</td>
							</tr>
						<?
							foreach ($list as $row)                         
							{
								$id=$row->id;                                 
								$state = $row->state==0 ? "답변대기" : "답변완료" ;     
						?>
						<tr class="list_line">
							<td style="text-align:center;"><?=$id;?></td>
							<td><a href="/~team2/inquiry/answer/id/<?=$id;?>/state/<?=$row->state?>" class="title_word">[<?=$row->detail_name?>]&nbsp;&nbsp;<?=$row->title;?></a></td>
							<td style="text-align:center;"><a href="/~team2/inquiry/answer/id/<?=$id;?>/state/<?=$row->state?>"><?=$row->name;?></a></td>
							<td style="text-align:center;"><?=$row->writeday;?></td>
							<?
								if($row->state==0) {
									echo("<td style='text-align:center;'><font color='red'>$state</td>");
								}
								else {
									echo("<td style='text-align:center;'><font color='blue'>$state</td>");
								}
							?>
						</tr>
						<?
							} 
						?>
						</table>

					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>
	<br><br><br>