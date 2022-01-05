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
		transform: translate(-50%, 475%);
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
                        <h2><span class="sona-title1" style="opacity : 0">INDUK HOTEL</span> 
						<p><span class="sona-title2" style="opacity : 0">computer software</span></p>                       
                </div>
            </div>
        </div>
        <!--<div class="hero-slider">

        </div>-->
    </section>
    <!-- Hero Section End -->
<?
	$uri_array=$this->uri->uri_to_assoc(3);
	$id = array_key_exists("id",$uri_array) ? $uri_array["id"] : "" ;
?>

	<section>
		<div class="container">
			<br><br>
			<div class="row">
				<div class="col sona-booking" style=" border-style : solid; border-width : 1.5px; border-color : #e5e5e5; padding-bottom : 10px; opacity : 0;">
					<div class="booking-form">
						<h3 style="text-align:center; font-family: 'Noto Sans KR', sans-serif;">문의 내용</h3>
						<form name="form1" method="post" action="/~team2/inquiry/answer/<?=$id?>">
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
							<div style="float : left; margin-left : 20px; margin-top : -20px;">
								<button class="book-button" style="width:114px" type="submit"><b>답변하기</b></button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>


<br><br><br>
