<style>

.blog-details-text .comment-option .single-comment-item.first-comment .sc-text:before {
	height: 100px;
}

.blog-details-text .comment-option .single-comment-item .sc-text a:hover {
	background: #38b6ff;
    border-color: #38b6ff;
}


.blog-details-text .comment-option .single-comment-item .sc-text span {
	color : #38b6ff;
}

.blog-details-text .tag-share .tags a:hover {
	background: #38b6ff;
}

.bd-hero-text ul li {
	color : #fff;
}


.star {
		position: relative;
		font-size: 2rem;
		color: #ddd;
	  }
	  
	  .star input {
		width: 100%;
		height: 100%;
		position: absolute;
		left: 0;
		opacity: 0;
		cursor: pointer;
	  }
	  
	  .star span {
		width: 0;
		position: absolute; 
		left: 0;
		color: #ffe000;
		overflow: hidden;
		pointer-events: none;
	  }
</style>

    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="/~team2/my/img/review/hotel_image.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-hero-text">
                        <span id="pic_area"><?=$data['category']->name?></span>
                        <h2><?=$data['review']->title?></h2>

						<?php
							$arr = explode("-", $data['review']->writeday);
							$year = $arr[0];
							$month = $arr[1];
							$date = $arr[2];
						?>
                        <ul>
                            <li class="b-time"><i class="icon_clock_alt"></i> <?=$year?>. <?=$month?>. <?=$date?></li>
                            <li><i class="icon_profile"></i><?=$data['user']->name?></li>
                        </ul>
						<br>
						<span style="border-radius: 15px; cursor:pointer; color : #fff"><a onclick="location.href='/~team2/review/edit/<?=$data['review']->id?>'">수정</a></span>
						&nbsp;&nbsp;&nbsp;<span style="border-radius: 15px; cursor:pointer;"><a onclick="pressDeleteReview();">삭제</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-text">
						<span class="star">
							★★★★★
							<span style=" width : <?=$data['review']->star * 10?>%">
								★★★★★
							</span>
						</span>
						<br><br><br>
                        <div class="bd-title">
                            <?=$data['review']->content?>
                        </div>
                        
                        
                        <div class="tag-share">
                            <div class="tags">
                                <a><?=$data['category']->name?></a>
                            </div>
                            <!--<div class="social-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>-->
                        </div>
                        <div class="comment-option">
                            <div id="comment_num">
								<h4>
								<?php
								  if (isset($data['comments'])) {
									if(isset($data['recomments'])) {
									  echo count($data['comments']) + count($data['recomments']);
									}
									else {
									  echo count($data['comments']);
									}
								  }
								  else {
									echo 0;
								  }
								  
								?> 
								Comments
								</h4>
							</div>
							
							
							
							
								<!--댓글 출력 시작-->
								 <?php
								  
								  if (isset($data['comments'])) {
									foreach ($data['comments'] as $comment) {
									  $arr = explode(" ", $comment->writeday);
									  $writedate_arr = explode("-", $arr[0]);
									  $year = $writedate_arr[0];
									  $month = $writedate_arr[1];
									  $date = $writedate_arr[2];

									  $writetime_arr = explode(":", $arr[1]);
									  $hour = $writetime_arr[0];
									  $minite = $writetime_arr[1];
									  $second = $writetime_arr[2];
								?>
								<div class="single-comment-item first-comment" id="coco<?=$comment->id?>">
									
									<div class="sc-text" id="co_area<?=$comment->id?>">
									<span> <?=$year?>년 <?=$month?>월 <?=$date?>일 <?=$hour?>시 <?=$minite?>분 <?=$second?>초
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editComment('co_area<?=$comment->id?>', <?=$comment->id?>, '<?=$comment->content?>');">수정</a>&nbsp;<a onclick="pressDelete('co', <?=$comment->id?>,'coco<?=$comment->id?>');">삭제</a></span>
									<?php
										  foreach ($data['comment_users'] as $comment_user) {
											if($comment_user->id == $comment->user_id) {
									?>
												<h5><?=$comment_user->name?></h5>
									<?php
											}
										  }
									?>
										<p><?=$comment->content?></p>
										
										<a onclick="clickCommentBtn('co<?=$comment->id?>')" class="comment-btn" style="cursor:pointer;">Reply</a>
										
										<br><br>
										<div class="leave-comment" id="co<?=$comment->id?>" style="display : none;">
											<form class="comment-form">
												<div class="row">
													<div class="col-lg-12 text-center">
														<textarea placeholder="내용" id="recomment<?=$comment->id?>"></textarea>
														<button type="button" onclick="createRecoment(<?=$comment->id?>, 'recomment<?=$comment->id?>', <?=$data['review']->id?>);" class="site-btn">Send</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!--댓글 출력 끝-->
								
								
								
								<!--대댓글 출력 시작-->
								<?php
								  
								  if(isset($data['recomments'])) {
									foreach ($data['recomments'] as $recomment) {
									  if($recomment->comment_id == $comment->id) {
										$arr = explode(" ", $recomment->writeday);
										$writeday_arr = explode("-", $arr[0]);
										$year = $writeday_arr[0];
										$month = $writeday_arr[1];
										$date = $writeday_arr[2];

										$writetime_arr = explode(":", $arr[1]);
										$hour = $writetime_arr[0];
										$minite = $writetime_arr[1];
										$second = $writetime_arr[2];
								?>
								<div class="single-comment-item reply-comment" id="rere<?=$recomment->id?>">
									
									<div class="sc-text" id="reco_area<?=$recomment->id?>">
									<span> <?=$year?>년 <?=$month?>월 <?=$date?>일 <?=$hour?>시 <?=$minite?>분 <?=$second?>초
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editRecomment('reco_area<?=$recomment->id?>', <?=$recomment->id?>, '<?=$recomment->content?>');">수정</a>&nbsp;<a onclick="pressDelete('re', <?=$recomment->id?>,'rere<?=$recomment->id?>');">삭제</a></span>
									<?php
										foreach ($data['recomment_users'] as $recomment_user) {
										  if($recomment_user->id == $recomment->user_id) {
									?>
										<h5><?=$recomment_user->name?></h5>
									<?php
										  }
										}
									?>
										<p><?=$recomment->content?></p>
										
										
									</div>
								</div>
								<!--대댓글 출력 끝-->
									<?php   
								  }
								}     
							  }
							}
						  }
							
						?>
								 
							
						</div>
						
						
						
						
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <textarea placeholder="내용" id='comment_textarea' ></textarea>
                                        <button type="button" onclick="createComent(<?=$data['review']->id?>, 'comment_textarea');" class="site-btn">Send Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
						
						
						
						
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Recommend Blog Section Begin -->
    <section class="recommend-blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Recommended</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="#">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="#">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recommend Blog Section End -->
	
	
	
	
	<script>
		
		  function pressDeleteReview() {
			var answer = confirm('정말로 삭제하시겠습니까?');
			if (answer) {
			  window.location.href = "/~team2/review/delete/<?=$data['review']->id?>";
			}
		  }
		  
		  
		  function editRecomment(reco_area, recomment_id, content) {
				
				var str = '';
				
				str += '<div class="leave-comment">\n' + 
							'<form class="comment-form">\n' +
								'<div class="row">\n' +
									'<div class="col-lg-12 text-center">\n' +
										'<textarea placeholder="내용" id="hhh">' + content + '</textarea>\n' +
										'<button type="button" onclick="ajax_edit_recomment(\'' + reco_area + '\', ' + recomment_id + ');" class="site-btn">Send</button>\n' +
									'</div>\n' +
								'</div>\n' +
							'</form>\n' +
						'</div>\n';
				
				
				$("#" + reco_area).empty();
				$("#" + reco_area).append(str);
			}
		  
		  
			
			function editComment(co_area, comment_id, content) {
				
				var str = '';
				
				str += '<div class="leave-comment">\n' + 
							'<form class="comment-form">\n' +
								'<div class="row">\n' +
									'<div class="col-lg-12 text-center">\n' +
										'<textarea placeholder="내용" id="hhh">'+ content +'</textarea>\n' +
										'<button type="button" onclick="ajax_edit_comment(\'' + co_area + '\', ' + comment_id + ');" class="site-btn">Send</button>\n' +
									'</div>\n' +
								'</div>\n' +
							'</form>\n' +
						'</div>\n';
						
				
				
				$("#" + co_area).empty();
				$("#" + co_area).append(str);
			}
			
			
			
			
			
			function ajax_edit_recomment(reco_area, recomment_id) {
				
				var content = document.getElementById('hhh').value;
				
				$.ajax({
				  url: "/~team2/review/ajax_edit_recomment",
				  type: "POST",
				  data: {
					recomment_id : recomment_id, 
					content : content
				  },
				  datatype: "json",
				  success : function(data) {
					
					var str = "";
					
					var arr = data.recomment.writeday.split(" ");
					var writedate_arr = arr[0].split("-");
					var year = writedate_arr[0];
					var month = writedate_arr[1];
					var date = writedate_arr[2];

					var writetime_arr = arr[1].split(":");
					var hour = writetime_arr[0];
					var minite = writetime_arr[1];
					var second = writetime_arr[2];
					
					
					str += '<span> ' + year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + '초' + 
									'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editRecomment(\'reco_area' + data.recomment.id + '\', ' + data.recomment.id + ', \'' + data.recomment.content + '\');">수정</a>&nbsp;<a onclick="pressDelete();">삭제</a></span>\n' + 
										'<h5>' + data.recomment_user.name + '</h5>\n' + 
										'<p>' + data.recomment.content + '</p>\n';
					
						
					// 댓글 생성
					$("#" + reco_area).empty();
					$("#" + reco_area).append(str);
					
				  },
				  error: function(request,status,error){ // 실패
					alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
					console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
				  }
				});
			}
			
			
			
			
			
			function ajax_edit_comment(co_area, comment_id) {
				
				var content = document.getElementById('hhh').value;
				
				$.ajax({
				  url: "/~team2/review/ajax_edit_comment",
				  type: "POST",
				  data: {
					comment_id : comment_id, 
					content : content
				  },
				  datatype: "json",
				  success : function(data) {
					
					var str = "";
					
					var arr = data.comment.writeday.split(" ");
					var writedate_arr = arr[0].split("-");
					var year = writedate_arr[0];
					var month = writedate_arr[1];
					var date = writedate_arr[2];

					var writetime_arr = arr[1].split(":");
					var hour = writetime_arr[0];
					var minite = writetime_arr[1];
					var second = writetime_arr[2];
					
					
					str += '<span> ' + year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + '초' + 
									'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editComment(\'co_area' + data.comment.id + '\', ' + data.comment.id + ', \'' + data.comment.content + '\');">수정</a>&nbsp;<a onclick="pressDelete();">삭제</a></span>\n' + 
										'<h5>' + data.comment_user.name + '</h5>\n' + 
										'<p>' + data.comment.content + '</p>\n' + 
										'<a onclick="clickCommentBtn(\'co' + data.comment.id + '\')" class="comment-btn" style="cursor:pointer;">Reply</a>\n' + 
										'<br><br>\n' + 
										'<div class="leave-comment" id="co' + data.comment.id + '" style="display : none;">\n' +
											'<form class="comment-form">\n' +
												'<div class="row">\n' +
													'<div class="col-lg-12 text-center">\n' +
														'<textarea placeholder="내용" id="recomment' + data.comment.id + '"></textarea>\n' +
														'<button type="button" onclick="createRecoment(' + data.comment.id + ', \'recomment' + data.comment.id + '\', ' + <?=$data['review']->id?> + ');" class="site-btn">Send</button>\n' +
													'</div>\n' +
												'</div>\n' +
											'</form>\n' +
										'</div>\n';
					
						
					// 댓글 생성
					$("#" + co_area).empty();
					$("#" + co_area).append(str);
					
				  },
				  error: function(request,status,error){ // 실패
					alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
					console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
				  }
				});
				
				
				
				
			}
			
			
			
			
			
			
			
			
			

		  function clickCommentBtn(comment_box_id) {
			
			if(document.getElementById(comment_box_id).style.display == "none") {
			  document.getElementById(comment_box_id).style.display = "block";
			  
			}
			else {
			  document.getElementById(comment_box_id).style.display = "none";
			}
			
		  }
		  
		  
		  
		  
		  
		  function pressDelete(type, comment_id ,comment) {
			  
			var answer = confirm('정말로 삭제하시겠습니까?');
			
			if (answer) {
				
				if (type == "re") {
					
					// recomment 삭제
					$.ajax({
					  url: "/~team2/review/ajax_delete_recomment",
					  type: "POST",
					  datatype: "json",
					  data: {
						recomment_id : comment_id,
						review_id : <?=$data['review']->id?>
					  },
					  success : function(data) {
						
						document.getElementById(comment).remove();
						
						if ((data.comments_num + data.recomments_num) != 0) {
							var str = '<h4>' + 
								(data.comments_num + data.recomments_num) + 
								' Comments</h4>';
						}
						else {
							var str = '<h4>0 Comments</h4>';
						}
						
						// comment 개수 바꾸기
						$('#comment_num').empty();
						$("#comment_num").append(str);
						
					  },
					  error: function(request,status,error){ // 실패
						alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
						console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
					  }
					});
					
				}
				else {
					
					// comment 삭제
					$.ajax({
					  url: "/~team2/review/ajax_delete_comment",
					  type: "POST",
					  datatype: "json",
					  data: {
						comment_id : comment_id,
						review_id : <?=$data['review']->id?>
					  },
					  success : function(data) {
						
						document.getElementById(comment).remove();
						
						if ((data.comments_num + data.recomments_num) != 0) {
							var str = '<h4>' + 
								(data.comments_num + data.recomments_num) + 
								' Comments</h4>';
						}
						else {
							var str = '<h4>0 Comments</h4>';
						}
						
						// comment 개수 바꾸기
						$('#comment_num').empty();
						$("#comment_num").append(str);
						
					  },
					  error: function(request,status,error){ // 실패
						alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
						console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
					  }
					});	
					
				}
			}
				
			
		  }
		  
		  
		  



		  function createComent(review_id, text_id) {
		   
			
			var content = document.getElementById(text_id).value;

			   // 로그인 기능 구현되면 넣기
			  //if(!$this->session->userdata('user_id')) {
			
			  //alert('로그인이 필요합니다');
			  //return;
			
			  //}
			
			

			// 아무것도 입력하지 않았을 때
			if (content == '') {
			  alert('내용을 입력해주세요');
			  return;
			}

			

			$.ajax({
				  url: "/~team2/review/ajax_comment",
				  type: "POST",
				  data: {
					review_id : review_id, 
					content : content
				  },
				  datatype: "json",
				  success : function(data) {
					
					var str = "";
						
						
						
						// 댓글 개수 출력
						
						if (data.comments != null) {
							if(data.recomments != null) {
								str += '<div id="comment_num"><h4>' + (data.comments.length + data.recomments.length) + ' Comments</h4></div>';
							}
							else {
								str += '<div id="comment_num"><h4>' + data.comments.length + ' Comments</h4></div>';
							}
						}
						else {
							str += '<div id="comment_num"><h4> 0 Comments</h4></div>';
						}
							
						
						
						
						
						
						
					  // 댓글 출력
					  if (data.comments != null) {
						for (var i = 0; i < data.comments.length; i++) {

						  var arr = data.comments[i].writeday.split(" ");
						  var writedate_arr = arr[0].split("-");
						  var year = writedate_arr[0];
						  var month = writedate_arr[1];
						  var date = writedate_arr[2];

						  var writetime_arr = arr[1].split(":");
						  var hour = writetime_arr[0];
						  var minite = writetime_arr[1];
						  var second = writetime_arr[2];



						str +=	'<div class="single-comment-item first-comment" id="coco' + data.comments[i].id + '">\n' + 
                                
                                '<div class="sc-text" id="co_area' + data.comments[i].id + '">\n' + 
								'<span>' +  year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + 
								'초&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editComment(\'co_area' + data.comments[i].id + '\', ' + data.comments[i].id + ', \'' + data.comments[i].content + '\');">수정</a>&nbsp;<a onclick="pressDelete(\'co\', ' + data.comments[i].id + ',\'coco' + data.comments[i].id + '\');">삭제</a></span>\n';
								for (var j = 0; j < data.comment_users.length; j++) {
									if(data.comment_users[j].id == data.comments[i].user_id) {
										str += '<h5>' + data.comment_users[j].name + '</h5>\n';
									}
								}
								
                                    str += data.comments[i].content + '\n' +
									
									'<br><br>\n' + 
                                    '<a onclick="clickCommentBtn(\'co' + data.comments[i].id + '\')" class="comment-btn" style="cursor:pointer;">Reply</a>\n' + 
									'<br><br>\n' + 
									'<div class="leave-comment" id="co' + data.comments[i].id + '" style="display : none;">\n' +
										'<form class="comment-form">\n' +
											'<div class="row">\n' +
												'<div class="col-lg-12 text-center">\n' +
													'<textarea placeholder="내용" id="recomment' + data.comments[i].id + '"></textarea>\n' +
													'<button type="button" onclick="createRecoment(' + data.comments[i].id + ', \'recomment' + data.comments[i].id + '\', ' + <?=$data['review']->id?> + ');"class="site-btn" >Send</button>\n' +
												'</div>\n' +
											'</div>\n' +
										'</form>\n' +
									'</div>\n' +
									
                                '</div>\n' +
                            '</div>\n';




							
						  // 대댓글 출력
						  if(data.recomments != null) {
							for (var a = 0; a < data.recomments.length; a++) {
							  if(data.recomments[a].comment_id == data.comments[i].id) {
								var arr = data.recomments[a].writeday.split(" ");
								var writedate_arr = arr[0].split("-");
								var year = writedate_arr[0];
								var month = writedate_arr[1];
								var date = writedate_arr[2];

								var writetime_arr = arr[1].split(":");
								var hour = writetime_arr[0];
								var minite = writetime_arr[1];
								var second = writetime_arr[2];



							str +=	'<div class="single-comment-item reply-comment" id="rere' + data.recomments[a].id + '">\n' + 
                                
                                '<div class="sc-text"  id="reco_area' + data.recomments[a].id + '">\n' +
								'<span> ' + year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + 
								'초&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editRecomment(\'reco_area' + data.recomments[a].id + '\', ' + data.recomments[a].id + ', \'' + data.recomments[a].content + '\');">수정</a>&nbsp;<a onclick="pressDelete(\'re\', ' + data.recomments[a].id + ',\'rere' + data.recomments[a].id + '\');">삭제</a></span>\n';
								for(var z = 0; z < data.recomment_users.length; z++) 
								{
								  if(data.recomment_users[z].id == data.recomments[a].user_id) 
								  {
                                    str += '<h5>' + data.recomment_users[z].name + '</h5>\n';
								
								  }
								}
								
                                    str+= data.recomments[a].content + '\n' + 
                                    
									
                                '</div>\n' + 
                            '</div>\n';
							<!--대댓글 출력 끝-->
								   
							  }
							}     
						  }
						}
					  }
						
					
							 
                        /*str += '</div>\n' + 
						'</div>\n';*/


					

					// 댓글 생성
					$('.comment-option').empty();
					$(".comment-option").append(str);
					
					// 댓글창 지우기
					document.getElementById(text_id).value = '';

					
				  },
				  error: function(request,status,error){ // 실패
					alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
					console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
				  }
				});

		  }




		  function createRecoment(comment_id, text_id, review_id) {

			var content = document.getElementById(text_id).value;
			
			

			   // 로그인 기능 구현되면 넣기
			  //if(!$this->session->userdata('user_id')) {
			
			  //alert('로그인이 필요합니다');
			  //return;
			
			  //}
			
			

			// 아무것도 입력하지 않았을 때
			if (content == '') {
			  alert('내용을 입력해주세요');
			  return;
			}
			
			
			
			
			
			
			$.ajax({
				url: "/~team2/review/ajax_recomment",
				type: "POST",
				data: {
				  comment_id : comment_id, 
				  review_id :review_id, 
				  content : content
				},
				datatype: "json",
				success : function(data) {
				  
				  var str = "";
					
					
					
					// 댓글 개수 출력
					
					if (data.comments != null) {
						if(data.recomments != null) {
							str += '<div id="comment_num"><h4>' + (data.comments.length + data.recomments.length) + ' Comments</h4></div>';
						}
						else {
							str += '<div id="comment_num"><h4>' + data.comments.length + ' Comments</h4></div>';
						}
					}
					else {
						str += '<div id="comment_num"><h4> 0 Comments</h4></div>';
					}
					
					
					
					
					
					  // 댓글 출력
					  if (data.comments != null) {
						for (var i = 0; i < data.comments.length; i++) {

						  var arr = data.comments[i].writeday.split(" ");
						  var writedate_arr = arr[0].split("-");
						  var year = writedate_arr[0];
						  var month = writedate_arr[1];
						  var date = writedate_arr[2];

						  var writetime_arr = arr[1].split(":");
						  var hour = writetime_arr[0];
						  var minite = writetime_arr[1];
						  var second = writetime_arr[2];



					str +=	'<div class="single-comment-item first-comment" id="coco' + data.comments[i].id + '">\n' + 
                                
                                '<div class="sc-text"  id="co_area' + data.comments[i].id + '">\n' + 
									'<span>' +  year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + 
									'초&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editComment(\'co_area' + data.comments[i].id + '\', ' + data.comments[i].id + ', \'' + data.comments[i].content + '\');">수정</a>&nbsp;<a onclick="pressDelete(\'co\', ' + data.comments[i].id + ',\'coco' + data.comments[i].id + '\');">삭제</a></span>\n';
								for (var j = 0; j < data.comment_users.length; j++) {
									if(data.comment_users[j].id == data.comments[i].user_id) {
										str += '<h5>' + data.comment_users[j].name + '</h5>\n';
									}
								}
								
                                    str += data.comments[i].content + '\n' + 
                                    '<br><br>\n' + 
                                    '<a onclick="clickCommentBtn(\'co' + data.comments[i].id + '\')" class="comment-btn" style="cursor:pointer;">Reply</a>\n' + 
									'<br><br>\n' + 
									'<div class="leave-comment" id="co' + data.comments[i].id + '" style="display : none;">\n' +
										'<form class="comment-form">\n' +
											'<div class="row">\n' +
												'<div class="col-lg-12 text-center">\n' +
													'<textarea placeholder="내용" id="recomment' + data.comments[i].id + '"></textarea>\n' +
													'<button type="button" onclick="createRecoment(' + data.comments[i].id + ', \'recomment' + data.comments[i].id + '\', ' + <?=$data['review']->id?> + ');"class="site-btn" >Send</button>\n' +
												'</div>\n' +
											'</div>\n' +
										'</form>\n' +
									'</div>\n' +
									
                                '</div>\n' +
                            '</div>\n';


					
						  // 대댓글 출력
						  if(data.recomments != null) {
							  
							for (var a = 0; a < data.recomments.length; a++) {
								
							  if(data.recomments[a].comment_id == data.comments[i].id) {
								  
								var arr = data.recomments[a].writeday.split(" ");
								var writedate_arr = arr[0].split("-");
								var year = writedate_arr[0];
								var month = writedate_arr[1];
								var date = writedate_arr[2];

								var writetime_arr = arr[1].split(":");
								var hour = writetime_arr[0];
								var minite = writetime_arr[1];
								var second = writetime_arr[2];




					str +=	'<div class="single-comment-item reply-comment" id="rere' + data.recomments[a].id + '">\n' + 
                                
                                '<div class="sc-text"  id="reco_area' + data.recomments[a].id + '">\n' +
								'<span> ' + year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + 
								'초&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="editRecomment(\'reco_area' + data.recomments[a].id + '\', ' + data.recomments[a].id + ', \'' + data.recomments[a].content + '\');">수정</a>&nbsp;<a onclick="pressDelete(\'re\', ' + data.recomments[a].id + ',\'rere' + data.recomments[a].id + '\');">삭제</a></span>\n';
								for(var z = 0; z < data.recomment_users.length; z++) 
								{
								  if(data.recomment_users[z].id == data.recomments[a].user_id) 
								  {
                                    str += '<h5>' + data.recomment_users[z].name + '</h5>\n';
								
								  }
								}
								
                                    str+= data.recomments[a].content + '\n' + 
                                    
									
                                '</div>\n' + 
                            '</div>\n';
							<!--대댓글 출력 끝-->
								  
							  }
							}     
						  }
						}
					  }
						
					
							 
                        /*str += '</div>\n' + 
						'</div>\n';*/


				



					// 댓글 생성
					$('.comment-option').empty();
					$(".comment-option").append(str);
					
				 
				  
				},
				error: function(request,status,error){ // 실패
				  alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
				  console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
				}
			  });

		  }
	</script>

    