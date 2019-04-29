<?php
	session_start();
    require('database.php');
    require('functions.php');
    $Product_ID = $_POST['Product_ID'];
    $Pquantity = $_POST['Pquantity'];

    if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Admin') {
        
        upd_qty_on_inventory($Pquantity, $Product_ID);
        header("Location:admin.php");

    } 
    else{
        header("Location:index.php");
    }
?>