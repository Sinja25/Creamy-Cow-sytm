<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    body {
        font-family: arial;
        background-image: url(images/q.jpg);
        background-repeat: no-repeat;
        overflow: hidden;
        background-size: cover;
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

    <form class="form" action="actions/action.register.php" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" required />
        <input type="text" class="login-input" name="address" placeholder="Address" required />
        <input type="integer" class="login-input" name="contact" placeholder="Contact Number" required />
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="email" class="login-input" name="email" placeholder="Email Address" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button" required>
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>

</body>

</html>