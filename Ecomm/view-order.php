<?php   
include("userpanel/includes/header.php");
include("functions/userfunctions.php");
include("authenticate.php");  

//include_once("userpanel/includes/slider.php"); 

if(isset($_GET['trackingnumber']))
{
    $tracking_no = $_GET['trackingnumber'];

    $orderData = checkingTrackingNoValid($tracking_no);
    if(mysqli_num_rows($orderData) < 0)
    {
        ?>
            <h4>Something Went Wrong</h4>
        <?php
        die();
    }

}
else{
    ?>
        <h4>Something Went Wrong</h4>
    <?php
    die();
}

$order_data = mysqli_fetch_array($orderData);
?>

<div class="py-3 bg-info">
    <div class="container">
        <h6 class="text-white"> 
            <a href="index.php" class="text-white" style="text-decoration: none;">
                Home >
            </a>
            <a href="myorders.php" class="text-white" style="text-decoration: none;">
                My Orders > 
            </a>
            <a href="#" class="text-white" style="text-decoration: none;">
                View Orders 
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class = "row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <span class="text-white fs-3">View Order</span>
                            <a href="myorders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Back</a> 
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $order_data['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Email Address</label>
                                            <div class="border p-1">
                                                <?= $order_data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Phone Number</label>
                                            <div class="border p-1">
                                                <?= $order_data['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Tracking Number</label>
                                            <div class="border p-1">
                                                <?= $order_data['tracking_no']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $order_data['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold">Zip Code</label>
                                            <div class="border p-1">
                                                <?= $order_data['postalcode']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php 
                                                $custId = $_SESSION['auth_user']['cust_id'];

                                                $order_query = "SELECT o.id as oid, o.tracking_no, o.cust_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi,
                                                    tblproducts p WHERE o.cust_id='$custId' AND oi.order_id=o.id AND p.id=oi.prod_id 
                                                    AND o.tracking_no='$tracking_no' ";

                                                $order_query_run = mysqli_query($con, $order_query); 
                                                
                                                if(mysqli_num_rows($order_query_run) > 0)
                                                {
                                                    foreach ($order_query_run as $item) {
                                                        ?>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <img src="products/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                                    <?= $item['name']; ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $item['price']; ?>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <?= $item['orderqty']; ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>


                                    <h5>Total Amount : <span class="float-end fw-bold">₱<?= $order_data['total_price']; ?>.00</span></h5>
                                    <hr>
                                    <label class="fw-bold">Payment Method: </label>
                                    <div class="border p-1 mb-3">
                                        <?= $order_data['payment_mode'] ?>
                                    </div>
                                    <label class="fw-bold">Status: </label>
                                    <div class="border p-1 mb-3">
                                        <?php 
                                            if($order_data['status'] == 0)
                                            {
                                                echo "To Ship";
                                            }else if($order_data['status'] == 1)
                                            {
                                                echo "To Received";
                                            }else if($order_data['status'] == 2){
                                                echo "Completed";
                                            }else if($order_data['status'] == 3){
                                                echo "Cancelled";
                                            }     
                                        
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    
<?php include("userpanel/includes/footer.php"); ?>