<?php   
include("userpanel/includes/header.php");
include("functions/userfunctions.php");
include("authenticate.php");  

//include_once("userpanel/includes/slider.php"); 

?>

<div class="py-3 bg-info">
    <div class="container">
        <h6 class="text-white"> 
            <a href="index.php" class="text-white" style="text-decoration: none;">
                Home >
            </a>
            <a href="checkout.php" class="text-white" style="text-decoration: none;">
                Checkout >
            </a>
            <a href="myorders.php" class="text-white" style="text-decoration: none;">
                My Orders
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class = "row">
                        <div class="col-md-7">
                            <h5>Your Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" required placeholder="Enter Your Full Name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" required placeholder="Enter Your Email Name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone Number</label>
                                    <input type="text" name="phone" required placeholder="Enter Phone Number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Zip Code</label>
                                    <input type="text" name="pcode" required placeholder="Enter Zip Code" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" required class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                                <?php $items = getCartItems(); 
                                $totalPrice = 0;
                                foreach ($items as $citem) 
                                {
                                    ?>
                                    <div class="mb-1 border">                  
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="products/<?= $citem['image']; ?>" alt="Image" width="60px">
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $citem['name']; ?></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>₱<?= $citem['selling_price']; ?></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>x<?= $citem['prod_qty']; ?></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                }
                                ?>
                                <hr>
                                <h5>Total Price : <span class="float-end fw-bold">₱<?= $totalPrice?>.00</span></h5>
                                <div class="">
                                    <input type="hidden" name="payment_mode" value="COD">
                                    <button type="submit" name="placeorderbtn" class="btn btn-outline-primary w-100">Place Order | COD</button>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

    
<?php include("userpanel/includes/footer.php"); ?>