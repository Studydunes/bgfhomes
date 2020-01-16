<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	//print_r($_SESSION['user_details']);die;

	$SQL = "SELECT add_beneficiary.user_id, add_beneficiary.account_number, add_beneficiary.name, add_beneficiary.bank_name FROM user RIGHT JOIN add_beneficiary ON user.user_id = add_beneficiary.user_id WHERE user.user_id = ".$_SESSION['user_details']['user_id'];
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>

<!--breadcrumbs start-->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-4">
				<h1> All Beneficairies </h1>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs end-->

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<form name="frm" action="lib/transaction.php" method="post">
				<section class="panel table-responsive">

					<table class="table table-striped table-advance table-hover" style="color:#000000">
						<tbody>
							<tr class="bg-primary">
								<th style="background-color:#34495e; color:#FFFFFF;">Sr. No.</th>
								<th style="background-color:#34495e; color:#FFFFFF;">Account Number</th>
								<th style="background-color:#34495e; color:#FFFFFF;">Beneficary Name</th>
								<th style="background-color:#34495e; color:#FFFFFF;">Bank Name</th>
							</tr>
							<?php 
							$sr_no=1;
							if($rs->num_rows){
								while($data = mysqli_fetch_assoc($rs))
								{
								?>
								<tr>
									<td><?=$sr_no++?></td>
									<td><?= $data['account_number']; ?></td>
									<td><?= $data['name']; ?></td>
									<td><?= $data['bank_name']; ?></td>
								</tr>
								<?php
								}
							}else{
								echo "<tr><td colspan='4'> No beneficiary Found !! </td></tr>";
							}
								?>
						</tbody>
					</table>
				</section>
			</form>
		</div>
	</div>
</div>

<!--footer start-->
<?php include_once("includes/footer.php"); ?>