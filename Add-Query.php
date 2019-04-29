<?php
	session_start();
    require('database.php');
    require('functions.php');

    $Product_ID = $_POST['Product_ID'];
    $PName = $_POST['PName'];
    $Pquantity = $_POST['Pquantity'];
    $cost = $_POST['cost'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $Cat_type = $_POST['Cat_type'];


    if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Admin') {

        add_product($Product_ID, $PName, $Pquantity, $cost, $description, $image, $Cat_type);
        header("Location:admin.php");

    } 
    else{
        header("Location:index.php");
    }
?>