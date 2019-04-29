<?php
    #-------------------------------------------------------------------------------
    #          This page can become front page after logging in
    #-------------------------------------------------------------------------------

    require('database.php');

    global $db;


    $Email = $_POST['Email']; #to get the actual Email
    $pass = $_POST['pass'];



?>

<?php
    #$query = "SELECT * FROM userr WHERE Email like" ."'".$Email."'";
    $query = "SELECT * FROM userr WHERE Email like :Email";
    $statement = $db->prepare($query);
    $statement->bindValue(':Email', $Email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    #echo $Email;
    #echo $user['email'];
    $User_Email = $user['Email'];
    $User_Password = $user['Pass'];
    $Name = $user['F_Name'];
    $Last_Name = $user['L_Name'];
    $User_Type = $user['Type'];

?>

<?php
    if ( password_verify($pass,$User_Password) && $Email==$User_Email ) { ?>
        <?php
        session_start(); 
        $_SESSION['is_valid_user'] = true;
        $_SESSION['userEmail'] = $User_Email;
        $_SESSION['userType'] = $User_Type;
        $_SESSION['userName'] = $Name;
        if (!isset($_SESSION['cart'])) {
            # code...
            $_SESSION['cart'] = array();
        }

        if ($_SESSION['userType'] == 'Admin') {
              # code...
            header("Location:admin.php");
          }
        else{
           header("Location:client.php"); 
        }
        

        ?>
    
<?php }
    else {
        header("Location:.?error=1");
    } ?>

