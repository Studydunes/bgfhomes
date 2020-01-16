<?php 
    include_once("includes/header.php"); 
    require_once('includes/mysql_connection.php');
    $data_con = new MysqlDB();
    $data_con->connect(); 
    $trasfer_record = $data_con->select("*", TRANSFER_LIMIT, 1, true);
	if($_REQUEST['transaction_id'])
	{
		//$SQL="SELECT * FROM `transaction` WHERE transaction_id =".$_REQUEST['transaction_id'];
		//$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
        //$data=mysqli_fetch_assoc($rs);
        $data = $data_con->select("*", TRANSACTION, "transaction_id=".$_REQUEST['transaction_id']);
        //echo "<pre>hello";print_r($data);die();
	}

?>
<script>
jQuery(function() {
	jQuery( "#transaction_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "0:+1",
	   dateFormat: 'd MM,yy'
	});

    //$('#transaction_amount').maskMoney();
    //$('#transaction_amount').maskMoney();
    $('#transaction_amount').inputmask("numeric", {
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        autoGroup: true,
        rightAlign: false,
        oncleared: function () { self.Value(''); }
    });
    $("#transaction_bank_name").on("change", function(e){
        var bank_id = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "lib/bank.php?act=fetch_bank_details",
            data: "bank_id="+bank_id,
            dataType: "json",
            success: function(response){
                if(response.success){
                    console.log("success "+response.data);
                    $('#transaction_ifsc_code').empty();
                    $(response.data).each(function( index, value ) {
                        //console.log( index +" = "+value );
                        $('#transaction_ifsc_code').append('<option value="' + value + '">' + value + '</option>');
                    });
                }else{
                    $('#transaction_ifsc_code').empty();
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
                    <h1>Book Transaction Management</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">
            <form action="lib/transaction.php" class="form-signin wow fadeInUp" action="" style="max-width:800px">
                <h2 class="form-signin-heading">Add Book Transaction</h2>
                <div class="login-wrap">     
                    <div class="form-group">
                        <label for="pwd">Select Customer</label>
                        <select  required name="transaction_user_id" class="form-control" placeholder="Select Package" autofocus=""/>
                            <?php echo get_new_optionlist("user","user_id","user_first_name",$data['transaction_user_id']); ?>
                        </select>
                    </div>
                    <div class="form-group">
						<label for="pwd">Select Currency</label>
						<select required name="transaction_currency_id" class="form-control" placeholder="Select Currency" autofocus=""/>
							<?php echo get_new_optionlist("currency","currency_id","currency_title",$data['transaction_currency_id']); ?>
						</select>
				    </div>
                    <div class="form-group">
                        <label for="pwd">Transaction Type</label>
                        <select required name="transaction_type_id" class="form-control" placeholder="Select Package" autofocus=""/>
                            <?php echo get_new_optionlist("type","type_id","type_title",$data['transaction_type_id']); ?>
                        </select>
                    </div>
                    <div class="form-group">
						<label for="pwd">Transaction Amount</label>
						<input required type="text" data-max="<?= $trasfer_record['max_transfer_limit']; ?>" maxlength="12" class="form-control" placeholder="Transaction Amount" autofocus="" name="transaction_amount" id="transaction_amount" value="<?=$data['transaction_amount']?>">
				    </div> 
                    <div class="form-group">
						<label for="pwd">Bank Name</label>
                        <select required name="transaction_bank_name" id="transaction_bank_name" class="form-control" autofocus=""/>
                            <?php echo get_new_optionlist("banks","id","bank_name",$data['transaction_bank_name']); ?>
                        </select>
				    </div> 
                    <div class="form-group">
						<label for="pwd">IFSC Code</label>
                        <select name="transaction_ifsc_code" id="transaction_ifsc_code" class="form-control" autofocus=""/>
                            <option value="<?= $data['transaction_ifsc_code']; ?>"><?= $data['transaction_ifsc_code']; ?></option>
                        </select>
						<!-- <input type="text" class="form-control" placeholder="IFSC Code" autofocus="" name="transaction_ifsc_code" value="<?=$data['transaction_ifsc_code']?>"> -->
				    </div> 
                    <div class="form-group">
						<label for="pwd">Transaction Date</label>
						<input type="text" class="form-control" placeholder="Transaction Date" autofocus="" name="transaction_date" id="transaction_date" value="<?=$data['transaction_date']?>">
				    </div>
				     <div class="form-group">
						<label for="pwd">Transaction Description</label>
						<textarea class="form-control" rows="8" style="height:150px;" name="transaction_description" ><?=$data['transaction_description']?></textarea>
				    </div>
                    <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>
                </div>
                <input type="hidden" name="act" value="save_transaction">
				<input type="hidden" name="transaction_id" value="<?=$data['transaction_id']?>">
            </form>
        </div>
     </div>
    <!--container end-->
<?php include_once("includes/footer.php"); ?>
