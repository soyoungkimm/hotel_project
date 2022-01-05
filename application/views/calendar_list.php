<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	</head>
<body>

	


	
<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				option: {
					locale: 'ka'

				},
$("#myModal").modal("show");
$("#myModal .modal-title ").text(calEvent.title);

},
   

   
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

<button type="button" class="btn btn-primary" data-dismiss="modal">확인</button>
</div>
</div>
</div>
</div>
</body>
</html>	


	
