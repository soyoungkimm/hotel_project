

    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-details/blog-details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-hero-text">
                        <span id="pic_area">Travel Trip & Camping</span>
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
                        <div class="bd-title">
                            <?=$data['review']->content?>
                        </div>
                        
                        
                        <div class="tag-share">
                            <div class="tags">
                                <a href="#">Travel Trip</a>
                                <a href="#">Camping</a>
                                <a href="#">Event</a>
                            </div>
                            <div class="social-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                        <div class="comment-option">
                            <h4><?php
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
							?> Comments</h4>
							
							
						<div id="comment_area">	
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
                            <div class="single-comment-item first-comment">
                                <div class="sc-author">
                                    <img src="/~team2/my/lib/sona-master/img/blog/blog-details/avatar/avatar-1.jpg" alt="">
                                </div>
                                <div class="sc-text">
								<span> <?=$year?>년 <?=$month?>월 <?=$date?>일 <?=$hour?>시 <?=$minite?>분 <?=$second?>초</span>
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
                                    
                                    <a onclick="clickCommentBtn('co<?=$comment->id?>')" class="comment-btn">Reply</a>
									
									<br><br>
									<div class="leave-comment" id="co<?=$comment->id?>" style="display : none;">
										<form class="comment-form">
											<div class="row">
												<div class="col-lg-12 text-center">
													<textarea placeholder="내용" id="recomment<?=$comment->id?>"></textarea>
													<button type="button" onclick="createRecoment(<?=$comment->id?>, 'recomment<?=$comment->id?>', <?=$data['review']->id?>);" class="site-btn" >Send</button>
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
                            <div class="single-comment-item reply-comment">
                                <div class="sc-author">
                                    <img src="/~team2/my/lib/sona-master/img/blog/blog-details/avatar/avatar-2.jpg" alt="">
                                </div>
                                <div class="sc-text">
								<span> <?=$year?>년 <?=$month?>월 <?=$date?>일 <?=$hour?>시 <?=$minite?>분 <?=$second?>초</span>
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
		
		  /*function pressDelete() {
			var answer = confirm('정말로 삭제하시겠습니까?');
			if (answer) {
			  window.location.href = "/~sale24/prj/blog/delete/<?=$data['blog']->id?>";
			}
		  }*/



		  function clickCommentBtn(comment_box_id) {
			
			if(document.getElementById(comment_box_id).style.display == "none") {
			  document.getElementById(comment_box_id).style.display = "block";
			  
			}
			else {
			  document.getElementById(comment_box_id).style.display = "none";
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



						str +=	'<div class="single-comment-item first-comment">\n' + 
                                '<div class="sc-author">\n' + 
                                    '<img src="/~team2/my/lib/sona-master/img/blog/blog-details/avatar/avatar-1.jpg" alt="">\n' + 
                                '</div>\n' + 
                                '<div class="sc-text">\n' + 
								'<span>' +  year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + '초</span>\n';
								for (var j = 0; j < data.comment_users.length; j++) {
									if(data.comment_users[j].id == data.comments[i].user_id) {
										str += '<h5>' + data.comment_users[j].name + '</h5>\n';
									}
								}
								
                                    str += data.comments[i].content + '\n' +
									
									'<br><br>\n' + 
                                    '<a onclick="clickCommentBtn(\'' + data.comments[i].id + '\')" class="comment-btn">Reply</a>\n' + 
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
							  if(data.recomments[a].user_comment_id == data.comments[i].id) {
								var arr = data.recomments[a].writeday.split(" ");
								var writedate_arr = arr[0].split("-");
								var year = writedate_arr[0];
								var month = writedate_arr[1];
								var date = writedate_arr[2];

								var writetime_arr = arr[1].split(":");
								var hour = writetime_arr[0];
								var minite = writetime_arr[1];
								var second = writetime_arr[2];



							str +=	'<div class="single-comment-item reply-comment">\n' + 
                                '<div class="sc-author">\n' +
                                    '<img src="/~team2/my/lib/sona-master/img/blog/blog-details/avatar/avatar-2.jpg" alt="">\n' +
                                '</div>\n' +
                                '<div class="sc-text">\n' +
								'<span> ' + year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + '초</span>\n';
								for(var z = 0; z < data.recomment_users.length; z++) 
								{
								  if(data.recomment_users[z].id == data.recomments[a].user_id) 
								  {
                                    str += '<h5>' + data.recomment_users[z].name + '</h5>\n';
								
								  }
								}
								
                                    str+= '<p>' + data.recomments[a].content + '</p>\n' + 
                                    
									
                                '</div>\n' + 
                            '</div>\n';
							<!--대댓글 출력 끝-->
								   
							  }
							}     
						  }
						}
					  }
						
					
							 
                        str += '</div>\n';




					// 댓글 생성
					$('#comment_area').empty();
					$("#comment_area").append(str);
					
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



					str +=	'<div class="single-comment-item first-comment">\n' + 
                                '<div class="sc-author">\n' + 
                                    '<img src="/~team2/my/lib/sona-master/img/blog/blog-details/avatar/avatar-1.jpg" alt="">\n' + 
                                '</div>\n' + 
                                '<div class="sc-text">\n' + 
									'<span>' +  year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + '초</span>\n';
								for (var j = 0; j < data.comment_users.length; j++) {
									if(data.comment_users[j].id == data.comments[i].user_id) {
										str += '<h5>' + data.comment_users[j].name + '</h5>\n';
									}
								}
								
                                    str += data.comments[i].content + '\n' + 
                                    '<br><br>\n' + 
                                    '<a onclick="clickCommentBtn(\'' + data.comments[i].id + '\')" class="comment-btn">Reply</a>\n' + 
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
							  if(data.recomments[a].user_comment_id == data.comments[i].id) {
								var arr = data.recomments[a].writeday.split(" ");
								var writedate_arr = arr[0].split("-");
								var year = writedate_arr[0];
								var month = writedate_arr[1];
								var date = writedate_arr[2];

								var writetime_arr = arr[1].split(":");
								var hour = writetime_arr[0];
								var minite = writetime_arr[1];
								var second = writetime_arr[2];




					str +=	'<div class="single-comment-item reply-comment">\n' + 
                                '<div class="sc-author">\n' +
                                    '<img src="/~team2/my/lib/sona-master/img/blog/blog-details/avatar/avatar-2.jpg" alt="">\n' +
                                '</div>\n' +
                                '<div class="sc-text">\n' +
								'<span> ' + year + '년' + month + '월' + date + '일' + hour + '시' + minite + '분' + second + '초</span>\n';
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
						
					
							 
                        str += '</div>\n';






					// 댓글 생성
					$('#comment_area').empty();
					$("#comment_area").append(str);
					
				 
				  
				},
				error: function(request,status,error){ // 실패
				  alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
				  console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
				}
			  });

		  }
	</script>

    