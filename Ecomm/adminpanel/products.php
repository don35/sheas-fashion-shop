<?php

    include('includes/header.php');
    include('../functions/myfunctions.php');
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop"style="left: 25px;">Add Products
        </button>

     <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Products</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
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
                            <input type="text"  required name="tagname" placeholder="Enter Product Tag Name" class="form-control mb-2">
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

                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="adding_product_btn">Add</button>
                            </div>
                        </form>
        </div>
    </div>
</div>
                        
</div>
                
</div>
</div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Products</h4>
                </div>
                <div class="card-body bg-white">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Tag Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $products = getAll("tblproducts");

                            if(mysqli_num_rows($products) > 0)
                            {
                                foreach($products as $item)
                                {
                                    ?>
                            <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td><?= $item['tag_name']; ?></td>
                                    
                                <td>
                                    <img src="../products/<?= $item['image']; ?>" width="50px" height="50px" alt="" >
                                </td>
                                <td>
                                <?= $item['status'] == '0'? "Visible":"Hidden" ?>
                                </td>

                                <td><?= $item['qty']; ?></td>
                                <td>
                                    <a href="editproduct.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                    <button type="button" class="delete_product_btn btn btn-sm btn-danger" name="delete_product_btn" id="<?php echo $item['id'];?>">Delete</button>
                                </td>
                            </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Records Found";
                            }
                            
                            ?>
                            
                        </tbody>

                    </table>

                </div>
            </div>
                        </div>
    <script>
            $(document).ready(function (){
            $('.delete_product_btn').click(function (e) {
                e.preventDefault();
                var delete_product = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to recover it",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            data: {
                                delete_product : delete_product, 
                            },
                            type: "post",
                            url: "code.php",
                            success: function(data){
                                Swal.fire({
                                title: 'Deleted!',
                                text: 'Your product has been deleted.',
                                icon: 'success'
                                }).then((result) => {
                                    location.reload();
                                });
                            }
                        });   
                    }
                });
            });
        });
        
       
    </script>

    <script src="assets/js/material-dashboard.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>

        </div>
    </div>
</div>
</body>
</html>

