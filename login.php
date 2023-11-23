<?php
require 'includes/pdo_conn.php';
require 'includes/functions.php';

if (!isset($_SESSION["username"]) && !isset($_SESSION["user"])) {
  // header("Location: login.php");
  // exit();
} else if ($_SESSION["user"] == '0') {
  header("Location: prod.php");
} else if ($_SESSION["user"] == '1') {
  header("Location: admin/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Creamy Cow | Log in</title>

  <?php include 'includes/head_imports.php' ?>
</head>

<body class="hold-transition login-page" style="background-image: url('images/gg.png')">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><b>Creamy</b>Cow</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php require 'includes/alert_error_success.php'; ?>
        <form action="actions/action.login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login_user" class="btn btn-block" style="background-color:rgb(221, 160, 47); color: white;">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-1">
          <a href="registration.php">Register here</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <?php require 'includes/script_imports.php' ?>
</body>

</html>