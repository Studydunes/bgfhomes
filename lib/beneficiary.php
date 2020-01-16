<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST['act']=="save_beneficiary")
	{
		save_beneficiary();
		exit;
	}
	if($_REQUEST['act']=="delete_beneficiary")
	{
		delete_beneficiary();
		exit;
	}
	if($_REQUEST['act']=="update_beneficiary_status")
	{
		update_beneficiary_status();
		exit;
	}
	
	###Code for save beneficiary#####
	function save_beneficiary()
	{
		global $con;
		$R=$_REQUEST;
		$beneficiary_amount = str_replace(',', '', $R['beneficiary_amount']);
		
		if($beneficiary_amount > $R['cur_user_account_balance']) {
			$msg = "Isufficient Balance.";
			header("Location:../beneficiary.php?msg=$msg");
			exit();
		}
		
		if($R['beneficiary_id'])
		{
			//// Get the beneficiary details //////
			$SQL = "SELECT * FROM beneficiary WHERE beneficiary_id = ".$R['beneficiary_id'];
			$brs = mysqli_query($con,$SQL) or die(mysqli_error($con));
			$bdata = mysqli_fetch_assoc($brs);
			//// Add the transfer into transactions /////
			if($R['beneficiary_status_id'] == 3) {
				$date = date("d F,Y");
				$SQL= " INSERT INTO  `transaction` SET
					`transaction_user_id` = '$R[beneficiary_user_id]', 
					`transaction_type_id` = '2', 
					`transaction_amount` = $beneficiary_amount, 
					`transaction_date` = '$date', 
					`transaction_bank_name` = '$bdata[beneficiary_bank_name]', 
					`transaction_currency_id` = '$bdata[beneficiary_currency_id]', 
					`transaction_ifsc_code` = '$bdata[beneficiary_ifsc_code]',  
					`transaction_description` = 'Amount Debited'";
				$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));

				$balance_amount = $R['cur_user_account_balance'] - $beneficiary_amount;
				$update_user_bal_query = "UPDATE user set balance_amount = ".$balance_amount." WHERE user_id = ".$R['user_id'];
				$user_rs = mysqli_query($con,$update_user_bal_query);
			}

			//// Update beneficiary //////
			$statement = "UPDATE `beneficiary` SET";
			$cond = "WHERE `beneficiary_id` = '$R[beneficiary_id]'";
			$condQuery = " beneficiary_status_id = '$R[beneficiary_status_id]',";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `beneficiary` SET";
			$cond = "";
			$condQuery = "`beneficiary_user_id` = '".$_SESSION['user_details']['user_id']."',";
			$msg="Transfer successfull. Thank you.";
		}
		$SQL =   $statement.$condQuery." 
					`beneficiary_bank_name` = '$R[beneficiary_bank_name]', 
					`beneficiary_account_number` = '$R[beneficiary_account_number]', 
					`beneficiary_currency_id` = '$R[beneficiary_currency_id]', 
					`beneficiary_ifsc_code` = '$R[beneficiary_ifsc_code]', 
					`beneficiary_amount` = $beneficiary_amount ". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));

		if($R['beneficiary_id']) {
			header("Location:../report-transfer.php?msg=$msg");
		} else {
			header("Location:../beneficiary.php?msg=$msg");
		}
	}
	
	#########Function for delete beneficiary##########3
	function delete_beneficiary()
	{	
		global $con;
		/////////Delete the record//////////
		$SQL="DELETE FROM beneficiary WHERE beneficiary_id = $_REQUEST[beneficiary_id]";
		mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../report-beneficiary.php?msg=Deleted Successfully.");
	}
?>
