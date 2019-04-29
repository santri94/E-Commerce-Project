<?php
    session_start();
    require('database.php');
    require('functions.php');
?>

<?php if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Client') { ?>
    
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Front Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    
</head>
<body>
    <div class="top">
        <table align="center">
            <tr>
                <td align="center" width="400"><img src="Images/logo.png" width="350" height="100"></td>
                <td width="800" align="center" >
                    <h1>Sports Supply | Client </h1>
                </td>   
                <td >
                     <h2>Phone: (555)555-5555</h2> 
                     <h2>Address: 2 Central Ave, New Jersey.</h2>
                </td>
            </tr>            
        </table>
        
    </div>
    <br>
    
    <h2 align="right"> Hi <?php echo $_SESSION['userName']; ?>  
    |
    <a href="Logout.php"><button class="register" type="button">Log Out</button></a>
    </h2>

<?php #-------------------------------------------------------------------------------------- ?>
                    <?php # TESTING ?>
<?php #-------------------------------------------------------------------------------------- ?>

<?php 
    # Update shopping_cart -> change State to paid
    # use $Order_Number = rand();
    # $Current_Date = date("y-m-d");
        $Order_Number = rand();
        $Purchase_Date = date("y-m-d");
        $Email = $_SESSION['userEmail'];
        
        global $db;
        $query = "SELECT * FROM shopping_cart WHERE State='Pending' AND Email = :Email";
        $statement = $db->prepare($query);
        $statement->bindValue(':Email', $Email);
        $statement->execute();
        $Cart_ids = $statement->fetchAll();
        $statement->closeCursor();

        foreach ($Cart_ids as $id) {
            # code...
            # Query or function to Insert into sold_orders
            insert_into_sold_orders($Order_Number, $Purchase_Date, $id['Cart_ID']);
            # Also substract each Qty of each Cart_ID to Qty of corresponding product in product table
            # Trying
            $product = get_product($id['P_ID']);
            $New_Qty = $product['Pquantity'] - $id['Qty'];
            upd_qty_on_inventory($New_Qty, $id['P_ID']);


        }

        # Now Change State of shopping_cart with Pending to Paid WHERE Email = $Email
        change_state($Email);
 ?>
 <h2 align="center">Thank You For Buying At Sports Supply</h2>
 <h2 align="center">Order Number : <?php echo $Order_Number; ?></h2>
 <h2 align="center">Today's Date : <?php echo $Purchase_Date; ?> (YYYY-MM-DD)</h2>
 <p align="center"><a href="client.php"><button class="register" type="button">Front Page</button></p>

<?php #-------------------------------------------------------------------------------------- ?>




</body>
</html>

<?php } 
    else{
        header("Location:index.php");
    }
?>