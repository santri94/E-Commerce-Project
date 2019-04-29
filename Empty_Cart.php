<?php
	session_start();
    require('database.php');
    require('functions.php');

    if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Client') {
        empty_cart($_SESSION['userEmail']);
        header("Location:client.php");

    } 
    else{
        header("Location:index.php");
    }
?>