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
    
    <table align="center">
        <tr>
            <td>
                <nav><a href="Basketball-Admin.php"> Basketball </a></nav>
            </td>
            <td>
                <nav><a href="Tennis-Admin.php"> Tennis </a></nav>
            </td>
            <td>
                <nav><a href="Baseball-Admin.php"> Baseball </a></nav>
            </td>
            <td>
                <nav><a href="Soccer-Admin.php"> Soccer </a></nav>
            </td>
        </tr>
    </table>


<?php #-------------------------------------TESTING--------------------------------------------?>

<?php
    #Code for Football -> FTB
    $Cat_type = 'FTB';
    $products = get_products_by_category($Cat_type);
?>

    

    <h2 align="center">Football Products : </h2>
        <table align="center" class="white" border="1">
            <tr>
                <th><p class="form">Code</p></th>
                <th><p class="form">Product Name</p></th>
                <th><p class="form">Price</p></th>
                <th><p class="form">Qty on Inventory</p></th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><p class="form"><?php echo $product['Product_ID']; ?></p></td>
                <td><p class="form"><?php echo $product['PName']; ?></p></td>
                <td><p class="form"><?php echo number_format($product['cost'],2); ?></p></td>
                <td><p class="form"><?php echo $product['Pquantity']; ?></p></td>
                <td><form action="deleteProduct.php" method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="Product_ID"
                           value="<?php echo $product['Product_ID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <p align="center"><a href="admin.php"><button class="register" type="button">Main Page</button></a></p>



<?php #---------------------------------------------------------------------------------?>

</body>
</html>

<?php } 
    else{
        header("Location:index.php");
    }
?>