<?php   
include("includes/header.php");
include("../functions/myfunctions.php");

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Customer Orders
                        <a href="order-history.php" class="btn btn-warning float-end">Order History</a>
                    </h4>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped"> 
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Tracking Number</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $orders = getAllOrders();

                                if(mysqli_num_rows($orders) > 0)
                                {
                                    foreach ($orders as $item) {
                                    ?>  
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['tracking_no']; ?></td>
                                            <td>₱<?= $item['total_price']; ?></td>
                                            <td><?= $item['created_at']; ?></td>
                                            <td>
                                                <a href="view-order.php?trackingnumber=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Details</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }else{
                                    ?>
                                         <tr>
                                            <td colspan="5">No Orders Yet</td>
                                        </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

    </div>
</div>

    
<?php include("includes/footer.php"); ?>