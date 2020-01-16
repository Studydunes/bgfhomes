<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[admin_id])
	{
		$SQL="SELECT * FROM `admin` WHERE admin_id = $_REQUEST[admin_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#admin_dob" ).datepicker({
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
                    <h1>Admin Management</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form action="lib/admin.php" enctype="multipart/form-data" method="post" class="form-signin wow fadeInUp" action="" style="max-width:800px">
                <h2 class="form-signin-heading">Add Admin</h2>
                <div class="login-wrap">          
				    <div class="form-group">
						<label for="pwd">Admin Full Name</label>
						<input type="text" class="form-control" placeholder="Admin Name" autofocus="" name="admin_name" id="admin_name" value="<?=$data[admin_name]?>">
				    </div>
				    <div class="form-group">
						<label for="pwd">Admin Email</label>
						<input type="text" class="form-control" placeholder="Admin Email" autofocus="" name="admin_email" id="admin_email" value="<?=$data[admin_email]?>">
				    </div>
						<div class="form-group" id="adminRole">
						<label for="pwd">Select Role</label>
						<select name="admin_level_id" class="form-control" placeholder="Select Package" autofocus=""/>
							<?php echo get_new_optionlist("role","role_id","role_name",$data[admin_level_id]); ?>
						</select>
				    </div>
				    <div class="form-group">
						<label for="pwd">Login Admin ID</label>
						<input type="text" class="form-control" placeholder="Login Admin ID" autofocus="" name="admin_adminname" id="admin_adminname" value="<?=$data[admin_adminname]?>">
				    </div>
				    <div class="form-group">
						<label for="pwd">Login Password</label>
						<input type="text" class="form-control" placeholder="Login Password" autofocus="" name="admin_password" id="admin_password" value="<?=$data[admin_password]?>">
				    </div>
						<div class="form-group">
						<label for="pwd">Admin Mobile</label>
						<input type="text" class="form-control" placeholder="Admin Mobile" autofocus="" name="admin_mobile" id="admin_mobile" value="<?=$data[admin_mobile]?>">
				    </div>
				    <div class="form-group">
						<label for="pwd">Admin Date of Birth</label>
						<input type="text" class="form-control" placeholder="Admin Date of Birth" autofocus="" id="admin_dob" name="admin_dob" value="<?=$data[admin_dob]?>">
				    </div>
				    <div class="form-group">
						<label for="pwd">Admin Address Line 1</label>
						<input type="text" class="form-control" placeholder="Admin Address Line 1" autofocus="" name="admin_add1" id="admin_date" value="<?=$data[admin_add1]?>">
				    </div>
				    <div class="form-group">
						<label for="pwd">Admin Address Line 2</label>
						<input type="text" class="form-control" placeholder="Admin Address Line 2" autofocus="" name="admin_add2" id="admin_add2" value="<?=$data[admin_add2]?>">
				    </div>
            <div class="form-group">
							<label for="pwd">City</label>
							<input type="text" class="form-control" placeholder="City" autofocus="" name="admin_city" id="admin_city" value="<?=$data[admin_city]?>">
						</div>
						<div class="form-group">
							<label for="pwd">State</label>
							<input type="text" class="form-control" placeholder="State" autofocus="" name="admin_state" id="admin_state" value="<?=$data[admin_state]?>">
						</div>
				    <div class="form-group">
						<label for="pwd">Admin Country</label>
						<select name="admin_country" required class="form-control" placeholder="Select Month" autofocus=""/>
							<?php echo get_new_optionlist("country","country_id","country_name",$data[admin_country]); ?>
						</select>
				    </div>
				    <div class="form-group">
						<label for="pwd">Admin Picture</label>
						<input type="file" class="form-control" placeholder="Admin Mobile" autofocus="" name="admin_image" id="admin_image" value="<?=$data[admin_image]?>">
						<?php if(isset($data[admin_image]) && $data[admin_image] != "")  {?>
						<div><img src="<?=$SERVER_PATH.'uploads/'.$data[admin_image]?>" style="width: 100px"></div><br>
						<?php } ?>
				    </div>
                    <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>
                </div>
                <input type="hidden" name="act" value="save_admin">
                <input type="hidden" name="avail_image" value="<?=$data[admin_image]?>">
				<input type="hidden" name="admin_id" value="<?=$data[admin_id]?>">
            </form>
        </div>
     </div>
    <!--container end-->
<script>
	<?php if($_SESSION['admin_details']['admin_level_id'] != 1)  { ?> 
		$("#adminRole").hide();
	<?php } ?>
</script>
<?php include_once("includes/footer.php"); ?>
