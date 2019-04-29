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


<?php
    global $db;

    $Email = $_SESSION['userEmail'];
    $query = ("SELECT * FROM SHOPPING_CART, PRODUCT WHERE State = 'Pending' AND Email =:Email AND P_ID=Product_ID");
    $statement = $db->prepare($query);
    $statement->bindValue(':Email', $Email);
    $statement->execute();
    $cart = $statement->fetchAll();
    $statement->closeCursor();

    #echo count($cart);

                    
    #$num_results = $cart->num_rows;// results per row ->
?>
<h2 align="center">Your Cart</h2>
<p align="center"><a href="client.php"><button class="register" type="button">Buy More</button></a></p>

<?php    if (count($cart) == 0) { ?>
        <h2 align="center">Shopping Cart is Empty</h2>
    
<?php }
    else{?>
        
        <p align="center"><a href="Empty_Cart.php"><button class="register" type="button">Empty Cart</button></a></p>
        
        
        <table align="center" border="1">
            <th>&nbsp</th>
            <th><p class="form">Product ID</p></th>
            <th><p class="form">Product Name</p></th>
            <th><p class="form">Qty</p></th>
            <th><p class="form">Cost</p></th>


        <?php foreach ($cart as $carts) : ?>
            <tr>
                <td><img class="icon" src="<?php echo 'Images/' . $carts['image'] . '.jpg'; ?>"></td>
                <td><p class="form" align="center">
                    <?php echo $carts['P_ID'];?></p></td>
                <td><p class="form" align="center">
                    <?php echo $carts['PName'];?></p></td>
                <td><p class="form" align="center">
                    <?php echo $carts['Qty'];?>
                    </p></td>
                <td><p class="form" align="center">
                    <?php echo '$'.number_format($carts['Cart_Cost'],2);?></p></td>
            </tr>
        <?php endforeach; ?>  


        </table>
        
        <?php $Status = 'Pending';
        $Total_Price = total_price_shoppingcart($_SESSION['userEmail'], $Status );
        $total = number_format($Total_Price['sum(Cart_Cost)'],2);

        ?>
        <h2 align="center"><?php echo 'Total : $'.$total; ?></h2>

    <form action="Pay.php" method="post">
    <p align="center">
        <input class="send" type="Submit" value="Check Out">
    </p>
        
    </form>
        



    <?php } ?>








    



</body>
</html>

<?php } 
    else{
        header("Location:index.php");
    }
?>