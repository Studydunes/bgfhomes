<?php 
	include_once("includes/header.php"); 
	if($_REQUEST['user_id'])
	{
		$SQL="SELECT * FROM `user` WHERE user_id = $_REQUEST[user_id]";
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

<script>
	<?php if($_SESSION['user_details']['user_level_id'] != 1)  { ?> 
	//	$("#userRole").hide();
	<?php } ?>
</script>
<?php include_once("includes/footer.php"); ?>
