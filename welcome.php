<?php 
    include_once("includes/header.php"); 
    require_once('includes/mysql_connection.php');
    $con = new MysqlDB();
    $con->connect(); 
    $user = $con->select("*", USER, "user_id=".$_SESSION['user_details']['user_id']);
    
?>
    <div class="breadcrumbs">
        <div class="container">
            <h1 style="text-align: center;">Welcome! <?= $user["user_first_name"] ?></h1>
        </div>   
    </div>
    
    <div class="registration-bg">
        <div class="container">
            <form id="form_user_detail"  method="post" action=""  class="form-signin wow fadeInUp" style="max-width:800px">
                <h2 class="form-signin-heading">User Detail</h2>
                <div class="login-wrap">         
                    <div class="form-group">
						<label for="pwd">First Name</label>
						<input type="text" class="form-control" value="<?= $user["user_first_name"] ?>" autofocus="" name="fname" id="fname" disabled>
				    </div>
                    <div class="form-group">
						<label for="pwd">Last Name</label>
						<input type="text" class="form-control" value="<?= $user["user_last_name"] ?>" autofocus="" name="lname" id="lname" disabled>
				    </div>
                    <div class="form-group">
						<label for="pwd">Email</label>
						<input type="text" class="form-control" value="<?= $user["user_username"] ?>" autofocus="" name="email" id="email" disabled>
				    </div>
                    <div class="form-group">
						<label for="pwd">D.O.B</label>
						<input type="text" class="form-control" value="<?= $user["user_dob"] ?>" autofocus="" name="dob" id="dob" disabled>
				    </div>
                    <div class="form-group">
						<label for="pwd">Occupation</label>
						<input type="text" class="form-control" value="<?= $user["user_occupation"] ?>" autofocus="" name="user_occupation" id="user_occupation" disabled>
				    </div>
                    <div class="form-group">
						<label for="pwd">Address</label>
						<input type="text" class="form-control" value="<?= $user["user_address"] ?>" autofocus="" name="user_address" id="user_address" disabled>
				    </div>
                    <div class="form-group">
						<label for="pwd">Mobile</label>
						<input type="text" class="form-control" value="<?= $user["user_mobile"] ?>" autofocus="" name="user_mobile" id="user_mobile" disabled>
				    </div>
				    <div class="form-group">
                        <label for="account_number">Account Number / User ID</label>
                        <input type="text" class="form-control" value="<?= $user["user_id"] ?>EA" autofocus="" name="user_account_number" id="user_account_number" disabled>
                    </div>
                </div>
            </form>
        </div>
     </div>
   
<?php include_once("includes/footer.php"); ?>
