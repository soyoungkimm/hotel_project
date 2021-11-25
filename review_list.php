<style>
	#review_btn {
		
	  background-color : #dfa974;
	  border : none;
	}
</style>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" id="pic_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>후기</h2>
                        <div class="bt-option">
                            <a href="/~team2/hotel">Home</a>
                            <span>후기</span>
                        </div>
                    </div>
                </div>
            </div>
			<br><br><br>
			<div>
				<div class="col-lg-12" style="text-align : right">
					<button type='button' id='review_btn' class='btn btn-primary' onclick="location.href='/~team2/review/add'">후기작성</button>
				</div>
			</div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
	
    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad" id="blogHide">
        <div class="container">
			<div class="row" id="review_area">
				
				<?php
					foreach($data['reviews'] as $review) {
						$arr = explode("-", $review->writeday);
						$year = $arr[0];
						$month = $arr[1];
						$date = $arr[2];
				?>
				<div class="col-lg-4 col-md-6" onclick="location.href='/~team2/review/detail/<?=$review->id?>'">
				
					<?php
						if ($review->image == null) {
					?>
					<div class="blog-item set-bg" data-setbg="/~team2/my/img/review/default.jpg">
					<?php
						}
					else {
					?>
					<div class="blog-item set-bg" data-setbg="/~team2/my/img/review/<?=$review->image?>">
					<?php
						}
						
						
						
					
					foreach($data['categorys'] as $category){
						if ($category->id == $review->category_id) {
					?>				
							<div class="bi-text">					
								<span class="b-tag"><?=$category->name?></span>				
					<?php			
						}
					}
					?>
								<h4><a href="./blog-details.html" style="color : #fff"><?=$review->title?></a></h4>
								<div class="b-time" style="color : #fff"><i class="icon_clock_alt"></i> <?=$year?>년 <?=$month?>월 <?=$date?>일</div>
							</div>
					</div>
					
				</div>
				<?php
					}
				?>
				
				
				<div class="col-lg-12">
					<div class="load-more">
						<a onclick="create_review();" class="primary-btn">Load More</a>
					</div>
				</div>
			
			</div>
			
			
        </div>
    </section>
    <!-- Blog Section End -->


<script>
	function create_review() {
		
		
		$.ajax({
		  url: "/~team2/review/ajax_review",
		  type: "POST",
		  datatype: "json",
		  data: {
			number : 6
		  },
		  success : function(data) {
			
			var str = '';
			
				for(var i = 0; i < data.reviews.length; i++) {
					
					var arr = data.reviews[i].writeday.split("-");
					var year = arr[0];
					var month = arr[1];
					var date = arr[2];
					
					str += '<div class="col-lg-4 col-md-6" onclick="location.href=\'/~team2/review/detail/' + data.reviews[i].id + '\'">\n';
						if (data.reviews[i].image == null) {
					
							str += '<div class="blog-item set-bg" data-setbg="/~team2/my/img/review/default.jpg">\n';
						
						}
						else {
							str += '<div class="blog-item set-bg" data-setbg="/~team2/my/img/review/' + data.reviews[i].image + '">\n';
						
						}
							
							
							
							
						for(var j = 0; j < data.categorys.length; j++){
							if (data.categorys[j].id == data.reviews[i].category_id) {		
								str += '<div class="bi-text">\n' + 					
											'<span class="b-tag">' + data.categorys[j].name + '</span>\n';					
							}
						}
						
									str += '<h4><a href="./blog-details.html" style="color : #fff">' + data.reviews[i].title + '</a></h4>\n' + 
											'<div class="b-time" style="color : #fff"><i class="icon_clock_alt"></i>' + year + '년' + month + '월' + date + '일' + '</div>\n' + 
										'</div>\n' + 
									'</div>\n' + 
							'</div>\n';
				}
				
				str += '<div class="col-lg-12">\n' + 
							'<div class="load-more">\n' + 
								'<a onclick="create_review();" class="primary-btn">Load More</a>\n' + 
							'</div>\n' + 
						'</div>\n';
			
			console.log(str);
			
			// comment 개수 바꾸기
			$('#review_area').empty();
			$("#review_area").append(str);
			
		  },
		  error: function(request,status,error){ // 실패
			alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
			console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
		  }
		});
		
	}
</script>
