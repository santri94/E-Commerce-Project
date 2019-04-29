<?php
	session_start();
    require('database.php');
    require('functions.php');

    $Product_ID = $_POST['Product_ID'];
    $cost = $_POST['cost'];



    if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Admin') {

        upd_price($cost, $Product_ID);
        header("Location:admin.php");

    } 
    else{
        header("Location:index.php");
    }
?>