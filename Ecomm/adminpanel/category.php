<?php

    include('includes/header.php');
    include('../functions/myfunctions.php');
    include('addcategory.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="text-white">Categories</h4>
                </div>
                <div class="card-body" id="category_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Category Tag Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $category = getAll("categories");

                            if(mysqli_num_rows($category) > 0)
                            {
                                foreach($category as $item)
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
                                <?= $item['status'] == '0'? "Active":"Hidden" ?>
                                </td>

                                <td>
                                    <a href="editcategory.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="category_id" value="<?php echo $item['id']; ?>">
                                    <button type ="submit" class="deletes_category_btn btn btn-sm btn-danger" id="<?php echo $item['id']; ?>" name="delete_category_btn">Delete</button>
                                    </form>
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
    </div>
</div>

    <script>
        $(document).ready(function (){
            $('.deletes_category_btn').click(function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to recover this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            data: {
                                id : id
                            },
                            type: "post",
                            url: "code.php",
                            success: function(data){
                                Swal.fire({
                                title: 'Deleted!',
                                text: 'Your category has been deleted.',
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

    
