<?php include_once("includes/header.php"); ?>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="login-bg">
        <div class="container">
            <div class="form-wrapper">
            <form action="lib/admin-login.php" method="post" class="form-signin wow fadeInUp">
            <h2 class="form-signin-heading">Login to your account </h2>
            <?php if($_REQUEST['msg']) { ?>
            <div class="alert alert-success fade in" style="margin:10px;">
                <strong><?=$_REQUEST['msg']?></strong>
            </div>
            <?php } ?>
            <div class="login-wrap">
                <input type="text" class="form-control" placeholder="User ID" autofocus name="user_user" required>
                <input type="password" class="form-control" placeholder="Password" name="user_password" required>
                <label class="checkbox">
                    <span class="pull-right">
                       &nbsp;
                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            </div>
            <input type="hidden" name="act" value="check_login">
          </form>
          </div>
        </div>
    </div>
    <!--container end-->
<?php include_once("includes/footer.php"); ?>
