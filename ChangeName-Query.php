<?php
	session_start();
    require('database.php');
    require('functions.php');
    $Product_ID = $_POST['Product_ID'];
    $PName = $_POST['PName'];

    if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Admin') {
        
        upd_name($PName, $Product_ID);
        header("Location:admin.php");

    } 
    else{
        header("Location:index.php");
    }
?>