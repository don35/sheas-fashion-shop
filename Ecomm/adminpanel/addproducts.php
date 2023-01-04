<?php 
include('includes/header.php');
include('../functions/myfunctions.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Add Products</h1>
                </div>
                <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-6">
                            <label class="mb-0">Select Category</label>
                            <select name="category_id" class="form-select">
                            <option selected>Select Category</option>
                                <?php 
                                $categories = getAll("categories");

                                if(mysqli_num_rows($categories) > 0)
                                {
                                    foreach ($categories as $item){
                                        ?>
                                        <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                        <?php
                                }
                                
                                }
                                else
                                {
                                    echo "No Category Available"; 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-0">Product Name</label>
                            <input type="text"  required name="name" placeholder="Enter Product Name" class="form-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Product Tag Name</label>
                            <input type="text"  required name="prodtag_name" placeholder="Enter Product Tag Name" class="form-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Description</label>
                            <textarea rows="3"  required name="description" placeholder="Enter Description" class="form-control mb-2" required="true"></textarea>
                        <div class="col-md-12">
                            <label class="mb-0">Upload Image</label>
                            <input type="file"  required name="image" class="form-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Original Price</label>
                            <input type="text"  required name="original_price" placeholder="Enter Original Price" class="form-control mb-2">
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Selling Price</label>
                            <input type="text"  required name="selling_price" placeholder="Selling Price" class="form-control mb-2">
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <label class="mb-0">Quantity</label>
                            <input type="number"  required name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                        </div>
                            <div class="col-md-6">
                                <label class="mb-0">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Top Sales</label>
                                <input type="checkbox" name="topsales">
                            </div>
                        </div>

                        <div class="col-md-12">
                        <button type="button" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="adding_product_btn">Add</button>
                            </div>
                        </form>   
                </div>
            </div>
        </div>
    </div>
</div>