<style>
	#review_btn {
	  background-color : #38b6ff;
	  border : none;
	}
	
	.blog-item .bi-text h4 {
		font-family: "Cabin", sans-serif; 
	}
	
	
	.star {
		position: relative;
		font-size: 1.5rem;
		color: #787878;
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
	  
	#recent {
		color : #38b6ff; 
		font-weight : bold; 
		font-size : 20px; 
		font-family : 'Nanum Gothic'; 
		cursor:pointer; 
		float : left;
	}
	
	#star_num {
		color : #c7c7c7; 
		font-weight : bold; 
		font-size : 20px; 
		font-family : 'Nanum Gothic'; 
		cursor: pointer; 
		float : left;
	}
	  
</style>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2 id="pic_area">Review</h2>
                        <div class="bt-option">
                            <a href="/~team2/">Home</a>
                            <span>Review</span>
                        </div>
                    </div>
                </div>
            </div>
			<br><br><br>
			<div>
				<div class="col-lg-12" style="text-align : right">
					<a id="recent" onclick="changeListSortRecent(1);">최신순</a>
					<a id="star_num" onclick="changeListSortStarNum(1);">&nbsp;별점순</a>
					
					<input type="hidden" id="isClickRecent" value="true"/>
					<input type="hidden" id="isClickStarNum" value="false" />
					
					<button type='button' id='review_btn' class='btn btn-primary' onclick="clickWrite();">후기작성</button>
				</div>
			</div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
	
    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad" id="blogHide">
        <div class="container">
			<div class="row" id="review_area">
				<input type="hidden" id="total_review_num" value="9">
				
				<?php
					foreach($data['reviews'] as $review) {
						$arr = explode("-", $review->writeday);
						$year = $arr[0];
						$month = $arr[1];
						$date = $arr[2];
				?>
				<div class="col-lg-4 col-md-6" onclick="location.href='/~team2/review/detail/<?=$review->id?>'" style="cursor:pointer;">
				
					<?php
						if ($review->image == null) {
					?>
					
					<div class="blog-item" style="background-image : url(/~team2/my/img/review/default.jpg); background-size : cover;">
					<?php
						}
					else {
					?>
					<div class="blog-item" style="background-image : url(/~team2/my/img/review/<?=$review->image?>); background-size : cover;">
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
								<h4 style="color : #fff; margin-bottom : -5px"><?=$review->title?></h4>
								<span class="star">
									★★★★★
									<span style=" width : <?=$review->star * 10?>%">
										★★★★★
									</span>
								</span>
								<div class="b-time" style="color : #fff"><i class="icon_clock_alt"></i> <?=$year?>년 <?=$month?>월 <?=$date?>일</div>
							</div>
					</div>
					
				</div>
				<?php
					}
				?>
				
				
				<div class="col-lg-12" style="cursor:pointer;">
					<div class="load-more">
						<a onclick="if(document.getElementById('isClickRecent').value == 'true') {create_review('recent:load_more');} else {create_review('star_num:load_more');}" class="primary-btn">Load More</a>
					</div>
				</div>
			</div>
        </div>
    </section>
    <!-- Blog Section End -->


<script>
	
	// 로그인했는지 확인
	function clickWrite() {
		var user = '<?=$this->session->userdata('uid');?>';
		
		if(user == '') {
			alert('로그인이 필요한 서비스입니다.');
		}
		else {
			location.href='/~team2/review/add';
		}
	}

	 
	var isClickRecent = document.getElementById('isClickRecent');
    var isClickStarNum = document.getElementById('isClickStarNum');
	 
	var total_review_num = document.getElementById('total_review_num');
	
	
	function changeListSortRecent() {

		$("#recent").css("color", "#38b6ff");
		$("#star_num").css("color", "#c7c7c7");
		
		isClickRecent.value = 'true';
		isClickStarNum.value = 'false';
		
		if(total_review_num.value > 9) {
			total_review_num.value = 9;
		}

		create_review("recent");
	}

	function changeListSortStarNum() {
		
	    $("#recent").css("color", "#c7c7c7");
	    $("#star_num").css("color", "#38b6ff");
		
		if(total_review_num.value > 9) {
			total_review_num.value = 9;
		}

	    isClickRecent.value = 'false';
	    isClickStarNum.value = 'true';

	    create_review("star_num");
	}	
	 
	
	function create_review(sort) {
		
		// 마지막 페이지일 때
		if(<?=$data['reviews_num']?> == total_review_num.value) {
			total_review_num.value = <?=$data['reviews_num']?>;
		}
		
		
		if(sort == 'recent:load_more') {
			console.log(sort);
			total_review_num.value += 9;
			sort = 'recent';
		}
		else if (sort == 'star_num:load_more') {
			console.log(sort);
			total_review_num.value += 9;
			sort = 'star_num';
		}
		
		
		$.ajax({
		  url: "/~team2/review/ajax_review",
		  type: "POST",
		  datatype: "json",
		  data: {
			sort : sort,
			number : total_review_num.value
		  },
		  success : function(data) {
			
				var str = '';
			
				for(var i = 0; i < data.reviews.length; i++) {
					
					var arr = data.reviews[i].writeday.split("-");
					var year = arr[0];
					var month = arr[1];
					var date = arr[2];
					
					str += '<div class="col-lg-4 col-md-6" onclick="location.href=\'/~team2/review/detail/' + data.reviews[i].id + '\'" style="cursor:pointer;">\n';
						if (data.reviews[i].image == null) {
					
							str += '<div class="blog-item" style="background-image : url(/~team2/my/img/review/default.jpg); background-size : cover;">\n';
						}
						else {
						
							str += '<div class="blog-item" style="background-image : url(/~team2/my/img/review/' + data.reviews[i].image + '); background-size : cover;">\n';
							
						}
							
							
							
							
						for(var j = 0; j < data.categorys.length; j++){
							if (data.categorys[j].id == data.reviews[i].category_id) {		
								str += '<div class="bi-text">\n' + 					
											'<span class="b-tag">' + data.categorys[j].name + '</span>\n';					
							}
						}
						
									str +=  '<h4 style="color : #fff; margin-bottom : -5px">' + data.reviews[i].title + '</h4>\n' + 
											'<span class="star">\n' + 
												'★★★★★\n' + 
												'<span style=" width : ' + data.reviews[i].star * 10 + '%">\n' + 
													'★★★★★\n' + 
												'</span>\n' + 
											'</span>\n' + 
											'<div class="b-time" style="color : #fff"><i class="icon_clock_alt"></i>&nbsp;' + year + '년&nbsp;' + month + '월&nbsp;' + date + '일&nbsp;' + '</div>\n' + 
										'</div>\n' + 
									'</div>\n' + 
							'</div>\n';
				}
				
				 str += '<div class="col-lg-12" style="cursor:pointer;">\n' + 
							'<div class="load-more">\n' +
								'<a onclick="if(document.getElementById(\'isClickRecent\').value == \'true\') {create_review(\'recent:load_more\');} else {create_review(\'star_num:load_more\');}" class="primary-btn">Load More</a>\n' +
							'</div>\n' +
						'</div>\n';
						
							
			
			
			
			
			$('#review_area').empty();
			$("#review_area").append(str);
			
			
			total_review_num.value = data.total_review_num;
			
		  },
		  error: function(request,status,error){ // 실패
			alert("code = "+ request.status + " message = " + request.responseText + " error = " + error); // 실패 시 처리
			console.log("code = "+ request.status + " message = " + request.responseText + " error = " + error);
		  }
		});
		
	}
</script>
