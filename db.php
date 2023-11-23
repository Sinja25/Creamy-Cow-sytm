<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","root","","LoginSystem");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    function error($message) {
        echo '<p style="text-align: center; color:red; margin-top:1%; font-weight:bolder;">'. $message.'</p>';
      }
      function success($message) {
        echo '<p style="text-align: center; color:blue; margin-top:1% font-weight:bolder; ">'. $message.'</p>';
      }
?>
