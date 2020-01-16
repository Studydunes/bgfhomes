<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[publication_id])
	{
		$SQL="SELECT * FROM `publication` WHERE publication_id = $_REQUEST[publication_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#publication_date" ).datepicker({
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
                    <h1>Publication Management</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form action="lib/publication.php" class="form-signin wow fadeInUp" action="" style="max-width:800px">
                <h2 class="form-signin-heading">Add Publication</h2>
                <div class="login-wrap">                    
                    <div class="form-group">
						<label for="pwd">Publication Name</label>
						<input type="text" class="form-control" placeholder="Publication Name" autofocus="" name="publication_name" id="publication_name" value="<?=$data[publication_name]?>">
				    </div>
				    <div class="form-group">
						<label for="pwd">Email</label>
						<input type="text" class="form-control" placeholder="Email" autofocus="" name="publication_email" id="publication_email" value="<?=$data[publication_email]?>">
				    </div>
				    <div class="form-group">
						<label for="pwd">Contact</label>
						<input type="text" class="form-control" placeholder="Contact No" autofocus="" name="publication_contact" id="publication_contact" value="<?=$data[publication_contact]?>">
				    </div>
				     <div class="form-group">
						<label for="pwd">Description</label>
						<textarea class="form-control" rows="8" style="height:150px;" name="publication_description" ><?=$data[publication_description]?></textarea>
				    </div>
                    <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>
                </div>
                <input type="hidden" name="act" value="save_publication">
				<input type="hidden" name="publication_id" value="<?=$data[publication_id]?>">
            </form>
        </div>
     </div>
    <!--container end-->
<?php include_once("includes/footer.php"); ?>
