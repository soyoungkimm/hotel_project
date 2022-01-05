	<style>

		header {
			text-align: center;
		}
		
		/* 캘린더 위의 해더 스타일(날짜가 있는 부분) */
		.fc-header-toolbar {
			padding-top: 1em;
			padding-left: 1em;
			padding-right: 1em;
		}
		
		#calendar a {
			color : #000;
		}
		
		.fc-direction-ltr .fc-button-group>.fc-button:not(:last-child), .fc-direction-ltr .fc-button-group>.fc-button:not(:first-child) {
			background-color : #345bcc;
		}
		
		.fc .fc-button-primary:disabled, .fc .fc-button-primary {
			background-color: #0080ff;
		}
		
		.fc-event-title.fc-sticky{
			white-space: normal;
		}
		
		.memo {
			
			margin-left : 10px;
			margin-right : 10px;
			
			resize: none;
			background-color : #fff7be;
			border : none;
			padding : 0px 20px 20px; 
		}

		textarea:focus {
		  outline: none;
		}

		#memo-top {
			margin-top : 10px;
			margin-left : 10px;
			margin-right : 10px;
			
			height : 30px; 
			width : 225px;
			background-color : #fff7be;
			
			padding : 5px 5px 5px 5px;
			text-align : right;
		}
	
	</style>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
						<div class="col-lg-6 mb-4">
							<div class="card shadow mb-4" id="ccc">
								<!--<div class="card-body">
									<img src="/~team2/my/img/hotel/hotel_view.jpg" style="width : 750px; height : 550px">
									
								</div>-->
								<div class="">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
									<a class="btn btn-primary float-right" onclick="makeMemo();" style="margin : 10px 10px 10px 10px"><i class="fas fa-plus"></i></a>
                                </div>
                                <div class="card-body" id="memo_area">
								<?php
									foreach ($memos as $memo) {
								?>
									<div style="float : left;">
										<div id="memo-top"><i class="fas fa-fw fa-times" onclick="pressDeleteMemo(<?=$memo->id?>)" style="cursor : pointer;"></i></div>
										<textarea spellcheck="false" onchange="memoEdit(<?=$memo->id?> ,'memo<?=$memo->id?>')" placeholder="메모" rows="9" cols="20" class="memo" id="memo<?=$memo->id?>"><?=$memo->content?></textarea>
									</div>
								<?php
									}
								?>
                                </div>
							</div>
						</div>
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
							<div class="card shadow mb-4" id="ccc">
								<div class="card-body">
									<div id='calendar-container'>
										<div id='calendar'></div>
									</div>
								</div>
							</div>
                        </div>
						<div class="col-lg-2 mb-4"></div>
                    </div>
					
					
					
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
			<!-- Page level plugins -->
    
	
	<script class="cssdesk" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.0/moment.min.js" type="text/javascript"></script>
	
	<script>
	/* -------- 캘린더 시작 ----------*/
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
			
			initialView: 'dayGridMonth',
			selectable: true,// 달력 일자 드래그 설정가능
			navLinks: true, // 날짜를 선택하면 Day 캘린더나 Week 캘린더로 링크
			editable: true, // 수정 가능
			nowIndicator: true, // 현재 시간 마크
			dayMaxEvents: true, // 이벤트가 오버되면 높이 제한 (+ 몇 개식으로 표현)
			locale: 'ko', // 한국어 설정
			eventAdd: function(obj) { // 이벤트가 추가되면 발생하는 이벤트
				console.log('add');
				
			},
			eventChange: function(obj) { // 이벤트가 수정되면 발생하는 이벤트
				
				// GMT 시간은 9시간 빨라서 9시간 빼줘야됨
				var start = obj.event._instance.range.start;
				if(start.getHours() == 9) {
					start = moment(start).format('YYYY-MM-DD') + " 00:00";
				}
				else {
					start = start.setHours(start.getHours() - 9);
					start = moment(start).format('YYYY-MM-DD hh:mm');
				}
				
				
				var end = obj.event._instance.range.end;
				if(end.getHours() == 9) {
					end = moment(end).format('YYYY-MM-DD') + " 00:00";
				}
				else {
					end = end.setHours(end.getHours() - 9);
					end = moment(end).format('YYYY-MM-DD hh:mm');
				}
				
				
				$.ajax({
						  url: "/~team2/admin/ajax_calendar_edit",
						  type: "POST",
						  data : {
								title : obj.event._def.title,
								start: start,
								end: end
						  },
						  traditional: true,
						  async: false, //동기
						  success : function(data){
							  
						  },
						  error : function(request,status,error){
							alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
							console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
						  }
					});
				
			},
			eventRemove: function(obj){ // 이벤트가 삭제되면 발생하는 이벤트
				console.log('remove');
				
			},
			select: function(arg) { // 캘린더에서 드래그로 이벤트 생성
				
				var title = prompt('입력할 일정:');
				if (title) {
					$.ajax({
						  url: "/~team2/admin/ajax_calendar_add",
						  type: "POST",
						  data : {
								title: title,
								start: arg.startStr,
								end: arg.endStr,
								allDay: arg.allDay
						  },
						  traditional: true,
						  async: false, //동기
						  success : function(data){
							  
						  },
						  error : function(request,status,error){
							alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
							console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
						  }
					});

					calendar.addEvent({
						title: title,
						start: arg.startStr,
						end: arg.endStr,
						allDay: arg.allDay
					})
				} 
				
				calendar.unselect()
			},
			droppable: true,
			eventClick: function(arg) { 
				// 있는 일정 클릭시, 
				console.log(arg);
				if (confirm('일정을 삭제하시겠습니까?')) 
				{ 
					$.ajax({
						  url: "/~team2/admin/ajax_calendar_delete",
						  type: "POST",
						  data : {
								title : arg.event._def.title
						  },
						  traditional: true,
						  async: false, //동기
						  success : function(data){
							 
						  },
						  error : function(request,status,error){
							alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
							console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
						  }
					});
					arg.event.remove();
				} 
			},
			eventBorderColor : '#82d1ff',
			eventBackgroundColor : '#82d1ff' ,
			headerToolbar: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
			},
			events: function(info, successCallback, failureCallback){ // ajax 처리로 데이터를 로딩 시킨다. 
				$.ajax({
					  url: "/~team2/admin/ajax_calendar_load",
					  type: "POST",
					  dataType: "JSON",
					  traditional: true,
					  async: false, //동기
					  success : function(data){
						  
						successCallback(data);
						
					  },
					  error : function(request,status,error){
						alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
						console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
					  }
				});
			}
			
        });
		
        calendar.render();
    });
	
	/* -------- 캘린더 끝 ----------*/





	function makeMemo() {
		
		var str =   '<div style="float : left;">' + 
						'<div id="memo-top"></div>' + 
						'<textarea onchange="memoAdd()" placeholder="메모를 1자 이상 적어주세요" rows="9" cols="20" class="memo" id="hhh"></textarea>' + 
					'</div>';
		
		
		$("#memo_area").append(str);
	}
	
	function print_memo(data) {
		
		var str = '';
		for (var i = 0; i < data.memo.length; i++) {
			
			str +=  '<div style="float : left;">\n' + 
						'<div id="memo-top"><i class="fas fa-fw fa-times" onclick="pressDeleteMemo(' + data.memo[i].id + ')" style="cursor : pointer;"></i></div>\n' + 
						'<textarea onchange="memoEdit('+ data.memo[i].id +', \'memo' + data.memo[i].id + '\')" placeholder="메모" rows="9" cols="20" class="memo" id="memo' + data.memo[i].id + '">' + data.memo[i].content + '</textarea>\n' + 
					'</div>';
		}
		
		$("#memo_area").empty();
		$("#memo_area").append(str);
		
	}
	
	function memoAdd() {
		
		var content = document.getElementById('hhh').value;
		
		$.ajax({
			url: "/~team2/admin/ajax_memo_add",
			type: "POST",
			dataType: "JSON",
			data : {
				content : content
			},
			success : function(data) {
				
				print_memo(data);
				
			},
			error: function(request,status,error){ // 실패
				alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
				console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
			}
		});
	}
	
	
	
	function memoEdit(memo_id, memo_id_name) {
		
		var content = document.getElementById(memo_id_name).value;
		
		if (content == ''){
			alert('메모를 1자 이상 적어주세요.');
			return;
		}
		
		$.ajax({
		    url: "/~team2/admin/ajax_memo_edit",
		    type: "POST",
		    dataType: "JSON",
		    data : {
				memo_id : memo_id,
				content : content
		    },
		    success : function(data) {
			
				print_memo(data);
			
		    },
		    error: function(request,status,error){ // 실패
				alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
				console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
		    }
		});
		
		
	}
	
	
	
	function pressDeleteMemo(id) {
		var answer = confirm('정말로 삭제하시겠습니까?');
		if (answer) {
			
			$.ajax({
				url: "/~team2/admin/ajax_memo_delete",
				type: "POST",
				dataType: "JSON",
				data : {
					memo_id : id
				},
				success : function(data) {
					
					print_memo(data);
					
				},
				error: function(request,status,error){ // 실패
					alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
					console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
				}
			});
			
		}
	}
	
	
	
    </script>
	
	
	