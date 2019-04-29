<?php
	session_start();
    require('database.php');
    require('functions.php');
    $Order_Number = filter_input(INPUT_POST, 'Order_Number', 
            FILTER_VALIDATE_INT);

?>
<?php if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Admin') { ?>
    
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
                    <h1>Sports Supply | Admin </h1>
                </td>   
                <td >
                     <h2>Phone: (555)555-5555</h2> 
                     <h2>Address: 2 Central Ave, New Jersey.</h2>
                </td>
            </tr>            
        </table>
        
    </div>
    <br>
    
    <h2 align="right"> Hi <?php echo $_SESSION['userName']; ?> |
            <a href="Logout.php"><button class="register" type="button">Log Out</button></a>
    </h2>

    <h2 align="center"><?php echo "Order # : ".$Order_Number; ?></h2>

<?php
    global $db;
    $query = "SELECT * FROM SOLD_ORDERS, SHOPPING_CART, PRODUCT WHERE SOLD_ORDERS.Cart_ID=SHOPPING_CART.Cart_ID AND P_ID=Product_ID AND Order_Number = :Order_Number";
    $statement = $db->prepare($query);
    $statement->bindValue(":Order_Number", $Order_Number);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
?>
<table align="center" border="1">
    <th><h2>Order By</h2></th>
    <th><h2>Product</h2></th>
    <th><h2>Qty</h2></th>
    <th><h2>Cost</h2></th>
    <th><h2>Purchase Date</h2></th>
    <?php foreach ($orders as $order) { ?>
        <tr>
            <td><h2><?php echo $order['Email']; ?></h2></td>
            <td><h2><?php echo $order['PName']; ?></h2></td>
            <td><h2><?php echo $order['Qty']; ?></h2></td>
            <td><h2><?php echo '$'.number_format($order['Cart_Cost'],2); ?></h2></td>
            <td><h2><?php echo $order['Purchase_Date']; ?></h2></td>
        </tr>

    <?php } ?>
</table>
<p align="center"><a href="Orders-Admin.php"><button class="register" type="button">Go Back</button></a></p>


    


</body>
</html>

<?php } 
    else{
        header("Location:index.php");
    }
?>