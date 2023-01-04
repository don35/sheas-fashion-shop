<?php 
session_start();
include('config/dbcon.php');

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getAllTopSales()
{
    global $con;
    $query = "SELECT * FROM tblproducts WHERE topsales='1' ";
    return $query_run = mysqli_query($con, $query);
}

function getNameActive($table, $tag_name)
{
    global $con;
    $query = "SELECT * FROM $table WHERE tag_name = '$tag_name' AND status='0' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM tblproducts WHERE category_id='$category_id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
    global $con;
    $custId = $_SESSION['auth_user']['cust_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, tblproducts p WHERE c.prod_id=p.id AND c.cust_id='$custId' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);
}

function getOrders()
{
    global $con;
    $custId = $_SESSION['auth_user']['cust_id'];

    $query = "SELECT * FROM orders WHERE cust_id='$custId' ORDER BY id DESC";
    return $query_run = mysqli_query($con, $query);
}

function checkingTrackingNoValid($trackingNo)
{
    global $con;
    $custId = $_SESSION['auth_user']['cust_id'];

    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND cust_id='$custId' ";
    return mysqli_query($con, $query);

}

?>