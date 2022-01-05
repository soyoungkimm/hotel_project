	<div class="breadcrumb-section" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2 id="pic_area">Event</h2>
                        <div class="bt-option">
                            <a href="/~team2/">Home</a>
                            <span>Event</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div id='calendar'style="max-width:900px;margin:0 auto;"></div>
	<br><br><br><br><br><br><br>

	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/lib/jquery.min.js"></script>
	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/lib/jquery-ui.min.js"></script>
	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/lib/moment.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<!-- fullcalendar -->
	<link rel="stylesheet" href="/~team2/my/assets/plugins/fullcalendar-3.9.0/fullcalendar.print.min.css" media="print"/>
	<link rel="stylesheet" href="/~team2/my/assets/plugins/fullcalendar-3.9.0/fullcalendar.min.css">
	<script src="/~team2/my/assets/plugins/fullcalendar-3.9.0/fullcalendar.min.js"></script>



	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				option: {
					locale: 'ka'
				},
				events: '<?php echo site_url("/~team2/calendar/events"); ?>',
			});
		});
		
	</script>
