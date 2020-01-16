<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST['act']=="save_transaction"){
		save_transaction();
		exit;
	}
	if($_REQUEST['act']=="delete_transaction"){
		delete_transaction();
		exit;
	}
	if($_REQUEST['act']=="update_transaction_status"){
		update_transaction_status();
		exit;
	}
	
	###Code for save transaction#####
	function save_transaction()
	{
		global $con;
		$R=$_REQUEST;
		$transaction_amount = str_replace(',', '', $R[transaction_amount]);
		if($R['transaction_id'])
		{
			$statement = "UPDATE `transaction` SET";
			$cond = "WHERE `transaction_id` = '$R[transaction_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `transaction` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
					`transaction_user_id` = '$R[transaction_user_id]', 
					`transaction_currency_id` = '$R[transaction_currency_id]', 
					`transaction_type_id` = '$R[transaction_type_id]', 
					`transaction_amount` = $transaction_amount, 
					`transaction_bank_name` = '$R[transaction_bank_name]', 
					`transaction_ifsc_code` = '$R[transaction_ifsc_code]',  
					`transaction_date` = '$R[transaction_date]', 
					`transaction_description` = '$R[transaction_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));

		$getUserQuery = "SELECT balance_amount FROM user WHERE user_id = ".$R['transaction_user_id'];
		$userRes = mysqli_query($con,$getUserQuery);
		$userResult = mysqli_fetch_assoc($userRes);

		/*1:Credit 2:Debit */
		if($R['transaction_type_id'] == 1){
			$newAmount = $transaction_amount + $userResult['balance_amount'];
		}else{
			$newAmount = $transaction_amount - $userResult['balance_amount'];
		}

		if(isset($newAmount)){
			$updUserBalance = "UPDATE user SET balance_amount = ".$newAmount ." WHERE user_id = ".$R['transaction_user_id'];
			$updUserRes = mysqli_query($con,$updUserBalance);
		}

		header("Location:../report-transaction.php?msg=$msg");
	}

	#########Function for delete transaction##########3
	function delete_transaction()
	{	
		global $con;
		/////////Delete the record//////////
		$SQL="DELETE FROM transaction WHERE transaction_id = $_REQUEST[transaction_id]";
		mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../report-transaction.php?msg=Deleted Successfully.");
	}
?>
