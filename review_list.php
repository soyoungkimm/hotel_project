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
			<div class="row">
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
                <!--<div class="col-lg-4 col-md-6" id="blog-box2">
                    <div class="blog-item set-bg" data-setbg="/~team2/my/lib/sona-master/img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="./blog-details.html">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>-->
                
                <div class="col-lg-12">
                    <div class="load-more">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

