<?php
    session_start();
    require('database.php');
    require('functions.php');

$product_id = filter_input(INPUT_POST, 'P_ID', 
            FILTER_VALIDATE_INT);

$New_Qty = $_POST['Qty'];

echo "Product ID : ".$product_id;
echo "New Qty : ".$New_Qty;

        
?>