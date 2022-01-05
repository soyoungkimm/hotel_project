    <style>

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
	
	.nice-select {
		line-height: 35px;
	}
	
	.table-bordered td, .table-bordered th {
		border: 1px solid #dee2e6; 
		border-right : none;
		border-left : none;
	}
	
	.table-bordered {
		border-top: 2px solid #c3c3c3;
		border-bottom: 2px solid #c3c3c3;
		border-left: 0px solid #c3c3c3;
		border-right: 0px solid #c3c3c3;
	}
	
	.table-sm td, .table-sm th {
		padding: 0.3rem;
		padding-left : 1rem;
	}
	
	#colum {
		background-color: #f3f3f3;
	}
	
	input, textarea {
		border: 1px solid #b9b9b9;
	}
	
	
	button {
		display: block;
		font-size: 14px;
		text-transform: uppercase;
		border: 1px solid #38b6ff;
		border-radius: 2px;
		color: #38b6ff;
		font-weight: 500;
		background: transparent;
		width: 100%;
		height: 46px;
		margin-top: 30px;
	}
	</style>

	<!-- Hero Section Begin -->
	<br><br><br><br>
    <section id="pic_area">
        <div class="container">
            <div class="row">
                <div class="col" style="text-align : center;">
                        <h2><span class="sona-title1" style="opacity : 0">INDUK HOTEL</span> 
						<p><span class="sona-title2" style="opacity : 0">문의하기</span></p>                       
                </div>
            </div>
        </div>
        <!--<div class="hero-slider">

        </div>-->
    </section>
    <!-- Hero Section End -->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-10 sona-booking" style=" padding-bottom : 10px; opacity : 0;">
					<div class="booking-form">
						<form name="form1" method="post" action="/~team2/inquiry/add">
							<table class="table table-bordered table-sm mymargin5">
								<tr>
									<td id="colum" width="30%" style="vertical-align:middle; text-aglin:center;">
										<font color="red">*</font> 질문유형 
									</td>
									<td width="70%" align="left">
										<div class="form-inline"> 
										<select name="type" class="form-control form-control-sm">
											<option value="">선택하세요</option>
									<?
										// $type=set_value("type");
										foreach($list as $row)
										{
											echo("<option value='$row->id'>$row->name </option>");
										}
									?>
										</select>
										</div>
									</td>
								</tr>		
								<tr>
									<td id="colum" width="20%" style="vertical-align:middle; text-aglin:center;">
										<font color="red">*</font> 제목
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<input type="text" name="title" size="80" maxlength="60">		
										</div>
									</td>
								</tr>									
								<tr height="250">
									<td id="colum" width="20%" style="text-aglin:center;">
										<font color="red">*</font> 내용
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<textarea cols="80" rows="10" name="content" maxlength="600"></textarea>
										</div>
									</td>
								</tr>		
								<tr>
									<td id="colum" width="20%" style="vertical-align:middle; text-aglin:center;">
										<font color="red">*</font> 성명
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<input  type="text" name="name" size="20" maxlength="20">		
										</div>
									</td>
								</tr>
								<tr>
									<td id="colum" width="20%" style="vertical-align:middle; text-aglin:center;">
										<font color="red">*</font> 이메일
									</td>
									<td width="80%" align="left">
										<div class="form-inline"> 
											<input  type="text" name="email" size="20" maxlength="20">		
										</div>
									</td>
								</tr>	
								<tr>
									<td id="colum" width="20%" style="vertical-align:middle; text-aglin:center;">
										<font color="red">*</font> 전화번호
									</td>
									<td width="80%" align="left">
										<div class="form-inline">
											<input  type="text" name="tel1" size="3" maxlength="3" value="" > &nbsp;-&nbsp;
											<input  type="text" name="tel2" size="4" maxlength="4" value="" > &nbsp;-&nbsp; 
											<input  type="text" name="tel3" size="4" maxlength="4" value="" >
										</div>
									</td>
								</tr>
							</table>
							<? $id = $this->session->userdata("id"); ?>
							<input type="hidden" name="writeday" id="writeday" value="<?=date("Y-m-d")?>" />
							<input type="hidden" name="user_id" id="user_id" value="<?=$id?>" />
							
						</form>
						<div style="float : left; margin-left : 20px; margin-top : -20px;">
							<button class="book-button" style="width:114px;" onclick="inquiry_LoginCheck();"><b>등록</b></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br><br><br>


<br><br><br>

<script>
	function inquiry_LoginCheck() {
		var user = '<?=$this->session->userdata('id')?>'
		if (user == '') {
			alert('로그인 후 이용 가능합니다.');
			return;
		}
		else { 
			document.form1.submit();
		}
	}
</script>


