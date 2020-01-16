<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST['act']=="fetch_bank_details"){
		fetch_bank_details();
		exit;
	}
	
	###Code for fetchig bank details#####
	function fetch_bank_details()
	{
		global $con;
		$R=$_REQUEST;
		$response['success'] = false;
		//echo "id ".$R['bank_id'];print_r($_REQUEST);die();					
		if( isset($R['bank_id']) ){
			$bank_ifsc_code = array();
			$query = "SELECT * FROM `banks_detail` WHERE `bank_id` = '".$R['bank_id']."'";
			$rs = mysqli_query($con,$query) or die(mysqli_error($con));
			if($rs->num_rows){
				while($bank_details = mysqli_fetch_assoc($rs)){
					$bank_ifsc_code[] = $bank_details['ifsc_code'];
				}
				$response['success'] = true;
				$response['data'] = $bank_ifsc_code;
			}
		}
		echo json_encode($response);
	}

?>
