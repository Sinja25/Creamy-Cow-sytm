<?php
require('db.php');

$pass = md5('Pass123@');
mysqli_query($con, "INSERT INTO users(username, password) VALUES('admin', '$pass');");
