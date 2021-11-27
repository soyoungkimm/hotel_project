<style>
	#user_select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 100px;
    }
	
	#review_select {
		border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 100%;
	}
</style>
                <!-- Begin Page Content -->
                <div class="container-fluid">
					
                    <!-- Page Heading -->
                    <a href="/~team2/admin_comment" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Comment</h1></a>
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="text-align : right">
							<a onclick="window.history.back();" class="btn btn-secondary btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-arrow-right"></i>
								</span>
								<span class="text">뒤로가기</span>
							</a>
							&nbsp;&nbsp;
							<a onclick="document.addForm.submit();" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-check"></i>
								</span>
								<span class="text">확인</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<form method="post" action="/~team2/admin_comment/add" name="addForm">
								<div style="color : red;"><?php echo validation_errors(); ?></div>
								<table class="table table-bordered">
								  <tbody>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">user_id</th>
									  <td width="80%">
										<select class="form-select" aria-label="Default select example" name="user_id" id="user_select">
										<?php
											// 유효성 검사에서 걸리면
											if (set_value('user_id') != '') {
												foreach ($data['users'] as $user) {
													if ($user->id == set_value('user_id')) {
											?>		
													<option value="<?=$user->id?>" selected>[<?=$user->id?>] <?=$user->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></option>
											<?php
													}
												}
											}	
											// 유효성 검사에서 걸리면
											else {
												foreach ($data['users'] as $user) {
											?>
													<option value="<?=$user->id?>">[<?=$user->id?>] <?=$user->name?></option>
											<?php
													
												}
											}
											?>
										</select>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">review_id</th>
									  <td width="80%">
										<select class="form-select" aria-label="Default select example" name="review_id" id="review_select">
										<?php
											// 유효성 검사에서 걸리면
											if (set_value('review_id') != '') {
												foreach ($data['reviews'] as $review) {
													if (set_value('review_id') == $review->id) {
											?>		
													<option value="<?=$review->id?>" selected>[<?=$review->id?>] <?=$review->title?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$review->id?>">[<?=$review->id?>] <?=$review->title?></option>
											<?php
													}
												}
											}	
											// 처음 들어올 때
											else {
												foreach ($data['reviews'] as $review) {
											?>
													<option value="<?=$review->id?>">[<?=$review->id?>] <?=$review->title?></option>
											<?php
												}
											}
											?>
										</select>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">content</th>
									  <td width="80%">
										<textarea class="form-control" rows="10" name="content"><?php echo set_value('content'); ?></textarea>
									  </td>
									</tr>
									<tr>
									  <th scope="row" width="20%" style="vertical-align:middle;">writeday</th>
									  <td width="80%">
										<input type="text" class="form-control" name="writeday" value="<?php echo set_value('writeday'); ?>">
									  </td>
									</tr>
								  </tbody>
								</table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->