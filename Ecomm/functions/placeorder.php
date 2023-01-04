<?php
session_start();
include('../config/dbcon.php');


if(isset($_SESSION['auth']))
{

    if(isset($_POST['placeorderbtn']))
    {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $pcode = mysqli_real_escape_string($con, $_POST['pcode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

        if($name == "" || $email == "" || $phone == "" ||  $pcode == "" || $address == "" )
        {
            $_SESSION['message'] = "All Fields Are Mandatory";
            header('Location: ../checkout.php');
            exit(0);
        }

        $custId = $_SESSION['auth_user']['cust_id'];
        $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, tblproducts p WHERE c.prod_id=p.id AND c.cust_id='$custId' ORDER BY c.id DESC ";
        
        $query_run = mysqli_query($con, $query);

        $totalPrice = 0;
        foreach ($query_run as $citem) 
        {
            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
        }
        $tracking_no = "SFOS".rand(1111,9999).substr($phone,2);
        $insert_query = "INSERT INTO orders (tracking_no, cust_id, name, email, phone, address, postalcode, total_price, payment_mode, payment_id) VALUES ('$tracking_no', '$custId', '$name', '$email', '$phone', '$address', '$pcode', '$totalPrice', '$payment_mode', '$payment_id') ";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $order_id = mysqli_insert_id($con);
            foreach ($query_run as $citem) 
            {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];

                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES 
                ('$order_id', '$prod_id', '$prod_qty', '$price')";
                $insert_items_query_run = mysqli_query($con, $insert_items_query);
                
                $product_query = "SELECT * FROM tblproducts WHERE id='$prod_id' LIMIT 1 ";
                $product_query_run = mysqli_query($con, $product_query);

                $productData = mysqli_fetch_array($product_query_run);
                $current_qty = $productData['qty'];

                $new_qty = $current_qty - $prod_qty;

                $updateQty_query = "UPDATE tblproducts SET qty='$new_qty' WHERE id='$prod_id' ";
                $updateQty_query_run = mysqli_query($con, $updateQty_query);
            }    

            $deleteCartQuery = "DELETE FROM carts WHERE cust_id='$custId' ";
            $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
        
            $_SESSION['message'] = "Order Place Successfully";
            header('Location: ../myorders.php');
            die();
        }
    }

}
else{
    header('Location: ../index.php');
}

include("../userpanel/includes/footer.php");
?>

