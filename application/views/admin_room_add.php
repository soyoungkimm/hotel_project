

	
	<style>
	.form-select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 200px;
    }
	
	  .filebox .upload-name, .upload-name2 {
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
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_room" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Room</h1></a>
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
								<form method="post" enctype="multipart/form-data" action="/~team2/admin_room/add" name="addForm">
									<div style="color : red;"><?php echo validation_errors(); ?></div>
									<table class="table table-bordered">
									  <tbody>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">name <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" />
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">image <font color="red">*</font></th>
										  <td width="80%">
											<div class="filebox" style="display: inline-block;width : 100%; text-align: left;">
											  <label for="file">파일찾기</label> 
											  <input class="upload-name" name="upload-name" value="" placeholder="첨부파일" readonly>
											  <input type="file" id="file" name="upload_file">
											  <input type="hidden" name="upload_file_name" value="">
											</div>
										  </td>
										</tr>
										
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">image2(room_detail_image) <font color="red">*</font></th>
										  <td width="80%">
											<div class="filebox" style="display: inline-block;width : 100%; text-align: left;">
											  <label for="file2">파일찾기</label> 
											  <input class="upload-name2" name="upload-name2" value="" placeholder="첨부파일" readonly>
											  <input type="file" id="file2" name="upload_file2">
											  <input type="hidden" name="upload_file_name2" value="">
											</div>
										  </td>
										</tr>
										
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">price <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="price" value="<?php echo set_value('price'); ?>" />
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">size <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="size" value="<?php echo set_value('size'); ?>" />
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">bed_id <font color="red">*</font></th>
										  <td width="80%">
											<select class="form-select" aria-label="Default select example" name="bed_id">
											<?php
											// 유효성 검사에서 안걸리면
											if (set_value('bed_id') == '') {
												foreach ($data['beds'] as $bed) {
											?>		
													<option value="<?=$bed->id?>"><?=$bed->name?></option>
											<?php
												}
											}	
											// 유효성 검사에서 걸리면
											else {
												foreach ($data['beds'] as $bed) {
													if($bed->id == set_value('bed_id')) {
											?>
													<option value="<?=$bed->id?>" selected><?=$bed->name?></option>
											<?php
													}
													else {
											?>
													<option value="<?=$bed->id?>"><?=$bed->name?></option>
											<?php
													}
												}
											}
											?>
												</select>
											
											
											
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">number <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="number" value="<?php echo set_value('number'); ?>" />
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">people_num <font color="red">*</font></th>
										  <td width="80%">
												<input type="text" class="form-control" name="people_num" value="<?php echo set_value('people_num'); ?>" />
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">service <font color="red">*</font></th>
										  <td width="80%">
											<textarea rows="10" class="form-control" name="service"><?php echo set_value('service');?></textarea>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">content <font color="red">*</font></th>
										  <td width="80%">
											<textarea rows="10" class="form-control" name="content"><?php echo set_value('content');?></textarea>
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
		
	
	<script>
	
		
		// submit하기
		function submitForm() {
			
			var form = document.addForm;
			

			if (form.upload_file_name.value != null) {
				form.upload_file_name.value = document.getElementsByName('upload_file_name').value;
			}
			
			if (form.upload_file_name2.value != null) {
				form.upload_file_name2.value = document.getElementsByName('upload_file_name2').value;
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
		
		$("#file2").on('change',function(){
			var file_val = $("#file2").val();
			var file_arr = file_val.split('\\');
			var file_name = file_arr[file_arr.length - 1];

			$(".upload-name2").val(file_name);
			document.getElementsByName('upload_file_name2').value = file_name;
		});
		
		
	
		
		
		
	</script>