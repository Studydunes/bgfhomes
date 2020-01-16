<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST['act']=="save_admin"){
		save_admin();
		exit;
	}
	if($_REQUEST['act']=="delete_admin"){
		delete_admin();
		exit;
	}
	if($_REQUEST['act']=="get_report"){
		get_report();
		exit;
	}

	###Code for save admin#####
	function save_admin(){
		global $con;
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES['admin_image']['name'];
		$location = $_FILES['admin_image']['tmp_name'];
		if($image_name!=""){
			move_uploaded_file($location,"../uploads/".$image_name);
		}else{
			$image_name = $R['avail_image'];
		}

		if($R['admin_id']){
			$statement = "UPDATE `admin` SET";
			$cond = "WHERE `admin_id` = '".$R['admin_id']."'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}else{
			if($_SESSION['admin_details']['admin_level_id'] != 1)  {
				$R['admin_level_id'] = 3;
			}
			$statement = "INSERT INTO `admin` SET";
			$condQuery = "
				`admin_level_id` = '$R[admin_level_id]', 
				`admin_adminname` = '$R[admin_adminname]', 
				`admin_password` = '$R[admin_password]', 
			";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				$condQuery
				`admin_name` = '$R[admin_name]', 
				`admin_add1` = '$R[admin_add1]', 
				`admin_add2` = '$R[admin_add2]', 
				`admin_city` = '$R[admin_city]', 
				`admin_state` = '$R[admin_state]', 
				`admin_country` = '$R[admin_country]', 
				`admin_email` = '$R[admin_email]', 
				`admin_mobile` = '$R[admin_mobile]', 
				`admin_gender` = '$R[admin_gender]', 
				`admin_dob` = '$R[admin_dob]',
				`admin_image` = '$image_name'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../report-admin.php?msg=$msg");
	}
	
	
	#########Function for delete admin##########3
	function delete_admin(){
		global $con;
		$SQL="SELECT * FROM admin WHERE admin_id = $_REQUEST[admin_id]";
		$rs=mysqli_query($con,$SQL);
		$data=mysqli_fetch_assoc($rs);
		
		/////////Delete the record//////////
		$SQL="DELETE FROM admin WHERE admin_id = $_REQUEST[admin_id]";
		mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../report-admin.php?msg=Deleted Successfully.");
	}
?>
