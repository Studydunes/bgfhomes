<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	//print_r($_SESSION['user_details']);die;
	if(array_key_exists("user_id", $_SESSION['user_details']) && $_SESSION['user_details']['user_level_id'] == 2){
		$SQL="SELECT * FROM `transaction`, `user`, `type` WHERE type_id = transaction_type_id AND transaction_user_id = user_id AND user_id = ".$_SESSION['user_details']['user_id'];
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	}else if($_REQUEST['user_id']){
		$SQL="SELECT * FROM `transaction`, `user`, `type` WHERE type_id = transaction_type_id AND transaction_user_id = user_id AND user_id = ".$_REQUEST['user_id'];
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	}else if($_SESSION['user_details']['user_level_id'] != 2){
		$SQL="SELECT * FROM `transaction`, `user`, `type` WHERE type_id = transaction_type_id AND transaction_user_id = user_id";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	}
	global $currency, $currency_symbol;
?>

<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(transaction_id){
	this.document.frm.act.value="delete_transaction";
	this.document.frm.submit();
}
</script>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              Transaction Report
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
			<form name="frm" action="lib/transaction.php" method="post">
				<section class="panel table-responsive">
					<table class="table table-striped table-advance table-hover" style="color:#000000">
						<tbody>
							<tr class="bg-primary">
								<th style="background-color:#34495e; color:#FFFFFF;">Sr. No.</th>
								<th style="background-color:#34495e; color:#FFFFFF;">Customer Name</th>
								<th style="background-color:#34495e; color:#FFFFFF;">Transaction Type</th>
								<th style="background-color:#34495e; color:#FFFFFF;">Amount</th>
								<th style="background-color:#34495e; color:#FFFFFF;">Date</th>
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
								<td><?=$data['user_first_name']?> <?=$data['user_last_name']?></td>
								<td><?=$data['type_title']?></td>
								<td><?=$currency?> <span class="amount_format"><?=$data['transaction_amount']?></span> <?=$currency_symbol?></td>
								<td><?=$data['transaction_date']?></td>
								<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
								<td>
									<div class="btn-group">
										<a href="transaction.php?transaction_id=<?php echo $data['transaction_id'] ?>" class="btn btn-success">Edit</a>
										<a class="delete-dialog btn btn-danger" data-id="<?php echo $data['transaction_id'] ?>" data-toggle="modal" href="#myModal-2">Delete</a>
									</div>
								</td>
								<?php } ?>
							</tr>
						  <?php } ?>
						</tbody>
					</table>
				</section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="transaction_id" id="recordID" />
			</form>
		</div>
  	</div>
</div>

    <!--footer start-->
		<?php include_once("includes/footer.php"); ?>
    <!--small footer end-->
  </body>
</html>
