<?php
	session_start();
	include_once("db_connect.php");
	include_once("functions.php");
	ini_set("display_errors",1);
	error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="labatutu">
    <meta name="author" content="labatutu">
    <meta name="keywords" content="lablatutu">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>
    Bank Giro Finance Homes
    </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">-->

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="assets/owlcarousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/owlcarousel/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css">
    <link href="css/superfish.css" rel="stylesheet" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->


    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/inputmask.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="css/parallax-slider/parallax-slider.css" />
    <script type="text/javascript" src="js/parallax-slider/modernizr.custom.28468.js">
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
    <script src="js/jquery.inputmask.bundle.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js">
    </script>
    <script src="js/respond.min.js">
    </script>
    <![endif]-->

    <script>
    jQuery(function() {
        $('.amount_format').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            rightAlign: false,
            oncleared: function () { self.Value(''); }
        });
    });
    </script>
  </head>

  <body>
    <!--header start-->
    <header class="head-section">
      <div class="navbar navbar-default navbar-static-top">
            <div class = "container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="img/logo_home.png" alt="image not found" width="130" height="80">
                        <div class="logo-text"><strong>
                            B<span>ank</span> G<span>iro</span> F<span>inance</span> H<span>omes</span>
                        </strong></div>
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                            <?php if($_SESSION['login'] == 0) {?>
                            <li><a href="index.php"><strong>Home</strong></a></li>
                            <li><a href="about.php"><strong>About Us</strong></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                                "dropdown" data-toggle="dropdown" href="#"><strong>Services</strong> <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="gfil1.php">E-Banking</a></li>
                                    <li><a href="gfil2.php">Gold Bullion Investment</a></li>
                                    <li><a href="gfil3.php">Mortgage Investment</a></li>
                                    <li><a href="gfil4.php">Loans/Vaults</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if($_SESSION['user_details']['user_level_id'] == 2) {?>
                            <li><a href="welcome.php"><strong>Account Information</strong></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                                "dropdown" data-toggle="dropdown" href="#"><strong>Account </strong><i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="add_beneficiary.php">Add Beneficiaries</a></li>
                                    <li><a href="balance.php">Account Balance</a></li>
                                    <li><a href="beneficiary.php">Transfer funds</a></li>
                                    <li><a href="report-transfer.php">Transfer Status</a></li>
                                    <li><a href="report-transaction.php">Transactions</a></li>
                                    <li><a href="beneficiary-list.php">Beneficiary List</a></li>
                                </ul>
                            </li>
                            <li><a href="change-password.php"><strong>Change Password</strong></a></li>
                            <li><a href="./lib/login.php?act=logout"><strong>Logout</strong></a></li>
                        <?php } ?>
                        <?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                            "dropdown" data-toggle="dropdown" href="#">Administration <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="user.php">Add New Customer</a></li>
                                <li><a href="admin.php">Add New Admin</a></li>
                                <li><a href="transaction.php">Add New Transaction</a></li>
                                <li><a href="add_bank.php">Add New Bank</a></li>
                                <li><a href="add_bank_detail.php">Add Bank Detail</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                            "dropdown" data-toggle="dropdown" href="#">Reports <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="report-user.php">Customer Report</a></li>
                                <li><a href="report-admin.php">Admin Report</a></li>
                                <li><a href="report-transaction.php">Completed Transactions</a></li>
                                <li><a href="report-transfer.php">Transfer Request Report</a></li>
                                <li><a href="transfer_limit.php">Change Transfer Limit</a></li>
                                <li><a href="customer_status.php">Customer Status</a></li>
                            </ul>
                        </li>
                        <li><a href="admin-change-password.php">Change Password</a></li>
                        <li><a href="./lib/admin-login.php?act=logout">Logout</a></li>
                        <?php } ?>
						<li><a href="./contact.php"><strong>Contact Us</strong></a></li>
                            <?php if($_SESSION['login'] == 1) {?>
                            
                            <?php } else { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                                "dropdown" data-toggle="dropdown" href="#"><strong>Login</strong> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="user.php">Account Registration</a></li>
                                    <li><a href="login.php">Customer Login</a></li>
                                </ul>
                            </li>
							<li style="display:none"><a href="user.php">Account Opening Form</a></li>
                            
                            <?php }?>
                            </ul>
                    </ul>
                </div>
            </div>
      </div>
    </header>
    <!--header end-->
