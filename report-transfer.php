<?php 
			include_once("includes/header.php"); 
			include_once("includes/db_connect.php"); 
	  	if(array_key_exists("user_id", $_SESSION['user_details']) && $_SESSION['user_details']['user_level_id'] == 2){
				$SQL="SELECT * FROM `beneficiary`, `status` WHERE beneficiary_status_id = status_id AND beneficiary_user_id = ".$_SESSION['user_details']['user_id'];
				$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
			}	else if($_SESSION['user_details']['user_level_id'] != 2){
				$SQL="SELECT * FROM `beneficiary`, `status` WHERE beneficiary_status_id = status_id";
				$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
			}
			global $currency, $currency_symbol;
?>

<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(beneficiary_id)
{
	this.document.frm.act.value="delete_beneficiary";
	this.document.frm.submit();
}
</script>
		<!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
							Transfer Status
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
				<form name="frm" action="lib/beneficiary.php" method="post">
					<section class="panel table-responsive">
					
						<table class="table table-striped table-advance table-hover" style="color:#000000">
						<tbody>
							<tr class="bg-primary">
							<th style="background-color:#34495e; color:#FFFFFF;">Sr. No.</th>
							<th style="background-color:#34495e; color:#FFFFFF;">Account No</th>
							<th style="background-color:#34495e; color:#FFFFFF;">Bank Name</th>
							<th style="background-color:#34495e; color:#FFFFFF;">IFSC Code</th>
							<th style="background-color:#34495e; color:#FFFFFF;">Amount</th>
							<th style="background-color:#34495e; color:#FFFFFF;"><i class="icon_cogs"></i> Status</th>
							<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
								<th style="background-color:#34495e; color:#FFFFFF;"><i class="icon_cogs"></i> Action</th>
							<?php } ?>
							</tr>
							<?php 
							$sr_no=1;
							while($data = mysqli_fetch_assoc($rs))
							{
							?>
							<tr>
							<td><?=$sr_no++?></td>
							<td><?=$data['beneficiary_account_number']?></td>
							<td><?=$data['beneficiary_bank_name']?></td>
							<td><?=$data['beneficiary_ifsc_code']?></td>
							<td><?=$currency?> <?=$data['beneficiary_amount']?> <?=$currency_symbol?></td>
							<td>
								<div class="btn-group">
									<a class="delete-dialog btn <?=$data['status_color']?>"><?=$data['status_title']?></a>
								</div>
							</td>
							<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
							<td>
								<div class="btn-group">
								<?php if($data['status_id'] != 3) { ?>
									<a href="beneficiary.php?beneficiary_id=<?php echo $data['beneficiary_id'] ?>" class="btn btn-info">Update Status</a>
								<?php } else { ?>
									Transfer Done
								<?php } ?>
								</div>
							</td>
								<?php } ?>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					</section>
					<input type="hidden" name="act" />
					<input type="hidden" name="beneficiary_id" id="recordID" />
				</form>
				</div>
			</div>
		</div>

    <!--footer start-->
		<?php include_once("includes/footer.php"); ?>
    <!--small footer end-->
  </body>
</html>
