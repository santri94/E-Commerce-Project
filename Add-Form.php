<?php
    session_start();
    require('database.php');
?>
<?php if ($_SESSION['is_valid_user'] && $_SESSION['userType'] == 'Admin') { ?>
    
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    
</head>
<body>
    <div class="top">
        <table align="center">
            <tr>
                <td align="center" width="400"><img src="Images/logo.png" width="350" height="100"></td>
                <td width="800" align="center" >
                    <h1>Sports Supply | Add Product </h1>
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

    <form action="Add-Query.php" method="post">
    <table class="form" align="center">
        <tr>
            <td>
                <label><p class="form">Product ID :</p></label>
            </td>
            <td><input type="text" name="Product_ID" required ></td>
        </tr>
        <tr>
            <td>
                <label><p class="form">Product Name :</p></label>
            </td>
            <td><input type="text" name="PName" required ></td>
        </tr>
        <tr>
            <td>
                <label><p class="form">Qty:</p></label>
            </td>
            <td><input type="text" name="Pquantity" required ></td>
        </tr>
        <tr>
            <td>
                <label><p class="form">Price :</p></label>
            </td>
            <td><input type="text" name="cost" required ></td>
        </tr>
        <tr>
            <td>
                <label><p class="form">Description :</p></label>
            </td>
            <td><input type="text" name="description" required ></td>
        </tr>
        <tr>
            <td>
                <label><p class="form">Image :</p></label>
            </td>
            <td><input type="text" name="image" required ></td>
        </tr>
        <tr>
            <td>
                <label><p class="form">Category :</p></label>
            </td>
            <td><input type="text" name="Cat_type" required placeholder="SCC, FTB, BKB, BSB, TNS" ></td>
        </tr>
    </table>

    <p align="center">
        <input class="send" type="Submit" value="Add Product">
    </p>
        
    </form>
    
    



<?php #---------------------------------------------------------------------------------?>

</body>
</html>

<?php } 
    else{
        header("Location:index.php");
    }
?>