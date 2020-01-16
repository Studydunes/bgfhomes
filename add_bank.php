<?php 
	include_once("includes/header.php");  
?>
<script>
	$( document ).ready(function() {
		// Set up an event listener for the contact form.
		$("#form_add_bank").submit(function(event) {
			//alert("Hello");
			event.preventDefault();
			var formData = {
					"bank_name": $("#bank_name").val(),
			}
				$.ajax({
					type: "POST",
					url: "lib/insert_record.php?table=<?= BANKS ?>",
					data: formData,	
					success: function(response){
						console.log(response);
						if(!response.mysql_error){
                            $('#form_add_bank')[0].reset();
							alert("Bank added Successfully");
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
                    <h1>Add Bank</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form id="form_add_bank"  method="post" action=""  class="form-signin wow fadeInUp" style="max-width:800px">
                <h2 class="form-signin-heading">Add Bank</h2>
                <div class="login-wrap">         
                    <div class="form-group">
						<label for="pwd">Bank Name</label>
						<input required type="text" class="form-control" placeholder="Bank Name" autofocus="" name="bank_name" id="bank_name">
				    </div>
                    <button id="add_bank" class="btn btn-lg btn-login btn-block" type="submit">Add Bank</button>
                </div>
            </form>
        </div>
     </div>
<?php include_once("includes/footer.php"); ?>
