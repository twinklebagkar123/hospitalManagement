<?php 
session_start();
error_reporting(0); 
include('../include/config.php');
include('../include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Add Doctor</title>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
    <link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/custom.css?ver=<?php echo rand(); ?>">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">

            <header class="navbar navbar-default navbar-static-top">
                <!-- start: NAVBAR HEADER -->
                <div class="navbar-header">
                    <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                        <i class="ti-align-justify"></i>
                    </a>
                    <a class="navbar-brand" href="#">
                        <h2 style="padding-top:20%; color:#000 ">HMS</h2>
                    </a>
                    <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                        <i class="ti-align-justify"></i>
                    </a>
                    <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="ti-view-grid"></i>
                    </a>
                </div>
                <!-- end: NAVBAR HEADER -->
                <!-- start: NAVBAR COLLAPSE -->
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-right">
                        <!-- start: MESSAGES DROPDOWN -->
                        <li style="padding-top:2% ">
                            <h2>Hospital Management System</h2>
                        </li>
                        <li class="dropdown current-user">
                            <a href class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/images/images.jpg"> <span class="username">Admin
                                    <i class="ti-angle-down"></i></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-dark">
                                <li>
                                    <a href="change-password.php">
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="item-media notification_wrapper dropdown">
                                <span id="notification_counter" class="notification_counter">0</span>
                                <i class="ti-bell" style="font-size:25px;" id="notification_info_click"></i>
                                <!-- <i class="ti-angle-down"></i> -->
                            </div>
                            <ul class="dropdown-menu dropdown-dark " id="notification_toggle_info">

                            </ul>

                        </li>
                        <!-- end: USER OPTIONS DROPDOWN -->
                    </ul>
                    <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                    <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                        <div class="arrow-left"></div>
                        <div class="arrow-right"></div>
                    </div>
                    <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
                </div>


                <!-- end: NAVBAR COLLAPSE -->
            </header>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">