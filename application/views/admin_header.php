<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Induk Hotel Admin</title>

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/~team2/my/lib/admin_template/css/sb-admin-2.min.css" rel="stylesheet">
	
	<!-- Custom styles for this page -->
    <link href="/~team2/my/lib/admin_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="/~team2/my/lib/admin_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	

	<!--캘린더 시작-->
	<!-- fullcalendar CDN -->
	<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' rel='stylesheet' />
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js'></script>
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js'></script>
	
	
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/~team2/admin/main">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Page</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/~team2/" style="text-align : center; padding-right : 30px">
				<i class="fas fa-fw fa-hotel"></i>
				<span>Induk Hotel</span></a>
            </li>
			
			
			<!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                statistics
            </div>
			
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_book_chart"
					aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Book 통계</span></a>
				</a>
				<div id="collapsePages_book_chart" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="/~team2/admin_book_chart/year_chart">연도별 통계</a>
						<a class="collapse-item" href="/~team2/admin_book_chart/month_chart">월별 통계</a>
						<a class="collapse-item" href="/~team2/admin_book_chart/period_chart">기간별 통계</a>
                    </div>
                </div>
            </li>
			
			
			<li class="nav-item">
                <a class="nav-link" href="/~team2/admin_room_chart">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Room 통계</span></a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link" href="/~team2/admin_review_chart">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Review 통계</span></a>
            </li>
			
			
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tables
            </div>
			
			<li class="nav-item">
                <a class="nav-link" href="/~team2/admin_user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span></a>
            </li>
			
			
			<li class="nav-item">
                <a class="nav-link" href="/~team2/admin_book">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Book</span></a>
            </li>
			
			
			<li class="nav-item">
                <a class="nav-link" href="/~team2/admin_event">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Event</span></a>
            </li>
			
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_room"
					aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Room</span>
				</a>
				<div id="collapsePages_room" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/~team2/admin_room">Room</a>
                        <a class="collapse-item" href="/~team2/admin_bed">Bed</a>
                    </div>
                </div>
            </li>
			
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_review"
					aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                    <span>Review</span>
				</a>
				<div id="collapsePages_review" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/~team2/admin_review">Review</a>
						<a class="collapse-item" href="/~team2/Admin_review_category">Review Category</a>
                        <a class="collapse-item" href="/~team2/admin_comment">Comment</a>
                    </div>
                </div>
            </li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_qna"
					aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Q&A</span>
				</a>
				<div id="collapsePages_qna" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/~team2/admin_inquiry">Q&A</a>
                        <a class="collapse-item" href="/~team2/admin_inquiry_detail">Q&A Detail</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        
                        

                        

                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('admin_name')?></span>
                                <img class="img-profile rounded-circle"
                                    src="/~team2/my/lib/admin_template/img/undraw_profile.svg">
                            </a>
							<!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
