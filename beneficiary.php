<?php 
	include_once("includes/header.php"); 
	require_once('includes/mysql_connection.php');
	
	$account_balance = getUserBalance($_SESSION['user_details']['user_id']);
	
	$data_con = new MysqlDB();
    $data_con->connect(); 
    $trasfer_record = $data_con->select("*", TRANSFER_LIMIT, 1, true);
	if($_REQUEST['beneficiary_id'])
	{
		//$SQL="SELECT * FROM `beneficiary` WHERE beneficiary_id = $_REQUEST[beneficiary_id]";
		//$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		//$data=mysqli_fetch_assoc($rs);
		//select($fields = '*', $table, $conditons = 1, $single = true)
		$data = $data_con->select("*", BENEFICIARY, "beneficiary_id=".$_REQUEST['beneficiary_id']);
		$account_balance = getUserBalance($data['beneficiary_user_id']);
		$user_id = $data['beneficiary_user_id'];
	}else{
		$account_balance = getUserBalance($_SESSION['user_details']['user_id']);
		$user_id = $_SESSION['user_details']['user_id'];
	}
    
?>
<script>
	jQuery(function() {
		jQuery( "#beneficiary_date" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "0:+1",
			dateFormat: 'd MM,yy'
		});

		$( "#beneficiary_amount" ).inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            rightAlign: false,
            oncleared: function () { self.Value(''); }
        });

        $("#beneficiary_bank_name").on("change", function(e){
	        var bank_id = $(this).val();
	        
	        $.ajax({
	            type: "POST",
	            url: "lib/bank.php?act=fetch_bank_details",
	            data: "bank_id="+bank_id,
	            dataType: "json",
	            success: function(response){
	                if(response.success){
	                    console.log("success "+response.data);
	                    $('#beneficiary_ifsc_code').empty();
	                    $(response.data).each(function( index, value ) {
	                        //console.log( index +" = "+value );
	                        $('#beneficiary_ifsc_code').append('<option value="' + value + '">' + value + '</option>');
	                    });
	                }else{
	                    $('#beneficiary_ifsc_code').empty();
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
                    <h1>Beneficiary Management</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form  action="lib/beneficiary.php" class="form-signin wow fadeInUp" action="" style="max-width:800px">
                <h2 class="form-signin-heading">Transfer Funds</h2>
				<?php if($_REQUEST['msg']) { ?>
					<div class="alert alert-success fade in" style="margin:10px;">
						<strong><?=$_REQUEST['msg']?></strong>
					</div>
				<?php } ?>
                <div class="login-wrap">         
					<div class="form-group" id="userRole">
						<label for="pwd">Update Transfer Status</label>
						<select  name="beneficiary_status_id" class="form-control" placeholder="Select Month" autofocus=""/>
							<?php echo get_new_optionlist("status","status_id","status_title",$data['beneficiary_status_id']); ?>
						</select>
				    </div>
				    <div class="form-group">
						<label for="pwd">Available Balance is:</label>
						<p class="alert alert-info">
							<strong>$<span class="amount_format"><?= $account_balance; ?></span></strong>
							<input type="hidden" class="form-control" name="cur_user_account_balance" id="cur_user_account_balance" value="<?= $account_balance; ?>">
						</p>
				    </div>
					<div class="form-group">
						<label for="pwd">Select Currency</label>
						<select name="beneficiary_currency_id" class="form-control" placeholder="Select Currency" autofocus=""/>
							<?php echo get_new_optionlist("currency","currency_id","currency_title",$data['beneficiary_currency_id']); ?>
						</select>
				    </div>
                    <div class="form-group">
						<label for="pwd">Beneficiary Bank Name</label>
						<select required name="beneficiary_bank_name" id="beneficiary_bank_name" class="form-control" autofocus=""/>
                            <?php echo get_new_optionlist("banks","id","bank_name",$data['beneficiary_bank_name']); ?>
                        </select>
						<!-- <input required type="text" class="form-control" placeholder="Beneficiary Bank Name" autofocus="" name="beneficiary_bank_name" id="beneficiary_bank_name" value="<?=$data['beneficiary_bank_name']?>"> -->
					</div>
					<?php if(!array_key_exists("beneficiary_id", $_REQUEST)) { ?>
						<div class="form-group">
							<label for="pwd">Beneficiary IFSC Code</label>
							<select name="beneficiary_ifsc_code" id="beneficiary_ifsc_code" class="form-control" autofocus=""/>
	                            <option value="<?= $data['beneficiary_ifsc_code']; ?>"><?= $data['beneficiary_ifsc_code']; ?></option>
	                        </select>
							<!-- <input required type="text" class="form-control" placeholder="Beneficiary IFSC Code" autofocus="" name="beneficiary_ifsc_code" id="beneficiary_ifsc_code" value="<?=$data['beneficiary_ifsc_code']?>"> -->
						</div>
					<?php } else { ?>
							<input type="hidden" class="form-control" placeholder="Beneficiary IFSC Code" autofocus="" name="beneficiary_ifsc_code" id="beneficiary_ifsc_code" value="<?=$data['beneficiary_ifsc_code']?>">
				    <?php } ?>
				    <div class="form-group">
						<label for="pwd">Beneficiary Account Number</label>
						<input required type="text" class="form-control" placeholder="Beneficiary Account Number" autofocus="" name="beneficiary_account_number" id="beneficiary_account_number" value="<?=$data['beneficiary_account_number']?>">
				    </div>
					<div class="form-group">
						<label for="pwd">Amount</label>
						<input type="text"  min="1" max="<?= $trasfer_record['max_transfer_limit']; ?>" class="form-control" placeholder="Amount" autofocus="" name="beneficiary_amount" id="beneficiary_amount" value="<?=$data['beneficiary_amount']?>">
						<!-- <label id="max_limit" style="color:red;"></label> -->
				    </div>
                    <button class="btn btn-lg btn-login btn-block" type="submit">Deposit Payament</button>
                </div>
                <input type="hidden" name="act" value="save_beneficiary">
				<input type="hidden" name="beneficiary_id" value="<?=$data['beneficiary_id']?>">
				<input type="hidden" name="beneficiary_user_id" value="<?=$data['beneficiary_user_id']?>">
				<input type="hidden" name="user_id" value="<?= $user_id ?>">
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
