<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
login();
// print_r($_SESSION['qty']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    body {
        font-family: arial;
        background-image: url(images/q.jpg);
        background-repeat: no-repeat;
        overflow: hidden;
        background-size: 1366px 768px;
        background-color: #302529;
    }

    .form {
        margin: 175px auto;
        width: 300px;
        padding: 30px 25px;
        background: rgba(220, 220, 220, .5);
        border-radius: 5px;

    }

    h1.login-title {
        color: black;
        margin: 0px auto 25px;
        font-size: 30px;
        font-weight: 300;
        text-align: center;
    }

    .login-input {
        font-size: 15px;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 25px;
        height: 25px;
        width: calc(100% - 23px);
        border-radius: 5px;
    }

    .login-input:focus {
        border-color: black;
        outline: none;
    }

    .login-button {
        color: #fff;
        background: black;
        border: 0;
        outline: 0;
        width: 100%;
        height: 50px;
        font-size: 16px;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
    }

    .link {
        color: black;
        font-size: 15px;
        text-align: center;
        margin-bottom: 0px;
    }

    .link a {
        color: black;
    }
</style>

<body>

    <?php
    require('db.php');

    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        $row = $result->fetch_assoc();
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user'] = $row['user'];
            $_SESSION['id'] = $row['id'];
            unset($_SESSION['cart']);
            unset($_SESSION['qty_array']);
            unset($_SESSION['qty']);
            if ($row['user'] == 1) {
                header("location: admin/");
            } else
                header("Location: prod.php");
            //header("Location: dashqto.html");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link">Don't have an account? <br> <a href="registration.php">Registration Now</a></p>

        </form>
    <?php
    }
    ?>
</body>

</html>