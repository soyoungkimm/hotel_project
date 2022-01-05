<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script src="/my/js/moment-with-locales.min.js"></script>
	<script src="/my/js/bootstrap-datetimepicker.js"></script>
	<link  href="/my/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link  href="/my/css/fontawesome-all.min.css" rel="stylesheet">
</head>
<script>
	$(function() {
		$('#writeday') .datetimepicker({
			locale: 'ko', //한글 
			format: 'YYYY-MM-DD',
			defaultDate: moment() //현재 오늘날자.
		});
	});

	</script>

<form name="form1" method="post" action="">

<div class="form-floating mb-3">
 <label for="floatingInput">날짜</label>
  <input type="text" class="form-control" id="floatingInput" placeholder="asd" value="<?=set_value("writeday"); ?> ">
 
</div>

<div class="form-floating">
  <input type="text" class="form-control" id="floatingPassword" placeholder="" value="<?=set_value("name"); ?> ">
  <label for="floatingPassword">제목</label>
</div>

<div class="form-floating">
  <input type="text" class="form-control" id="floatingPassword" placeholder="" value="<?=set_value("content"); ?> ">
  <label for="floatingPassword">내용</label>
</div>


<div align="center">
<input type="submit" value="저장" class="btn btn-primary"  >&nbsp;
	
    <input type= "button" value="이전화면"  class="btn btn-primary" onClick="history.back();">&nbsp;
</div>
</form>