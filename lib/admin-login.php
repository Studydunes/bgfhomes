<?php
	session_start();
	
	include_once("../includes/db_connect.php");
	if($_REQUEST[act]=="check_login")
	{
		check_login();
	}
	if($_REQUEST[act]=="logout")
	{
		logout();
	}
	if($_REQUEST[act] == "change_password")
	{
		change_password();
	}
####Function check user#######
function check_login()
{
	global $con;
	$user_user=$_REQUEST['user_user'];
	$user_password=$_REQUEST['user_password'];
	$SQL="SELECT * FROM `admin` WHERE admin_username = '$user_user' AND admin_password = '$user_password'";
	$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
	if(mysqli_num_rows($rs))
	{
		$_SESSION['login']=1;
		$_SESSION['user_details'] = mysqli_fetch_assoc($rs);
		$_SESSION['user_details']['user_id'] = $_SESSION['user_details']['admin_id'];
		$_SESSION['user_details']['user_level_id'] = 1;
		$_SESSION['user_details']['user_name'] = $_SESSION['user_details']['admin_name'];
		header("Location:../index.php");
	}
	else
	{
		header("Location:../admin-login.php?msg=Invalid User and Password.");
	}
}
####Function logout####
function logout()
{
	$_SESSION['login']=0;
	$_SESSION['user_details'] = 0;
	header("Location:../admin-login.php?msg=Logout Successfullly.");
}
#####Function for changing the password ####
function change_password() {
	global $con;
	$R = $_REQUEST;
	if($R['user_confirm_password'] != $R['user_new_password']) {
		header("Location:../admin-change-password.php?msg=Your new passsword and confirm password does not match!!!");
		exit;
	}
	$SQL = "UPDATE `admin` SET admin_password = '$R[user_new_password]' WHERE `admin_id` = ".$_SESSION['user_details']['user_id'];
	$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../admin-change-password.php?msg=Your Password Changed Successfully !!!");
	die;
}
?>