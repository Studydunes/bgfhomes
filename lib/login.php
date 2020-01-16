<?php
	session_start();
	
	include_once("../includes/db_connect.php");
	if($_REQUEST['act']=="check_login")
	{
		check_login();
	}
	if($_REQUEST['act']=="logout")
	{
		logout();
	}
	if($_REQUEST['act'] == "change_password")
	{
		change_password();
	}
####Function check user#######
function check_login()
{
	global $con;
	$user_user=$_REQUEST['user_user'];
	//bcz user id ends with EA so we have to Remove EA from the user_user field
	// we store only id EA just a status Data.
	if (strpos($user_user, 'EA') === false) {
		header("Location:../login.php?msg=Invalid User and Password.");
		return;
	}

	$userId=rtrim($user_user,"EA");
	$user_password=$_REQUEST['user_password'];
	$SQL="SELECT * FROM user WHERE user_id = '$userId' AND user_password = '$user_password'";
	$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
	if(mysqli_num_rows($rs))
	{
		$result = mysqli_fetch_assoc($rs);

		if(!$result['status']){
			header("Location:../login.php?msg=Not varified by admin.");
			die();
		}
		
		$_SESSION['login']=1;
		$_SESSION['user_details'] = $result;
		$_SESSION['user_details']['user_level_id'] = 2;
		$user_id = $_SESSION['user_details']['user_id'];
		//header("Location:../index.php");
		header("Location:../welcome.php");
	}
	else
	{
		header("Location:../login.php?msg=Invalid User and Password.");
	}
}
####Function logout####
function logout()
{
	$_SESSION[login]=0;
	$_SESSION['user_details'] = 0;
	header("Location:../login.php?msg=Logout Successfullly.");
}
#####Function for changing the password ####
function change_password() {
	global $con;
	$R = $_REQUEST;
	if($R['user_confirm_password'] != $R['user_new_password']) {
		header("Location:../change-password.php?msg=Your new passsword and confirm password does not match!!!");
		exit;
	}
	$SQL = "UPDATE `user` SET user_password = '$R[user_new_password]' WHERE `user_id` = ".$_SESSION['user_details']['user_id'];
	$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../change-password.php?msg=Your Password Changed Successfully !!!");
	print $SQL;
	die;
}
?>