<?php
include("functions/userfunctions.php"); 
include("userpanel/includes/header.php"); 
if(isset($_GET['product']))
{
    $product_tagname = $_GET['product'];
    $product_data = getNameActive("tblproducts", $product_tagname);
    $products = mysqli_fetch_array($product_data);

    if($products)
    {
        ?>
        <div class="py-3 bg-info">
    <div class="container">
        <h6 class="text-white"> 
            <a class="text-white" href="index.php" style="text-decoration: none;">
            Home >
            </a>
            <a class="text-white" href="categories.php "style="text-decoration: none;">
            Collections >
            </a>
             <?= $products['name']; ?></h6>
    </div>
</div>

        <div class="bg-light py-4">
            <div class="container product_data mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                        <img src="products/<?= $products['image']; ?>" alt="Products Image" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                    <span class="float-end text-danger fw-bold"><?php if($products['topsales']){ echo "Top Sales"; } ?></span>
                        <h4 class="fw-bold"><?= $products['name']; ?></h4><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>₱<span class="text-success fw-bold"><?= $products['selling_price']; ?></span></h5>
                            </div>
                            <div class="col-md-6">
                                <h5>₱<s class="text-danger fw-bold"><?= $products['original_price']; ?></s></h5>
                                </div>
                            </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3" style="width:110px;">
                            <span class="input-group-text decrement-btn">-</span>
                            <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                            <span class="input-group-text increment-btn">+</span>
                            </div>

                        </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <button class="btn btn-primary px-4 addtocartbtn" value=<?= $products['id']; ?> style="margin: 5px; padding: 10px;"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                                </div>
                                <div class="col-md-15">
                                    <button class="btn btn-danger" style="margin: 5px; padding: -50px;"><i class="fa fa-heart me-2"></i>Add to Whishlist</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                        <label class="mb-0">Choose Size</label>
                        <select class="form-select" aria-label="Default select example" style="align:right;">
                        <option selected>Sizes</option>
                        <option value="1">S</option>
                        <option value="2">M</option>
                        <option value="3">L</option>
                        <option value="3">XL</option>
                        </select>
                        </div>
                        <br>
                        <h6>Product Description</h6>
                        <hr>
                        <h5><?= $products['description']; ?></h5>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
    }
    else
    {
        echo "Product Not Found";
    }
}
else
{
    echo "Something Went Wrong";
}


include('userpanel/includes/footer.php'); 
include('submit.php'); 
?>

<!--<script>
      alertify.set('notifier', 'position', 'top-right');
     
    </script>-->


