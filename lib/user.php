<?php
	session_start();
	include_once("../includes/Email.php");
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
    if($_REQUEST['act']=="save_user")
	{
		save_user();
		exit;
	}
	if($_REQUEST['act']=="delete_user")
	{
		delete_user();
		exit;
	}
	if($_REQUEST['act']=="get_report")
	{
		get_report();
		exit;
	}
	if($_REQUEST['act']=="update_user_status")
	{
		update_user_status();
		exit;
	}
	###Code for save user#####

	function sendEmail($data = NULL){
		$email = new Email();
		$email->mail->Subject = "Bgfhomes Register Account";
		$message = "<p style='margin:auto;display:table;'><img src='http://www.bgfhomes.com/img/logo_home.png'></p>".
		            "<h1>Welcome! Here is your account confirmation with BGFHOMES</h1>".
		            "<br><br>".
		            "<p>Hello ".$data['user_account_name']."</p>".
		            "<p>Thank you for creating your account at BGFHomes. Your account details are as follows: </p>".
	           // 	"<p> ".$data['email_message']." </p>".
				// 	"<p> Name :- ".$data['user_account_name']." </p>".
					"<p><b>Your Account Number:</b> ".$data['user_id'].$data['acc_num_post']."<br><b>Account Status:</b> Active</p>".
					"<p>To sign in to your account, please visit <a href='http://www.bgfhomes.com/login.php'>www.bgfhomes.com</a> </p>".
					"<p>If you have any questions regarding your account, click 'Reply' in your email client and we'll be only too happy to help.</p><br><br>".
					"<p><b>Bank Giro Finance Homes<br>+1 855 664 4334</b></p>";
					
        $email->mail->Body = $message;
		$email->mail->addAddress($data['user_username']);
		$email->mail->addBCC("neerajamoli@soarlogic.com");
		if($email->send()){
			return true;
		}
		return false;
	}

	function save_user(){
		global $con;
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES['user_image']['name'];
		$location = $_FILES['user_image']['tmp_name'];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R['avail_image'];
		}
		//die;
		if($R[user_id])
		{
			$statement = "UPDATE `user` SET";
			$cond = "WHERE `user_id` = '$R[user_id]'";
			$msg = "Data Updated Successfully.";
			$condQuery = "";
		}
		else
		{
		    $check_user_exist = mysqli_query($con,"SELECT `user_id` FROM `user` WHERE `user_username` = '".$R['user_username']."' ");
			if($check_user_exist->num_rows){
				$msg_user_exist = $R['user_username']." already exists !!!";
				header("Location:../user.php?msg=$msg_user_exist");
			}
			
			if($_SESSION['user_details']['user_level_id'] != 1)  {
				$R['user_level_id'] = 3;
			}
			$statement = "INSERT INTO `user` SET";
			$condQuery = "
				`user_level_id` = '2', 
				`user_username` = '$R[user_username]', 
				`user_password` = '$R[user_password]', 
			";
			$msg="Data saved successfully.";
		}
		$R['user_account_name'] = $R['user_first_name']. " " .$R['user_last_name']; 
		$SQL=   $statement." 
				$condQuery
				`user_salutation_id` = '$R[user_salutation_id]', 
				`user_at_id` = '$R[user_at_id]', 
				`user_account_name` = '$R[user_account_name]', 
				`user_first_name` = '$R[user_first_name]', 
				`user_last_name` = '$R[user_last_name]', 
				`user_gender_id` = '$R[user_gender_id]', 
				`user_marital_id` = '$R[user_marital_id]', 
				`user_dob` = '$R[user_dob]', 
				`user_occupation` = '$R[user_occupation]', 
				`user_address` = '$R[user_address]', 
				`user_city` = '$R[user_city]', 
				`user_state` = '$R[user_state]', 
				`user_country` = '$R[user_country]', 
				`user_telephone` = '$R[user_telephone]', 
				`user_mobile` = '$R[user_mobile]', 
				`user_fax` = '$R[user_fax]', 
				`user_nationality` = '$R[user_nationality]',
				`user_image` = '$image_name'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		if($_SESSION['login']!=1){
				$data['user_username'] = $R['user_username'];
				$data['user_account_name'] = $R['user_account_name']; 
                $data['email_message'] = "Thank you for registering your email with Bgfhomes.";
				$data['user_id'] = $con->insert_id;
				$data['acc_num_post'] = "EA";
				if(sendEmail($data)){
					header("Location:../login.php?msg=You are registered successfully. Please check you email for your Login credential!!!");
					exit;
				}else{
					header("Location:../login.php?msg=You are not registered successfully. Please contact help desk!!!");
					exit;
				}
		}else if($_SESSION['user_details']['user_level_id'] == 2) {
			header("Location:../user.php?user_id=".$_SESSION['user_details']['user_id']."&msg=Your account updated successfully !!!");
			exit;
		}
		header("Location:../report-user.php?msg=$msg");
	}
	#########Function for delete user##########3
	function delete_user()
	{
		global $con;
		$SQL="SELECT * FROM user WHERE user_id = $_REQUEST[user_id]";
		$rs=mysqli_query($con,$SQL);
		$data=mysqli_fetch_assoc($rs);
		
		/////////Delete the record//////////
		$SQL="DELETE FROM user WHERE user_id = $_REQUEST[user_id]";
		mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../report-user.php?msg=Deleted Successfully.");
	}

	function update_user_status(){
		global $con;
		
		$SQL="UPDATE user SET status = '".$_REQUEST['status_val']."' WHERE user_id = ".$_REQUEST['userid'];
		$rs=mysqli_query($con,$SQL);
		if($rs){
			$data['success'] = true;
		}else{
			$data['success'] = false;
		}
		echo json_encode($data);
	}
?>
