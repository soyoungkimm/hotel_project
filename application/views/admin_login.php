<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="/~team2/my/lib/admin_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/~team2/my/lib/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
	<style>
	.bg-gradient-primary {
		background-image: linear-gradient(180deg,#ffffff 10%,#bee7ff 100%);
	}
	</style>
	
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9" style="margin-top : 120px">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6" style="background-image : url(/~team2/my/img/admin/admin_title_image.JPG); background-size : cover;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
									<br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
									<br><br>
                                    <form method="post" action="/~team2/admin_auth/login" name="loginForm" class="user">
                                        <div class="form-group">
                                            <input type="text" name="uid" value="<?php echo set_value('uid'); ?>" class="form-control form-control-user"
                                                placeholder="Admin ID">
                                        </div>
										<br><br>
                                        <div class="form-group">
                                            <input type="password" name="pwd" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Admin Password" onkeyup="if(window.event.keyCode==13){document.loginForm.submit();}">
                                        </div>
                                        <!--<div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>-->
										<?php
											if (isset($loginFailed)) {
										?>
											<div style="color : red;"><?php echo $loginFailed; ?></div>
										<?php
											}
										?>
										<div style="color : red;"><?php echo validation_errors(); ?></div>
										<br><br>
										
                                        <a onclick="document.loginForm.submit();" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
										<br><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/~team2/my/lib/admin_template/vendor/jquery/jquery.min.js"></script>
    <script src="/~team2/my/lib/admin_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/~team2/my/lib/admin_template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/~team2/my/lib/admin_template/js/sb-admin-2.min.js"></script>

</body>

</html>