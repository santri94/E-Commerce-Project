<?php
	session_start();
    require('database.php');
    require('functions.php');
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

    <p align="center"><a href="admin.php"><button class="register" type="button">Go Back</button></a></p>
    
<?php
    global $db;
    $query = "SELECT DISTINCT Order_Number FROM SOLD_ORDERS, SHOPPING_CART, PRODUCT WHERE SOLD_ORDERS.Cart_ID=SHOPPING_CART.Cart_ID AND P_ID=Product_ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();

    if (count($orders) == 0) { ?>
        <h2 align="center">No Orders To show</h2>
    <?php }
        else{ ?>
                <table align="center">
            <?php foreach ($orders as $order){ ?>
                    <tr>
                        <td><h2>Order # <?php echo $order['Order_Number'] ?></h2></td>
                        <td>
                            <form action="ViewOrders.php" method="post">
                                <input type="hidden" name="Order_Number"
                                       value="<?php echo $order['Order_Number']; ?>">
                                <input type="submit" value="View">
                            </form>
                        </td>
                    </tr>
        

        <?php } ?>
                </table>

<?php } ?>

    




</body>
</html>

<?php } 
    else{
        header("Location:index.php");
    }
?>