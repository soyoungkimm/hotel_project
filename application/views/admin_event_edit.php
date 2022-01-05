	<style>
	.form-select {
        border-color : #c7c7c7;
        border-radius: 5px;
		height : 40px;
		width : 100px;
    }
	</style>
			<!-- Begin Page Content -->
                <div class="container-fluid">
					<br>
                    <!-- Page Heading -->
                    <a href="/~team2/admin_user" style="cursor : pointer; text-decoration-line : none;"><h1 class="h3 mb-2 text-gray-800">&nbsp;Event</h1></a>
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
							<a onclick="document.editForm.submit();" class="btn btn-success btn-icon-split">
								<span class="icon text-white-50">
									<i class="fas fa-check"></i>
								</span>
								<span class="text">확인</span>
							</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
								<form method="post" action="/~team2/admin_event/edit/<?=$data['event']->id?>" name="editForm">
									<div style="color : red;"><?php echo validation_errors(); ?></div>
									<table class="table table-bordered">
									  <tbody>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">id</th>
										  <td width="80%">
											<input type="text" class="form-control" name="id" value="<?=$data['event']->id;?>" readonly>
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">title <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="title" value="<?php if(set_value('title') != '') {echo set_value('title');} else {echo $data['event']->title;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">color <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="color" value="<?php if(set_value('color') != '') {echo set_value('color');} else {echo $data['event']->color;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">start <font color="red">*</font></th>
										  <td width="80%">
											<input type="text"  class="datetimepicker form-control" name="start" value="<?php if(set_value('start') != '') {echo set_value('start');} else {echo $data['event']->start;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">end <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="datetimepicker form-control" name="end" value="<?php if(set_value('end') != '') {echo set_value('end');} else {echo $data['event']->end;} ?>">
										  </td>
										</tr>
										<tr>
										  <th scope="row" width="20%" style="vertical-align:middle;">content <font color="red">*</font></th>
										  <td width="80%">
											<input type="text" class="form-control" name="content" value="<?php if(set_value('content') != '') {echo set_value('content');} else {echo $data['event']->content;} ?>">
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
	function pressDeleteUser() {
		var answer = confirm('정말로 삭제하시겠습니까?');
		if (answer) {
		  window.location.href = "/~team2/admin_event/delete/<?=$data['event']->id?>";
		}
	}
	
	
	$(function() {
		$( ".datetimepicker" ).datetimepicker({
			format:'Y-m-d H:i'
			
		});
	});
</script>