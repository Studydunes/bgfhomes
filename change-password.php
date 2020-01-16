<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[author_id])
	{
		$SQL="SELECT * FROM `shift` WHERE author_id = $_REQUEST[author_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Change Password</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
			<?php if($_REQUEST['msg']) { ?>
			  <div class="alert alert-success fade in" style="margin:10px;">
				  <strong><?=$_REQUEST['msg']?></strong>
			  </div>
			  <?php } ?>
            <form action="lib/login.php" method="post" class="form-signin wow fadeInUp" style="max-width:800px">
                <h2 class="form-signin-heading">Change Password</h2>
                <div class="login-wrap">                    
				    <div class="form-group">
						<label for="pwd">New Password</label>
						<input type="password" class="form-control" placeholder="New Password" autofocus="" name="user_new_password" id="user_new_password">
				    </div>
				    <div class="form-group">
						<label for="pwd">Confirm Password</label>
						<input type="password" class="form-control" placeholder="Confirm Password" autofocus="" name="user_confirm_password" id="user_confirm_password">
				    </div>
				    <div class="form-group" style="text-align:right;">
						<button class="btn btn-lg btn-login btn-block" type="submit" style="width:200px;">Change Password</button>
					</div>
                </div>
                <input type="hidden" name="act" value="change_password">
            </form>
        </div>
     </div>
    <!--container end-->
<?php include_once("includes/footer.php"); ?>
