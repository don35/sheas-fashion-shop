<?php 

include('includes/header.php');
include('../functions/myfunctions.php');
?>


<div class="container">

    <div class="row">
        <div class="col-md-12">
             <?php
                if(isset($_GET['id']))
               {     

                $id = $_GET['id']; 
                $product = getByID("tblproducts", $id);
                
                if(mysqli_num_rows($product) > 0) 
                {
                    $data = mysqli_fetch_array($product);
                    {
                        ?>
                    <div class="card">
                        <div class="card-header" style="height: 50px;">
                            <h4>Edit Product <a href="products.php" class="btn btn-danger float-end">Back</a></h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                            <div class="col-md-6">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-select">
                                <option selected>Select Category</option> 
                                    <?php 
                                    $categories = getAll("categories");

                                    if(mysqli_num_rows($categories) > 0)
                                    {
                                        foreach ($categories as $item){
                                            ?>
                                            <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
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
                            <input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">
                            <div class="col-md-6">
                                <label for="">Product Name</label>
                                <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Product Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label for="">Product Tag Name</label>
                                <input type="text" required name="tag_name" value="<?= $data['tag_name']; ?>" placeholder="Enter Product Tag Name" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" required name="description" placeholder="Enter Description" required = "true" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                </div>

                                <div class="col-md-12">
                                <label class = "mb-0">Upload Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                <input type="file" name="image" class="form-control mb-2">

                                <label class="mb-0">Current Image</label>
                                <img src="../products/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px">
                            </div>
                            <div class="col-md-6">
                                <label for="mb-0">Original Price</label>
                                <input type="text" required name="original_price" value="<?= $data['original_price']; ?>" placeholder="Original Price" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label for="mb-0">Selling Price</label>
                                <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Selling Price" class="form-control mb-2">
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <label for="">Quantity</label>
                                <input type="number" required name="qty" value="<?= $data['qty']; ?>" placeholder="Enter Quantity" class="form-control mb-2">
                            </div>
                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Top Sales</label>
                                    <input type="checkbox" name="topsales" <?= $data['topsales'] == '0'?'':'checked' ?>>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="update_product_btn btn btn-primary" name="update_product_btn" id="<?php echo $item['id'];?>">Update</button>
                            </div>
                    </div>
                    </div>
                            
                    <?php 
                    } 
            }
                else
                {
                    echo "Product Not Found for given id";
                }
            }
        else
        {
            echo "Id missing from url";
        }
        ?>
    </div>
</div>
    </div>

        
       