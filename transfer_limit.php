<?php 
    include_once("includes/header.php");
    require_once('includes/mysql_connection.php');
    $con = new MysqlDB();
    $con->connect(); 
    $trasfer_record = $con->select("*", TRANSFER_LIMIT, 1, true);

?>
<script>
	$( document ).ready(function() {
		// Set up an event listener for the contact form.
		$("#form_update_transfer_limit").submit(function(event) {
			event.preventDefault();
			var formData = {
					"max_transfer_limit": $("#transfer_limit").val(),
			}
				$.ajax({
					type: "POST",
					url: "lib/update_record.php?id=<?= $trasfer_record['id'] ?>",
					data: formData,	
					success: function(response){
						console.log(response);
						if(!response.mysql_error){
							alert("Record Updated Successfully");
						}else{
							alert("Something went wrong.Please try again Later");
						}
					},
					error: function(error){
						alert("Error");
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
                    <h1>Transfer Limit</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form id="form_update_transfer_limit"  method="post" action=""  class="form-signin wow fadeInUp" style="max-width:800px">
                <h2 class="form-signin-heading">Update Transfer Limit</h2>
                <div class="login-wrap">         
                    <div class="form-group">
						<label for="pwd">Transfer Limit (USD $)</label>
						<input required type="number" class="form-control" placeholder="Transfer Limit" autofocus="" name="transfer_limit" id="transfer_limit" value="<?= $trasfer_record['max_transfer_limit'] ?>">
				    </div>
                    <button id="add_bank" class="btn btn-lg btn-login btn-block" type="submit">Update Transfer Limit</button>
                </div>
            </form>
        </div>
     </div>
<?php include_once("includes/footer.php"); ?>
