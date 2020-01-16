<?php 
	include_once("includes/header.php"); 
?>
<script>
	$( document ).ready(function() {
		// Set up an event listener for the contact form.
		$("#form_add_bank_detail").submit(function(event) {
			//alert("Hello");
			event.preventDefault();
			var formData = {
					"bank_id": $("#bank_name").val(),
					"ifsc_code": $("#bank_ifsc").val(),
					"branch_name": $("#branch_name").val(),
					"country": $("#country").val(),
					"state": $("#state").val(),
					"city": $("#city").val()
			}
				$.ajax({
					type: "POST",
					url: "lib/insert_record.php?table=<?= BANKS_DETAIL ?>",
					data: formData,	
					success: function(response){
						console.log(response);
						if(!response.mysql_error){
                            $('#form_add_bank_detail')[0].reset();
							alert("Account added Successfully");
						}else{
							alert("Something went wrong.Please try again Later");
						}
					},
					error: function(error){
						alert("Error");
					}
				});
		});

		$("#bank_name").on("change", function(e){
	        var bank_id = $(this).val();
	        
	        $.ajax({
	            type: "POST",
	            url: "lib/bank.php?act=fetch_bank_details",
	            data: "bank_id="+bank_id,
	            dataType: "json",
	            success: function(response){
	                if(response.success){
	                    console.log("success "+response.data);
	                    $('#existing_bank_ifsc').empty();
	                    $(response.data).each(function( index, value ) {
	                        //console.log( index +" = "+value );
	                        $('#existing_bank_ifsc').append(value + ', ');
	                    });
	                }else{
	                    $('#existing_bank_ifsc').empty();
	                }
	            },
	            error: function(error){
	                alert("Error"+error);
	                console.log("error "+error);
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
                    <h1>Add Bank Detail</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form id="form_add_bank_detail"  method="post" action=""  class="form-signin wow fadeInUp" style="max-width:800px">
                <h2 class="form-signin-heading">Add Bank Detail</h2>
                <div class="login-wrap">         
                     <div class="form-group">
						<label for="pwd">Select Bank</label>
						<select required id="bank_name" name="bank_name" class="form-control" placeholder="Select Bank" autofocus=""/>
							<?php echo get_new_optionlist("banks","id", "bank_name"); ?>
						</select>
				    </div>
				    <div class="form-group">
						<span id="existing_bank_ifsc"></span>
					</div>
				    <div class="form-group">
						<label for="pwd">IFSC Code</label>
						<input required type="text" class="form-control" placeholder="IFSC Code" autofocus="" name="bank_ifsc" id="bank_ifsc">
					</div>
					<div class="form-group">
						<label for="pwd">Branch Name</label>
						<input required type="text" class="form-control" placeholder="Branch Name" autofocus="" name="branch_name" id="branch_name">
				    </div>
                    <div class="form-group">
						<label for="pwd">Country</label>
						<input required type="text" class="form-control" placeholder="Country" autofocus="" name="country" id="country">
				    </div>
                    <div class="form-group">
						<label for="pwd">State</label>
						<input required type="text" class="form-control" placeholder="State" autofocus="" name="state" id="state">
				    </div>
                    <div class="form-group">
						<label for="pwd">City</label>
						<input required type="text" class="form-control" placeholder="City" autofocus="" name="city" id="city">
				    </div>
                    <button id="add_bank_detail_btn" class="btn btn-lg btn-login btn-block" type="submit">Add Bank Detail</button>
                </div>
            </form>
        </div>
     </div>
    <!--container end-->
<?php include_once("includes/footer.php"); ?>
