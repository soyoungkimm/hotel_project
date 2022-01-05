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

	.answer-button {
		top: 50%;
		left: 50%;
		transform: translate(390%, 0%);
	}
	
	textarea {
		resize: none;
	}
	</style>

	<!-- Hero Section Begin -->
	<br>
    <section id="pic_area">
        <div class="container">
            <div class="row">
                <div class="col" style="text-align : center;">
                        <h2><span class="sona-title1" style="opacity : 0"></span></h2>
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
				<div class="col sona-booking" style=" border-style : solid; border-width : 1.5px; border-color : #e5e5e5; padding-bottom : 10px; opacity : 0;">
					<div class="booking-form">
						<h3 style="text-align:center; font-family: 'Noto Sans KR', sans-serif;">문의 상세보기</h3>
						<table class="table table-bordered table-sm mymargin5">
							<tr>
								<td width="20%" style="vertical-align:middle; text-aglin:center;">
									질문유형
								</td>
								<td width="80%" align="left">
									<div class="form-inline"> 
										<?=$row->detail_name?>
									</div>
								</td>
							</tr>		
							<tr>
								<td width="20%" style="vertical-align:middle; text-aglin:center;">
									제목
								</td>
								<td width="80%" align="left">
									<div class="form-inline"> 
										<?=$row->title?>	
									</div>
								</td>
							</tr>									
							<tr height="250">
								<td width="20%" style="text-aglin:center;">
									내용
								</td>
								<td width="80%" align="left">
									<div class="form-inline"> 
										<?=$row->content?>
									</div>
								</td>
							</tr>		
							<tr>
								<td width="20%" style="vertical-align:middle; text-aglin:center;">
									성명
								</td>
								<td width="80%" align="left">
									<div class="form-inline"> 
										<?=$row->name?>			
									</div>
								</td>
							</tr>
							<tr>
								<td width="20%" style="vertical-align:middle; text-aglin:center;">
									이메일
								</td>
								<td width="80%" align="left">
									<div class="form-inline"> 
										<?=$row->email?>	
									</div>
								</td>
							</tr>	
							<tr>
								<td width="20%" style="vertical-align:middle; text-aglin:center;">
									전화번호
								</td>
								<?
									if (isset($row->phone)) {
										$tel1 = trim(substr($row->phone,0,3));
										$tel2 = trim(substr($row->phone,3,4));
										$tel3 = trim(substr($row->phone,7,4));
									}
								?>
								<td width="80%" align="left">
									<div class="form-inline">
										<?=$tel1?>	 - 
										<?=$tel2?>	 - 
										<?=$tel3?>	
									</div>
								</td>
							</tr>
						</table>

						<br>
						<hr style="border: solid 1px #e4e4e4;">
						<br>
							<table class="table table-bordered table-sm mymargin5" style="border-top: 1px solid #e4e4e4; position: relative;">
								<tr>
									<td width="20%" style="vertical-align:middle; text-aglin:center;">
										제목
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<?=$row1->title?>
										</div>
									</td>
								</tr>									
								<tr height="250">
									<td width="20%" style="text-aglin:center;">
										내용
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<?=$row1->content?>
										</div>
									</td>
								</tr>		
							</table>
							<input type="hidden" name="inquiry_id" id="inquiry_id" value="<?=$row->id?>" />
							<input type="hidden" name="writeday" id="writeday" value="<?=date("Y-m-d")?>" />
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>


<br><br><br>
