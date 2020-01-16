<?php
 if(!isset($_SESSION)) { 
	session_start();
 } 
$SERVER_PATH = "http://127.0.0.1/bgfhomes/";
$currency = "Euro";
$currency_symbol = "&#8364;";
##Function for generating the dynamic options #######
function get_new_optionlist($table,$id_col,$value_col,$selected=0, $cond = 1)
{
	global $con;
	$SQL="SELECT * FROM $table WHERE $cond ORDER BY $value_col";
	$rs=mysqli_query($con,$SQL);
	$option_list="<option value=''>Please Select</option>";
	while($data=mysqli_fetch_assoc($rs))
	{
		if($selected==$data[$id_col]){
			$option_list.="<option value='$data[$id_col]' selected>$data[$value_col]</option>";
		}else{
			$option_list.="<option value='$data[$id_col]'>$data[$value_col]</option>";
		}
	}
	return $option_list;
}

function get_new_optionlist1($table,$id_col,$value_col,$selected=0, $cond = 1)
{
	global $con;
	$SQL="SELECT * FROM $table WHERE $cond ORDER BY $value_col";
	print_r($SQL);die;
	$rs=mysqli_query($con,$SQL);
	$option_list="<option value=''>Please Select</option>";
	while($data=mysqli_fetch_assoc($rs))
	{
		if($selected==$data[$id_col]){
			$option_list.="<option value='$data[$id_col]' selected>$data[$value_col]</option>";
		}else{
			$option_list.="<option value='$data[$id_col]'>$data[$value_col]</option>";
		}
	}
	return $option_list;
}
##Function for generating the dynamic options #######
function get_checkbox($name,$table,$id_col,$value_col,$selected=0)
{
	global $con;
	$selected_array=explode(",",$selected);
	$SQL="SELECT * FROM $table ORDER BY $value_col";
	$rs=mysqli_query($con,$SQL);
	$option_list="";
	while($data=mysqli_fetch_assoc($rs))
	{
		if(in_array($data[$id_col],$selected_array))
		{
			$option_list.="<input type='checkbox' value='$data[$id_col]' name='".$name."[]' id='$name' checked>$data[$value_col]<br>";
		}
		else
		{
			$option_list.="<input type='checkbox' value='$data[$id_col]' name='".$name."[]' id='$name'>$data[$value_col]<br>";
		}
	}
	return $option_list;
}
#### Function for get Balance Amount ####
function getBalance($userID) {
	global $con;
	//// Get all Credit Amount /////
	$SQL = "SELECT SUM(transaction_amount) as total_credit FROM `transaction` WHERE transaction_type_id = 1 AND transaction_user_id = $userID";
	$rs=mysqli_query($con,$SQL);
	$credit = mysqli_fetch_assoc($rs);

	//// Get all Credit Amount /////
	$SQL = "SELECT SUM(transaction_amount) as total_debit FROM `transaction` WHERE transaction_type_id = 2 AND transaction_user_id = $userID";
	$rs=mysqli_query($con,$SQL);
	$debit = mysqli_fetch_assoc($rs);

	//// Remaining Balance //////
	$remainingBalance = $credit['total_credit'] - $debit['total_debit'];
	return $remainingBalance;

}

function getUserBalance($userID) {
	global $con;
	//// Get all Credit Amount /////
	$SQL = "SELECT balance_amount FROM `user` WHERE user_id = $userID";
	$rs=mysqli_query($con,$SQL);
	$balance_amount = mysqli_fetch_assoc($rs);

	return $balance_amount['balance_amount'];

}
?>
