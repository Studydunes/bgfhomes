<?php 
include_once("includes/header.php"); 
include_once("includes/db_connect.php"); 
global $currency, $currency_symbol;
$SQL="SELECT * FROM ".USER;
$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));

?>

<script>
$( document ).ready(function() {
	$(".user_status").on("change", function () {
		var userid = $(this).data('userid');
		var status_val = this.value;

		$.ajax({
			type: "POST",
			url: "lib/user.php",
			data: "userid="+userid+"&status_val="+status_val+"&act=update_user_status",
			dataType: "json",
			success: function(response){
				if(response.success){
					alert("Record Updated Successfully");
				}else{
					alert("Something went wrong.Please try again Later");
				}
			},
			error: function(error){
				alert("Error"+error);
				console.log(error);
			}
		});

	});
});
</script>

<!--breadcrumbs start-->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-4">
				<h1> Customer Status Report </h1>
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
			<form name="frm" action="lib/user.php" method="post">
				<section class="panel table-responsive">
					<table class="table table-striped table-advance table-hover">
						<thead style="background-color:#34495e; color:#FFFFFF;">
							<tr class="bg-primary">
								<th>Sr. No.</th>
								<th>Image</th>
								<th>Name</th>
								<th>Account No.</th>
								<th><i class="icon_cogs"></i> Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sr_no=1;
							if($rs->num_rows){
								while($data = mysqli_fetch_assoc($rs)){
									//echo "<pre>";print_r($data);
									?>
									<tr>
										<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
										<td><img src="<?=$SERVER_PATH.'uploads/'.$data['user_image']?>" style="heigh:50px; width:50px"></td>
										<td><?= ($data['user_first_name']." ".$data['user_last_name']); ?></td>
										<td><?= $data['user_id']; ?></td>
										<td>
											<select class="form-control user_status" id="user_status_<?= $data['user_id']; ?>" data-userid="<?= $data['user_id']; ?>">
												<option <?= ($data['status'] == 1)?'selected':''; ?> value="1">Active</option>
												<option <?= ($data['status'] == 0)?'selected':''; ?> value="0">Deactive</option>
											</select>
										</td>
									</tr>
								<?php
								}
							}
							?>
						</tbody>
					</table>
				</section>
			</form>
		</div>
	</div>
</div>
<?php include_once("includes/footer.php"); ?>