<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
user();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<style>
 body{
    font-family: arial;
    background-image: url(images/q.jpg);
    background-repeat: no-repeat;
    overflow: hidden;
    background-size: cover;
    background-color: #302529;
  }
.form {
    margin: 175px auto;
    width: 350px;
    padding: 30px 25px;
    background: rgba(220, 220, 220, .5);
    border-radius: 5px;
}
</style>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>! Thankyouu!! Hope to see you again!</p>
        <center><p><a href="view_cart.php">Continue</a></p></center>
    </div>
</body>
</html>
