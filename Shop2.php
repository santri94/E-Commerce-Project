<?php
/*
Functionality -

obtains values from client shopping page and adds them to a cart, then calculates cost or allows you to enter new product
Purpose -  To add row of product into shopping_cart table, updating quantity, Cart_ID is used when adding a new row into shopping cart
if exists updates, else add.

*/
    session_start();
    require('database.php');
    require('functions.php');

$product_id = filter_input(INPUT_POST, 'Product_ID',
            FILTER_VALIDATE_INT);

$Qty = filter_input(INPUT_POST, 'Qty',
            FILTER_VALIDATE_INT);

if ($Qty == 0) {
    # code...
    header("Location:client.php");
}
else{

        $product = get_product($product_id);
        $Cart_ID = rand();
        $Cart_Cost = $Qty * $product['cost'];
        $State = 'Pending';
        $Email = $_SESSION['userEmail'];
        $P_ID = $product_id;

        global $db;
        $query1 = "SELECT * FROM shopping_cart WHERE State = 'Pending' and Email = :Email and P_ID = :P_ID";
        $statement = $db->prepare($query1);
        $statement->bindValue(':Email', $Email);
        $statement->bindValue(':P_ID', $P_ID);
        $statement->execute();
        $In_Cart = $statement->fetch();
        $statement->closeCursor();

        #echo count($In_Cart);
        #print_r($In_Cart);




        if ($In_Cart) {
            # code...
            echo "Si ejecuta el if statement!!";
            $New_Qty = $Qty + $In_Cart['Qty'];
            $New_Cost = $New_Qty * $product['cost'];
            $Cart_Key = $In_Cart['Cart_ID'];

            echo "New Qty = ".$New_Qty;
            echo "Cart_Key = ".$Cart_Key;
            echo "Cart_Key = ".$New_Cost;

            global $db;
            $query2 = "UPDATE `shopping_cart` SET `Qty` = :New_Qty WHERE Cart_ID = :Cart_Key";
            $statement = $db->prepare($query2);
            $statement->bindValue(':New_Qty', $New_Qty);
            #$statement->bindValue(':Cart_Cost', $New_Cost);
            $statement->bindValue(':Cart_Key', $Cart_Key);
            $statement->execute();
            $statement->closeCursor();

            /*query2 = "UPDATE shopping_cart SET Qty = ? WHERE Cart_ID = ?";
            $statement = $db->prepare($query2);
            $statement ->execute(array($New_Qty, $Cart_Key));
            */


            $query4 = "UPDATE `shopping_cart` SET `Cart_Cost` = :New_Cost WHERE `shopping_cart`.`Cart_ID` = :Cart_Key";
            $statement = $db->prepare($query4);
            #$statement->bindValue(':Qty', $New_Qty);
            $statement->bindValue(':New_Cost', $New_Cost);
            $statement->bindValue(':Cart_Key', $Cart_Key);
            $statement->execute();
            $statement->closeCursor();



            header("Location:cart.php");

        }
        else{
            global $db;
            $query3 = 'INSERT INTO shopping_cart (Cart_ID, Qty, Cart_Cost, State, Email, P_ID) VALUES (:Cart_ID, :Qty, :Cart_Cost, :State, :Email, :P_ID )';
            $statement = $db->prepare($query3);
            $statement->bindValue(':Cart_ID', $Cart_ID);
            $statement->bindValue(':Qty', $Qty);
            $statement->bindValue(':Cart_Cost', $Cart_Cost);
            $statement->bindValue(':State', $State);
            $statement->bindValue(':Email', $Email);
            $statement->bindValue(':P_ID', $P_ID);
            $statement->execute(array($Cart_ID, $Qty, ));
            $statement->closeCursor();

            header("Location:cart.php");
        }
}
?>
