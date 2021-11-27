	<style>
	.form-select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 100px;
    }
	
	.filebox .upload-name {
        display: inline-block;
        height: 40px;
        padding: 0 10px;
        vertical-align: middle;
        border: 1px solid #dddddd;
        width: 30%;
        color: #999999;
		border-radius: 5px;
		margin-left : 3px;
      }

      .filebox label {
        font-family : 'Nanum Gothic';
        display: inline-block;
        padding: 7px 20px;
        color: #fff;
        vertical-align: middle;
        background-color: #4273df;
        cursor: pointer;
        height: 40px;
		width : left;
        margin-left: 0px;
        margin-top : 8px;
        border-radius: 5px;
      }

      .filebox input[type="file"] {
        position: absolute;
        width: 0;
        height: 0;
        padding: 0;
        overflow: hidden;
        border: 0;
      }
	</style>
			<!-- Begin Page Content -->
                <div class="container-fluid">
					
                    <!-- Page Heading -->
                    <a href="/~team2/admin_review" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Review</h1></a>
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
							<a onclick="submitForm();" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-check"></i>
								</span>
								<span class="text">확인</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<form method="post" enctype="multipart/form-data" action="/~team2/admin_review/edit/<?=$data['review']->id?>" name="editForm">
									<div style="color : red;"><?php echo validation_errors(); ?></div>
									<table class="table table-bordered">
									  <tbody>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">id</th>
										  <td width="80%">
											<input type="text" class="form-control" name="id" value="<?=$data['review']->id?>" readonly>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">Writer <font color="red">*</font></th>
										  <td width="80%">
											<select class="form-select" aria-label="Default select example" name="user_id">
											<?php
											// 유효성 검사에서 안걸리면
											if (set_value('user_id') == '') {
												foreach ($data['users'] as $user) {
													if ($user->id == $data['review']->user_id) {
											?>		
													<option value="<?=$user->id?>" selected><?=$user->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$user->id?>"><?=$user->name?></option>
											<?php
													}
												}
											}	
											// 유효성 검사에서 걸리면
											else {
												foreach ($data['users'] as $user) {
													if($user->id == set_value('user_id')) {
											?>
													<option value="<?=$user->id?>" selected><?=$user->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$user->id?>"><?=$user->name?></option>
											<?php
													}
												}
											}
											?>
												</select>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">star <font color="red">*</font></th>
										  <td width="80%">
											<select class="form-select" aria-label="Default select example" name="star">
											<?php
											// 유효성 검사에서 안걸리면
											if (set_value('star') == '') {
												for ($i = 0; $i <= 10; $i++) {
													if ($i == $data['review']->star) {
											?>		
													<option value="<?=$i?>" selected><?=$i?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$i?>"><?=$i?></option>
											<?php
													}
												}
											}	
											// 유효성 검사에서 걸리면
											else {
												for ($i = 1; $i <= 10; $i++) {
													if($i == set_value('star')) {
											?>
													<option value="<?=$i?>" selected><?=$i?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$i?>"><?=$i?></option>
											<?php
													}
												}
											}
											?>
											</select>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">title <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="title" value="<?php if(set_value('title') != '') {echo set_value('title');} else {echo $data['review']->title;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">writeday <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="writeday" value="<?php if(set_value('writeday') != '') {echo set_value('writeday');} else {echo $data['review']->writeday;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">category <font color="red">*</font></th>
										  <td width="80%">
												<select class="form-select" aria-label="Default select example" name="category">
												
											<?php
											
											// 유효성 검사에서 안걸리면
											if (set_value('category') == '') {
						  
												foreach ($data['category'] as $category) {
													if($category->id == $data['review']->category_id) {
											?>		
													<option value="<?=$category->id?>" selected><?=$category->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$category->id?>"><?=$category->name?></option>
											<?php
													}
												}
											}	
											// 유효성 검사에서 걸리면
											else {
												foreach ($data['category'] as $category) {
													if($category->id == set_value('category')) {
											?>
													<option value="<?=$category->id?>" selected><?=$category->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$category->id?>"><?=$category->name?></option>
											<?php
													}
												}
											}
											?>
												</select>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">image</th>
										  <td width="80%">
											<div class="filebox" style="display: inline-block;width : 100%; text-align: left;">
											  <label for="file">파일찾기</label> 
											  <?php
											  if($data['review']->image != null) {
											  ?>
												  <input class="upload-name" name="upload-name" value="<?=$data['review']->image?>" placeholder="첨부파일" readonly>
											  <?php
											  }
											  else {
											  ?>
												  <input class="upload-name" name="upload-name" value="없음" placeholder="첨부파일" readonly>
											  <?php
											  }
											  ?>
											  <input type="file" id="file" name="upload_file">
											  <input type="hidden" name="upload_file_name" value="">
											</div>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">content <font color="red">*</font></th>
										  <td width="80%">
											<textarea rows="10" class="form-control" name="review_content"><?php if(set_value('review_content') != '') {echo set_value('review_content');} else {echo $data['review']->content;} ?></textarea>
										  </td>
										</tr>
									  </tbody>
									</table>
								</form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
			

	<script src="/~team2/my/lib/ckeditor/ckeditor.js"></script>
	
    <script>
      CKEDITOR.replace('review_content', {
			filebrowserUploadUrl: "/~team2/review/ck_upload_run",
			height: '800'
      });         
    </script>
	
	<script>
		// submit하기
		function submitForm() {
			
				var form = document.editForm;
				

				if (form.upload_file_name.value != null) {
					form.upload_file_name.value = document.getElementsByName('upload_file_name').value;
				}
			
				form.submit();
		}
		
		
	
		// enter키 submit방지
		$("input[type='text']").keydown(function() {
			if (event.keyCode === 13) {
				event.preventDefault();
			}
		});
	
	
	
		// file 선택하면 file 이름 뜨게
		$("#file").on('change',function(){
			var file_val = $("#file").val();
			var file_arr = file_val.split('\\');
			var file_name = file_arr[file_arr.length - 1];

			$(".upload-name").val(file_name);
			document.getElementsByName('upload_file_name').value = file_name;
		}); 
	</script>