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
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">id</label>
	<?=$row->id?>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">date</label>
 <div class="input-group  input-group-sm" id="writeday">
	<input  type="text" name="writeday" class="form-control form-control-sm" value="<?=$row->writeday?> "> 
	<div class="input-group-append">
		<div class = "input-group-text">
			 <div class = "input-group-addon"><i class="far fa-calendar-alt fa-lg "></i></div>	
			</div>
		</div>
	</div>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">name</label>
  <input type="text" name="name" class="form-control" value="<?=$row->name?>" id="exampleFormControlInput1" placeholder="">

</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">content</label>
  <input type="text" name="content"  class="form-control" value="<?=$row->content?>" id="exampleFormControlInput1" placeholder="">
  
</div>



<div align="center">
	<input type = "submit" value= "저장" class="btn btn-sm mycolor1">&nbsp;
    <input type= "button" value="이전화면"  class="btn btn-sm mycolor1" onClick="history.back();">&nbsp;
</div>
</form>