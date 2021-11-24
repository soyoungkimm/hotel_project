<style>
	  .filebox .upload-name {
        display: inline-block;
        height: 40px;
        padding: 0 10px;
        vertical-align: middle;
        border: 1px solid #dddddd;
        width: 30%;
        color: #999999;
      }

      .filebox label {
        font-family : 'Nanum Gothic';
        display: inline-block;
        padding: 7px 20px;
        color: #fff;
        vertical-align: middle;
        background-color: #dfa974;
        cursor: pointer;
        height: 40px;
		width : left;
        margin-left: 10px;
        margin-top : 8px;
        
      }

      .filebox input[type="file"] {
        position: absolute;
        width: 0;
        height: 0;
        padding: 0;
        overflow: hidden;
        border: 0;
      }
	  
	  
	  #title {
        color : #000000; 
        font-weight : bold;
        font-size : 35px; 
        font-family : 'Nanum Gothic';  
        width : 100%; 
        height : 55px; 
        border : none; 
        outline : none;
      }
	  
	  
	  input::placeholder {
        color : #c7c7c7;
      }
	  
	  #submitBtn {
        font-family : 'Nanum Gothic'; 
        background : #dfa974;
        border: none;
        border-radius: 5px;
        width : 80px;
		height : 40px;
		color : #fff;
      }
	  
	  p {
		  color : red;
	  }
</style>


<div class="breadcrumb-section" id="pic_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>후기 작성</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
	
    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad" id="blogHide">
        <div class="container">
			<form action="/~team2/review/edit/<?=$data['review']->id?>" method="post" enctype="multipart/form-data" name="editForm">
				<div class="row">
					<div class="col" style="text-align: center;">
						
						<?php
							// 유효성 검사에서 걸리면
							if (set_value('category_id') != '') {
						  ?>
							  <!--<div style="display: inline-block; text-align: left; float : left;">카테고리 선택</div>&nbsp;&nbsp;-->
							  <select class="form-select" aria-label="Default select example" name="category_id" id="ca_sel">
								<?php
								  if (isset($data['categorys'])) {
									foreach ($data['categorys'] as $category) {
									  if ($category->id == set_value('category_id')) {
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
						  <?php
							}
							// 처음 들어왔을 때
							else {
						  ?>
							   <!--<div style="display: inline-block; text-align: left; float : left;">카테고리 선택</div>&nbsp;&nbsp;-->
							  <select class="form-select" aria-label="Default select example" name="category_id" id="ca_sel">
								<?php
								  if (isset($data['categorys'])) {
									foreach ($data['categorys'] as $category) {
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
								?>
							  </select>
							  
						  <?php
							}
						  ?> 
						
						<br><br><br>
						
						<input type="text" name="title" value="<?php if(set_value('title') != '') {echo set_value('title');} else {echo $data['review']->title;} ?>" placeholder="제목을 입력하세요" style="width: 100%" id="title"/>
					
						<br><br>
						
						<textarea name="content" placeholder="내용" rows="10" cols="50" ><?php if(set_value('content') != '') {echo set_value('content');} else {echo $data['review']->content;} ?></textarea>
						
						<br><br>
						
						<div class="filebox" style="display: inline-block;width : 100%; text-align: left;">
						  <input class="upload-name" name="upload-name" value="<?=$data['review']->image?>" placeholder="첨부파일" readonly>
						  <label for="file">파일찾기</label> 
						  <input type="file" id="file" name="upload_file">
						  <input type="hidden" name="upload_file_name" value="">
						</div>
					</div>
					
					
				</div>
				
				<br><br><br><br>
				<div class="row mb-4" style="text-align : center;">
					<div class="col">
						<p><?php echo validation_errors(); ?></p>
						<input type="button" onclick="submitForm();" value="저장" style="text-align : center;" id="submitBtn"/>
					</div>
				</div>
			</form>
        </div>
		<br><br><br>
    </section>
	
	
	<script src="/~team2/my/lib/ckeditor/ckeditor.js"></script>
	
    <script>
      CKEDITOR.replace('content', {
			filebrowserUploadUrl: "/~team2/review/ck_upload_run",
			height: '800'
      });         
    </script>
	
	
	<script>
	
	$(document).ready(function() {
        $('#title').focus();
        
      });
	
	
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