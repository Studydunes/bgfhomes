<?php 
	include_once("includes/header.php"); 
	if($_REQUEST['user_id'])
	{
		$SQL="SELECT * FROM `user` WHERE user_id = ".$_REQUEST['user_id'];
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#user_dob" ).datepicker({
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
                    <h1>User Registration Form</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
		<div class="registration-bg">
			<div class="container">
					<form action="lib/user.php" enctype="multipart/form-data" method="post" class="form-signin wow fadeInUp" action="" style="max-width:800px">
						<h2 class="form-signin-heading">User Registration Form</h2>
						<div class="login-wrap">
								<h3 class="myh3">Account, Login and Password Details</h3>
								<?php if($_REQUEST['msg']) { ?>
								<div class="alert alert-success fade in" style="margin:10px;">
									<strong><?=$_REQUEST['msg']?></strong>
								</div>
								<?php } ?>
								<div class="form-group">
									<label for="pwd">Type of Account</label>
									<select required name="user_at_id" class="form-control" placeholder="Select Package" autofocus=""/>
										<?php echo get_new_optionlist("account_type","at_id","at_title",$data['user_at_id']); ?>
									</select>
								</div>
								<div class="form-group">
									<label for="pwd">Email ID</label>
									<input required type="text" class="form-control" placeholder="Email ID" autofocus="" name="user_username" id="user_username" value="<?=$data['user_username']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Login Password</label>
									<input required type="password" class="form-control" placeholder="Login Password" autofocus="" name="user_password" id="user_password" value="<?=$data['user_password']?>">
								</div>
								<h3 class="myh3">Personal Details</h3>
								<div class="form-group">
									<label for="pwd">Title</label>
									<select required name="user_salutation_id" class="form-control" placeholder="Select Package" autofocus=""/>
									<?php echo get_new_optionlist("salutation","salutation_id","salutation_title",$data['user_salutation_id']); ?>
									</select>
								</div>
								<div class="form-group">
									<label for="pwd">First Name</label>
									<input required type="text" class="form-control" placeholder="First Name" autofocus="" name="user_first_name" id="user_first_name" value="<?=$data['user_first_name']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Last Name</label>
									<input required type="text" class="form-control" placeholder="Last Name" autofocus="" name="user_last_name" id="user_last_name" value="<?=$data['user_last_name']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Gender</label>
									<select required name="user_gender_id" class="form-control" placeholder="Select Package" autofocus=""/>
									<?php echo get_new_optionlist("gender","gender_id","gender_title",$data['user_gender_id']); ?>
									</select>
								</div>
								<div class="form-group">
									<label for="pwd">Marital Status</label>
									<select required name="user_marital_id" class="form-control" placeholder="Select Package" autofocus=""/>
									<?php echo get_new_optionlist("marital","marital_id","marital_title",$data['user_marital_id']); ?>
									</select>
								</div>
								<div class="form-group">
									<label for="pwd">Date of Birth</label>
									<input required type="text" class="form-control" placeholder="Date of Birth" autofocus="" name="user_dob" id="user_dob" value="<?=$data['user_dob']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Occupation</label>
									<input required type="text" class="form-control" placeholder="Occupation" autofocus="" name="user_occupation" id="user_occupation" value="<?=$data['user_occupation']?>">
								</div>
								<h3 class="myh3">Address Details</h3>
								<div class="form-group">
									<label for="pwd">Address</label>
									<input required type="text" class="form-control" placeholder="Address" autofocus="" id="user_address" name="user_address" value="<?=$data['user_address']?>">
								</div>
								<div class="form-group">
									<label for="pwd">City</label>
									<input required type="text" class="form-control" placeholder="City" autofocus="" name="user_city" id="user_city" value="<?=$data['user_city']?>">
								</div>
								<div class="form-group">
									<label for="pwd">State</label>
									<input required type="text" class="form-control" placeholder="State" autofocus="" name="user_state" id="user_state" value="<?=$data['user_state']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Country</label>
									<select required name="user_country" required class="form-control" placeholder="Select Month" autofocus=""/>
									<?php echo get_new_optionlist("country","country_id","country_name",$data['user_country']); ?>
									</select>
								</div>
								<h3 class="myh3">Contact Details</h3>
								<div class="form-group">
									<label for="pwd">Telephone</label>
									<input type="text" class="form-control" placeholder="Telephone" autofocus="" name="user_telephone" id="user_telephone" value="<?=$data['user_telephone']?>">
								</div>
								<div required class="form-group">
									<label for="pwd">Mobile</label>
									<input required type="text" class="form-control" placeholder="Mobile" autofocus="" name="user_mobile" id="user_mobile" value="<?=$data['user_mobile']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Fax</label>
									<input type="text" class="form-control" placeholder="Fax" autofocus="" name="user_fax" id="user_fax" value="<?=$data['user_fax']?>">
								</div>
								<div class="form-group">
									<label for="pwd">Nationality</label>
									<input required type="text" class="form-control" placeholder="Nationality" autofocus="" name="user_nationality" id="user_nationality" value="<?=$data['user_nationality']?>">
								</div>
								
								<div class="form-group">
									<label for="pwd">User Picture</label>
									<input type="file" class="form-control" placeholder="User Mobile" autofocus="" name="user_image" id="user_image" value="<?=$data['user_image']?>">
									<?php if(isset($data['user_image']) && $data['user_image'] != "")  {?>
									<div><img src="<?=$SERVER_PATH.'uploads/'.$data['user_image']?>" style="width: 100px"></div>
									<br>
									<?php } ?>
								</div>
								<button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>
						</div>
						<input type="hidden" name="act" value="save_user">
						<input type="hidden" name="avail_image" value="<?=$data['user_image']?>">
						<input type="hidden" name="user_id" value="<?=$data['user_id']?>">
					</form>
			</div>
		</div>
    <!--container end-->
<script>
	<?php if($_SESSION['user_details']['user_level_id'] != 1)  { ?> 
	//	$("#userRole").hide();
	<?php } ?>
</script>
<?php include_once("includes/footer.php"); ?>
