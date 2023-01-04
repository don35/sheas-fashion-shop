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
            <a href="cart.php" class="text-white" style="text-decoration: none;">
                Cart >
            </a>
            <a href="myorders.php" class="text-white" style="text-decoration: none;">
                My Orders
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class = "row">
                <div class="col-md-12">
                    <div id="mycart">
                        <?php 
                            $items = getCartItems(); 
                            
                            if(mysqli_num_rows($items) > 0) {
                                ?>
                            <div class="row align-items-center">
                                    <div class="col-md-5"> 
                                        <h6>Product</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6>Price</h6> 
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Quantity</h6> 
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Remove</h6>
                                    </div>
                            </div>
                            <div id="">
                                <?php   
                                    foreach ($items as $citem) 
                                    {
                                        ?>
                                        <div class="card product_data shadow-sm mb-3">                  
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
                                                <div class="col-md-2">
                                                    <input type="hidden" class="prodId" value="<?= $citem['prod_id']; ?>">
                                                    <div class="input-group mb-1" style="width:100px;">
                                                        <span class="input-group-text decrement-btn updateQty">-</span>
                                                        <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty']; ?>" disabled>
                                                        <span class="input-group-text increment-btn updateQty">+</span>
                                                    </div> 
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid']; ?>">
                                                    <i class="fa fa-trash me-2"></i>Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                
                                ?>
                            </div>
                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-outline-primary">Proceed To Checkout</a>
                            </div>
                        <?php
                        }else{
                            ?>
                            <div class="card card-body shadow text-center">
                                <h4 class="py3">Your Cart is Empty!!</h4>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    
<?php include("userpanel/includes/footer.php"); ?>