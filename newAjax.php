<?php

include_once("db.php");

$id = $_POST['id'];

if (isset($_POST['addOnsId'])) {
    $addOns = $_POST['addOnsId'];
    $query = "UPDATE tbl_cart SET add_ons = $addOns WHERE id = $id ";
    $execute = mysqli_query($con, $query);

    if ($execute == true) {
        echo "User data was inserted successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $query = "UPDATE tbl_cart SET food_quantity = $qty WHERE id = $id ";
    $execute = mysqli_query($con, $query);

    if ($execute == true) {
        echo "User data was inserted successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}


?>