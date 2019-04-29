<?php
    session_start();
    require('database.php');
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
    <a href="cart.php"><img src="Images/cart2.png" width="30" height="30"></a> 
    |
    <a href="Logout.php"><button class="register" type="button">Log Out</button></a>
    </h2>

    <table align="center">
        <tr>
            <td>
                <nav><a href="Soccer-Client.php"> Soccer </a></nav>
            </td>
            <td>
                <nav><a href="Tennis-Client.php"> Tennis </a></nav>
            </td>
            <td>
                <nav><a href="Baseball-Client.php"> Baseball </a></nav>
            </td>
            <td>
                <nav><a href="Football-Client.php"> Football </a></nav>
            </td>
        </tr>
    </table>



<?php #-------------------------------------TESTING--------------------------------------------?>

<?php
    # Code For Basketball -> BKB
    global $db;
    $query = 'SELECT * FROM product WHERE Cat_type = "BKB" ';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
?>

<br>  
        <table align="center" class="shop" >
            <?php foreach ($products as $product) : ?>
            <tr class="shop">
                <td><img class="shop" src="<?php echo 'Images/' . $product['image'] . '.jpg'; ?>"></td>
                <td>
                    <p class="form" align="center">
                    <?php echo $product['PName'] . '<br>';
                          echo $product['description'] . '<br>';
                          echo '$ '. number_format($product['cost'],2) . '<br>';

                    ?>
                        
                    </p>

                    <table align="center">
                        <tr>
                            <td>
                                <?php if ($product['Pquantity'] <= 0) { ?>
                                        <p class="form">SOLD OUT</p>
                                    
                                <?php }
                                else{ ?>

                                
                                <form action="Shop.php" method="post">
                                <input type="hidden" name="Product_ID"
                                       value="<?php echo $product['Product_ID']; ?>">
                                <p align="center"><select name="Qty">
                                <option selected>-</option>
                                <option >1</option>
                                <option >2</option>
                                <option >3</option>
                                <option >4</option>
                                <option >5</option>
                                </select>
                                </p>
                                
                                <input class="send" align="center" type="submit" value="Add To Cart">
                                
                                </form>
                                <?php } ?>
                            </td>
                        </tr>
                    
                    </table>

                </td>
            <?php endforeach; ?>
        </table>



<?php #---------------------------------------------------------------------------------?>


    



</body>
</html>

<?php } 
    else{
        header("Location:index.php");
    }
?>