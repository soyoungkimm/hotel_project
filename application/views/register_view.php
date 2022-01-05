<style>

	#signup_header{
		display:flex;
		justify-content: center;
	}
	form{
		padding:10px;
	}
	.input-box{
		position:relative;
		margin:10px 0;
	}
	.input-box > input{
		background:transparent;
		border:none;
		border-bottom: solid 1px #ccc;
		padding:20px 0px 5px 0px;
		font-size:14pt;
		width:100%;
	}
	input::placeholder{
		color:transparent;
	}
	input:placeholder-shown + label{
		color:#aaa;
		font-size:14pt;
		top:15px;

	}
	input:focus + label, label{
		color:#8aa1a1;
		font-size:10pt;
		pointer-events: none;
		position: absolute;
		left:0px;
		top:0px;
		transition: all 0.2s ease ;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
	}

	input:focus, input:not(:placeholder-shown){
		border-bottom: solid 1px #8aa1a1;
		outline:none;
	}
	input[type=submit]{
		background-color: #62c5ff;
		border:none;
		color:white;
		border-radius: 5px;
		width:100%;
		height:35px;
		font-size: 14pt;
		margin-top:100px;
	}

	textarea {
		resize: none;
	}
</style>
		<br><br><br>
		<div id="signup_header">
            <h2 style="font-family : 'Carbin';">Sign up</h2>
        </div>
		<br><br>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<form action="" method="POST" id="pic_area">
					<div class="input-box">
						<input type="text" id="inputId" name="uid" value="<?=set_value("uid");?>" placeholder="아이디">
						<label for="inputId" id="pic_area">아이디</label>
						<? if(form_error("uid")==true) echo form_error("uid");?>
					</div>
					<br>
					<div class="input-box">
						<input id="password" type="password"  name="pwd" value="<?=set_value("pwd");?>" placeholder="비밀번호">
						<label for="password">비밀번호</label>
						<? if(form_error("pwd")==true) echo form_error("pwd");?>
					</div>
					<br>
					<div class="input-box">
						<input type="text" id="name" name="name" value="<?=set_value("name");?>"  placeholder="이름">
						<label for="name">이름</label>
						<? if(form_error("name")==true) echo form_error("name");?>
					</div>
					<br>
					<div class="input-box">
						<input type="text" id="inputEmail" name="email" value="<?=set_value("email");?>" placeholder="이메일">
						<label for="inputEmail">이메일</label>
						<? if(form_error("email")==true) echo form_error("email");?>
					</div>
					<br>
					<div class="input-box">
						<input type="text" id="phone" name="phone" value="<?=set_value("phone");?>" placeholder="전화번호">
						<label class="control-label" for="phone">전화번호</label>
						<? if(form_error("phone")==true) echo form_error("phone");?>
					</div>
					<br><br>
					<p style="color : #8b8b8b">개인정보 수집, 이용에 대한 동의 (필수)
					<input type='checkbox' class='book-checkbox' readonly>
					<input type='hidden' value="" name="check1" /></p>
					<textarea style="color : #7c7c7c; border-color : #cfcfcf; width : 100%" rows="5" readonly>
1. 수집 이용 항목
성명, 이메일주소, 휴대폰번호, 구매 및 예약내역, 투숙기간, 아이디, 비밀번호

2. 수집 이용 목적
본인 식별, 신라리워즈 서비스 제공 및 민원처리

3. 보유 이용 기간
회원 탈퇴 시 까지

※ 관련 법령에서 정한 별도 보유 기한이 있는 경우는 그에 따름.
※ 위 사항에 대한 동의를 거부할 수 있으나, 이에 대한 동의가 없을 경우 제주인덕호텔 회원 가입 및 서비스 이용이 불가합니다.</textarea>
<? if(form_error("check1")==true) echo form_error("check1");?>
<br><br><br><br>
					<p style="color : #8b8b8b">개인정보 제3자 제공에 대한 동의 (필수)
					<input type='checkbox' class='book-checkbox' readonly>
					<input type='hidden' value="" name="check2" /></p>
					<textarea style="color : #7c7c7c; border-color : #cfcfcf; width : 100%" rows="5" readonly>
1. 제공받는 자
제주인덕호텔

2. 제공받는 자의 이용 목적
제주인덕호텔 서비스 제공

3. 제공하는 항목
성명, 이메일주소, 휴대폰번호, 구매 및 예약내역, 투숙기간, 아이디, 비밀번호

4. 제공받은 자의 보유·이용 기간 :
회원 탈퇴 시까지

※위 사항에 대한 동의를 거부할 수 있으나, 이에 대한 동의가 없을 경우 제주인덕호텔 회원 가입 및 서비스 이용이 불가합니다.</textarea>
<? if(form_error("check2")==true) echo form_error("check2");?>
					<input type="submit" value="회원가입">
				</form>
			</div>
			<div class="col-lg-4"></div>
		</div>
		
       <br><br><br>

<div>  
<script>
	$('input[type="checkbox"]').on('change', function(e){
        if($(this).prop('checked'))
        {
            $(this).next().val(1);
        } else {
            $(this).next().val() = '';
        }
	});
</script>
