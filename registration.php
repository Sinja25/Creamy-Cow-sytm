<?php
require 'includes/pdo_conn.php';
require 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #message{
		position: absolute;
		bottom: -30px;
		color: #fff;
		font-size: 10px;
		display: none;
	  }

    p{
      font-size: 10px;
      margin: 15px 0;
      display: inline-block;
      color: #ffffff;
    }
  </style>

  <title>Creamy Cow | Registration </title>
  <link rel="stylesheet" href="style.css">
  <?php include 'includes/head_imports.php' ?>
</head>

<body class="hold-transition register-page" style="background-image: url('images/gg.png')">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><b>Creamy</b>Cow</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register to place your orders</p>
        <?php require 'includes/alert_error_success.php';?>
        <form action="actions/action.register.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="full_name" placeholder="Full name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="address" placeholder="Address" Required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa-solid fa-location-crosshairs"></i>
                <!-- <span class="fas fa-user"></span> -->
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="contact_no" placeholder="Contact" Required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <!-- <span class="fas fa-user"></span> -->
                <i class="fa-solid fa-phone"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" Required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" Required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <!-- <span class="fas fa-user"></span> -->
                <i class="fa-solid fa-key"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" placeholder="Password" Required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <p id="message">Password is <span id="strength"></span></p>
          </div>
          

          <script>

var pass = document.getElementById("password");
var msg = document.getElementById("message");
var str = document.getElementById("strength");

pass.addEventListener('input', () => {
  if(pass.value.length > 0){
    msg.style.display = "block";
  }
  else{
    msg.style.display= "none";
  }
  if(pass.value.length < 8){
    str.innerHTML = "poor";
    pass.style.borderColor = "red";
    msg.style.color = "red";
  }
  else if(pass.value.length >= 8 && pass.value.length < 12){
    str.innerHTML = "good";
    pass.style.borderColor = "blue";
    msg.style.color = "blue";
  }
  else if(pass.value.length >= 12){
    str.innerHTML ="strength";
    pass.style.borderColor = "green";
    msg.style.color = "green";
  }
})

</script>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="confirm_password" placeholder="Retype password" Required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <p id="confirm_password"></p>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#" style="color: rgb(221, 160, 47)">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-block" style="background-color:rgb(221, 160, 47); color: white;" Onclick="checkPassword()" >Submit</button>
            </div>
            <!-- /.col -->
          </div>

          <script>

            function checkPassword(){
              let password = document.getElementById
              ("password").value;
              let cnfrmPassword = document.getElementById
              ("confirm_password").value;
              console.log(password,cnfrmPassword);
              let message = document.getElementById
              ("message");
              
              if(password.length != 0){
                if(password == cnfrmPassword){
                  message.textContent = "Password match";
                  message.style.color = "Green";

                }
                else{
                  message.textContent = "Do not match";
                  message.style.color = "Red";
                }
              }
              else{
                alert("Password can't be empty!");
                message.textContent ="";
              }
            }
          </script>
         
        </form>
        <a href="login.php" class="text-center">Already have an account?</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <?php require 'includes/script_imports.php' ?>
</body>

</html>