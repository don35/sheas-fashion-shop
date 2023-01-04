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
                $category = getByID("Categories", $id);

                if(mysqli_num_rows($category) > 0)
                {
                    $data = mysqli_fetch_array($category);
                    ?>
                <div class="card">
                    <div class="card-header" style="height: 50px;">
                        <h4>Edit Category <a href="category.php" class="btn btn-secondary float-end">Back</a></h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                            <label for="">Category Name</label>
                            <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Category Name" class="form-control" required="true">
                        </div>
                        <div class="col-md-12">
                        <label for="">Category Tag Name</label>
                        <input type="text" name="tag_name" value="<?= $data['tag_name'] ?>" placeholder="Enter Category Tag Name" class="form-control" required="true">
                        </div>
                        <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea rows="3" name="description" placeholder="Enter Description" class="form-control" required="true"><?= $data['description'] ?></textarea>
                        </div>
                        <div class="col-md-12">
                        <label for="formFileMultiple">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                           
                        <label for="formFileMultiple">Current Image</label>
                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                        <img src="../products/<?= $data['image'] ?>" height="50px" width="50px" alt="images">
                </div>
                        <div class="col-md-6">
                        <label for="">Status</label>
                        <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
                        </div>
                        <div class="col-md-6">
                        <label for="">Top Sales</label>
                        <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="topsales">
                        </div>
                        <div>
                            <button type="submit" class="update_category_btn btn btn-success" id="<?php echo $item['id'];?>" name="update_category_btn" >Update</button>
                        </div>
                        </form>
                
                    </div>
                </div>
                <?php
                }
                else
                {
                    echo "Category Not Found";
                } 
            }
            else
            {
                echo "The id missing from url"; 
            }
            ?>
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
                    text: "You won't be able to revert this!",
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
                                text: 'Your file has been deleted.',
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

