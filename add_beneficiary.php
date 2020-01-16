<?php 
	include_once("includes/header.php");  
?>
<script>
		function changeIFSCOption(control){
		var data = {
			"table": "banks_detail",
			"id_col": "id",
			"value_col": "ifsc_code",
			"selected": 0,
			"cond": "bank_id='" + control.value + "'"
		};
		$.ajax({
			type: "POST",
			url: "lib/fetchRecord.php",
			data: data,	
			success: function(response){
				//console.log(response);
				$('#beneficiary_ifsc').empty();
				$('#beneficiary_ifsc').append(response);
			},
			error: function(error){
				alert("Error");
			}
		});
	}

	$( document ).ready(function() {
		// Set up an event listener for the contact form.
		$("#form_add_ben").submit(function(event) {
			//alert("Hello");
			event.preventDefault();
			var formData = {
					"user_id": $("#user_id").val(),
					"name": $("#beneficiary_name").val(),
					"account_number": $("#account_number").val(),
					"bank_name": $("#beneficiary_bank option:selected").text(),
					"bank_ifsc_code": $("#beneficiary_ifsc option:selected").text(),
					"message": $("#beneficiary_message").val()
			}
				$.ajax({
					type: "POST",
					url: "lib/insert_record.php?table=<?= ADD_BENEFICIARY ?>",
					data: formData,	
					success: function(response){
						console.log(response);
						if(!response.mysql_error){
							$('#form_add_ben')[0].reset();
							$('.show_benef_msg').html('<p class="alert alert-success">Account added Successfully</p>');
						}else{
							$('.show_benef_msg').html('<p class="alert alert-danger">Something went wrong.Please try again Later</p>');
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
                    <h1>Add Beneficiary</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form id="form_add_ben"  method="post" action=""  class="form-signin wow fadeInUp" style="max-width:800px">
                <h2 class="form-signin-heading">Add Beneficiary Account</h2>
				<?php if($_REQUEST['msg']) { ?>
					<div class="alert alert-success fade in" style="margin:10px;">
						<strong><?=$_REQUEST['msg']?></strong>
					</div>
				<?php } ?>
                <div class="login-wrap">         
                    <div class="form-group">
						<label for="pwd">Beneficiary Name</label>
						<input  required type="text" class="form-control" placeholder="Beneficiary Name" autofocus="" name="beneficiary_name" id="beneficiary_name">
				    </div>
				    <div class="form-group">
						<label for="pwd">Account Number</label>
						<input type="text" class="form-control" placeholder="Account Number" autofocus="" name="account_number" id="account_number" pattern="[0-9]{10}EA$" title="Invalid Account Number" required>
				    </div>
                     <div class="form-group">
						<label for="pwd">Select Bank</label>
						<select required id="beneficiary_bank" name="beneficiary_bank" class="form-control" placeholder="Select Bank" autofocus="" onchange="changeIFSCOption(this)"/>
							<?php echo get_new_optionlist("banks","id", "bank_name"); ?>
						</select>
				    </div>
				    <div class="form-group">
						<label for="pwd">IFSC Code</label>
						<select required id="beneficiary_ifsc" name="beneficiary_ifsc" class="form-control" placeholder="Select IFSC Code" autofocus=""/>
						</select>
					</div>
					<div class="form-group">
						<label for="pwd">Message</label>
						<input type="text" class="form-control" placeholder="Message" autofocus="" name="beneficiary_message" id="beneficiary_message">
				    </div>
                    <button id="beneficiary_btn" class="btn btn-lg btn-login btn-block" type="submit">Add Account</button>
                    <div class="form-group show_benef_msg"></div>
                </div>
				<input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION["user_details"]["user_id"] ?>">
                <input type="hidden" name="act" value="save_beneficiary">
				<input type="hidden" name="beneficiary_id" value="<?=$data['beneficiary_id']?>">
				<input type="hidden" name="beneficiary_user_id" value="<?=$data['beneficiary_user_id']?>">
            </form>
        </div>
     </div>
    <!--container end-->
	<script>
	<?php if($_SESSION['user_details']['user_level_id'] != 1)  { ?> 
		$("#userRole").hide();
	<?php } ?>
</script>
<?php include_once("includes/footer.php"); ?>
