<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	</head>
<body>
	<br><br><br><br><br>
	<div id='calendar'style="max-width:1000px;margin:0 auto; "></div>
	<br><br><br><br><br>
	
	
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
			eventClick: function(calEvent) {
				$("#myModal").modal("show");//모달
				$("#myModal .modal-title ").text(calEvent.title);
				$("#myModal .modal-body ").text(calEvent.content);
				},
				events: '<?php echo site_url("/~team2/Calendar/events"); ?>',
			});
		});
		
	</script>
	
<!-- 모달 영역 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel"></h4>
</div>
<div class="modal-body">
</div>
<div class="modal-footer">

<button type="button" class="btn btn-outline-primary" data-dismiss="modal">확인</button>
</div>
</div>
</div>
</div>

</body>
</html>