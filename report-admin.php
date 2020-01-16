<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `admin`";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>

<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(admin_id)
{
	this.document.frm.act.value="delete_admin";
	this.document.frm.submit();
}
</script>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              Admin Report
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->

 <div class="container">
		 <?php if($_REQUEST['msg']) { ?>
		  <div class="alert alert-success fade in" style="margin:10px;">
			  <strong><?=$_REQUEST['msg']?></strong>
		  </div>
		  <?php } ?>
		<div class="row">
		  <div class="col-lg-12">
			<form name="frm" action="lib/admin.php" method="post">
			  <section class="panel table-responsive">
				 
				  <table class="table table-striped table-advance table-hover" style="color:#000000">
				   <tbody>
					  <tr class="bg-primary">
						<th style="background-color:#34495e; color:#FFFFFF;">Sr. No.</th>
						<th style="background-color:#34495e; color:#FFFFFF;">Image</th>
						<th style="background-color:#34495e; color:#FFFFFF;">Name</th>
						<th style="background-color:#34495e; color:#FFFFFF;">Mobile</th>
						<th style="background-color:#34495e; color:#FFFFFF;">Email</th>
						<th style="background-color:#34495e; color:#FFFFFF;">Date Of Birth</th>
						<th style="background-color:#34495e; color:#FFFFFF;"><i class="icon_cogs"></i> Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysqli_fetch_assoc($rs))
						{
					  ?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[admin_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[admin_name]?></td>
						<td><?=$data[admin_mobile]?></td>
						<td><?=$data[admin_email]?></td>
						<td><?=$data[admin_dob]?></td>
						<td>
						  <div class="btn-group">
						     <a href="admin.php?admin_id=<?php echo $data[admin_id] ?>" class="btn btn-success">Edit</a>
                             <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[admin_id] ?>" data-toggle="modal" href="#myModal-2">Delete</a>
						  </div>
						  </td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="admin_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>

    <!--footer start-->
		<?php include_once("includes/footer.php"); ?>
    <!--small footer end-->
  </body>
</html>
