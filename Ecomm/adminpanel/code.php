<?php 
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');


if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $tag_name = $_POST['tag_name'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $topsales = isset($_POST['topsales']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../products"; 

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'. $image_ext;

    $category_query = "INSERT INTO categories (name,tag_name, description,status,topsales,image) 
    VALUES ('$name', '$tag_name', '$description', '$status', '$topsales', '$filename')";

    $category_query_run = mysqli_query($con, $category_query);

    if($category_query_run)
    {
        move_uploaded_file($_FILES ['image']['tmp_name'], $path.'/'.$filename);
        $_SESSION['error'] = false;
    }
    else
    {
        $_SESSION['error'] = true;
    }
    
    header("Location: category.php");
}


else if(isset($_POST['adding_product_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $tagname = $_POST['tagname'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $status = isset($_POST['status']) ? '1':'0';
    $topsales = isset($_POST['topsales']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../products";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'. $image_ext;

    $product_query = "INSERT INTO tblproducts (category_id, name, tag_name, description, original_price, selling_price, qty, status, topsales, image) 
    VALUES ('$category_id', '$name', '$tagname', '$description', '$original_price', '$selling_price', '$qty', '$status', '$topsales', '$filename')";

    $product_query_run = mysqli_query($con, $product_query);

    if($product_query_run)
    {
        move_uploaded_file($_FILES ['image']['tmp_name'], $path.'/'.$filename);
        header("Location: products.php"/*Product Added Successfully*/);
    }
    else
    {
        header("Location: products.php" /*Something Went Wrong*/);
    }
}

else if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $tag_name = $_POST['tag_name'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $topsales = isset($_POST['topsales']) ? '1':'0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        $update_filename = $new_image;
    }
    else
    {
        $update_filename = $old_image;
    }
    $path = "../products"; 

    $update_query = "UPDATE categories SET name='$name', tag_name='$tag_name', description='$description', status='$status', topsales='$topsales', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
       if($_FILES['image']['name'] != "")
       {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$new_image);
        if(file_exists("../products/".$old_image))
        {
            unlink("../products/".$old_image);
        }
    }
    header("Location: category.php?id=$category_id");
    }
}

else if(isset($_POST['id']))
{

    $category_id = mysqli_real_escape_string($con, $_POST['id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../products/".$image))
        {
            unlink("../products/".$image);
        }

    }
    
    header("Location: category.php");
}

else if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $tagname = $_POST['tag_name'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $status = isset($_POST['status']) ? '1':'0';
    $topsales = isset($_POST['topsales']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../products";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
    
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $update_filename = time().'.'. $image_ext;
}
    else
    {
    $update_filename = $old_image;
    }

    $update_product_query = "UPDATE tblproducts SET category_id='$category_id', tag_name = '$tagname', name='$name', description='$description', original_price='$original_price', selling_price='$selling_price', status='$status', topsales='$topsales', image='$update_filename' WHERE id='$product_id' ";
    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {
       if($_FILES['image']['name'] != "")
       {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
        if(file_exists("../products/".$old_image))
        {
            unlink("../products/".$old_image);
        }
    }
    
    header("Location: products.php?id=$product_id");
}
else{
    header("editproduct.php?id=$category_id");
}
}
else if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['delete_product']);

    $product_query = "SELECT * FROM tblproducts WHERE id='$product_id' ";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM tblproducts WHERE id='$product_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../products/".$image))
        {
            unlink("../products/".$image);
        }
        
        
        header("Location: products.php");
        
    }

}
else if(isset($_POST['update_order_btn'])){
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no' ";
    $updateOrder_query_run = mysqli_query($con, $updateOrder_query);

    header("Location: view-order.php?trackingnumber=$track_no"); 
}   
else
{
    header("Location: category.php?id=$category_id");
}

?>
