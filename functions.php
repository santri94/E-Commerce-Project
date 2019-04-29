<?php
#Working Well
#Get Products by category
function get_products_by_category($Cat_type) {
    global $db;
    $query = 'SELECT * FROM product
              WHERE Cat_type = :Cat_type';
    $statement = $db->prepare($query);
    $statement->bindValue(":Cat_type", $Cat_type);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

# Working Well
function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM product
              WHERE Product_ID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

# Working Well
function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM product
              WHERE Product_ID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

#Working Well
function add_product($Product_ID, $PName, $Pquantity, $cost, 
    $description, $image, $Cat_type) {
    global $db;
    $query = 'INSERT INTO product
                 (Product_ID, PName, Pquantity, cost, description, image, Cat_type)
              VALUES
                 (:Product_ID, :PName, :Pquantity, :cost, :description, :image, :Cat_type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Product_ID', $Product_ID);
    $statement->bindValue(':PName', $PName);
    $statement->bindValue(':Pquantity', $Pquantity);
    $statement->bindValue(':cost', $cost);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':image', $image);
    $statement->bindValue(':Cat_type', $Cat_type);
    $statement->execute();
    $statement->closeCursor();
}


# Working Well
function empty_cart($Email) {
    global $db;
    $query = 'DELETE FROM shopping_cart WHERE Email = :Email AND State = "Pending"';
    $statement = $db->prepare($query);
    $statement->bindValue(':Email', $Email);
    $statement->execute();
    $statement->closeCursor();
}

# Working Well
# Total Price of The Shopping Cart
function total_price_shoppingcart($Email, $State) {
    global $db;
    $query = 'SELECT sum(Cart_Cost) FROM shopping_cart WHERE Email = :Email AND State = :State';
    $statement = $db->prepare($query);
    $statement->bindValue(':Email', $Email);
    $statement->bindValue(':State', $State);
    $statement->execute();
    $Total_Price = $statement->fetch();
    $statement->closeCursor();
    return $Total_Price;
}

# Working Well
# Update Qty of a product on inventory
function upd_qty_on_inventory($Pquantity, $Product_ID) {
    global $db;
    $query = 'UPDATE `product` SET `Pquantity` = :Pquantity
              WHERE Product_ID = :Product_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':Pquantity', $Pquantity);
    $statement->bindValue(':Product_ID', $Product_ID);
    $statement->execute();
    $statement->closeCursor();
}

# Working Well
# Update Qty of a product on inventory
function upd_name($PName, $Product_ID) {
    global $db;
    $query = 'UPDATE `product` SET `PName` = :PName
              WHERE Product_ID = :Product_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':PName', $PName);
    $statement->bindValue(':Product_ID', $Product_ID);
    $statement->execute();
    $statement->closeCursor();
}

# Working Well
# Update Qty of a product on inventory
function upd_price($cost, $Product_ID) {
    global $db;
    $query = 'UPDATE `product` SET `cost` = :cost
              WHERE Product_ID = :Product_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':cost', $cost);
    $statement->bindValue(':Product_ID', $Product_ID);
    $statement->execute();
    $statement->closeCursor();
}

# Working Well
# Function To Insert into sold_orders Table
function insert_into_sold_orders($Order_Number, $Purchase_Date, 
    $Cart_ID) {
    global $db;
    $query = 'INSERT INTO sold_orders
                 (Order_Number, Purchase_Date, Cart_ID)
              VALUES
                 (:Order_Number, :Purchase_Date, :Cart_ID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Purchase_Date', $Purchase_Date);
    $statement->bindValue(':Order_Number', $Order_Number);
    $statement->bindValue(':Cart_ID', $Cart_ID);
    $statement->execute();
    $statement->closeCursor();
}

# Working Well
# Function To Change State of the Carts to Paid
function change_state($Email) {
    global $db;
    $query = "UPDATE shopping_cart SET State = 'Paid'
              WHERE Email = :Email";
    $statement = $db->prepare($query);
    $statement->bindValue(':Email', $Email);
    $statement->execute();
    $statement->closeCursor();
}


?>