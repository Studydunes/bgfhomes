<?php 
    include_once("includes/header.php"); 
    //print_r($_SESSION['user_details']);die;
    $account_balance = getUserBalance($_SESSION['user_details']['user_id']);
?>
    <script>
    jQuery(function() {
    	jQuery( "#beneficiary_date" ).datepicker({
    	  changeMonth: true,
    	  changeYear: true,
    	   yearRange: "0:+1",
    	   dateFormat: 'd MM,yy'
    	});
    });
    </script>
    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Beneficiary Management</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form action="lib/beneficiary.php" class="form-signin wow fadeInUp" action="" style="max-width:800px">
                <h2 class="form-signin-heading">Account Balance</h2>
                <div class="login-wrap">         
					<div class="form-group" id="userRole">
						<div class="alert alert-success fade in" style="margin:10px;">
							<strong>Your total account balance is $<span class="amount_format"><?=$account_balance?></span></strong>
						</div>
				    </div>
				</div>
            </form>
        </div>
     </div>
    <!--container end-->
<?php include_once("includes/footer.php"); ?>
